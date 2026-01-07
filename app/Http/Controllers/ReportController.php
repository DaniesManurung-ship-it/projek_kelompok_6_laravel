<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Tampilkan halaman reports
    public function index()
    {
        $reports = Report::orderBy('report_date','desc')->get();
        return view('reports', compact('reports'));
    }

    // Simpan report baru
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|string|max:50',
            'report_date' => 'required|date',
        ]);

        Report::create([
            'title'       => $request->title,
            'type'        => $request->type,
            'report_date' => $request->report_date,
            'status'      => $request->status ?? 'Pending',
        ]);

        return redirect()->back()->with('success', 'Report berhasil dibuat!');
    }

    // Delete report
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back()->with('success', 'Report berhasil dihapus!');
    }

    // Optional Edit & Update
    public function edit(Report $report)
    {
        return view('reports_edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|string|max:50',
            'report_date' => 'required|date',
            'status'      => 'required|in:Pending,Published',
        ]);

        $report->update($request->all());

        return redirect()->route('reports.index')->with('success', 'Report berhasil diperbarui!');
    }
}
