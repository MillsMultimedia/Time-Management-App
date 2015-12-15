<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::firstOrCreate(['email' => 'admin@admin.com']);
	    $user->name = 'Jeff';
	    $user->business_name = 'Admin';
	    $user->package_hours = 0;
	    $user->email = 'admin@admin.com';
	    $user->password = \Hash::make('helloworld');
	    $user->save();

        $user = \App\User::firstOrCreate(['email' => 'jill@harvard.edu']);
	    $user->name = 'Jill';
	    $user->business_name = 'FRESH 15K';
	    $user->package_hours = 20;
	    $user->email = 'jill@harvard.edu';
	    $user->password = \Hash::make('helloworld');
	    $user->save();

	    $user = \App\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
	    $user->name = 'Jamal';
	    $user->business_name = 'The Brand Mentors';
	    $user->package_hours = 15;
	    $user->email = 'jamal@harvard.edu';
	    $user->password = \Hash::make('helloworld');
	    $user->save();

	    $user = \App\User::firstOrCreate(['email' => 'sample@sample.com']);
	    $user->name = 'Celest';
	    $user->business_name = 'BBB San Francisco';
	    $user->package_hours = 10;
	    $user->email = 'sample@sample.com';
	    $user->password = \Hash::make('helloworld');
	    $user->save();
    }
}