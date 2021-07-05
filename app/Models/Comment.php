<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'review-id',
        'account-id',
        'content',
        'comment-parent-id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'account-id', 'id');
    }

    public function review()
    {
        return $this->belongsTo(Review::class, 'review-id', 'id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment-parent-id', 'id');
    }
}
