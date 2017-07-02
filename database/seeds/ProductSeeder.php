<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    


    DB::table('products')->insert([
	    'name' =>'Product_A',
	    'name_en' =>'Product_A_En',
	    'description' =>'Products_Description_A',
	    'description_en' =>'Products_Description_A_En',
	    'price' =>15.2,
	    'prix_promotion' =>10.2,
	    'default_image' =>'prducts_image_1.jpg',
	    'new_product' =>'',
	    'best_saller' =>''
        ]);

     DB::table('products')->insert([
	    'name' =>'Product_B',
	    'name_en' =>'Product_B_En',
	    'description' =>'Products_Description_B',
	    'description_en' =>'Products_Description_B_En',
	    'price' =>15.2,
	    'prix_promotion' =>10.2,
	    'default_image' =>'prducts_image_2.jpg',
	    'new_product' =>'',
	    'best_saller' =>''
        ]);

      DB::table('products')->insert([
	    'name' =>'Product_C',
	    'name_en' =>'Product_C_En',
	    'description' =>'Products_Description_C',
	    'description_en' =>'Products_Description_C_En',
	    'price' =>15.2,
	    'prix_promotion' =>10.2,
	    'default_image' =>'prducts_image_3.jpg',
	    'new_product' =>'',
	    'best_saller' =>''
        ]);


        
    }
}
