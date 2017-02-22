<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
    'user_name', 'user_email', 'user_site', 'content', 'approval_status', 'post_id'
    ];
   
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function isApproved()
    {
    	return $this->approval_status == 1;
    }
}
