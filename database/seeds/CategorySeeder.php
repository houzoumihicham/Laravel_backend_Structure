<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('categorys')->insert([
		    'name' =>'Category_A',
		    'name_en' =>'Category_A_En',
		    'position' =>0,
        ]);

        DB::table('categorys')->insert([
		    'name' =>'Category_B',
		    'name_en' =>'Category_B_En',
		    'position' =>0,
        ]);

        DB::table('categorys')->insert([
		    'name' =>'Category_C',
		    'name_en' =>'Category_C_En',
		    'position' =>0,
        ]);
        

    }



}
