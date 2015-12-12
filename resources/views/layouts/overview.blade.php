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
<h1>Overview</h1>

<table class="table table-striped" id="overview_table">
    <tr>
        <th>Business Name</th>
        <th>Package Hours</th>
        <th>Usage</th>
        <th>Remaining</th>
        <th width="50px;"></th>
    </tr>

    @foreach($accounts as $account) 
        <tr>
            <td><a href="/admin/{{$account->id}}">{{ $account->name }}</a></td>
            <td>{{ $account->package_hours }}</td>
            <td>{{ $total_hours[$account->id] }}</td>
            <td>{{ $account->package_hours - $total_hours[$account->id] }}</td>
            <td><button name="{{$account->id}}" class="btn btn-danger delete_btn">X</button>
        </tr>
    @endforeach 

    <tr class="add_new">
        <td><input type="text" name="name" id="name" value="name"/></td>
        <td><input type="text" name="pkg_hours" id="pkg_hours" value="package hours"/></td>
        <td><input type="text" name="hrs_used" id="hrs_used" value="0"/></td>
        <td></td>
        <td><button id="add_submit" class="btn btn-primary">Add</button></td>
    </tr>

</table>

<a href="/add_account">Add New Account</a>

<h3 class="col-xs-12 col-sm-6">Total Hours This Month: 0.00</h3>
<!--<button class="btn btn-primary pull-right">Reset All</button>-->
@stop
  


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop