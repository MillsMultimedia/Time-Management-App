<?php

use Illuminate\Database\Seeder;

class TaskUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # First, create an array of all the users we want to associate tags with
        $users =[
            'FRESH 15K' => [3, 4],
            'The Brand Mentors' => [5, 6],
            'BBB San Francisco' => [1, 2],
            'Admin' => [1, 2, 3, 4, 5, 6]
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach($users as $user => $tasks) {

            # First get the user
            $user = \App\User::where('business_name','LIKE',$user)->first();

            # Now loop through each task for this user, adding the pivot
            foreach($tasks as $task_id) {
                $task = \App\Task::where('id','=',$task_id)->first();
                
                $user->tasks()->save($task);
            }

        }
    }  
}
