<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StackUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stack_id',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function stack() {
        return $this->belongsTo('App\Models\Stack');
    }
}

