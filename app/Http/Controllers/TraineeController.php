<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;
use App\Medical;
use App\Trainee;
use App\User;

class TraineeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function profile()
    {
        if (request()->query('search')) {
            $search = request()->query('search');
            $search_trainees = Trainee::where('full_name', 'like', "{$search}");
            $trainees = $search_trainees->get();
            return view('trainees.profile')
                ->with('trainees', $trainees);
        } else {
            return view('trainees.profile');
        }
    }

    public function index()
    {
        return view('trainees.index')
            ->with('trainees', Trainee::all())
            ->with('courses', Course::all())
            ->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        $medicals = Medical::all();
        if ($medicals->count() == 0) {
            return redirect()->route('coach.create');
        }

        $courses = Course::all();
        if ($courses->count() == 0) {
            return redirect()->route('trainee.create');
        }
*/

        $courses = Course::all();
        return view('trainees.create')
            ->with('courses', $courses)
            ->with('users', User::all());;
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
            "full_name" => "required", // name from forms label for in page create
            "phone" => "required",
            "image" => "required",
            //"birthday " => "required",
            //"work_place " => "required",
        ]);
        $image = $request->image;
        $image_new = time() . $image->getClientOriginalName();
        $image->move('uploads/trainees', $image_new);
        $request->image = 'uploads/trainees/' . $image_new;
        DB::insert(
            'insert into trainees (image, deleted_at, full_name, phone, work_place, birthday,user_id) 
            values (?, ?, ?, ?, ?, ? ,?)',
            [
                $request->image,
                null,
                $request->full_name,
                $request->phone,
                $request->work_place,
                $request->birthday,
                $request->user_id,
            ]
        );
        return redirect()->route('trainees');
        //dd($request->all());
        /*
        $trainee = new Trainee();
        $trainee->full_name = $request->full_name;
        $trainee->phone = $request->phone;
        $trainee->birthday = $request->birthday;
        $trainee->work_place = $request->work_place;
        $trainee->medical_id = $request->medical_id;
        $trainee->user_id = $request->user_id;
        $trainee->save();
        return redirect()->back();
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
        $trainee = Trainee::find($id);
        return view('trainees.show')
            ->with('trainee', $trainee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trainee = Trainee::find($id);
        return view('trainees.edit')
            ->with('trainee', $trainee)
            ->with('users', User::all())
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
        $trainee = Trainee::find($id);
        $trainee->image = $request->image;
        $trainee->full_name = $request->full_name;
        $trainee->phone = $request->phone;
        $trainee->birthday = $request->birthday;
        $trainee->work_place = $request->work_place;
        $trainee->medical_id = $request->medical_id;
        $trainee->user_id = $request->user_id;
        $trainee->save();
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
        //can not deleted Subsriber because she mange some related record
        $trainee = Trainee::find($id);
        if ($trainee->medical()->count() > 0) {
            //session()->flush('error','Subsriber cannot be deleted because she has medical record');
            return redirect()->route('medicals');
        }
        $trainee->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $trainees = Trainee::onlyTrashed()->get();
        return view('trainees.softdeleted')
            ->with('trainees', $trainees);
    }

    public function hdelete($id)
    {
        $trainee = Trainee::withTrashed()
            ->where('id', $id)
            ->first();
        $trainee->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $trainee = Trainee::withTrashed()
            ->where('id', $id)
            ->first();
        $trainee->restore();
        return redirect()->route('trainees');
    }
}
