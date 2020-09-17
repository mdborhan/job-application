<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Apply;
use App\Jobpost;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use Illuminate\Support\Facades\Hash;
use Exception;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('applicant.login');
    }

    public function getRegister()
    {
        return view('applicant.register');
    }

    public function postRegister(Request $request)
    {
        try {
            $applicants = new Applicant();

            $applicants->name = $request->name;
            $applicants->last_name = $request->last_name;
            $applicants->email = $request->email;
            $applicants->password = Hash::make($request->password);

            $applicants->save();

            Session::put('userId', $applicants->id);
            Session::put('userName', $applicants->name);
            return view('applicant.index',[
                'jobs'=> Jobpost::orderBy('id','desc')->paginate(3)
            ]);
        } catch (Exception $e) {
            //if email or phone exist before in db redirect with error messages
            Session::flash('success', 'This Email Already Exists');
            return back();
        }


    }

    public function applicantLogout(Request $request)
    {
        Session::forget('userId');
        Session::forget('userName');

        return redirect('applicant');

    }

    public function applicantLoginPage(Request $request)
    {
        $applicants = Applicant::where('email', $request->email)->first();
        if ($applicants) {
            if (password_verify($request->password, $applicants->password)) {
                Session::put('userId', $applicants->id);
                Session::put('userName', $applicants->name);
                return view('applicant.index',[
                        'jobs'=> Jobpost::orderBy('id','desc')->paginate(3)
                    ]
                );

            } else {
                Session::flash('success','Password Invalid');
                return redirect('applicant');
            }

        } else {
            Session::flash('success','Email Address  Invalid.');
            return redirect('applicant');

        }

    }
    public function getApply()
    {
        if (!Session::get('userId'))
        {
            return view('applicant.login');
        }
    }
    public function getProfile()
    {
        return view('applicant.profile');
    }
    public function getDashboard()
    {
        if (Session::get('userId'))
        {
            return view('applicant.index',[
                'jobs'=> Jobpost::orderBy('id','desc')->paginate(3)
            ]);
        }
    }
    public  function postProfile(Request $request)
    {
        $applicants = Applicant::find($request->id);


        if ($request->image)
        {
            if ($applicants->image)
            {
                unlink($applicants->image);
            }

            $image = $request->file('image');
            $imageName= time().'.'.$image->getClientOriginalName();
            $image->move(public_path('upload'),$imageName);

            $applicants->image  = 'upload/'.$imageName;

            $applicants->save();

        }

        if ($request->resume) {
            if ($applicants->resume)
            {
                unlink($applicants->resume);
            }
            $image = $request->file('resume');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('upload'),$imageName);

            $applicants->resume  = 'upload/'.$imageName;

            $applicants->save();


        }
        $applicants->skills= $request->skills;
        $applicants->save();
        Session::flash('success','Update Successfully!');
        return view('applicant.profile');

    }
    public  function getVApply(Request $request)
    {
        $applicant = Applicant::find($request->user_id);
        if($applicant->resume==Null)
        {
            Session::flash('success','Please upload your resume');
            return view('applicant.profile');

        }
        $apply = new  Apply();
        $apply->user_id = $request->user_id;
        $apply->job_id=$request->job_id;
        $apply->save();
        Session::flash('success','Apply Successfull');
        return view('applicant.index',[
            'jobs'=> Jobpost::orderBy('id','desc')->paginate(3)
        ]);



    }
}
