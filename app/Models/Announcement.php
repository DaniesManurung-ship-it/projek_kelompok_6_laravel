<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'type',
        'publish_date',
        'important',
        'views'
    ];

    protected $casts = [
        'publish_date' => 'date',
        'important' => 'boolean'
    ];
}