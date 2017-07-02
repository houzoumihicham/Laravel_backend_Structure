<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table ='sliders';

    protected $fillable =[
     'image',
     'position',
     'url'
    ];

    public function validation(){

        return [
            'image' => 'required',
            'url' => 'string'
        ];

   }



}
