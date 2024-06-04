<?php
namespace App\Http\Controllers\Api;


use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
public function userDashboard()
{
    if (Auth::user()->role !== 'user') {
        abort(401);
    }

    $user_id = Auth::user()->id;

    $user = User::with(['courses' => function($query) {
        $query->withPivot('status'); 
    }, 'courses.activity', 'courses.slot'])->find($user_id);

    return response()->json($user);
}


    public function bookCourse(Request $request)
{
    $validatedData = $request->validate([
        'course_id' => 'required|exists:courses,id',
        'user_id' => 'required|exists:users,id',
    ]);

    DB::table('course_user')->updateOrInsert(
        ['course_id' => $validatedData['course_id'], 'user_id' => $validatedData['user_id']],
        ['status' => 'pending']
    );

    return response()->json(['message' => 'Course booked successfully'], 200);
}


public function deleteBooking($courseId)
{
    $user = Auth::user();

    $user->courses()->detach($courseId);

    return response()->json(['message' => 'Booking deleted successfully']);
}

}
