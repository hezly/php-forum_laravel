<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $table ='post';
    protected $fillable = [
        'category_id','title','body','keywords',
    ];

    public function user(){

    	return $this->belongsTo('App\User');
    }
    public function replies(){

    	return $this->hasMany('App\reply');
    }

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
