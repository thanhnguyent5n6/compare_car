<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCar extends Model
{
    //
    protected $table = 'tbl_category_cars';

    protected $fillable = [
    	'category_cars_name',
    ];
}
