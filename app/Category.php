<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug'];

    protected $dates = ['created_at', 'updated_at'];

    public function scopeSlug($query, $slug)
    {
    	return $query->where('slug', '=', $slug);
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function posts_count()
    {
        return $this->hasMany('App\Post')->selectRaw('category_id, count(*) as count')->groupBy('category_id');
    }
}
