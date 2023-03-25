<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'password'];
    public function likes() {
        return $this->hasMany(Like::class, 'story_id','id');
    }
}
