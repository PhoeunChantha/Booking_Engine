<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestManagement extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'guest_managements';
}
