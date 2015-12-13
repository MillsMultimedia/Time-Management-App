@extends('layouts.master')


@section('title')
    
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')

@stop
 


@section('content')

	<h1>{{ $account->name }}</h1>

	<table class="table table-striped">
		    <tr>
		        <th>Date</th>
		        <th>Description</th>
		        <th>Hours Spent</th>
		        <th width="50px;"></th>
		        <th width="50px;"></th>
		    </tr>

		    
		    @if( $has_tasks )
			    @foreach($tasks as $task) 
			        <tr id="{{ $task->id }}">
			            <td>{{ date('F d, Y', strtotime($task->updated_at)) }}</td>
			            <td>{{ $task->description }}</td>
			            <td>{{ $task->hours_spent }}</td>
			            <td><button name="{{ $task->id }}" class="btn btn-warning edit_btn">Edit</button></td>
			            <td><button name="{{ $task->id }}" data-account="{{ $task->account_id }}" class="btn btn-danger delete_btn">Delete</button></td>
			        </tr>
			    @endforeach 

	    		    <tr class="edit_task">
				    	<form method='POST' action='/admin/edit'>
			        		{!! csrf_field() !!}
					        <td><span class="cancel_btn">Cancel</span></td>
					        <td><input type="text" name="edit_desc" id="edit_desc" /></td>
					        <td><input type="text" name="edit_hrs" id="edit_hrs" /></td>
					        <td><button type="submit" class="btn btn-primary">+</button></td>
					        <td></td>
					        <input type="hidden" name="account_id" value="{{ $task->account_id }}"/>
					        <input type="hidden" name="task_id" value="{{ $task->id }}"/>
						</form>
				    </tr>
			 @endif

		    <tr class="add_new">
		    	<form method='POST' action='/admin'>
	        		{!! csrf_field() !!}
			        <td>*******************</td>
			        <td><input type="text" name="description" id="description" /></td>
			        <td><input type="text" name="hrs_used" id="hrs_used" /></td>
			        <td><button type="submit" class="btn btn-primary">Add</button></td>
			        <td></td>
			        <input type="hidden" name="account_id" value="{{ $account->id }}"/>
				</form>
		    </tr>

		</table>



        

	<p id="add_update">Add New Update</p>

	<h3 class="col-xs-12 col-sm-6">Hours Used This Month: 
		@if( $has_tasks )
			{{ $total_hours[$tasks[0]->account->id] }}
		@else
			0
		@endif
	</h3>
	<h3 class="col-xs-12 col-sm-6">Hours Remaining: 
		@if( $has_tasks )
			{{ $package_hours - $total_hours[$tasks[0]->account->id] }}
		@else
			{{ $package_hours }}
		@endif
	</h3>

	<a href="/admin">Overview</a>
@stop
  


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop