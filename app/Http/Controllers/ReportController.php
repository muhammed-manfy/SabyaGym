<?php

namespace App\Http\Controllers;

use App\Cleaner;
use App\Coach;
use App\Admin;
use App\Course;
use App\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reports_employees()
    {
        if (request()->query('search')) {
            $search = request()->query('search');
            $coach = Coach::where('full_name', 'like', "%{$search}%")->first();
            $cleaner = Cleaner::where('full_name', 'like', "%{$search}%")->first();
            $admin = Admin::where('full_name', 'like', "%{$search}%")->first();
            return view('reposts.employees.index')
                ->with('admin', $admin)
                ->with('coach', $coach)
                ->with('cleaner', $cleaner);
        } else {
            return view('reposts.employees.index');
        }
    }

    public function reports_trainees()
    {
        if (request()->query('search')) {
            $search = request()->query('search');
            $trainee = Trainee::where('full_name', 'like', "%{$search}%")->first();
            return view('reposts.trainees.index')
                ->with('trainee', $trainee);
        } else {
            return view('reposts.trainees.index');
        }
    }

    public function reports_statistics()
    {
        $trashed_admins = Admin::onlyTrashed()->get();
        $trashed_cleaners = Cleaner::onlyTrashed()->get();
        $trashed_coachs = Coach::onlyTrashed()->get();
        $trashed_courses = Course::onlyTrashed()->get();
        $courses = Course::all();
        $num = $courses->count();
        $count = 0;
        $sum = 0;
        for ($i = 1; $i <= $num; $i++) {
            foreach ($courses as $course) {
                $count = $course->trainees->count();
                $cost = $course->subscribe_cost;
            }
            $sum += $count * $cost;
        }
        $num_trashed = $courses->count();
        $count_trashed = 0;
        $sum_trashed = 0;
        for ($i = 1; $i <= $num_trashed; $i++) {
            foreach ($courses as $course) {
                $count_trashed = $course->trainees->count();
                $cost_trashed = $course->subscribe_cost;
            }
            $sum_trashed += $count_trashed * $cost_trashed;
        }
        return view('reposts.statistics.index')
            ->with('cleaners', Cleaner::all())
            ->with('admins', Admin::all())
            ->with('coachs', Coach::all())
            ->with('trainees', Trainee::all())
            ->with('trashed_admins', $trashed_admins)
            ->with('trashed_cleaners', $trashed_cleaners)
            ->with('trashed_coachs', $trashed_coachs)
            ->with('tarshed_courses', $trashed_courses)
            ->with('subscribe_costs', $sum)
            ->with('subscribe_costs_trashed', $sum_trashed);
    }
}
