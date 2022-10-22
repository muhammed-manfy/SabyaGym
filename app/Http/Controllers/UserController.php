<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Cleaner;
use App\Coach;
use App\Setting;
use App\Settings;
use App\Trainee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin_profile()
    {
        $id = auth()->user()->id;
        $admin = Admin::where('user_id', $id)->first();
        return view('users.admin_profile')
            ->with('admin', $admin);
    }

    public function profile()
    {
        // if admin want to see his profile at Main Page
        $id = auth()->user()->id;
        $admin = Admin::where('user_id', $id)->first();
        if (isset($admin)) {
            return view('users.admin_profile')
                ->with('admin', $admin);
        }

        $id = auth()->user()->id;
        $trainee = Trainee::where('user_id', $id)->first();
        $cleaner = Cleaner::where('user_id', $id)->first();
        $coach = Coach::where('user_id', $id)->first();
        return view('users.profile')
            ->with('cleaner', $cleaner)
            ->with('coach', $coach)
            ->with('trainee', $trainee)
            ->with('setttings',Settings::first());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('users.index')
            ->with('users', User::all())
            ->with('admins', Admin::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('users');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users');
    }


    public function makeAdmin(User $user)
    {
        $user->admin = 1;
        $user->save();
        return redirect()->back();
    }
    public function makeUser(User $user)
    {dd($user);
        $user->admin = 0;
        $user->save();
        return redirect()->back();
    }
}
