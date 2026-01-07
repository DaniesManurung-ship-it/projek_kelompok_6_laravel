<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Tambahkan kolom yang kamu pakai di Controller & UI ke sini
    protected $fillable = [
        'sender_name', 
        'sender_role', 
        'sender_initials', 
        'subject', 
        'body', 
        'is_read', 
        'label'
    ];
}