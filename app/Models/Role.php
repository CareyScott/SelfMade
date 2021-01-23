<?php
# @Date:   2020-11-16T17:18:04+00:00
# @Last modified time: 2021-01-23T15:06:32+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function roles()
    {
      return $this->belongsToMany('App\Models\Role', 'user_role');
    }

}
