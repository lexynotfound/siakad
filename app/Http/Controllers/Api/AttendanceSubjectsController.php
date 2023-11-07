<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendenceSubjects;
use Illuminate\Http\Request;

class AttendanceSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //get user
        $user = $request->user();
        //get khs by userid pagenate 10 data
        // sort by id desc
        $attendanceSubjects = AttendenceSubjects::where('student_id', '=', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return $attendanceSubjects;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menyimpan dana absesi menggunakan qrcode
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
           /*  'student_id' => 'required|exists:users,id', */
            'attendance_code' => 'required',
            'academic_year' => 'required',
            'semester' => 'required',
            'pertemuan' => 'required',
            /* 'status' => 'required', */
            'latitued' => 'required',
            'longitude' => 'required',
        ]);

        $attendanceSubjects = AttendenceSubjects::create($request->all());
        return $attendanceSubjects;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
