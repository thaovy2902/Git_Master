<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content1',
        'content2',
        'content3',
        'status-public',
        'account-id',
        'category_review_id',
    ];
    public function images()
    {
        return $this->hasMany(Image::class, 'object-id', 'id');
    }
    public function category_review()
    {
        return $this->belongsTo(Category_review::class, 'id', 'id');
    }
}
