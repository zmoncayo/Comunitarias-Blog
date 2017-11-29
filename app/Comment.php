<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = "idcomment";
    
    public $timestamps = true;
    protected $fillable = [
       'body',
       'postid',
       'userid',
       'status' 
    ];

      protected $guarded = [

    ];
}
