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
        session()->forget('first_car');
        session()->forget('second_car');
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
        //session()->flush();
    	$category = CategoryCar::all();
    	$style =  StyleCar::all();
    	$car = Car::where('cars_id',$id)->first();

        //var_dump(session()->has('first_car')); die;
        
        if( !session()->has('first_car') )
        {
            session()->put('first_car',$car);
            $cars_info = session()->get('first_car');
            $cars_same_style = Car::where('cars_style_id','=',$cars_info->cars_style_id)->paginate(4);
            $cars_same_category = Car::where('cars_category_id','=',$cars_info->cars_category_id)->paginate(4);

            return view('client.compare.oneCar',compact('category','style','cars_same_category','cars_same_style'));
        }
        else
        {
            session()->put('second_car',$car);
            return view('client.compare.twoCar',compact('category','style'));
        }
        
    }
    public function destroy($id)
    {
        $category = CategoryCar::all();
        $style =  StyleCar::all();
        $first_car = session()->get('first_car');

        $second_car = session()->get('second_car');

        if($first_car->cars_id == $id)
        {
            session(['first_car'=>$second_car]);
            $cars_info = session()->get('first_car');
            $cars_same_style = Car::where('cars_style_id','=',$cars_info->cars_style_id)->orderBy('cars_id','asc')->paginate(4);
            $cars_same_category = Car::where('cars_category_id','=',$cars_info->cars_category_id)->orderBy('cars_id','asc')->paginate(4);

            return view('client.compare.oneCar',compact('category','style','cars_same_category','cars_same_style'));
        }
        else
        {
            session()->forget('second_car');
            $cars_info = session()->get('first_car');
            $cars_same_style = Car::where('cars_style_id','=',$cars_info->cars_style_id)->paginate(4);
            $cars_same_category = Car::where('cars_category_id','=',$cars_info->cars_category_id)->paginate(4);

            return view('client.compare.oneCar',compact('category','style','cars_same_category','cars_same_style'));
        }

    }
    public function destroy_first($id)
    {
        session()->forget('first_car');
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
}
