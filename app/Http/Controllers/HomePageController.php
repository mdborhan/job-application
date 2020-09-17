<?php

namespace App\Http\Controllers;

use App\Jobpost;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $jobs = Jobpost::orderBy('id','desc')->paginate(3);
        return view('home.index',[
            'jobs'=> $jobs
        ]);
    }
}
