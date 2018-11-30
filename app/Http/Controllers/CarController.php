<?php

namespace App\Http\Controllers;
use DB;
use App\StyleCar;
use App\Car;
use App\CategoryCar;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(25);
        $categories = CategoryCar::all();
        $style = StyleCar::all();
        
        return view('server.car.car',compact('categories','style','cars'));
    }
    // public function getListCar($page)
    // {
    //     // KHỞI TẠO SỐ PHẦN TỬ TRÊN TRANG
    //     $record_per_page = 25;   
    //     // LẤY GIÁ TRỊ PAGE THÔNG QUA PHƯƠNG THỨC POST
    //     $page = isset($page)?$page:1; 
    //     // LẤY TỔNG SỐ LƯỢNG XE
    //     $total = Car::count();
    //     // SỐ TRANG
    //     $number_page = ceil($total/$record_per_page);
    //     $from = $page * $record_per_page;
    //     // LẤY XE
    //     $cars = Car::orderBy('cars_id')->limit($form,$record_per_page);
    //     $categories = CategoryCar::all();
    //     $style = StyleCar::all();
    //     // TRẢ VỀ VIEW
    //     return view('server.car.listCar',compact('categories','style','cars'));
    // }
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
    public function store(Request $req)
    {
        $cars_image = "";
        $cars_name = isset($req->cars_name)?$req->cars_name:"Chưa có thông tin";
        $cars_source = isset($req->cars_source)?$req->cars_source:"Chưa có thông tin";
        $cars_category = $req->cars_category;
        $cars_style = $req->cars_style;
        $cars_price = isset($req->cars_price)?$req->cars_price:"0";
        $cars_promotion_price = isset($req->cars_promotion_price)?$req->cars_promotion_price:"0";
        $cars_status = isset($req->cars_status)?"1":"0";
        $cars_size = isset($req->cars_size)?$req->cars_size:"Chưa có thông tin";
        $cars_weight = isset($req->cars_weight)?$req->cars_weight:"Chưa có thông tin";
        $cars_gas_tank = isset($req->cars_gas_tank)?$req->cars_gas_tank:"Chưa có thông tin";
        $cars_engine = isset($req->cars_engine)?$req->cars_engine:"Chưa có thông tin";
        $cars_capacity = isset($req->cars_capacity)?$req->cars_capacity:"Chưa có thông tin";
        $cars_momen = isset($req->cars_momen)?$req->cars_momen:"Chưa có thông tin";
        $cars_light_roar = isset($req->cars_light_roar)?$req->cars_light_roar:"Chưa có thông tin";
        $cars_diameter_spin_min = isset($req->cars_diameter_spin_min)?$req->cars_diameter_spin_min:"Chưa có thông tin";
        $cars_gear = isset($req->cars_gear)?$req->cars_gear:"Chưa có thông tin";
        $cars_fuel_consumption = isset($req->cars_fuel_consumption)?$req->cars_fuel_consumption:"Chưa có thông tin";
        $cars_brake_abs = isset($req->cars_brake_abs)?"1":"0";
        $cars_brake_ebd = isset($req->cars_brake_ebd)?"1":"0";
        $cars_brake_ba = isset($req->cars_brake_ba)?"1":"0";
        $cars_electric_balance_eps = isset($req->cars_electric_balance_eps)?"1":"0";
        $cars_control_degree_grip = isset($req->cars_control_degree_grip)?"1":"0";
        $cars_air_bag = isset($req->cars_air_bag)?$req->cars_air_bag:"0";
        $cars_electric_support_eps = isset($req->cars_electric_support_eps)?"1":"0";
        $cars_support_start_steep = isset($req->cars_support_start_steep)?"1":"0";
        $cars_cruise_control = isset($req->cars_cruise_control)?"1":"0";
        $cars_run_mode = isset($req->cars_run_mode)?"1":"0";
        $cars_electric_hand_brake = isset($req->cars_electric_hand_brake)?"1":"0";
        $cars_smart_lock = isset($req->cars_smart_lock)?"1":"0";
        $cars_headlight = isset($req->cars_headlight)?$req->cars_headlight:"Chưa có thông tin";
        $cars_auto_headlight = isset($req->cars_auto_headlight)?"1":"0";
        $cars_auto_headlight_afs = isset($req->cars_auto_headlight_afs)?"1":"0";
        $cars_auto_wiper = isset($req->cars_auto_wiper)?"1":"0";
        $cars_interiar_materials = isset($req->cars_interiar_materials)?$req->cars_headlight:"Chưa có thông tin";
        $cars_air_conditioning = isset($req->cars_air_conditioning)?$req->cars_air_conditioning:"Chưa có thông tin";
        $cars_after_cooler = isset($req->cars_after_cooler)?"1":"0";
        $cars_after_wind_door = isset($req->cars_after_wind_door)?"1":"0";
        $cars_mirror_anti_dazzle = isset($req->cars_mirror_anti_dazzle)?"1":"0";
        $cars_seat = isset($req->cars_seat)?$req->cars_seat:"Chưa có thông tin";
        $cars_seat_glass_door = isset($req->cars_seat_glass_door)?$req->cars_seat_glass_door:"Chưa có thông tin";
        $cars_speakers = isset($req->cars_speakers)?$req->cars_speakers:"Chưa có thông tin";
        $cars_bluetooth = isset($req->cars_bluetooth)?"1":"0";
        $cars_usb = isset($req->cars_usb)?"1":"0";
        $cars_camera_back = isset($req->cars_camera_back)?"1":"0";
        $cars_sensor_distance = isset($req->cars_sensor_distance)?"1":"0";
        $cars_out_window = isset($req->cars_out_window)?"1":"0";

        $check_name = Car::where('cars_name','=',$cars_name)->first();
        if(isset($check_name->cars_name) && $check_name->cars_name == $cars_name)
        {
            return redirect()->route('cars.index')->with('error','Trùng tên');
        }
        else
        {
            if($req->hasfile('cars_image'))
            {
                $cars_image = $req->file('cars_image')->getClientOriginalName();
                $cars_image = time().$cars_image;
                $req->file('cars_image')->move('server/img/cars/',$cars_image);
            }
            DB::table('tbl_cars')->insert(
            [
                'cars_image'=>$cars_image,
                'cars_name'=>$cars_name,
                'cars_source'=>$cars_source,
                'cars_category_id'=>$cars_category,
                'cars_style_id'=>$cars_style,
                'cars_status'=>$cars_status,
                'cars_price'=>$cars_price,
                'cars_promotion_price'=>$cars_promotion_price,
                'cars_size'=>$cars_size,
                'cars_weight'=>$cars_weight,
                'cars_gas_tank'=>$cars_gas_tank,
                'cars_engine'=>$cars_engine,
                'cars_capacity'=>$cars_capacity,
                'cars_momen'=>$cars_momen,
                'cars_light_roar'=>$cars_light_roar,
                'cars_diameter_spin_min'=>$cars_diameter_spin_min,
                'cars_gear'=>$cars_gear,
                'cars_fuel_consumption'=>$cars_fuel_consumption,
                'cars_brake_abs'=>$cars_brake_abs,
                'cars_brake_ebd'=>$cars_brake_ebd,
                'cars_brake_ba'=>$cars_brake_ba,
                'cars_electric_balance_eps'=>$cars_electric_balance_eps,
                'cars_control_degree_grip'=>$cars_control_degree_grip,
                'cars_air_bag'=>$cars_air_bag,
                'cars_electric_support_eps'=>$cars_electric_support_eps,
                'cars_support_start_steep'=>$cars_support_start_steep,
                'cars_cruise_control'=>$cars_cruise_control,
                'cars_run_mode'=>$cars_run_mode,
                'cars_electric_hand_brake'=>$cars_electric_hand_brake,
                'cars_smart_lock'=>$cars_smart_lock,
                'cars_headlight'=>$cars_headlight,
                'cars_auto_headlight'=>$cars_auto_headlight,
                'cars_auto_headlight_afs'=>$cars_auto_headlight_afs,
                'cars_auto_wiper'=>$cars_auto_wiper,
                'cars_interiar_materials'=>$cars_interiar_materials,
                'cars_air_conditioning'=>$cars_air_conditioning,
                'cars_after_cooler'=>$cars_after_cooler,
                'cars_after_wind_door'=>$cars_after_wind_door,
                'cars_mirror_anti_dazzle'=>$cars_mirror_anti_dazzle,
                'cars_seat'=>$cars_seat,
                'cars_seat_glass_door'=>$cars_seat_glass_door,
                'cars_speakers'=>$cars_speakers,
                'cars_bluetooth'=>$cars_bluetooth,
                'cars_usb'=>$cars_usb,
                'cars_camera_back'=>$cars_camera_back,
                'cars_sensor_distance'=>$cars_sensor_distance,
                'cars_out_window'=>$cars_out_window,
                'created_at'=>date("Y/m/d"),
            ]);
            return redirect()->route('cars.index')->with(session()->flash('success','Thêm thành công'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    // php
    // public function edit(Car $car)
    // {
    //     $categories = CategoryCar::all();
    //     $style = StyleCar::all();
    //     return view('server.car.editCar',compact('car','categories','style'));
    // }



    // ajax
    public function edit($id)
    {
        $car = Car::where('cars_id',$id)->first();
        $categories = DB::table('tbl_category_cars')->get();
        $styles = DB::table('tbl_style_cars')->get();
        $arr = Array();
        $arr['car']=$car;
        $arr['category']=$categories;
        $arr['style']=$styles;
        $data = json_encode($arr);
        return $data;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Car $car)
    {
        $cars_name = isset($req->cars_name)?$req->cars_name:"Chưa có thông tin";
        $cars_source = isset($req->cars_source)?$req->cars_source:"Chưa có thông tin";
        $cars_category = $req->cars_category;
        $cars_style = $req->cars_style;
        $cars_price = isset($req->cars_price)?$req->cars_price:"0";
        $cars_promotion_price = isset($req->cars_promotion_price)?$req->cars_promotion_price:"0";
        $cars_status = isset($req->cars_status)?"1":"0";
        $cars_size = isset($req->cars_size)?$req->cars_size:"Chưa có thông tin";
        $cars_weight = isset($req->cars_weight)?$req->cars_weight:"Chưa có thông tin";
        $cars_gas_tank = isset($req->cars_gas_tank)?$req->cars_gas_tank:"Chưa có thông tin";
        $cars_engine = isset($req->cars_engine)?$req->cars_engine:"Chưa có thông tin";
        $cars_capacity = isset($req->cars_capacity)?$req->cars_capacity:"Chưa có thông tin";
        $cars_momen = isset($req->cars_momen)?$req->cars_momen:"Chưa có thông tin";
        $cars_light_roar = isset($req->cars_light_roar)?$req->cars_light_roar:"Chưa có thông tin";
        $cars_diameter_spin_min = isset($req->cars_diameter_spin_min)?$req->cars_diameter_spin_min:"Chưa có thông tin";
        $cars_gear = isset($req->cars_gear)?$req->cars_gear:"Chưa có thông tin";
        $cars_fuel_consumption = isset($req->cars_fuel_consumption)?$req->cars_fuel_consumption:"Chưa có thông tin";
        $cars_brake_abs = isset($req->cars_brake_abs)?"1":"0";
        $cars_brake_ebd = isset($req->cars_brake_ebd)?"1":"0";
        $cars_brake_ba = isset($req->cars_brake_ba)?"1":"0";
        $cars_electric_balance_eps = isset($req->cars_electric_balance_eps)?"1":"0";
        $cars_control_degree_grip = isset($req->cars_control_degree_grip)?"1":"0";
        $cars_air_bag = isset($req->cars_air_bag)?$req->cars_air_bag:"0";
        $cars_electric_support_eps = isset($req->cars_electric_support_eps)?"1":"0";
        $cars_support_start_steep = isset($req->cars_support_start_steep)?"1":"0";
        $cars_cruise_control = isset($req->cars_cruise_control)?"1":"0";
        $cars_run_mode = isset($req->cars_run_mode)?"1":"0";
        $cars_electric_hand_brake = isset($req->cars_electric_hand_brake)?"1":"0";
        $cars_smart_lock = isset($req->cars_smart_lock)?"1":"0";
        $cars_headlight = isset($req->cars_headlight)?$req->cars_headlight:"Chưa có thông tin";
        $cars_auto_headlight = isset($req->cars_auto_headlight)?"1":"0";
        $cars_auto_headlight_afs = isset($req->cars_auto_headlight_afs)?"1":"0";
        $cars_auto_wiper = isset($req->cars_auto_wiper)?"1":"0";
        $cars_interiar_materials = isset($req->cars_interiar_materials)?$req->cars_headlight:"Chưa có thông tin";
        $cars_air_conditioning = isset($req->cars_air_conditioning)?$req->cars_air_conditioning:"Chưa có thông tin";
        $cars_after_cooler = isset($req->cars_after_cooler)?"1":"0";
        $cars_after_wind_door = isset($req->cars_after_wind_door)?"1":"0";
        $cars_mirror_anti_dazzle = isset($req->cars_mirror_anti_dazzle)?"1":"0";
        $cars_seat = isset($req->cars_seat)?$req->cars_seat:"Chưa có thông tin";
        $cars_seat_glass_door = isset($req->cars_seat_glass_door)?$req->cars_seat_glass_door:"Chưa có thông tin";
        $cars_speakers = isset($req->cars_speakers)?$req->cars_speakers:"Chưa có thông tin";
        $cars_bluetooth = isset($req->cars_bluetooth)?"1":"0";
        $cars_usb = isset($req->cars_usb)?"1":"0";
        $cars_camera_back = isset($req->cars_camera_back)?"1":"0";
        $cars_sensor_distance = isset($req->cars_sensor_distance)?"1":"0";
        $cars_out_window = isset($req->cars_out_window)?"1":"0";
        if($req->hasfile('cars_image'))
        {
            $cars_image = $req->file('cars_image')->getClientOriginalName();
            $cars_image = time().$cars_image;
            $req->file('cars_image')->move('server/img/cars/',$cars_image);

            $old_img = Car::where('cars_image','=',$car->cars_image)->first();
            if(file_exists('server/img/cars/'.$old_img->cars_image))
            {
                unlink('server/img/cars/'.$old_img->cars_image);
            }
        }
        $car->update([
            'cars_image'=>$cars_image,
            'cars_name'=>$cars_name,
            'cars_source'=>$cars_source,
            'cars_category_id'=>$cars_category,
            'cars_style_id'=>$cars_style,
            'cars_status'=>$cars_status,
            'cars_price'=>$cars_price,
            'cars_promotion_price'=>$cars_promotion_price,
            'cars_size'=>$cars_size,
            'cars_weight'=>$cars_weight,
            'cars_gas_tank'=>$cars_gas_tank,
            'cars_engine'=>$cars_engine,
            'cars_capacity'=>$cars_capacity,
            'cars_momen'=>$cars_momen,
            'cars_light_roar'=>$cars_light_roar,
            'cars_diameter_spin_min'=>$cars_diameter_spin_min,
            'cars_gear'=>$cars_gear,
            'cars_fuel_consumption'=>$cars_fuel_consumption,
            'cars_brake_abs'=>$cars_brake_abs,
            'cars_brake_ebd'=>$cars_brake_ebd,
            'cars_brake_ba'=>$cars_brake_ba,
            'cars_electric_balance_eps'=>$cars_electric_balance_eps,
            'cars_control_degree_grip'=>$cars_control_degree_grip,
            'cars_air_bag'=>$cars_air_bag,
            'cars_electric_support_eps'=>$cars_electric_support_eps,
            'cars_support_start_steep'=>$cars_support_start_steep,
            'cars_cruise_control'=>$cars_cruise_control,
            'cars_run_mode'=>$cars_run_mode,
            'cars_electric_hand_brake'=>$cars_electric_hand_brake,
            'cars_smart_lock'=>$cars_smart_lock,
            'cars_headlight'=>$cars_headlight,
            'cars_auto_headlight'=>$cars_auto_headlight,
            'cars_auto_headlight_afs'=>$cars_auto_headlight_afs,
            'cars_auto_wiper'=>$cars_auto_wiper,
            'cars_interiar_materials'=>$cars_interiar_materials,
            'cars_air_conditioning'=>$cars_air_conditioning,
            'cars_after_cooler'=>$cars_after_cooler,
            'cars_after_wind_door'=>$cars_after_wind_door,
            'cars_mirror_anti_dazzle'=>$cars_mirror_anti_dazzle,
            'cars_seat'=>$cars_seat,
            'cars_seat_glass_door'=>$cars_seat_glass_door,
            'cars_speakers'=>$cars_speakers,
            'cars_bluetooth'=>$cars_bluetooth,
            'cars_usb'=>$cars_usb,
            'cars_sensor_distance'=>$cars_sensor_distance,
            'cars_out_window'=>$cars_out_window,
        ]);
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_img = Car::where("cars_id","=",$id)->first();
        if(!empty($old_img->cars_image))
        {
            if(file_exists('server/img/cars/'.$old_img->cars_image))
            {
                unlink('server/img/cars/'.$old_img->cars_image);
            }
        }
        Car::where('cars_id',$id)->delete();
        return redirect()->route('cars.index')->with(session()->flash('success','Xóa thành công'));
    }
    public function do_edit(Request $req, $id)
    {
        // $check_img = Car::select('cars_image')->where('cars_id',$id)->first();
        // $cars_image = $check_img->cars_image;
        $cars_name = isset($req->edit_cars_name)?$req->edit_cars_name:"Chưa có thông tin";
        $cars_source = isset($req->edit_cars_source)?$req->edit_cars_source:"Chưa có thông tin";
        $cars_category = $req->sel_cars_category;
        $cars_style = $req->sel_cars_style;
        $cars_price = isset($req->edit_cars_price)?$req->edit_cars_price:"0";
        $cars_promotion_price = isset($req->edit_cars_promotion_price)?$req->edit_cars_promotion_price:"0";
        $cars_status = isset($req->edit_cars_status)?"1":"0";
        $cars_size = isset($req->edit_cars_size)?$req->edit_cars_size:"Chưa có thông tin";
        $cars_weight = isset($req->edit_cars_weight)?$req->edit_cars_weight:"Chưa có thông tin";
        $cars_gas_tank = isset($req->edit_cars_gas_tank)?$req->edit_cars_gas_tank:"Chưa có thông tin";
        $cars_engine = isset($req->edit_cars_engine)?$req->edit_cars_engine:"Chưa có thông tin";
        $cars_capacity = isset($req->edit_cars_capacity)?$req->edit_cars_capacity:"Chưa có thông tin";
        $cars_momen = isset($req->edit_cars_momen)?$req->edit_cars_momen:"Chưa có thông tin";
        $cars_light_roar = isset($req->edit_cars_light_roar)?$req->edit_cars_light_roar:"Chưa có thông tin";
        $cars_diameter_spin_min = isset($req->edit_cars_diameter_spin_min)?$req->edit_cars_diameter_spin_min:"Chưa có thông tin";
        $cars_gear = isset($req->edit_cars_gear)?$req->edit_cars_gear:"Chưa có thông tin";
        $cars_fuel_consumption = isset($req->edit_cars_fuel_consumption)?$req->edit_cars_fuel_consumption:"Chưa có thông tin";
        $cars_brake_abs = isset($req->edit_cars_brake_abs)?"1":"0";
        $cars_brake_ebd = isset($req->edit_cars_brake_ebd)?"1":"0";
        $cars_brake_ba = isset($req->edit_cars_brake_ba)?"1":"0";
        $cars_electric_balance_eps = isset($req->edit_cars_electric_balance_eps)?"1":"0";
        $cars_control_degree_grip = isset($req->edit_cars_control_degree_grip)?"1":"0";
        $cars_air_bag = isset($req->edit_cars_air_bag)?$req->edit_cars_air_bag:"0";
        $cars_electric_support_eps = isset($req->edit_cars_electric_support_eps)?"1":"0";
        $cars_support_start_steep = isset($req->edit_cars_support_start_steep)?"1":"0";
        $cars_cruise_control = isset($req->edit_cars_cruise_control)?"1":"0";
        $cars_run_mode = isset($req->edit_cars_run_mode)?"1":"0";
        $cars_electric_hand_brake = isset($req->edit_cars_electric_hand_brake)?"1":"0";
        $cars_smart_lock = isset($req->edit_cars_smart_lock)?"1":"0";
        $cars_headlight = isset($req->edit_cars_headlight)?$req->edit_cars_headlight:"Chưa có thông tin";
        $cars_auto_headlight = isset($req->edit_cars_auto_headlight)?"1":"0";
        $cars_auto_headlight_afs = isset($req->edit_cars_auto_headlight_afs)?"1":"0";
        $cars_auto_wiper = isset($req->edit_cars_auto_wiper)?"1":"0";
        $cars_interiar_materials = isset($req->edit_cars_interiar_materials)?$req->edit_cars_headlight:"Chưa có thông tin";
        $cars_air_conditioning = isset($req->edit_cars_air_conditioning)?$req->edit_cars_air_conditioning:"Chưa có thông tin";
        $cars_after_cooler = isset($req->edit_cars_after_cooler)?"1":"0";
        $cars_after_wind_door = isset($req->edit_cars_after_wind_door)?"1":"0";
        $cars_mirror_anti_dazzle = isset($req->edit_cars_mirror_anti_dazzle)?"1":"0";
        $cars_seat = isset($req->edit_cars_seat)?$req->edit_cars_seat:"Chưa có thông tin";
        $cars_seat_glass_door = isset($req->edit_cars_seat_glass_door)?$req->edit_cars_seat_glass_door:"Chưa có thông tin";
        $cars_speakers = isset($req->edit_cars_speakers)?$req->edit_cars_speakers:"Chưa có thông tin";
        $cars_bluetooth = isset($req->edit_cars_bluetooth)?"1":"0";
        $cars_usb = isset($req->edit_cars_usb)?"1":"0";
        $cars_camera_back = isset($req->edit_cars_camera_back)?"1":"0";
        $cars_sensor_distance = isset($req->edit_cars_sensor_distance)?"1":"0";
        $cars_out_window = isset($req->edit_cars_out_window)?"1":"0";

        
        DB::table('tbl_cars')
            ->where('cars_id',$id)
            ->update([
            //'cars_image'=>$cars_image,
            'cars_name'=>$cars_name,
            'cars_source'=>$cars_source,
            'cars_category_id'=>$cars_category,
            'cars_style_id'=>$cars_style,
            'cars_status'=>$cars_status,
            'cars_price'=>$cars_price,
            'cars_promotion_price'=>$cars_promotion_price,
            'cars_size'=>$cars_size,
            'cars_weight'=>$cars_weight,
            'cars_gas_tank'=>$cars_gas_tank,
            'cars_engine'=>$cars_engine,
            'cars_capacity'=>$cars_capacity,
            'cars_momen'=>$cars_momen,
            'cars_light_roar'=>$cars_light_roar,
            'cars_diameter_spin_min'=>$cars_diameter_spin_min,
            'cars_gear'=>$cars_gear,
            'cars_fuel_consumption'=>$cars_fuel_consumption,
            'cars_brake_abs'=>$cars_brake_abs,
            'cars_brake_ebd'=>$cars_brake_ebd,
            'cars_brake_ba'=>$cars_brake_ba,
            'cars_electric_balance_eps'=>$cars_electric_balance_eps,
            'cars_control_degree_grip'=>$cars_control_degree_grip,
            'cars_air_bag'=>$cars_air_bag,
            'cars_electric_support_eps'=>$cars_electric_support_eps,
            'cars_support_start_steep'=>$cars_support_start_steep,
            'cars_cruise_control'=>$cars_cruise_control,
            'cars_run_mode'=>$cars_run_mode,
            'cars_electric_hand_brake'=>$cars_electric_hand_brake,
            'cars_smart_lock'=>$cars_smart_lock,
            'cars_headlight'=>$cars_headlight,
            'cars_auto_headlight'=>$cars_auto_headlight,
            'cars_auto_headlight_afs'=>$cars_auto_headlight_afs,
            'cars_auto_wiper'=>$cars_auto_wiper,
            'cars_interiar_materials'=>$cars_interiar_materials,
            'cars_air_conditioning'=>$cars_air_conditioning,
            'cars_after_cooler'=>$cars_after_cooler,
            'cars_after_wind_door'=>$cars_after_wind_door,
            'cars_mirror_anti_dazzle'=>$cars_mirror_anti_dazzle,
            'cars_seat'=>$cars_seat,
            'cars_seat_glass_door'=>$cars_seat_glass_door,
            'cars_speakers'=>$cars_speakers,
            'cars_bluetooth'=>$cars_bluetooth,
            'cars_usb'=>$cars_usb,
            'cars_sensor_distance'=>$cars_sensor_distance,
            'cars_out_window'=>$cars_out_window,
            'updated_at'=>date("Y/m/d"),
        ]);
        return 1;
    }
    public function editImg(Request $req, $id)
    {
        if($req->hasfile('cars_image'))
        {
            $cars_image = $req->file('cars_image')->getClientOriginalName();
            $cars_image = time().$cars_image;
            $req->file('cars_image')->move('server/img/cars/',$cars_image);

            $old_img = Car::select('cars_image')->where('cars_id','=',$id)->first();
            if(file_exists('server/img/cars/'.$old_img->cars_image))
            {
                unlink('server/img/cars/'.$old_img->cars_image);
            }
            DB::table('tbl_cars')->where('cars_id',$id)->update(['cars_image'=>$cars_image]);
            return $cars_image;
        }
    }

    public function search(Request $req)
    {
        $cars = Car::where('cars_name','like','%'.$req->search_car.'%')->paginate(25);
        $categories = CategoryCar::all();
        $style = StyleCar::all();
        
        return view('server.car.searchCar',compact('categories','style','cars'));
    }
    public function searchCategory($id)
    {
        if($id == 0)
        {
            $cars = Car::paginate(25);
            $categories = CategoryCar::all();
            $style = StyleCar::all();
            return view('server.car.searchCarCategory',compact('categories','style','cars'));
        }
        else
        {
            $cars = Car::where('cars_category_id','=',$id)->paginate(25);
            $categories = CategoryCar::all();
            $style = StyleCar::all();
            return view('server.car.searchCarCategory',compact('categories','style','cars'));
        }
    }
    public function searchStyle($id)
    {
        $cars = Car::where('cars_style_id','=',$id)->paginate(25);
        $categories = CategoryCar::all();
        $style = StyleCar::all();
        return view('server.car.searchCarStyle',compact('categories','style','cars'));
    }
}
