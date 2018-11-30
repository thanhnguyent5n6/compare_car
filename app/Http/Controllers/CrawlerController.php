<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryCar;
use DB;
class CrawlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryCar::all();
        return view('server.crawler.vnexpress',compact('category'));
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
        $url = $request->url;

        $html = file_get_html($url);
        //name

        $cars_name = $html->find('.name p',0)->plaintext;
        $ten_xe = DB::table('tbl_cars')->get();
        foreach($ten_xe as $t)
        {
            if($t->cars_name == $cars_name)
            {
                session()->flash('errors','Trùng tên xe');
                return redirect()->back();
            }
        }
        // img
        $link = $html->find('.main_info img',0)->src;

        $img_name = basename($link);
        $img_name = strtok($img_name, '?');
        $img_name = time().$img_name;
        
        $folder_img = "server/img/cars/".$img_name;
        // them anh moi
        file_put_contents($folder_img,file_get_contents($link));
        // hang xe
        $hx = DB::table('tbl_category_cars')->get();
        $cars_category_id = '0';
        foreach($hx as $h)
        {
            if($h->category_cars_name == $request->sel_category_car)
            {
                $cars_category_id = $h->category_cars_id;
            }
        }
        // price
        $cars_price = $html->find('#car_price',0)->plaintext;
        $cars_price =  str_replace(".", "", $cars_price);
        $cars_price =  (float)$cars_price;
        // promotion price
        $cars_promotion_price = $html->find('.left-personal .box_price .right_line',1)->plaintext;
        $cars_promotion_price =  str_replace(".", "", $cars_promotion_price);
        $cars_promotion_price =  (float)$cars_promotion_price;
        //ky thuat
        $cars_size = $html->find('.detail_info .line .right_line',0)->plaintext;
        $cars_gas_tank = $html->find('.detail_info .line .right_line',1)->plaintext;
        $cars_engine = $html->find('.detail_info .line .right_line',2)->plaintext;
        $cars_capacity = $html->find('.detail_info .line .right_line',3)->plaintext;
        $cars_momen = $html->find('.detail_info .line .right_line',4)->plaintext;
        $cars_light_roar = $html->find('.detail_info .line .right_line',5)->plaintext;
        $cars_diameter_spin_min = $html->find('.detail_info .line .right_line',6)->plaintext;
        $cars_source = $html->find('.detail_info .line .right_line',7)->plaintext;
        // loai xe
        
        $cars_style = $html->find('.detail_info .line .right_line',8)->plaintext;
        $cars_style_id = '0';
        $cars_gear = $html->find('.detail_info .line .right_line',9)->plaintext;
        $cars_fuel_consumption = $html->find('.detail_info .line .right_line',10)->plaintext;
        // trang bi

        $loai_xe = DB::table('tbl_style_cars')->get();
        foreach($loai_xe as $l_key => $l_val)
        {
            if($l_val->style_cars_name == $cars_style)
            {
                $cars_style_id = $l_val->style_cars_id;
            }
        }

        $data = array(
            'cars_image' => $img_name,
            'cars_name' => $cars_name,
            'cars_source' => $cars_source,
            'cars_category_id' => $cars_category_id,
            'cars_style_id' => $cars_style_id,
            'cars_price' => $cars_price,
            'cars_promotion_price' => $cars_promotion_price,
            'cars_size' => $cars_size,
            'cars_weight' => '0',
            'cars_gas_tank' => $cars_gas_tank,
            'cars_engine' => $cars_engine,
            'cars_capacity'=> $cars_capacity,
            'cars_momen'=> $cars_momen,
            'cars_light_roar'=> $cars_light_roar,
            'cars_diameter_spin_min'=> $cars_diameter_spin_min,
            'cars_gear'=> $cars_gear,
            'cars_fuel_consumption'=> $cars_fuel_consumption,
            'cars_status'=>'1',
            'cars_brake_abs'=>'0',
            'cars_brake_ebd'=>'0',
            'cars_brake_ba'=>'0',
            'cars_electric_balance_eps'=>'0',
            'cars_control_degree_grip'=>'0',
            'cars_air_bag'=>'0',
            'cars_electric_support_eps'=>'0',
            'cars_support_start_steep'=>'0',
            'cars_cruise_control'=>'0',
            'cars_run_mode'=>'0',
            'cars_electric_hand_brake'=>'0',
            'cars_smart_lock'=>'0',
            'cars_headlight'=>'0',
            'cars_auto_headlight'=>'0',
            'cars_auto_headlight_afs'=>'0',
            'cars_auto_wiper'=>'0',
            'cars_interiar_materials'=>'0',
            'cars_air_conditioning'=>'0',
            'cars_after_cooler'=>'0',
            'cars_after_wind_door'=>'0',
            'cars_mirror_anti_dazzle'=>'0',
            'cars_seat'=>'0',
            'cars_seat_glass_door'=>'0',
            'cars_speakers'=>'0',
            'cars_bluetooth'=>'0',
            'cars_usb'=>'0',
            'cars_camera_back'=>'0',
            'cars_sensor_distance'=>'0',
            'cars_out_window'=>'0',
            'created_at'=>date("Y/m/d"),
        );

        

        $check_equipment = array(
            'cars_brake_abs'=>"Chống bó cứng phanh (ABS) : ",
            'cars_brake_ebd'=>"Phân bổ lực phanh điện tử (EBD) : ",
            'cars_brake_ba'=>"Hỗ trợ phanh khẩn cấp (BA) : ",
            'cars_electric_balance_eps'=>"Cân bằng điện tử (ESP) : ",
            'cars_control_degree_grip'=>"Kiểm soát độ bám đường (TRC) : ",
            'cars_air_bag'=>"Túi khí : ",
            'cars_electric_support_eps'=>"Trợ lực điện (EPS) : ",
            'cars_support_start_steep'=>"Hỗ trợ khởi hành ngang dốc (HAS) : ",
            'cars_cruise_control'=>"Điều khiển hành trình (Cruise Control) : ",
            'cars_run_mode'=>"Lựa chọn chế độ chạy : ",
            'cars_electric_hand_brake'=>"Phanh tay điện tử : ",
            'cars_smart_lock'=>"Chìa khóa thông minh : ",
            'cars_headlight'=>"Đèn pha : ",
            'cars_auto_headlight'=>"Đèn pha tự động : ",
            'cars_auto_headlight_afs'=>"Đèn pha tự động điều chỉnh góc chiếu (AFS) : ",
            'cars_auto_wiper'=>"Gạt mưa tự động : ",
            'cars_interiar_materials'=>"Chất liệu nội thất : ",
            'cars_air_conditioning'=>"Điều hòa : ",
            'cars_after_cooler'=>"Dàn lạnh cho hàng ghế sau : ",
            'cars_after_wind_door'=>"Cửa gió cho hàng ghế sau : ",
            'cars_mirror_anti_dazzle'=>"Gương chiếu hậu chống chói : ",
            'cars_seat'=>"Ghế lái : ",
            'cars_seat_glass_door'=>"Cửa kính ghế lái : ",
            'cars_speakers'=>"Hệ thống loa (cái) : ",
            'cars_bluetooth'=>"Kết nối Bluetooth : ",
            'cars_usb'=>"Đầu cắm USB : ",
            'cars_camera_back'=>"Camera lùi : ",
            'cars_sensor_distance'=>"Cảm biến khoảng cách : ",
            'cars_out_window'=>"Cửa sổ trời : ",
        );
        $list_equipment = array();
        foreach($html->find(".trang_bi .item") as $key)
        {
            foreach($check_equipment as $c_key => $c_val)
            {
                if($key->first_child()->plaintext == $c_val)
                {
                    $data_array[$c_key] = $key->last_child()->plaintext;
                }
            }
        }
       
        
        foreach($data as $d_key => $d_val)
        {  
            foreach($data_array as $v_key => $v_val)
            {
                if($d_key == $v_key)
                {
                    if($v_val == " Có ")
                    {
                       $data[$d_key] = "1";
                    }
                    else
                    {
                        $data[$d_key] = $v_val;
                    }
                }
            }
        }
        DB::table('tbl_cars')->insert($data);
        session()->flash('success','Thêm thành công');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crawler  $crawler
     * @return \Illuminate\Http\Response
     */
    public function show(Crawler $crawler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crawler  $crawler
     * @return \Illuminate\Http\Response
     */
    public function edit(Crawler $crawler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crawler  $crawler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crawler $crawler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crawler  $crawler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crawler $crawler)
    {
        //
    }
}
