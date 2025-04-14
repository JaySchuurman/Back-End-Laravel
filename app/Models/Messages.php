<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'message',
    ];
}
