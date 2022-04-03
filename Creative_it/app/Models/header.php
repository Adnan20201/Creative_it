<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class header extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'notice',
        'notice_title',
        'logo',
        'status'
    ];
}
