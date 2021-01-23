<?php
# @Date:   2021-01-23T17:06:44+00:00
# @Last modified time: 2021-01-23T17:20:13+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
  use HasFactory;

  public function jobs()
  {
    return $this->hasMany('App\Models\Job');
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
}
