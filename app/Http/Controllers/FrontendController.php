<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;
use App\Coach;
use App\Course;
use App\Setting;
use App\Service;
use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        return view('front-end.index', ['adverts' => Advert::all(), 'setting' => Setting::first()]);
    }

    public function trainerIndex()
    {
        $coachs = Coach::all();
        return view('front-end.trainer')->with('coachs', $coachs);
    }
    public function classesIndex()
    {
        $courses = Course::all();
        return view('front-end.classes')->with("courses", $courses);
    }
    public function contactIndex()
    {
        return view('front-end.contact', ['setting' => Setting::first()]);
    }

    public function memberServicesIndex()
    {
        return view('front-end.member-servies');
    }
    public function successStoriesIndex()
    {
        return view('front-end.success-stroies');
    }

    // public function serviceStore(Request $request)
    // {
    //     $this->validate($request, [
    //         "first_name" => "required",
    //         "last_name" => "required",
    //         "message" => "required"
    //     ]);

    //     // dd($request->all());
    //     Service::create([
    //         "first_name" => $request->first_name,
    //         "last_name" => $request->last_name,
    //         "message" => $request->message,
    //     ]);

    //     return redirect()->route('front-index');
    // } //end serviceStore()

    // public function serviceDelete($id)
    // {
    //     $serv = Service::find($id);
    //     $serv->delete();
    //     return redirect()->back();
    // } //end serviceDelete()
}
