<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function categories() {
    	return $this->belongsTo('App\Category','category_id');
    }

    public function users() {
    	return $this->belongsTo('App\User','user_id');
    }
}
