<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('activity', 'slot')->get();
        return $courses;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(Auth::user()->role !== "admin") abort(404);
        $request->validate([
            'location' => 'required|string',
            'year' => 'required|string',
            'activity_id' => 'required|exists:activities,id',
            'slot_id' => 'required|exists:slots,id',
        ]);

        // Creazione del nuovo corso
        $course = new Course();
        $course->location = $request->input('location');
        $course->year = $request->input('year');
        $course->activity_id = $request->input('activity_id');
        $course->slot_id = $request->input('slot_id');
        $course->save();

        return response()->json(['message' => 'Course created successfully'], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::with('activity', 'slot')->find($id);
        if (!$course) {
            return response(['status' => 'Not found'], 404); // torna sempre status 200
        }
        return ['data' => $course];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        if(Auth::user()->role !== "admin") abort(404);
        $request->validate([
            'location' => 'required|string',
            'year' => 'required|string',
            'activity_id' => 'required|exists:activities,id',
            'slot_id' => 'required|exists:slots,id',
        ]);

        // Modifica del corso
        $course = new Course();
        $course->location = $request->input('location');
        $course->year = $request->input('year');
        $course->activity_id = $request->input('activity_id');
        $course->slot_id = $request->input('slot_id');
        $course->update();

        return response()->json(['message' => 'Course edited successfully'], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
