<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Http\Controllers\Traits\Backend;
use App\DataTables\ProductsDataTable;
use Illuminate\Http\Request;
use App\Models\Products;
use Lang;

class ProductsController extends AbstractController
{

		use Backend;

        protected $viewPr='backend.products.';
        protected $modName='products';


        public function __construct(Request $request, Products $products)
    	{
        	parent::__construct($request, $products);
    	}



        /*----------------------------------------------------------

        ---------------------- Page Categorys Index ----------------

        ------------------------------------------------------------*/

    	public function index(ProductsDataTable $dataTable){

            $compact = array();
            $compact['title']=$this->modName;
            

           return $dataTable->render($this->viewPr.'index',['compact'=>$compact]);
    	
    	}


            /**
         * After save Model
         * 
         * @param array $attributes
         * @param BaseModel $model
         * @return void
         */
        protected function afterSave($request, $model)
        {
            $model->categorys()->detach();
            $model->categorys()->attach($request['categoris']);
        } 


    	






}
