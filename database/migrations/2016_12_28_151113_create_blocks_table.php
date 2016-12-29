<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function(Blueprint $table){
            $table->increments('id');
            $table->string('block');
            $table->string('description');
            $table->longText('html');
            $table->timestamps();
        });

        Schema::create('assignment_block', function(Blueprint $table){
            $table->integer('block_id')->unsigned();
            $table->integer('assignment_id')->unsigned();

            $table->foreign('block_id')
                ->references('id')
                ->on('blocks')
                ->onDelete('cascade');

            $table->foreign('assignment_id')
                ->references('id')
                ->on('assignments')
                ->onDelete('cascade');

            $table->primary(['assignment_id','block_id']);
        });

        Schema::create('project_block', function(Blueprint $table){
            $table->integer('block_id')->unsigned();
            $table->integer('project_id')->unsigned();

            $table->foreign('block_id')
                ->references('id')
                ->on('blocks')
                ->onDelete('cascade');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');

            $table->primary(['project_id','block_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blocks');
        Schema::drop('assignment_block');
        Schema::drop('project_block');
    }
}
