<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    /** home dashboard */
    public function index()
    {
        if (Auth::user()->role_name == 'Teachers') {
            return view('teacher.teacher_dashboard');
        } elseif (Auth::user()->role_name == 'Student') {
            return view('student.student_dashboard');
        } elseif (Auth::user()->role_name == 'Super Admin') {
            return view('superadmin.superadmin_dashboard');
        } elseif (Auth::user()->role_name == 'Staff') {
            return view('staff.staff_dashboard');
        } else {
            return view('dashboard.home');
        }
    }

    /** profile user */
    public function userProfile()
    {
        return view('dashboard.profile');
    }

    /** teacher dashboard */
    public function teacherDashboardIndex()
    {
        return view('dosen.dosen_dashboard');
    }

    /** student dashboard */
    public function studentDashboardIndex()
    {
        return view('student.student_dashboard');
    }

    /** super admin dashboard */
    public function superadminDashboardIndex()
    {
        return view('superadmin.superadmin_dashboard');
    }

    /** staff dashboard */
    public function staffDashboardIndex()
    {
        return view('staff.staff_dashboard');
    }
}
