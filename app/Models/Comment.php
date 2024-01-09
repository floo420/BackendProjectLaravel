<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'news_id',
        'comment_text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Assuming you have a User model
    }

    public function news()
    {
        return $this->belongsTo(News::class); // Assuming you have a News model
    }
}
