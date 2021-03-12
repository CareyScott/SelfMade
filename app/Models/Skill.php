<?php
# @Date:   2021-03-07T12:51:41+00:00
# @Last modified time: 2021-03-11T19:47:42+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public function jobSeeker()
    {
      return $this->belongsToMany('App\Models\JobSeeker');
    }
    public function job()
    {
      return $this->belongsToMany('App\Models\Job');
    }


}
