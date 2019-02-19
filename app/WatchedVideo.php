<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchedVideo extends Model
{
    protected $fillable = [
        'video_id', 'image_url', 'title', 'user_id'
    ];
}
