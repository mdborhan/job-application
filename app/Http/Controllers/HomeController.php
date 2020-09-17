<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Applicant;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::put('userId',Auth::user()->id);

        return view('company.index',[
            'applicants' => Applicant::orderBy('id','asc')->paginate(5)
        ]);
    }
}
