<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // table name
    protected $table = 'posts';
    //primary key
    protected $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function comments(){

       return $this->hasMany('App\Comment');     

    }
}
