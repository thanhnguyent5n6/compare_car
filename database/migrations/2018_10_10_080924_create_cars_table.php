<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cars', function (Blueprint $table) {
            $table->increments('cars_id');
            $table->integer('cars_category_id');
            $table->integer('cars_style_id');
            $table->text('cars_image')->nullable();
            $table->text('cars_name');
            $table->text('cars_price');
            $table->text('cars_promotion_name');
            $table->text('cars_size');
            $table->text('cars_gas_tank');
            $table->text('cars_engine');
            $table->text('cars_capacity');
            $table->text('cars_momen');
            $table->text('cars_light_roar');
            $table->text('cars_diameter_spin_min');
            $table->text('cars_source');
            $table->text('cars_gear');
            $table->text('cars_fuel_consumption');
            $table->text('cars_brake_abs');
            $table->text('cars_brake_ebd');
            $table->text('cars_brake_ba');
            $table->text('cars_control_degree_grip');
            $table->text('cars_air_bag');
            $table->text('cars_force_electric_eps');
            $table->text('cars_support_start_steep');
            $table->text('cars_cruise_control');
            $table->text('cars_run_mode');
            $table->text('cars_electric_hand_brake');
            $table->text('cars_smart_lock');
            $table->text('cars_headlight');
            $table->text('cars_auto_headlight');
            $table->text('cars_auto_headlight_afs');
            $table->text('cars_auto_wiper');
            $table->text('cars_interiar_materials');
            $table->text('cars_air_conditioning');
            $table->text('cars_after_cooler');
            $table->text('cars_after_wind_door');
            $table->text('cars_mirror_anti_ dazzle');
            $table->text('cars_seat');
            $table->text('cars_seat_glass_door');
            $table->text('cars_speakers');
            $table->text('cars_bluetooth');
            $table->text('cars_usb');
            $table->text('cars_camera_back');
            $table->text('cars_sensor_distance');
            $table->text('cars_out_window');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
