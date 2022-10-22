<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;
use App\Coach;
use App\Course;
use App\Device;


class WelcomeController extends Controller
{
    public function index()
    {

        return view('welcome')
            ->with('devices', Device::all())
            ->with('adverts', Advert::simplePaginate(1))
            ->with('coachs', Coach::all())
            ->with('courses', Course::all());
    }
}
