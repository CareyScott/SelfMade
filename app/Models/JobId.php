<?php
# @Date:   2021-03-04T15:14:37+00:00
# @Last modified time: 2021-03-04T15:29:54+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobId extends Model
{
    use HasFactory;

    public function employers()
    {
      return $this->belongsToMany('App\Models\Employer', 'job_ids');
    }
}
