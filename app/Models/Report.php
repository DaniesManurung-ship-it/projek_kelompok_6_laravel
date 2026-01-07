<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'status',
        'format',
        'report_date',
        'generated_date',
        'generated_by',
        'file_path'
    ];

    protected $casts = [
        'report_date' => 'date',
        'generated_date' => 'date'
    ];

    // Scope untuk tipe tertentu
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Scope untuk status tertentu
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk laporan terbaru
    public function scopeRecent($query, $limit = 10)
    {
        return $query->latest()->limit($limit);
    }
}