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
            $table->increments('id');
            $table->string('course');
            $table->string('description');
            $table->boolean('completed')->default(false);
            $table->float('grade')->nullable();
            $table->timestamps();
        });

        Schema::create('period_course', function (Blueprint $table) 
        {
            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')
                ->references('id')
                ->on('periods')
                ->onDelete('cascade');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');

            $table->primary(['period_id','course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
        Schema::drop('period_course');
    }
}
