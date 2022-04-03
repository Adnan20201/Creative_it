<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('courses_title');
            $table->string('courses_description');
            $table->string('courses_image');
            $table->string('big_courses_image');
            $table->string('more_courses_title');
            $table->longText('overview');
            $table->longText('course_module');
            $table->longText('software_taught');
            $table->longText('duration');
            $table->longText('prerequisites');
            $table->longText('marketplace');
            $table->longText('career_opportunity');
            $table->string('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
