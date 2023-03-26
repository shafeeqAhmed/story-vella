<?php

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
if (!function_exists('isLiked')) {
    function isLiked($storyId)
    {
       return Like::where('story_id',$storyId)->where('user_id', Auth::id())->exists();
    }
}

if (!function_exists('totalLikes')) {
    function totalLikes($storyId)
    {
       return Like::where('story_id',$storyId)->count();
    }
}
