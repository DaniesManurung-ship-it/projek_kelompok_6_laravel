<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'title',
        'description',
        'category',
        'penulis',
        'views',
        'featured',
        'publish_date'
    ];

    protected $casts = [
        'publish_date' => 'date',
        'featured' => 'boolean'
    ];

    // Scope untuk berita featured
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