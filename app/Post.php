<?php

namespace blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = "idpost";
    
    public $timestamps = true;
    protected $fillable = [
       'title',
       'description',
       'userid',
       'status' 
    ];

      protected $guarded = [

    ];
}
