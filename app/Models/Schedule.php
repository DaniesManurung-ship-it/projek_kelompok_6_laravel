<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'class_name',
        'teacher',
        'room',
        'day',
        'start_time',
        'end_time',
        'type',
        'status',
        'description'
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i'
    ];

    // Scope untuk hari tertentu
    public function scopeByDay($query, $day)
    {
        return $query->where('day', $day);
    }

    // Scope untuk type tertentu
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Scope untuk status tertentu
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope untuk jadwal hari ini
    public function scopeToday($query)
    {
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $today = $days[date('w')];
        return $query->where('day', $today);
    }
}