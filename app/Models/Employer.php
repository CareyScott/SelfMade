<?php
# @Date:   2021-01-23T17:06:44+00:00
# @Last modified time: 2021-04-06T17:40:37+01:00




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
  public function job()
  {
    return $this->hasMany('App\Models\Job');
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  protected $fillable = [

      'company_postal_address',
      'category',
      'user_id',

  ];
}
