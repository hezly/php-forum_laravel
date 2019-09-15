<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    protected $table= 'replies';

    protected $fillable = [
        'post_id', 'body', 
    ];

    public function post(){

    	return $this->belongsTo('App\Post');
    }
     public function user(){

    	return $this->belongsTo('App\User');
    }

}
