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

<table class="table table-striped">
    <tr>
        <th>Business Name</th>
        <th>Usage</th>
        <th>Remaining</th>
        <th>Package Hours</th>
    </tr>

    @foreach($accounts as $account) 
        <tr>
            <td><a href="/admin/{{$account->id}}">{{ $account->name }}</a></td>
            <td>USAGE</td>
            <td>REMAIN</td>
            <td>{{ $account->package_hours }}</td>
        </tr>
    @endforeach 
</table>

<h3 class="col-xs-12 col-sm-6">Total Hours This Month: 0.00</h3>
<button class="btn btn-primary pull-right">Reset All</button>
@stop
  


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop