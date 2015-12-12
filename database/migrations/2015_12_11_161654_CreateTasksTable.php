<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function(Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->string('description');
            $table->double('hours_spent', 6, 2);

            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}

