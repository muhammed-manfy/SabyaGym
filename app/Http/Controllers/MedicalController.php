<?php

namespace App\Http\Controllers;

use App\Medical;
use App\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalController extends Controller
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
        //$result = DB::select('select * from medicals');
        return view('medicals.index')
            //->with('medicals', compact($result)); isset($medicals)
            ->with('medicals', Medical::all())
            ->with('trainees', Trainee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicals.create')
            ->with('trainees', Trainee::all());
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
            "hospital_name" => "required", // name from forms label for in page create
            "previous_operation" => "required",
            //"disases " => "required",
            //"trainee_id" => "required"
        ]);
        DB::insert(
            'insert into medicals (hospital_name, previous_operation, disases ,trainee_id) values (?, ?, ?, ?)',
            [
                $request->hospital_name,
                $request->previous_operation,
                $request->disases,
                $request->trainee_id
            ]
        );
        return redirect()->route('medicals');
        /*
        Medical::create($request->all());
        return redirect()->route('medicals');
        */
        /*
        $medical = Medical::create([
            "hospital_name" => $request->hospital_name, // left side for database , right side for user
            "previous_operation" => $request->phone,
            "disases" => $request->disases
        ]);
        */
        /*
        $Medical = new Medical;
        $Medical->hospital_name = $request->hospital_name; // left side for database , right side for user
        $Medical->previous_operation = $request->previous_operation;
        $Medical->disases = $request->disases;
        $Medical->save;
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
        $results = DB::select('select * from medicals where id = :id', ['id' => $id]);
        $result = DB::select('select * from medicals where id =?', [$id]);
        //return view('viewName', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medical = Medical::findOrFail($id);
        return view('medicals.edit')
            ->with('medical', $medical)
            ->with('trainees', Trainee::all());
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
        $medical = Medical::findOrFail($id);
        $medical->hospital_name = $request->hospital_name;
        $medical->previous_operation = $request->previous_operation;
        $medical->disases = $request->disases;
        $medical->trainee_id = $request->trainee_id;
        $medical->save();
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
        $medical = Medical::findOrFail($id);
        $medical->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $medicals = Medical::onlyTrashed()->get();
        return view('medicals.softdeleted')
            ->with('medicals', $medicals)
            ->with('trainees', Trainee::all());
    }

    public function hdelete($id)
    {
        $medical = Medical::withTrashed()
            ->where('id', $id)
            ->first();
        $medical->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $medical = Medical::withTrashed()
            ->where('id', $id)
            ->first();
        $medical->restore();
        return redirect()->route('medicals');
    }
}
