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

    protected $fillable =[

        'title',
        'body',
        'category_id',
        'cover_image',
        'image1',
        'image2',
        'image3',
        'image4',
        'city',
        'trip_day',
        'trip_fee',
        'trip_type'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function comments(){

       return $this->hasMany('App\Comment');     

    }

    public function category(){

        return $this->belongsTo('App\Category', 'category_id');
    }
}
