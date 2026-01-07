<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('courses.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'instructor' => 'required',
            'category' => 'required',
        ]);

        Course::create($request->all());

        return back()->with('success', 'Course berhasil ditambahkan');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('success', 'Course dihapus');
    }
}

