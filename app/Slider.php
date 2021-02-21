<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
  public $timestamps = false;
    protected $fillable=['slider_photo'];
}
