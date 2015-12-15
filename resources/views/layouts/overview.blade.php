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
        <a href="/logout" class="text-right header_links">Log Out</a>
    </div>
@stop

@section('content')
<h1>Overview</h1>

<table class="table table-striped" id="overview_table">
    <tr>
        <th>Business Name</th>
        <th>Package Hours</th>
        <th>Contact Name</th>
        <th>Contact Email</th>
        <th width="50px;"></th>
        <th width="50px;"></th>
    </tr>

    @foreach($accounts as $account) 
        @if( $account->id != 1) <!-- Skip the admin account -->
            <tr id="{{ $account->id }}">
                <td><a href="/tasks/{{ $account->id }}">{{ $account->business_name }}</a></td>
                <td>{{ $account->package_hours }}</td>
                <td>{{ $account->name }}</td>
                <td><a href="mailto:{{ $account->email }}">{{ $account->email }}</a></td>
                <td><button name="{{$account->id}}" class="btn btn-warning edit_acct"><span title="Edit" class="glyphicon glyphicon-pencil"></span></button>
                <td><button name="{{$account->id}}" class="btn btn-danger delete_acct"><span title="Delete" class="glyphicon glyphicon-remove"></span></button>
            </tr>
        @endif
    @endforeach 

    <tr class="edit_account">
        <form method='POST' action='/admin/edit'>
            {!! csrf_field() !!}
            <td><input type="text" name="edit_name" id="edit_name"/></td>
            <td>
                <select name='edit_package' id='edit_package'>
                    <option>--select package--</option>
                    <option value="10">Package 1: 10hrs</option>
                    <option value="15">Package 2: 15hrs</option>
                    <option value="20">Package 3: 20hrs</option>
                </select>
            </td>
            <td><input type="text" name="edit_contact" id="edit_contact"/></td>
            <td><input type="text" name="edit_email" id="edit_email"/></td>
            <td><span class="cancel_btn">Cancel</span></td>
            <td><button type="submit" id="edit_submit" class="btn btn-primary">+</button></td>
            <input type="hidden" id="user_id" name="user_id"/>
        </form>
    </tr>

</table>

<hr class="col-xs-12">

@stop
  


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop