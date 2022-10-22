<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Settings;
use App\Setting;
use App\Classes;
use App\Coach;
use App\Course;
use App\Tra;
use App\Service;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth()->user() != null) {
            if (Auth()->User()->isAdmin()) {
                redirect(route('home'));
            }
        }
        return view('Setting.setting',
        ['setting'=>Setting::first(),
        'courses'=>Course::all(),
        'coachs'=>Coach::all(),
        'service'=>Service::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
          "site_name"=>"required",
          "phone_number"=>"required",
          "email"=>"required",
          "address"=>"required",
          "open_days"=>"required"
        ]);
        // dd($request->all());
        $setting=Settings::first();
        $setting->site_name=$request->site_name;
        $setting->phone_number=$request->phone_number;
        $setting->email=$request->email;
        $setting->address=$request->address;
        $setting->open_days=$request->open_days;
        $setting->Save();
        session()->flash('updatedsite','Site Info Updated Succesfuly');
        return redirect('/admins/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
