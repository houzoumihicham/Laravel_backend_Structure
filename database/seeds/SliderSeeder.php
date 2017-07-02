<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('sliders')->insert([
           'image'=>'test-image1.jpg',
            'url' =>''
        ]);
          DB::table('sliders')->insert([
           'image'=>'test-image2.jpg',
            'url' =>''
        ]);
           DB::table('sliders')->insert([
           'image'=>'test-image3.jpg',
            'url' =>''
        ]);
          
    }
}
