<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_ip',
        'email',
        'device_info',
    ];
}
