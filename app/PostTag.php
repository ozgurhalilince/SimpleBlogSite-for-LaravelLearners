<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTag extends Model
{
    use SoftDeletes;

    protected $table = "post_tag";

     protected $fillable = ['post_id', 'tag_id'];
}
