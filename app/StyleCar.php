<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StyleCar extends Model
{
    //
    protected $table = 'tbl_style_cars';
    protected $fillable = [
    	'style_cars_name',
    ];
}
