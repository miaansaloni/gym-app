<?php
namespace App\Http\Controllers\Api;


use App\Models\User;
use App\Models\Course;
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

    public function bookCourse(Request $request, $courseId)
    {
        if (Auth::user()->role !== 'user') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = Auth::user();
        $course = Course::find($courseId);

        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }
        // Aggiunge la prenotazione
        $user->courses()->attach($courseId, ['status' => 'pending']);

        return response()->json(['success' => 'Course booked successfully.'], 200);
    }

    public function cancelCourse($courseId)
    {
        if (Auth::user()->role !== 'user') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();

        // Verifica se l'utente è iscritto al corso
        $existingBooking = $user->courses()->where('course_id', $courseId)->first();

        // Annulla la prenotazione
        $user->courses()->detach($courseId);

        return response()->json(['success' => 'Course canceled successfully.'], 200);
    }
}
