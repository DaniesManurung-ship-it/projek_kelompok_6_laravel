<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollController extends Controller
{
    public function enroll(Course $course)
    {
        $user = Auth::user();

        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('info', 'Anda sudah terdaftar di course ini');
        }

        $user->courses()->attach($course->id, [
            'progress' => 0
        ]);

        return back()->with('success', 'Berhasil enroll course');
    }
}
