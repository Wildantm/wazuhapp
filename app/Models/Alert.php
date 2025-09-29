<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'alert_id',
        'rule_id', 
        'level',
        'description',
        'agent_name',
        'timestamp',
        'data'
    ];

    protected $casts = [
        'data' => 'array',
        'timestamp' => 'datetime'
    ];
}