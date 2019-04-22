<?php

namespace App;
use App\Tag;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class News extends Model
{
    use Rateable;

    protected $table = 'news';

    public function tags() {
        return $this->belongsToMany(Tag::class,'tag_new','new_id','tag_id');
    }

    public function categories() {
    	return $this->belongsTo('App\Category','category_id');
    }

    public function users() {
    	return $this->belongsTo('App\User','user_id');
    }

    // public function scopePublished($query)
    // {
    //     return $query->where('status', true);
    // }

    // public function scopeUnpublished($query)
    // {
    //     return $query->where('status', false);
    // }

    public function comments() {
        return $this->hasMany('App\Comment','new_id');
    }
}
