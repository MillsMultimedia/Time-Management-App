<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updates', function (Blueprint $table) {

        # Make a Primary, Auto-Incrementing field.
        $table->increments('id');

        # This generates two columns: `created_at` and `updated_at` to
        # keep track of changes to a row
        $table->timestamps();

        # Update description text
        $table->text('description');
        
        # Time spent on update
                # 6 digits in total, 2 after decimal
        $table->decimal('time_spent', 6, 2);
        
        # Foreign key to accounts table
       $table->foreign('account_id')->references('id')->on('accounts');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('updates');
    }
}
