<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_name');
            $table->string('type');
            $table->string('image_extension', 10);
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('picture_assignment', function (Blueprint $table) {
            $table->integer('picture_id')->unsigned();
            $table->integer('assignment_id')->unsigned();

            $table->foreign('assignment_id')
                ->references('id')
                ->on('assignments')
                ->onDelete('cascade');

            $table->foreign('picture_id')
                ->references('id')
                ->on('pictures')
                ->onDelete('cascade');

            $table->primary(['picture_id','assignment_id']);
        });

        Schema::create('picture_course', function (Blueprint $table) {
            $table->integer('picture_id')->unsigned();
            $table->integer('course_id')->unsigned();

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');

            $table->foreign('picture_id')
                ->references('id')
                ->on('pictures')
                ->onDelete('cascade');

            $table->primary(['picture_id','course_id']);
        });

        Schema::create('picture_block', function (Blueprint $table) {
            $table->integer('picture_id')->unsigned();
            $table->integer('block_id')->unsigned();

            $table->foreign('block_id')
                ->references('id')
                ->on('blocks')
                ->onDelete('cascade');

            $table->foreign('picture_id')
                ->references('id')
                ->on('pictures')
                ->onDelete('cascade');

            $table->primary(['picture_id','block_id']);
        });

        Schema::create('picture_project', function (Blueprint $table) {
            $table->integer('picture_id')->unsigned();
            $table->integer('project_id')->unsigned();

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');

            $table->foreign('picture_id')
                ->references('id')
                ->on('pictures')
                ->onDelete('cascade');

            $table->primary(['picture_id','project_id']);
        });

        Schema::create('picture_period', function (Blueprint $table) {
            $table->integer('picture_id')->unsigned();
            $table->integer('period_id')->unsigned();

            $table->foreign('period_id')
                ->references('id')
                ->on('periods')
                ->onDelete('cascade');

            $table->foreign('picture_id')
                ->references('id')
                ->on('pictures')
                ->onDelete('cascade');

            $table->primary(['picture_id','period_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pictures');
        Schema::drop('picture_assignment');
        Schema::drop('picture_block');
        Schema::drop('picture_project');
        Schema::drop('picture_period');
        Schema::drop('picture_course');
    }
}
