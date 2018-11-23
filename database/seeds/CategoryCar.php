<?php
use Illuminate\Database\Seeder;
class CategoryCar extends Seeder
{
    
    public function run()
    {
    	$categories = ["Chevrolet","Ford","Honda","Huyndai","Infiniti","Isuzu","Kia","Lexus"];
        for($i = 0 ; $i < 7 ; $i ++)
        {
        	DB::table('db_category_cars')->insert([
	            'category_cars_name' => $categories[$i];
	        ]);
        }
    }
}
?>