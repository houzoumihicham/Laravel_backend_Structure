<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    
    protected $table ='categorys';
    protected $fillable = [
    'id',
    'name',
    'name_en',
    'position',
    'parent_id'
    ];


    public function validation(){

     return [
     'name'=>'string|max:90',
     'name_en'=>'string|max:90',
      ];

       }
    public function products()
    {
        return $this->belongsToMany('App\Models\Products','products_categories','category_id','product_id');
    }


}
