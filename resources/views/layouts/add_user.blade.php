@extends('layouts.master')

@section('content')

<div class='col-md-4 col-md-offset-4 col-sm-12 col-sm-offset-0'>
    
    @if($admin)
    
        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <h1>Register User</h1>

        <form method='POST' action='/add_account'>
            {!! csrf_field() !!}

            <div class='form-group'>
                <label for='name'>Name</label><br>
                <input type='text' name='name' id='name' value='{{ old('name') }}'>
            </div>

            <div class='form-group'>
                <label for='email'>Email</label><br>
                <input type='text' name='email' id='email' value='{{ old('email') }}'>
            </div>

            <div class='form-group'>
                <label for='password'>Password</label><br>
                <input type='password' name='password' id='password'>
            </div>

            <div class='form-group'>
                <label for='password_confirmation'>Confirm Password</label><br>
                <input type='password' name='password_confirmation' id='password_confirmation'>
            </div>

            <div class='form-group'>
                <label for='associated_account'>Associated Account</label><br>
                <input type='text' name='associated_account' id='associated_account'>
            </div>

            <button type='submit' class='btn btn-primary'>Register</button>

        </form>

    @else
        <h3 class='text-center'>Sorry, it appears you have reached an unauthorized page.</h3>

        <p class='text-center'>Please <a href='/login'>log in</a> or return to the <a href='/'>homepage</a>.</p>

    @endif

</div>

@stop