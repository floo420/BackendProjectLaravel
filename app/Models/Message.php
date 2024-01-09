<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        // You can create an Admin model or use the User model with is_admin = 1
        return $this->belongsTo(User::class)->where('is_admin', 1);
    }
}
