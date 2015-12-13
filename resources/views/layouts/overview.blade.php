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
        <th width="50px;"></th>
    </tr>

    @foreach($accounts as $account) 
        <tr id="{{ $account->id }}">
            <td><a href="/admin/{{$account->id}}">{{ $account->name }}</a></td>
            <td>{{ $account->package_hours }}</td>
            <td>{{ $total_hours[$account->id] }}</td>
            <td>{{ $account->package_hours - $total_hours[$account->id] }}</td>
            <td><button name="{{$account->id}}" class="btn btn-warning edit_acct">edit</button>
            <td><button name="{{$account->id}}" class="btn btn-danger delete_acct">delete</button>
        </tr>
    @endforeach 

    <tr class="add_new">
        <form method='POST' action='/admin/add_account'>
            {!! csrf_field() !!}
            <td><input type="text" name="name" id="name" value="name"/></td>
            <td>
                <select name='package_hours' id='package_hours'>
                    <option>--select package--</option>
                    <option value="10">Package 1: 10hrs</option>
                    <option value="15">Package 2: 15hrs</option>
                    <option value="20">Package 3: 20hrs</option>
                </select>
            </td>
            <td><span class="cancel_btn">Cancel</span></td>
            <td></td>
            <td></td>
            <td><button type="submit" id="add_submit" class="btn btn-primary">Add</button></td>
        </form>
    </tr>

    <tr class="edit_account">
        <form method='POST' action='/admin/edit_account'>
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
            <td><span class="cancel_btn">Cancel</span></td>
            <td></td>
            <td></td>
            <td><button type="submit" id="edit_submit" class="btn btn-primary">+</button></td>
        </form>
    </tr>

</table>

<p id="add_account">Add New Account</p>

<button class="btn btn-primary pull-right">Reset All</button>
@stop
  


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop