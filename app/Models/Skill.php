<?php
# @Date:   2021-03-07T12:51:41+00:00
# @Last modified time: 2021-03-07T15:06:29+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public function jobSeeker()
    {
      return $this->belongsTo('App\Models\Job');

    }
}
