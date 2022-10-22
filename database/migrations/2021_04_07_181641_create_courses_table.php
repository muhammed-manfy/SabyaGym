<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('image');
            $table->softDeletes();
            $table->date('published_at');
            $table->date('ended_at');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('sport_type');
            $table->string('subscribe_type')->default('monthly');
            $table->double('subscribe_cost');
            $table->integer('coach_id');
            $table->timestamps();
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
