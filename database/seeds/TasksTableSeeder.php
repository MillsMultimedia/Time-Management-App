<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account_id = \App\Account::where('name', '=', 'BBB San Francisco')->pluck('id');
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Added photo to About Us page',
            'hours_spent' => .25,
            'account_id' => $account_id,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Added page for contact information',
            'hours_spent' => 1.0,
            'account_id' => $account_id,
        ]);

        $account_id = \App\Account::where('name', '=', 'FRESH 15K')->pluck('id');
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Added logos to sponsor page',
            'hours_spent' => .5,
            'account_id' => $account_id,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Updated course maps',
            'hours_spent' => 1.25,
            'account_id' => $account_id,
        ]);

        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Registration form: build and testing',
            'hours_spent' => 4.75,
            'account_id' => $account_id,
        ]);

        $account_id = \App\Account::where('name', '=', 'The Brand Mentors')->pluck('id');
        DB::table('tasks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'Updated servers with sudo user for added security',
            'hours_spent' => .75,
            'account_id' => $account_id,
        ]);
    }
}
