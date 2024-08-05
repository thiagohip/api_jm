<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
    ];

    public function userStacks() {
        return $this->hasMany('App\Models\StackUser', 'stack_id');
    }
}
