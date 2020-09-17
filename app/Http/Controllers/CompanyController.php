<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Jobpost;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

class CompanyController extends Controller
{
    public  function index()
    {
        return view('company.login');
    }

    public function getJob()
    {
        if(Session::has('userId'))
        {
//            dd(Auth::user()->id);
            return view('company.job',[
                'jobs'=>DB::table('users')
                    ->join('jobposts','users.id','=','jobposts.company_id')
                    ->select('jobposts.*')
                    ->where('jobposts.company_id',Session::get('userId'))
                    ->orderBy('jobposts.id','desc')
                    ->get()
            ]);




        }


    }
    public function postJob(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required|max:255',
            'description'=> 'required|max:255',
            'salary'=> 'required|max:255',
            'location'=> 'required|max:255',
            'country'=> 'required|max:255',

        ]);

        $tasks = new Jobpost();

        $tasks->company_id = $request->company_id;
        $tasks->title = $request->title;
        $tasks->description = $request->description;
        $tasks->salary = $request->salary;
        $tasks->location = $request->location;
        $tasks->country = $request->country;
        $tasks->save();
        Session::flash('success','Job Post has been successfully added!');
        return back();


    }
    public function deleteJob(Request $request)
    {
        $jobs = Jobpost::find($request->id);
        $jobs->delete();
        Session::flash('success','Job delete successfully');
        return back();
    }
    public function getDashboard()
    {
        $applicants = Applicant::orderBy('id','asc')->paginate(5);
        return view('company.index',[
            'applicants'=>$applicants
        ]);
    }
}
