<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'amenities' => 'array',
    ];

    protected $table = 'accommodations';

    public function amenitys()
    {
        return $this->hasMany(HomeStayAmenity::class);
    }
}
