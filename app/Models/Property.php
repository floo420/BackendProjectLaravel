<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'condo_picture',
        'condo_title',
        'bedrooms',
        'bathrooms',
        'max_occupancy',
        'price',
        'location',
    ];
}
