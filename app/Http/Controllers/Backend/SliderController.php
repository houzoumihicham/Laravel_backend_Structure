<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Http\Controllers\Traits\Backend;
use Illuminate\Http\Request;
use App\Models\Slider;
use Lang;



class SliderController extends AbstractController
{
    
        use Backend;

        protected $viewPr='backend.slider.';
        protected $modName='slider';


        public function __construct(Request $request, Slider $slider)
    	{
        	parent::__construct($request, $slider);
    	}


        /*----------------------------------------------------------

        -------------------------- Page slider Index ----------------

        ------------------------------------------------------------*/

    	public function index(){

    		$compact = array();
    		$compact['title']=$this->modName;
    		$compact['models']=$this->model->orderBy('position')->get();
           
    		return view($this->viewPr.'index',['compact'=>$compact]);
    	}


        /*----------------------------------------------------------

        -------------- Update Slider Order Position ----------------

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



}
