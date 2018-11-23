<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Car;
use App\StyleCar;
use App\CategoryCar;
use Session;
class CompareController extends Controller
{
    public function index()
    {
    	$category = CategoryCar::all();
    	$style =  StyleCar::all();
    	$under_1b = Car::where('cars_price','<','1000000000')->paginate(6);

        $in_1b_2b = Car::where('cars_price','>=','1000000000')
                ->where('cars_price','<','2000000000')
                ->paginate(6);
        $in_2b_5b = Car::where('cars_price','>=','2000000000')
                ->where('cars_price','<','5000000000')
                ->paginate(6);
        $over_5b = Car::where('cars_price','>','5000000000')->paginate(6);
    	$cars = Car::all();
    	return view('client.compare',compact('cars','category','style','under_1b','in_1b_2b','in_2b_5b','over_5b'));
    }
    public function search(Request $req)
    {
    	$key = $req->key;
    	// $arr = array();
    	// $arr = explode(" ", $key);
    	$cars = Car::select('cars_id','cars_name')->where('cars_name','like','%'.$key.'%')->get();
    	$data = json_encode($cars);
    	return $data;
    }
    public function searchCompare()
    {
    	$category = CategoryCar::all();
    	$style =  StyleCar::all();
    	$under_1b = Car::where('cars_price','<','1000000000')->paginate(6);

        $in_1b_2b = Car::where('cars_price','>=','1000000000')
                ->where('cars_price','<','2000000000')
                ->paginate(6);
        $in_2b_5b = Car::where('cars_price','>=','2000000000')
                ->where('cars_price','<','5000000000')
                ->paginate(6);
        $over_5b = Car::where('cars_price','>','5000000000')->paginate(6);
    	$ul_cars = Car::all();
    	return view('client.compare.searchCompare',compact('ul_cars','category','style','max_price','under_1b','in_1b_2b','in_2b_5b','over_5b'));
    }
    public function searchingCompare()
    {
        $cars = Car::all();
        $category = CategoryCar::all();
        $style =  StyleCar::all();
        return view('client.compare.searchingCompare',compact('cars','style','category'));
    }
    public function addCompare($id)
    {
    	$category = CategoryCar::all();
    	$style =  StyleCar::all();
    	$under_1b = Car::where('cars_price','<','1000000000')->paginate(6);

        $in_1b_2b = Car::where('cars_price','>=','1000000000')
                ->where('cars_price','<','2000000000')
                ->paginate(6);
        $in_2b_5b = Car::where('cars_price','>=','2000000000')
                ->where('cars_price','<','5000000000')
                ->paginate(6);
        $over_5b = Car::where('cars_price','>','5000000000')->paginate(6);
    	$car = Car::where('cars_id',$id)->first();
    	
    	
    	return view('client.compare.oneCar',compact('car','check','category','style','under_1b','in_1b_2b','in_2b_5b','over_5b'));
    }
    
}