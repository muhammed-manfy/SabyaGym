<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Advert;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('adverts.index')
            ->with('adverts', Advert::all())
            ->with('admins', Admin::all())
            ->with('courses', Course::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = Admin::all();
        if ($admins->count() == 0) {
            return redirect()->route('admin.create');
        }

        $courses = Course::all();
        if ($courses->count() == 0) {
            return redirect()->route('course.create');
        }

        return view('adverts.create')
            ->with('admins', $admins)
            ->with('courses', Course::all());
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
            "context" => "required", // name from forms label for in page create
            "admin_id" => "required",
        ]);
        Advert::create($request->all());
        
        // make discount for the course which belong to this advert/post
        $course = Course::find($request->course_id);
        $subscribe_cost = $course->subscribe_cost;
        $new_subscribe_cost = (double)($subscribe_cost * $request->discount_rate / 100);
        DB::update(
            'update courses set subscribe_cost = ? where id = ?',
            [
                $new_subscribe_cost,
                $request->course_id
            ]
        );
        return redirect()->route('adverts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert = Advert::find($id);
        return view('adverts.show')
            ->with('advert', $advert);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert = Advert::find($id);
        return view('adverts.edit')
            ->with('advert', $advert)
            ->with('admins', Admin::all())
            ->with('courses', Course::all());
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
        $advert = Advert::find($id);
        $advert->title = $request->title;
        $advert->discount_rate = $request->discount_rate;
        $advert->context = $request->context;
        $advert->admin_id = $request->admin_id;
        $advert->course_id = $request->course_id;
        $advert->save();
        
        // make discount for the course which belong to this advert/post
        $course = Course::find($request->course_id);
        $subscribe_cost = $course->subscribe_cost;
        $new_subscribe_cost = (double)($subscribe_cost * $request->discount_rate / 100);
        DB::update(
            'update courses set subscribe_cost = ? where id = ?',
            [
                $new_subscribe_cost,
                $request->course_id
            ]
        );
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
        $advert = Advert::find($id);
        $advert->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $adverts = Advert::onlyTrashed()->get();
        return view('adverts.softdeleted')
            ->with('adverts', $adverts)
            ->with('admins', Admin::all())
            ->with('courses', Course::all());
    }

    public function hdelete($id)
    {
        $advert = Advert::withTrashed()
            ->where('id', $id)
            ->first();
        $advert->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $advert = Advert::withTrashed()
            ->where('id', $id)
            ->first();
        $advert->restore();
        return redirect()->route('adverts');
    }
}
