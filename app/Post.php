<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'category_id', 'slug', 'user_id', 'view_count'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
         return $this
        ->belongsToMany('App\Tag')
        ->whereNull('post_tag.deleted_at') // Table `post_tag` has column `deleted_at`
        ->withTimestamps(); 
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function photos()
    {
        return $this->belongsToMany('App\Photo');
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }
    public function post_tags()
    {
        return $this->hasMany('App\PostTag');
    }
}
