<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
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
        return $this
        ->belongsToMany('App\Post')
        ->whereNull('post_tag.deleted_at') // Table `post_tag` has column `deleted_at`
        ->withTimestamps(); 
    }
    
    public function posts_count()
    {
        return $this->belongsToMany('App\Post')->selectRaw('category_id, count(*) as count')->groupBy('category_id');
    }
}
