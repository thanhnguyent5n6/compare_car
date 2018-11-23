<?php

namespace App\Http\Controllers;
use Hash;
use App\CategoryCar;
use Illuminate\Http\Request;
class CategoryCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = CategoryCar::orderBy('category_cars_id','desc')->paginate(10);
        return view('server.car.categoryCar',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $check_data = CategoryCar::all();
        $check_num = 0;
        
        foreach($check_data as $check)
        {
            if(!empty($request->input('category_cars_name')) && $request->input('category_cars_name') == $check->category_cars_name)
            {
                session()->flash('error','Hãng xe đã tồn tại');
                return redirect()->route('category-cars.index');
            }
            else 
            {
                $check_num = 1;
            }
        }

        if($check_num == 1)
        {
            $category_cars = CategoryCar::create($request->all());
            session()->flash('success','Tạo hãng xe thành công');
            return redirect()->route('category-cars.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryCar  $categoryCar
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryCar $categoryCar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryCar  $categoryCar
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryCar $categoryCar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryCar  $categoryCar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryCar $categoryCar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryCar  $categoryCar
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryCar $categoryCar)
    {
        //

    }
    public function del($id)
    {
        CategoryCar::where('category_cars_id',$id)->delete();
        return redirect()->route('category-cars.index');
    }
    public function getEdit($id)
    {
        $result = CategoryCar::where('category_cars_id',$id)->first();
        $json = json_encode($result);
        return $json;
    }
    public function doEdit(request $req,$id)
    {
        $name = $req->name;
        $check_num = 0;
        CategoryCar::where('category_cars_id',$id)->update(['category_cars_name'=>$name]);
        return $check_num = 1;
    }
    public function getSearch(request $req)
    {
        $key_name = $req->key;
        $categories = CategoryCar::where('category_cars_name','like','%'.$key_name.'%')->paginate(10);
        return view('server.car.searchCategoryCar',compact('categories'));
    }
}
