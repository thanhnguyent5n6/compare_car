<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\CategoryCar;
use App\StyleCar;
use DB;

class PageController extends Controller
{
    //
    public function index()
    {
    	$max_price = DB::table('tbl_cars')
    	->orderBy('cars_price','desc')
    	->paginate(8);
    	$category = CategoryCar::all();
    	$style =  StyleCar::all();
    	$under_1b = Car::where('cars_price','<','1000000000')->paginate(8);

        $in_1b_2b = Car::where('cars_price','>=','1000000000')
                ->where('cars_price','<','2000000000')
                ->paginate(8);
        $in_2b_5b = Car::where('cars_price','>=','2000000000')
                ->where('cars_price','<','5000000000')
                ->paginate(8);
        $over_5b = Car::where('cars_price','>','5000000000')->paginate(8);
    	return view('client.index',compact('category','style','max_price','under_1b','in_1b_2b','in_2b_5b','over_5b'));
    }
    public function getCategory($id)
    {
        $category = CategoryCar::all();
        $style =  StyleCar::all();
        $cars = Car::where('cars_category_id','=',$id)->paginate(16);
        return view('client.category',compact('category','style','cars'));
    }
    public function getStyle($id)
    {
        $category = CategoryCar::all();
        $style =  StyleCar::all();
        $cars = Car::where('cars_style_id','=',$id)->paginate(16);
        return view('client.style',compact('category','style','cars'));
    }
    public function show_info($id)
    {
    	$cars = Car::where('cars_id','=',$id)->first();
    	$style = StyleCar::all();
    	$category = CategoryCar::all();
    	$data = array(
    		'cars'=>$cars,
    		'styles'=>$style,
    		'categories'=>$category,
    	);
    	$res = json_encode($data);
    	return $res;
    }
}
