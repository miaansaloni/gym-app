<?php

namespace App\Http\Controllers\Api;

use App\Models\Activity;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::with('courses', 'courses.slot')->get();
        return $activities;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        // Your code for storing a new activity
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activity = Activity::with('courses', 'courses.slot')->find($id);
        if (!$activity) {
            return response(['message' => 'Not found'], 404);
        }
        return ['data' => $activity];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        // Your code for updating an existing activity
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        // Your code for deleting an activity
    }
}
