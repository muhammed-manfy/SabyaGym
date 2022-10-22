<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Admin; //connect with database
use App\User;

class AdminController extends Controller
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
        return view('employees.admins.index')
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

        $user = User::all();
        if ($user->count() == 0) {
            return redirect()->route('user.create');
        }

        return view('employees.admins.create')
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
            "image" => "required"
            // "birthday " => "required",
            //"salary " => "required",
            // "certificate " => "required",
            //"user_id " => "required",
        ]);
        $image = $request->image;
        $image_new = time() . $image->getClientOriginalName();
        $image->move('uploads/employees/admins', $image_new);
        $request->image = 'uploads/employees/admins/' . $image_new;
        DB::insert(
            'insert into admins (image, deleted_at, full_name, phone, birthday, salary, certificate, user_id) 
            values (?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $request->image,
                null,
                $request->full_name,
                $request->phone,
                $request->birthday,
                $request->salary,
                $request->certificate,
                $request->user_id
            ]
        );

        return redirect()->route('admins');
        /*
        $admin = Admin::create([
            "full_name" => $request->full_name, // left side for database , right side for user
            "phone" => $request->phone,
            "birthday" => $request->birthday,
            "salary" => $request->salary,
            "certificate" => $request->certificate,
            "user_id " => $request->user_id
        ]);

        */
        /*
        $admin = new Admin;
        $admin->full_name = $request->full_name; // left side for database , right side for user
        $admin->phone = $request->phone;
        $admin->birthday = $request->birthday;
        $admin->salary = $request->salary;
        $admin->certificate = $request->certificate;
        $admin->user_id = $request->user_id;
        $admin->save;
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
        $admin = Admin::find($id);
        return view('employees.admins.show')
            ->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $user = User::find($id);
        return view('employees.admins.edit')
            ->with('admin', $admin)
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
        $admin = Admin::find($id);
        $admin->full_name = $request->full_name;
        $admin->image = $request->image;
        $admin->phone = $request->phone;
        $admin->birthday = $request->birthday;
        $admin->certificate = $request->certificate;
        $admin->salary = $request->salary;
        $admin->user_id = $request->user_id;
        $admin->save();
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
        //can not deleted Supervisor because she mange some related record
        $admin = Admin::find($id);
        if ($admin->cleaners()->count() > 0) {
            //session()->flush('error','Supervisor cannot be deleted because she mange some workers');
            return redirect()->route('cleaners');
        }
        if ($admin->coachs()->count() > 0) {
            //session()->flush('error','Supervisor cannot be deleted because she mange some Trainers');
            return redirect()->route('coachs');
        }
        if ($admin->adverts()->count() > 0) {
            //session()->flush('error','Supervisor cannot be deleted because she mange some Posts');
            return redirect()->route('adverts');
        }
        //delete
        $admin->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $admins = Admin::onlyTrashed()->get();
        return view('employees.admins.softdeleted')
            ->with('admins', $admins)
            ->with('users', User::all());
    }

    public function hdelete($id)
    {
        $admin = Admin::withTrashed()
            ->where('id', $id)
            ->first();
        $admin->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $admin = Admin::withTrashed()
            ->where('id', $id)
            ->first();
        $admin->restore();
        return redirect()->route('admins');
    }
}
