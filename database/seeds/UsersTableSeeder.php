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
        $user = \App\User::firstOrCreate(['email' => 'jeff@millsmultimedia.net']);
	    $user->name = 'Jeff Mills';
	    $user->business_name = 'Admin';
	    $user->package_hours = 0;
	    $user->email = 'jeff@millsmultimedia.net';
	    $user->password = \Hash::make('123456');
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
    }
}