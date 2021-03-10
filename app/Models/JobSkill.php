<?php
# @Date:   2021-03-07T13:43:36+00:00
# @Last modified time: 2021-03-09T18:31:11+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    use HasFactory;

    public function jobSeeker()
    {
      return $this->belongsToMany('App\Models\JobSeeker', 'job_skills');
    }
    public function skills()
    {
      return $this->belongsToMany('App\Models\Skill', 'job_skills');
    }
}
