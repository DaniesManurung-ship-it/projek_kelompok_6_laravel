<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::latest()->get();
        $todaySchedules = Schedule::today()->get();
        $types = Schedule::distinct()->pluck('type');
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        
        return view('schedule.index', compact('schedules', 'todaySchedules', 'types', 'days'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $types = ['Class', 'Exam', 'Event', 'Meeting'];
        $statuses = ['In Progress', 'Upcoming', 'Completed', 'Cancelled', 'Scheduled'];
        
        return view('schedule.create', compact('days', 'types', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'class_name' => 'required|string|max:100',
            'teacher' => 'required|string|max:100',
            'room' => 'required|string|max:50',
            'day' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'type' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'description' => 'nullable|string'
        ]);

        Schedule::create([
            'title' => $request->title,
            'class_name' => $request->class_name,
            'teacher' => $request->teacher,
            'room' => $request->room,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'type' => $request->type,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('schedule.index')
            ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $types = ['Class', 'Exam', 'Event', 'Meeting'];
        $statuses = ['In Progress', 'Upcoming', 'Completed', 'Cancelled', 'Scheduled'];
        
        return view('schedule.edit', compact('schedule', 'days', 'types', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'class_name' => 'required|string|max:100',
            'teacher' => 'required|string|max:100',
            'room' => 'required|string|max:50',
            'day' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'type' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'description' => 'nullable|string'
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            'title' => $request->title,
            'class_name' => $request->class_name,
            'teacher' => $request->teacher,
            'room' => $request->room,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'type' => $request->type,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('schedule.index')
            ->with('success', 'Jadwal berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index')
            ->with('success', 'Jadwal berhasil dihapus!');
    }
}