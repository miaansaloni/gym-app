<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userDashboard()
    {
        if (Auth::user()->role !== 'user') {
            abort(401);
        }

        $user_id = Auth::user()->id;
        // $user_id = 1;

        $inscription_courses = User::with('courses')->find($user_id);

        return $inscription_courses;
    }

    public function bookCourse($id)
    {
        if (Auth::user()->role !== 'user') {
            abort(401);
        }
        // $user_id = User::find(1);
        // $course_id = 2;
        $user = Auth::user();
        $course_id = $id; // ID del corso che vuoi aggiornare
        $newStatus = 'pending';
        $pivot = $user->courses()->where('course_id', $course_id)->first()->pivot;
        $pivot->status = $newStatus;
        $pivot->save();

        return $pivot;
    }

    public function cancelBooking($id)
    {
        if (Auth::user()->role !== 'user') {
            abort(401);
        }
        // $user_id = User::find(1);
        // $course_id = 2;
        $user = Auth::user();
        $course_id = $id; // ID del corso che vuoi aggiornare
        $newStatus = 'false';
        $pivot = $user->courses()->where('course_id', $course_id)->first()->pivot;
        $pivot->status = $newStatus;
        $pivot->save();

        return $pivot;
    }
}
