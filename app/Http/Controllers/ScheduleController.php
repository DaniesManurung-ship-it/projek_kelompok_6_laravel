<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
{
    $schedules = Schedule::latest()->get();
    return view('schedules.schedule', compact('schedules'));
}   


    public function store(Request $request)
    {
        $request->validate([
            'subject'    => 'required',
            'class'      => 'required',
            'room'       => 'required',
            'teacher'    => 'required',
            'start_time' => 'required',
            'end_time'   => 'required',
            'date'       => 'required|date',
        ]);

        Schedule::create($request->all());

        return back()->with('success', 'Schedule berhasil ditambahkan');
    }

    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update($request->all());
        return back()->with('success', 'Schedule diperbarui');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return back()->with('success', 'Schedule dihapus');
    }
}