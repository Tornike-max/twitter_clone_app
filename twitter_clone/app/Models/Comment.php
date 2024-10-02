<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'idea_id'
    ];
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
