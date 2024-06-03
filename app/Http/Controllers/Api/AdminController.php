<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        if (Auth::user()->role !== 'admin') {
            abort(401);
        }

        $courses = User::whereHas('courses', function ($query) {
            $query->whereIn('course_user.status', ['pending', 'true']);
        })->get();

        return $courses;
    }

    public function adminAccept($user_id, $course_id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(401);
        }

        // $user = User::find(1);
        // $course_id = 2;
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
        $newStatus = 'true';
        $pivot = $user->courses()->where('course_id', $course_id)->first()->pivot;

        if (!$pivot) {
            return response()->json(['error' => 'No course found'], 404);
        }
        $pivot->status = $newStatus;
        $pivot->save();
        $courses = $user->courses;

        return $courses;
    }

    public function adminReject($user_id, $course_id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(401);
        }

        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
        $newStatus = 'rejected';
        $pivot = $user->courses()->where('course_id', $course_id)->first()->pivot;

        if (!$pivot) {
            return response()->json(['error' => 'No course found'], 404);
        }
        $pivot->status = $newStatus;
        $pivot->save();
        $courses = $user->courses;

        return $courses;
    }

    public function createActivity(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|string',
        ]);
        $activity = new Activity();
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->image = $request->image;
        $activity->timestamps = false;
        $activity->save();

        return response()->json(['message' => 'Activity created successfully'], 201);
    }
}
