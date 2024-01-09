<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news'; // Specify the correct table name
    protected $primaryKey = 'id'; // Specify the correct primary key column name

    protected $fillable = ['Title', 'Cover_image', 'Content', 'Publishing_date'];

    public $timestamps = false;

}