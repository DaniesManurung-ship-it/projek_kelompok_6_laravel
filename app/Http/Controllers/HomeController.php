<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\News;
use App\Models\Program;
use App\Models\Schedule;
use App\Models\Report;
use App\Models\Message;



class HomeController extends Controller
{
    public function index()
    {
    $courses = Course::all();
    return view('home', compact('courses'));
    }

    public function about()
    {
    $news = News::latest()->take(3)->get();
    return view('about', compact('news'));
    }

    public function biodata()
    {
        return view('biodata');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function announcement()
    {
        return view('pengumuman');
    }

    public function program()
    {
    $programs = Program::orderBy('created_at', 'desc')->get();
    return view('program', compact('programs'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function news()
    {
        $news = News::latest()->get();
        return view('news', compact('news'));
    }

    public function academic()
    {
        return view('akademik');
    }

    public function schedule()
    {
        $schedules = Schedule::latest()->get();
        return view('schedules.schedule', compact('schedules'));
    }

    public function messages()
    {
        $messages = Message::latest()->get();
        return view('messages', compact('messages'));
    }

    public function documents()
    {
        return view('documents');
    }

    public function reports()
    {
    $reports = Report::orderBy('report_date','desc')->get(); 
    return view('reports', compact('reports')); 
    }
}