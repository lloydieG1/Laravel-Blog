<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'image_url' => 'string',
    // ];

    protected $fillable = [
        'body',
        'image_url'
    ];

    protected $attributes = [
        'title' => 'Untitled',
        'body' => '',
        'likes' => 0,
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

}
