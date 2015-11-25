<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {

        # Make a Primary, Auto-Incrementing field.
        $table->increments('id');

        # This generates two columns: `created_at` and `updated_at` to
        # keep track of changes to a row
        $table->timestamps();

        # Business Name
        $table->string('name');
        
        #Max hours in package
        $table->integer('package_hours')->unsigned();
        
        #References id on updates table
        $table->integer('account_id')->unsigned();
        $table->foreign('account_id')->references('id')->on('updates');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}
