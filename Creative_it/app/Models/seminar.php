<?php

namespace App\Models;

use App\Models\leed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class seminar extends Model
{
    use HasFactory,SoftDeletes;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'topic',
        'date',
        'time',
        'status'
    ];

    protected $guarded = ['$id'];

    public function leeds(){
        return $this->hasMany(leed::class);
    }
    
}
