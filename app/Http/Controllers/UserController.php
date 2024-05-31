<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userdashboard()
    {
        if (Auth::user()->role !== "user") abort(401);

        // lista esami superati dallo studente loggato
        // $user_id = Auth::user()->id;
        // $user_id = 2;

        User::with('courses', 'courses.activity', 'courses.slot')->find(Auth::id());
        // $bookedactivities = User::find($user_id);
        // $bookedactivities = User::with('exams', 'exams.course', 'exams.course.subject')->find($student_id);


        // return [
        //     'success' => true,
        //     'data' => $bookedactivities,
        // ];
    }

    public function admindashboard()
    {
        if (Auth::user()->role !== "admin") abort(401);

        // $user_id = Auth::user()->id;
        // $user_id = 2;

        User::with('activity', 'slot', 'users')->paginate();
        // $bookedactivities = User::find($user_id);

        // return [
        //     'success' => true,
        //     'data' => $bookedactivities,
        // ];
    }

    
}
