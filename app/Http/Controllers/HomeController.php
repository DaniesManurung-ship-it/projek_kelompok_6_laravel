<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BeritaController;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function biodata()
    {
        return view('biodata');
    }

    public function gallery()
    {
        return view('gallery');
    }

 //   public function announcement()
//    {
 //       return view('pengumuman');
  //  }

    //public function program()
    //{
     //   return view('program');
   // }

    public function contact()
    {
        return view('contact');
    }

 //   public function news()
 //   {
   //     return view('berita.index');
  // }

    public function academic()
    {
        return view('akademik');
    }

 //   public function schedule()
  //  {
   //     return view('schedule');
   // }

    public function messages()
    {
        return view('messages');
    }

    public function documents()
    {
        return view('documents');
    }

 //   public function reports()
   // {
   //     return view('reports');
    //}
}