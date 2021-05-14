<?php
# @Date:   2021-01-23T15:44:26+00:00
# @Last modified time: 2021-05-14T15:50:11+01:00





namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller for the pages with no auth needeed 
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
