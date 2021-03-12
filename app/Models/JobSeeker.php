<?php
# @Date:   2021-03-07T12:45:08+00:00
# @Last modified time: 2021-03-11T19:56:54+00:00




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;

    public function skills()
    {
      return $this->hasMany('App\Models\Skill');
    }
    public function skill()
    {
      return $this->hasMany('App\Models\Skill');
    }

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }



    protected $fillable = [

        'personal_postal_address',
        'personal_bio',
        'education',
        'user_id',
        'skill',
    ];
}
