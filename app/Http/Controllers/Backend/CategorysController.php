<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Http\Controllers\Traits\Backend;
use Illuminate\Http\Request;
use App\Models\Categorys;
use Lang;

class CategorysController extends AbstractController
{
    
        use Backend;

        protected $viewPr='backend.categorys.';
        protected $modName='categorys';


        public function __construct(Request $request, Categorys $categorys)
    	{
        	parent::__construct($request, $categorys);
    	}


        /*----------------------------------------------------------

        ---------------------- Page Categorys Index ----------------

        ------------------------------------------------------------*/

    	public function index(){

    		$compact = array();
    		$compact['title']=$this->modName;
    		$compact['models']=$this->model->where('parent_id',null)->orderBy('position')->get();
           
    		return view($this->viewPr.'index',['compact'=>$compact]);
    	}


    	/*----------------------------------------------------------

        ---------------------- Sub Categorys Index ----------------

        ------------------------------------------------------------*/

        public function sub_category($id){

        $compact = array();
        $compact['title']=$this->modName;
        $compact['models']=$this->model->where('parent_id',$id)->orderBy('position')->get();
        $compact['cat_parent']=$this->model->where('id',$id)->first();
        $compact['parent_id']=$compact['cat_parent']->parent_id;
        $compact['id'] = $id;

        return view($this->viewPr.'index',['compact'=>$compact]);
      
   		}



         
        /*----------------------------------------------------------

        ---------------------- Update Categorys Orders ----------------

        ------------------------------------------------------------*/

    	public function update_sort(){

    	foreach ($_GET['listItem'] as $position => $item)
        {

            $this->model->findOrFail($item)->UPDATE([

                'position' => $position

            ]);

        }

        return Lang::get($this->modName.'.Order_Update');

    	}

		/*----------------------------------------------------------

	    ---------------------- create new sub_categories ----------------

		------------------------------------------------------------*/


		public function create_sub($parent_id){

		return view($this->viewPr.'form')->with('title', trans($this->modName . '.create'))
        ->with('route', route('backend.' . $this->modName . '.store'))
        ->with('modName',$this->modName)
        ->with('method', 'post')
        ->with('parent_id',$parent_id)
        ->with('model', $this->model);

		}






}
