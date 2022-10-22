<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Cleaner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CleanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.cleaners.index')
            ->with('cleaners', Cleaner::all())
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

        return view('employees.cleaners.create')
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
            "full_name" => "required",
            "phone" => "required",
            "image" => "required",
            //"birthday " => "required",
            //"salary " => "required",
            //"admin_id " => "required",
        ]);
        $image = $request->image;
        $image_new = time() . $image->getClientOriginalName();
        $image->move('uploads/employees/cleaners', $image_new);
        $request->image = 'uploads/employees/cleaners/' . $image_new;
        DB::insert(
            'insert into cleaners (image, deleted_at, full_name, phone, birthday, salary, admin_id ,user_id) 
            values (?, ?, ?, ?, ?, ?, ? ,?)',
            [
                $request->image,
                null,
                $request->full_name,
                $request->phone,
                $request->birthday,
                $request->salary,
                $request->admin_id,
                $request->user_id
            ]
        );
        //Cleaner::create($request->all());
        return redirect()->route('cleaners');
        //dd($request->all());
        /*
        $cleaner = new Cleaner;
        $cleaner->full_name = $request->full_name;
        $cleaner->phone = $request->phone;
        $cleaner->birthday = $request->birthday;
        $cleaner->salary = $request->salary;
        $cleaner->admin_id = $request->admin_id;
        $cleaner->save();
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
        $cleaner = Cleaner::find($id);
        return view('employees.cleaners.show')
            ->with('cleaner', $cleaner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cleaner = Cleaner::find($id);
        return view('employees.cleaners.edit')
            ->with('cleaner', $cleaner)
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
        $cleaner = Cleaner::find($id);
        $cleaner->image = $request->image;
        $cleaner->full_name = $request->full_name;
        $cleaner->phone = $request->phone;
        $cleaner->birthday = $request->birthday;
        $cleaner->salary = $request->salary;
        $cleaner->admin_id = $request->admin_id;
        $cleaner->user_id = $request->admin_id;
        $cleaner->save();
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
        $cleaner = Cleaner::find($id);
        $cleaner->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $cleaners = Cleaner::onlyTrashed()->get();
        return view('employees.cleaners.softdeleted')
            ->with('cleaners', $cleaners)
            ->with('admins', Admin::all())
            ->with('users', User::all());
    }

    public function hdelete($id)
    {
        $cleaner = Cleaner::withTrashed()
            ->where('id', $id)
            ->first();
        $cleaner->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $cleaner = Cleaner::withTrashed()
            ->where('id', $id)
            ->first();
        $cleaner->restore();
        return redirect()->route('cleaners');
    }
}
