<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::latest()->get();
        $categories = Program::distinct()->pluck('category');
        
        return view('program', compact('programs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
            'duration' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'seats_status' => 'required|string|max:50',
            'start_date' => 'required|date',
            'featured' => 'boolean'
        ]);

        Program::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'duration' => $request->duration,
            'level' => $request->level,
            'seats_status' => $request->seats_status,
            'start_date' => $request->start_date,
            'featured' => $request->has('featured')
        ]);

        return redirect()->route('program.index')
            ->with('success', 'Program berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:50',
            'duration' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'seats_status' => 'required|string|max:50',
            'start_date' => 'required|date',
            'featured' => 'boolean'
        ]);

        $program = Program::findOrFail($id);
        $program->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'duration' => $request->duration,
            'level' => $request->level,
            'seats_status' => $request->seats_status,
            'start_date' => $request->start_date,
            'featured' => $request->has('featured')
        ]);

        return redirect()->route('program.index')
            ->with('success', 'Program berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('program.index')
            ->with('success', 'Program berhasil dihapus!');
    }
}