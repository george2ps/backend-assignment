<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevLog extends Model
{
    use HasFactory;

    protected $table = 'dev_logs';

    protected $fillable = [
        'request',
        'status',
        'message'
    ];
}
