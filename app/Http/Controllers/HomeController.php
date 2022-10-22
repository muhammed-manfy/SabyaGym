<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cleaner;
use App\Coach;
use App\Course;
use App\User;
use App\Advert;
use App\Admin;
use App\Trainee;
use App\Medical;
use App\Device;

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
        $admins_count = Admin::all()->count();
        $coachs_count = Coach::all()->count();
        $cleaners_count = Cleaner::all()->count();
        $trainees_count = Trainee::all()->count();

        return view('home')
            ->with('admins_count', $admins_count)
            ->with('coachs_count', $coachs_count)
            ->with('cleaners_count', $cleaners_count)
            ->with('trainees_count', $trainees_count);
    }
}
