<?php
# @Date:   2021-02-22T10:52:33+00:00
# @Last modified time: 2021-02-24T14:56:43+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    public function job()
    {
      return $this->hasMany('App\Models\Job');
    }
}
