<?php

namespace App\Models;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Courses extends Model
{
    use HasFactory, SoftDeletes;


        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'courses_title',
        'courses_description',
        'courses_image',
        'big_courses_image',
        'more_courses_title',
        'overview',
        'course_module',
        'software_taught',
        'duration',
        'prerequisites',
        'marketplace',
        'career_opportunity',
        'status'
    ];
}
