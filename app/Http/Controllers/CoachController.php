<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Coach;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.coachs.index')
            ->with('coachs', Coach::all())
            ->with('admins', Admin::all())
            ->with('users', User::all());
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


        $user = User::all();
        if ($user->count() == 0) {
            return redirect()->route('user.create');
        }

        return view('employees.coachs.create')
            ->with('admins', $admins)
            ->with('users', User::all());
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
            //"hours_work " => "required",
            //"hours_cost " => "required",
            //"salary " => "required",
            //"certificate " => "required",
            //"admin_id " => "required",
        ]);
        $image = $request->image;
        $image_new = time() . $image->getClientOriginalName();
        $image->move('uploads/employees/coachs', $image_new);
        $request->image = 'uploads/employees/coachs/' . $image_new;

        $work = (float)$request->hours_work;
        $cost = (float)$request->hours_cost;
        $sal = $request->hours_work * $request->hours_cost;
        $salary = (float)$sal;
        DB::insert(
            'insert into coaches (image ,deleted_at ,full_name, phone, birthday, hours_work, hours_cost, salary, certificate, admin_id,user_id) 
            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $request->image,
                null,
                $request->full_name,
                $request->phone,
                $request->birthday,
                $work,
                $cost,
                $salary,
                $request->certificate,
                $request->admin_id,
                $request->user_id,
            ]
        );
        return redirect()->route('coachs');
        //Coach::create($request->all());
        //dd($request->all());
        /*
        $coach = new Coach;
        $coach->full_name = $request->full_name;
        $coach->phone = $request->phone;
        $coach->birthday = $request->birthday;
        $coach->hours_work = $request->hours_work;
        $coach->hours_cost = $request->hours_cost;
        $coach->salary = $request->salary;
        $coach->certificate = $request->certificate;
        $coach->admin_id = $request->admin_id;
        $coach->save();
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
        $coach = Coach::find($id);
        return view('employees.coachs.show')
            ->with('coach', $coach);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coach = Coach::find($id);
        return view('employees.coachs.edit')
            ->with('coach', $coach)
            ->with('admins', Admin::all())
            ->with('users', User::all());
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
        $coach = Coach::find($id);
        $coach->image = $request->image;
        $coach->full_name = $request->full_name;
        $coach->phone = $request->phone;
        $coach->birthday = $request->birthday;
        $coach->hours_work = $request->hours_work;
        $coach->hours_cost = $request->hours_cost;
        $coach->salary = $request->hours_work * $request->hours_cost;
        $coach->certificate = $request->certificate;
        $coach->admin_id = $request->admin_id;
        $coach->user_id = $request->user_id;
        $coach->save();
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
        //can not deleted Trainer because she mange some related record
        $coach = Coach::find($id);
        if ($coach->courses()->count() > 0) {
            //session()->flush('error','Trainer cannot be deleted because she train in some course');
            return redirect()->route('courses');
        }
        //delete
        $coach->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $coachs = Coach::onlyTrashed()->get();
        return view('employees.coachs.softdeleted')
            ->with('coachs', $coachs)
            ->with('admins', Admin::all())
            ->with('users', User::all());
    }

    public function hdelete($id)
    {
        $coach = Coach::withTrashed()
            ->where('id', $id)
            ->first();
        $coach->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $coach = Coach::withTrashed()
            ->where('id', $id)
            ->first();
        $coach->restore();
        return redirect()->route('coachs');
    }
}
