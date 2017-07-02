<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ='products';
    protected $fillable = [
    'name',
    'name_en',
    'description',
    'description_en',
    'price',
    'prix_promotion',
    'default_image',
    'new_product',
    'best_saller'
    ];


    public function validation(){

        return [

            'name'=>'string|max:90',
            'name_en'=>'string|max:90',
            
        ];

   }


    public function categorys()
    {

        return $this->belongsToMany('App\Models\Categorys','products_categories','product_id','category_id');
    
    }


   
}
