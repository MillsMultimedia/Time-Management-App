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
 
@section('header')
    <div class="pull-right" id="logout">
    	@if($is_admin)
	    	<a href="/admin" class="header_links" style="border-right:1px solid #ddd">User Accounts</a>
	    @endif
        <a href="/logout" class="text-right header_links">Log Out</a>
    </div>
@stop

@section('content')

	<h1>{{$user->business_name}}</h1>

	<table class="table table-striped">
		    <tr>
		        <th>Date</th>
		        <th>Description</th>
		        <th>Hours Used</th>
		        <th width="50px;"></th>
		        <th width="50px;"></th>
		    </tr>

		    
		    @foreach($tasks as $task)
		        <tr id="{{ $task->id }}">
		            <td>{{ date('F d, Y', strtotime($task->updated_at)) }}</td>
		            <td>{{ $task->description }}</td>
		            <td>{{ $task->hours_spent }}</td>
		            <?php $total_hours += $task->hours_spent ?>
		            @if($is_admin)
			            <td><button name="{{ $task->id }}" class="btn btn-warning edit_btn"><span title="Edit" class="glyphicon glyphicon-pencil"></span></button></td>
			            <td><button name="{{ $task->id }}" data-account="{{ $user->id }}" class="btn btn-danger delete_btn"><span title="Delete" class="glyphicon glyphicon-remove"></span></button></td>
		        	@else
			        	<td></td>
			        	<td></td>
		        	@endif

		        </tr>
		    @endforeach

		    @if($is_admin)
			    <tr class="edit_task">
			    	<form method='POST' action='/tasks/edit/{{ $user->id }}'>
		        		{!! csrf_field() !!}
				        <td><span class="cancel_btn">Cancel</span></td>
				        <td><input type="text" name="edit_desc" id="edit_desc" /></td>
				        <td><input type="text" name="edit_hrs" id="edit_hrs" /></td>
				        <td><button type="submit" class="btn btn-primary">+</button></td>
				        <td></td>
				        <input type="hidden" name="task_id" id="task_id"/>
				        <input type="hidden" name="account_id" value="{{ $user->id }}"/>
					</form>
			    </tr>

			    <tr class="add_new">
			    	<form method='POST' action='/tasks/{{ $user->id }}'>
		        		{!! csrf_field() !!}
				        <td><span class="cancel_btn">Cancel</span></td>
				        <td><input type="text" name="description" id="description" /></td>
				        <td><input type="text" name="hrs_used" id="hrs_used" /></td>
				        <td><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span></button></td>
				        <td></td>
				        <input type="hidden" name="account_id" value="{{ $user->id }}"/>
					</form>
			    </tr>
		    @endif

		</table>

	<div class="row">
		@if($is_admin)
			<p class="col-xs-12 text-right"><span id="add_update">Add New Task</span></p>
		@endif
	</div>



    @if($user->business_name != 'Admin')  
		<h3 class="col-xs-12 col-sm-6">Hours Used This Month: 
			{{ $total_hours }}
		</h3>

		<h3 class="col-xs-12 col-sm-6">Hours Remaining: 
			{{ $user->package_hours - $total_hours }}
		</h3>
		<hr class="col-xs-12">
	@endif
	

@stop
  


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop