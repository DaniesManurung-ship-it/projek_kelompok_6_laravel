<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'duration',
        'level',
        'seats_status',
        'start_date',
        'featured'
    ];

    protected $casts = [
        'start_date' => 'date',
        'featured' => 'boolean'
    ];

    // Scope untuk program featured
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    // Scope untuk kategori tertentu
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}