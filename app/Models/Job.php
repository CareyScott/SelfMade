<?php
# @Date:   2021-01-23T15:52:43+00:00
# @Last modified time: 2021-03-11T20:00:20+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function employer()
    {
      return $this->belongsTo('App\Models\Employer');

    }

    public function job_category()
    {
      return $this->belongsTo('App\Models\JobCategory');
    }

    public function skill()
    {
      return $this->hasOne('App\Models\Skill');
    }


}
