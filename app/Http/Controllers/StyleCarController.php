<?php

namespace App\Http\Controllers;

use App\StyleCar;
use Illuminate\Http\Request;

class StyleCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $style = StyleCar::paginate(12);
        return view('server.car.styleCar',compact('style'));
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
        $check_data = styleCar::all();
        $check_num = 0;
        
        foreach($check_data as $check)
        {
            if(!empty($request->input('style_cars_name')) && $request->input('style_cars_name') == $check->style_cars_name)
            {
                session()->flash('error','Đã tồn tại');
                return redirect()->route('style-cars.index');
            }
            else 
            {
                $check_num = 1;
            }
        }

        if($check_num == 1)
        {
            $style_cars = styleCar::create($request->all());
            session()->flash('success','Tạo thành công');
            return redirect()->route('style-cars.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StyleCar  $styleCar
     * @return \Illuminate\Http\Response
     */
    public function show(StyleCar $styleCar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StyleCar  $styleCar
     * @return \Illuminate\Http\Response
     */
    public function edit(StyleCar $styleCar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StyleCar  $styleCar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StyleCar $styleCar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StyleCar  $styleCar
     * @return \Illuminate\Http\Response
     */
    public function destroy(StyleCar $styleCar)
    {
        //
    }
    public function del($id)
    {
        StyleCar::where('style_cars_id',$id)->delete();
        return redirect()->route('style-cars.index');
    }
    public function getEdit($id)
    {
        $result = StyleCar::where('style_cars_id',$id)->first();
        $json = json_encode($result);
        return $json;
    }
    public function doEdit(request $req,$id)
    {
        $name = $req->name;
        $check_num = 0;
        StyleCar::where('style_cars_id',$id)->update(['style_cars_name'=>$name]);
        return $check_num = 1;
    }
}
