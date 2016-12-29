<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function(Blueprint $table){
            $table->increments('id');
            $table->string('assignment');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('course_assignment', function(Blueprint $table){
            $table->integer('course_id')->unsigned();
            $table->integer('assignment_id')->unsigned();

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');

            $table->foreign('assignment_id')
                ->references('id')
                ->on('assignments')
                ->onDelete('cascade');

            $table->primary(['assignment_id','course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assignments');
        Schema::drop('course_assignment');
    }
}
