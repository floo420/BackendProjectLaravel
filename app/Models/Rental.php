<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rentals';

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'property_id',
        'user_id',
        'user_email', 
    ];

  
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
