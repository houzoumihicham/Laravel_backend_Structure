<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Session;

trait backend
{


    /**
     * Handle create request.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewPr.'form')->with('title', trans($this->modName . '.create'))
        ->with('route', route('backend.' . $this->modName . '.store'))
        ->with('modName',$this->modName)
        ->with('method', 'post')
        ->with('model', $this->model);
    }


    /**
     * Store a newly created resource
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation =  $this->itemValidation($request->all());
        if($validation !== true){
            return redirect()->back()->with(['errors' => $validation]);
        }

        $field = $this->checkIfFiledFile($request->all());
        if($field){
            $request = $this->uploadFile($request , $field);
        }else{
            $request = $request->all();
        }

        $this->model->fill($request);

        if ($this->model->save()) {

            $this->afterSave($request,$this->model);

            Session::flash('success', trans($this->modName . '.new_created'));
            return redirect(route('backend.' . $this->modName . '.index'));
            
        }

    }


     /**
     * Handle edit request
     * 
     * @param int $id => the id to edit
     * @return Response
     */
    public function edit($id)
    {
        $model = $this->model->find($id);
        if ($model == null) {
            Session::flash('warning', trans($this->modName . '.notfound'));
            return redirect(route('backend.' . $this->modName . '.index'));
        }

        return view($this->viewPr.'form')->with('title', trans($this->modName . '.edit'))
        ->with('route', route('backend.' . $this->modName . '.update',$id))
        ->with('modName',$this->modName)
        ->with('method', 'put')
        ->with('model', $model); 
    }



    /**
     * Update the specified resource
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation =  $this->itemValidation($request->all());
        if($validation !== true){
            return redirect()->back()->with(['errors' => $validation]);
        }

        $field = $this->checkIfFiledFile($request->all());
        if($field){
            $request = $this->uploadFile($request , $field);
        }else{
            $request = $request->all();
        }

        $model = $this->model->find($id);

        if ($model == null) {
            Session::flash('warning', trans($this->modName . '.notfound'));
            return redirect(route('backend.' . $this->modName . '.index'));
        }

        $model->fill($request);

        if ($model->save()) {
             $this->afterSave($request,$this->model);

            Session::flash('success', trans($this->modName . '.updated'));
            return redirect(route('backend.' . $this->modName . '.index'));
            
        }

    }


    /**
      
    * Delete Items
     
    */

    public function destroy($id){
    
    $model = $this->model->find($id);

    if ($model == null) {
            Session::flash('warning', trans($this->modName . '.notfound'));
            return redirect(route('backend.' . $this->modName . '.index'));
    }

     $model->delete();
     return 'true';

    }


    /* 

    * Uploade images

    */

    public function uploadFile($request , $field){
        if($request->file($field) != null){
            $destinationPath = env('UPLOAD_PATH').'/models/'.$this->modName.'/img/';
            $all = [];
            $imageName = '';
            if(is_array($request->file($field))){
                foreach($request->file($field)  as $file){
                    $all[] = $this->uploadFileOrMultiUpload($file , $destinationPath);
                }
            }else{
             $imageName = $this->uploadFileOrMultiUpload($request->file($field) , $destinationPath);
             }
             $request = $request->except($field);
             if(count($all) > 0){
                $request[$field] = json_encode($all);
                return $request;
            }
            $request[$field] = $imageName;
            return $request;
        }
        return $request->all();
    }



    protected function uploadFileOrMultiUpload($image , $destinationPath){

        $extension = $image->getClientOriginalExtension();
        $fileName = rand(11111,99999).'-'.date('y-d-m').'.'.$extension;

        if($image->move($destinationPath  , $fileName)){
            return $fileName ;
        }

    }

    function checkIfFiledFile($array){
        foreach($array as $key => $file){
            if(in_array($key , $this->getFileFieldsName())){
                return $key;
            }
        }
        return false;
    }


    function getFileFieldsName(){
        return [
        'image',
        'file',
        'photo',
        'default_image'
        ];
    }



    /*

    * Validate Form

    */
    public function itemValidation($array){

        $valid = Validator::make($array,$this->model->validation());

        if($valid->fails()){
            return $valid->errors();
        }
        return true;
    }



    
    /**
     * After save Model
     * 
     * @param array $attributes
     * @param BaseModel $model
     * @return void
     */
    protected function afterSave($attributes, $model)
    {
       
    } 
      

    




    

}
