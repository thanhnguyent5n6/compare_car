<?php
use Illuminate\Database\Seeder;
class StyleCar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$styles = ["Sedan","Hatchback","MPV","SUV","SUV-Coupe"];
        for($i = 0 ; $i < 4 ; $i ++)
        {
        	DB::table('db_style_cars')->insert([
	            'style_cars_name' => $styles[$i];
	        ]);
        }
    }
}