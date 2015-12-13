<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
        \View::composer('*', function($view) {

            $accounts = \App\Account::with('task')->get();


            //compile the number of hours used by each client
            $total_hours = array();
            $hours = 0;

            foreach ($accounts as $account)
            {
                foreach ($account->task as $task)
                {
                    $hours += $task->hours_spent;
                }

                $total_hours[ $account->id ] = $hours;

            }

            //check if user is admin
            // if ( USER ID == 0)
            //     $admin = true;
            // else
                $admin = true;

            //send account hourly usage and admin boolean to all views
            $view->with('total_hours', $total_hours)->with('admin', $admin);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
