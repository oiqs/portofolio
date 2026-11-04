<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'message',
        'avatar',
        'ip_address',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];
}
