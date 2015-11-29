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
	    </tr>

	    @foreach($updates as $update) 
	        <tr>
	            <td>{{ date('F d, Y', strtotime($update->updated_at)) }}</td>
	            <td>{{ $update->description }}</td>
	            <td>{{ $update->hours_spent }}</td>
	            <td><button name="{{ $update->account_id }}" class="btn btn-danger delete_btn">X</button>
	        </tr>
	    @endforeach 

	    <tr class="add_new">
	        <td>*******************</td>
	        <td><input type="text" name="description" id="description" value="description"/></td>
	        <td><input type="text" name="hrs_used" id="hrs_used" value="0"/></td>
	        <td><button id="add_submit" class="btn btn-primary">Add</button></td>
	    </tr>

	</table>

	<p id="add_update">Add New Update</p>

	<h3 class="col-xs-12 col-sm-6">Hours Used This Month: 0.00</h3>
	<h3 class="col-xs-12 col-sm-6">Hours Remaining: 0.00</h3>

	<a href="/admin">Overview</a>
@stop
  


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop