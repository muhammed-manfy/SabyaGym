<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;
use App\Coach;
use App\Trainee;

class CourseController extends Controller
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
        return view('courses.index')
            ->with('courses', Course::all())
            ->with('trainees', Trainee::all())
            ->with('coachs', Coach::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $coachs = coach::all();
        if ($coachs->count() == 0) {
            return redirect()->route('coach.create');
        }

        $trainees = Trainee::all();
        if ($trainees->count() == 0) {
            return redirect()->route('trainee.create');
        }

        return view('courses.create')
            ->with('trainees', $trainees)
            ->with('coachs', $coachs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // // $this->validate($request, [
        //     "ended_at" => "required",
        //     "sport_type" => "required",
        //     "subscribe_type" => "required",
        //     "subscribe_cost " => "required",
        //     "coach_id " => "required",
        //     "trainees" => "required",
        // ]);

        $image = $request->image;
        $image_new = time() . $image->getClientOriginalName();
        $image->move('uploads/courses', $image_new);
        $request->image = 'uploads/courses/' . $image_new;
        $course = Course::create($request->all());
        $course->save();

        //many to many
        if ($request->trainees) {
            $course->trainees()->attach($request->trainees);
        }
        return  redirect()->route('courses');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show')
            ->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        //$coach = Coach::find($id);
        return view('courses.edit')
            ->with('course', $course)
            ->with('trainees', Trainee::all())
            ->with('coachs', Coach::all());
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
        $course = course::find($id);
        $course->published_at = $request->published_at;
        $course->image = $request->image;
        $course->ended_at = $request->ended_at;
        $course->subscribe_type = $request->subscribe_type;
        $course->sport_type = $request->sport_type;
        $course->subscribe_cost = $request->subscribe_cost;
        $course->coach_id = $request->coach_id;
        $course->save();
        $course->trainees()->sync($request->trainees);
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
        //can not deleted Course because she mange some related record
        $course = course::find($id);
        if ($course->devices()->count() > 0) {
            //session()->flush('error','Course cannot be deleted because it has some machines ');
            return redirect()->route('devices');
        }

        if ($course->advert()->count() > 0) {
            //session()->flush('error','Course cannot be deleted because it has some machines ');
            return redirect()->route('adverts');
        }

        $course->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $courses = Course::onlyTrashed()->get();
        return view('courses.softdeleted')
            ->with('courses', $courses)
            ->with('trainees', Trainee::all())
            ->with('coachs', Coach::all());
    }
    
    public function hdelete($id)
    {
        $courses = Course::withTrashed()
            ->where('id', $id)
            ->first();
        $courses->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $courses = Course::withTrashed()
            ->where('id', $id)
            ->first();
        $courses->restore();
        return redirect()->route('courses');
    }
}
