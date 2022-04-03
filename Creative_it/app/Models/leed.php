<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leed extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'number',
        'address',
        'status'
    ];



    protected $guarded = ['$id'];


    public function seminar(){
      return  $this->belongsTo(Seminar::class);
    }
}
