<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $table = 'tbl_cars';

    protected $primaryKey = 'cars_id';

    public function getIdAttribute()
    {
    	return $this->attribute['cars_id'];
    }

    protected $fillable = 
    [
    	'cars_image',
        'cars_name',
        'cars_source',
        'cars_category_id',
        'cars_style_id',
        'cars_price',
        'cars_promotion_price',
        'cars_size',
        'cars_weight',
        'cars_gas_tank',
        'cars_engine',
        'cars_capacity',
        'cars_momen',
        'cars_light_roar',
        'cars_diameter_spin_min',
        'cars_gear',
        'cars_fuel_consumption',
        'cars_brake_abs',
        'cars_brake_ebd',
        'cars_brake_ba',
        'cars_electric_balance_eps',
        'cars_control_degree_grip',
        'cars_air_bag',
        'cars_electric_support_eps',
        'cars_support_start_steep',
        'cars_cruise_control',
        'cars_run_mode',
        'cars_electric_hand_brake',
        'cars_smart_lock',
        'cars_headlight',
        'cars_auto_headlight',
        'cars_auto_headlight_afs',
        'cars_auto_wiper',
        'cars_interiar_materials',
        'cars_air_conditioning',
        'cars_after_cooler',
        'cars_after_wind_door',
        'cars_mirror_anti_dazzle',
        'cars_seat',
        'cars_seat_glass_door',
        'cars_speakers',
        'cars_bluetooth',
        'cars_usb',
        'cars_sensor_distance',
        'cars_out_window',
    ];
}
