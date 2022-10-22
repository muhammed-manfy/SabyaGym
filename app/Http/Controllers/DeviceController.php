<?php

namespace App\Http\Controllers;

use App\Device;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('devices.index')
            ->with('devices', Device::all())
            ->with('courses', Course::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        if ($courses->count() == 0) {
            return redirect()->route('course.create');
        }
        */
        $courses = Course::all();
        return view('devices.create')
            ->with('courses', $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "type" => "required", // name from forms label for in page create
            "image" => "required",
            "num_of_devices" => "required"
            //"course_id " => "required",
        ]);
        $image = $request->image;
        $image_new = time() . $image->getClientOriginalName();
        $image->move('uploads/devices', $image_new);
        $request->image = 'uploads/devices/'  . $image_new;
        DB::insert(
            'insert into devices (image, deleted_at, type, num_of_devices, course_id) 
            values (?, ?, ?, ?, ?)',
            [
                $request->image,
                null,
                $request->type,
                $request->num_of_devices,
                $request->course_id
            ]
        );
        //Device::create($request->all());
        return redirect()->route('devices');
        /*
        $devices = Device::create([
            "type" => $request->type, // name from forms label for in page create
            "image" => 'uploads/devices/' . $image_new,
            "num_of_devices" => $request->num_of_devices,
            "course_id " => $request->course_id,
        ]);
        */
        //dd($request->all());
        /*
        $device = new Device;
        $device->type = $request->type;
        $device->image = $request->image;
        $device->course_id = $request->course_id;
        $device->save();
        return redirect()->route('devices');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);
        return view('devices.edit')
            ->with('device', $device)
            ->with('courses', course::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $device = Device::find($id);
        $device->type = $request->type;
        $device->image = $request->image;
        $device->num_of_devices = $request->num_of_devices;
        $device->course_id = $request->course_id;
        $device->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);
        $device->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $devices = Device::onlyTrashed()->get();
        return view('devices.softdeleted')
            ->with('devices', $devices)
            ->with('courses', course::all());
    }

    public function hdelete($id)
    {
        $device = Device::withTrashed()
            ->where('id', $id)
            ->first();
        $device->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $device = Device::withTrashed()
            ->where('id', $id)
            ->first();
        $device->restore();
        return redirect()->route('devices');
    }
}
