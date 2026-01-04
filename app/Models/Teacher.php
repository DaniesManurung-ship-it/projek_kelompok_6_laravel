<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Tambahkan baris di bawah ini:
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'pob',
        'address',
        'photo'
    ];
}