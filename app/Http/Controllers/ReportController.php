<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::latest()->get();
        $publishedCount = Report::where('status', 'Published')->count();
        $pendingCount = Report::where('status', 'Pending')->count();
        $academicCount = Report::where('type', 'Academic')->count();
        
        return view('report.index', compact('reports', 'publishedCount', 'pendingCount', 'academicCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = ['Academic', 'Attendance', 'Financial', 'Staff', 'Other'];
        $statuses = ['Published', 'Pending', 'Draft'];
        $formats = ['PDF', 'Excel', 'Word', 'CSV'];
        
        return view('report.create', compact('types', 'statuses', 'formats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'format' => 'required|string|max:50',
            'report_date' => 'required|date',
            'generated_by' => 'nullable|string|max:100',
            'file_path' => 'nullable|string|max:500'
        ]);

        Report::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
            'format' => $request->format,
            'report_date' => $request->report_date,
            'generated_date' => now(),
            'generated_by' => $request->generated_by ?? auth()->user()->name ?? 'System',
            'file_path' => $request->file_path
        ]);

        return redirect()->route('report.index')
            ->with('success', 'Laporan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        $types = ['Academic', 'Attendance', 'Financial', 'Staff', 'Other'];
        $statuses = ['Published', 'Pending', 'Draft'];
        $formats = ['PDF', 'Excel', 'Word', 'CSV'];
        
        return view('report.edit', compact('report', 'types', 'statuses', 'formats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'format' => 'required|string|max:50',
            'report_date' => 'required|date',
            'generated_by' => 'nullable|string|max:100',
            'file_path' => 'nullable|string|max:500'
        ]);

        $report = Report::findOrFail($id);
        $report->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
            'format' => $request->format,
            'report_date' => $request->report_date,
            'generated_by' => $request->generated_by ?? $report->generated_by,
            'file_path' => $request->file_path
        ]);

        return redirect()->route('report.index')
            ->with('success', 'Laporan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('report.index')
            ->with('success', 'Laporan berhasil dihapus!');
    }
}