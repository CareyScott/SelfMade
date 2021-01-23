<?php
# @Date:   2021-01-23T15:44:26+00:00
# @Last modified time: 2021-01-23T15:45:03+00:00





namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
      return view('welcome');
    }

    public function about()
    {
      return view('about');
    }
}
