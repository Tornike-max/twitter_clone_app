<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $with = ['user', 'comments.user'];
    protected $withCount = ['likes'];
    protected $fillable = ['content', 'user_id', 'like'];
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function liked(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function scopeSearch($query, $search = '')
    {
        $query->where('content', 'like', '%' . $search . '%');
    }
}
