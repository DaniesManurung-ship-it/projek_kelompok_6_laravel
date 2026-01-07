<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'birth_date',
        'birth_place',
        'gender',
        'nik',
        'address',
        'university',
        'major',
        'study_period',
        'study_city',
        'description',
        'is_verified',
        'is_active'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_verified' => 'boolean',
        'is_active' => 'boolean'
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Get gender in Indonesian
    public function getGenderTextAttribute()
    {
        return [
            'male' => 'Laki-laki',
            'female' => 'Perempuan',
            'other' => 'Lainnya'
        ][$this->gender] ?? 'Laki-laki';
    }

    // Get status text
    public function getStatusTextAttribute()
    {
        if ($this->is_verified && $this->is_active) {
            return 'Aktif & Terverifikasi';
        } elseif ($this->is_active) {
            return 'Aktif';
        } else {
            return 'Tidak Aktif';
        }
    }

    // Get status badge color
    public function getStatusColorAttribute()
    {
        if ($this->is_verified && $this->is_active) {
            return 'success';
        } elseif ($this->is_active) {
            return 'primary';
        } else {
            return 'secondary';
        }
    }
}