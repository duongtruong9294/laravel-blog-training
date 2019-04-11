<?php

namespace App;
use App\News;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = 'tags';

    public function news()
    {
        return $this->belongsToMany(News::class,'tag_new','tag_id','new_id');
    }
}
