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
    public function index()
    {
        $users = User::all(); 
        return $users;
    }


    public function userdashboard()
    {
        if (Auth::user()->role !== 'user') {
            abort(401);
        }
        // $user_id = Auth::user()->id;
        $user_id = 1;

        $bookedCourses = User::with('courses')->find($user_id);
        return $bookedCourses;
    }

    public function admindashboard()
    {
        if (Auth::user()->role !== 'admin') {
            abort(401);
        }

        $courses = User::whereHas('courses', function ($query) {
            $query->whereIn('course_user.status', ['pending', 'true']);
        })->get();

        return $courses;
    }

    
}