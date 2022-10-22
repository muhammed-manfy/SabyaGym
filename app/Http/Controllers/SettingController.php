<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('settings')
            ->with('settings', Setting::first())
            ->with('courses',Course::all());
    }

    public function update()
    {
        
        $this->validate(request(), [
            "site_name" => "required", // site_name from forms label for in page create
            "contact_number" => "required",
            "contact_email" => "required",
            "about " => "required",
            "address " => "required",
        ]);

        $setting = Setting::first();
        $setting->site_name = request()->site_name;
        $setting->contact_number = request()->contact_number;
        $setting->contact_email = request()->contact_email;
        $setting->about = request()->about;
        $setting->address = request()->address;
        $setting->save();
        return redirect()->back();
    }
}
