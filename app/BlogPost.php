<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public static $rules = [
        'title' => 'required|max:100',
        'excerpt' => 'required|min:40|max:65535',
        'content_html' => 'required|min:40|max:4294967295'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'excerpt',
        'content_html',
        'post_image',
        'user_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOrderByRecent(Builder $query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
