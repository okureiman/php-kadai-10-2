<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{    // PHP/Laravel 14 課題5
    protected $guarded = array('id');
    
     public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' =>'required',
        );
}
