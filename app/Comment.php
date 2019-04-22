<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use App\User;

class Comment extends Model
{
    protected $table = 'comments';

    public function new() {
    	return $this->belongsTo(News::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function replies() {
    	return $this->hasMany(Comment::class, 'parent_id');
    }
}
