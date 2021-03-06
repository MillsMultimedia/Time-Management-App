@extends('layouts.master')

@section('content')

<div class='col-md-4 col-md-offset-4 col-sm-12 col-sm-offset-0'>

    <h1>Login</h1>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/login'>

        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='email'>Email</label>
            <input type='text' name='email' id='email' value='{{ old('email') }}'>
        </div>

        <div class='form-group'>
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' value='{{ old('password') }}'>
        </div>

        <div class='form-group'>
            <input type='checkbox' name='remember' id='remember'>
            <label for='remember' class='checkboxLabel'>Remember me</label>
        </div>

        <button type='submit' class='btn btn-primary'>Login</button>

    </form>

    <hr class="col-xs-12">

    <p>To see a sample client view use:<br>UN: <span style="color:#2e6da4;">metropolis@sample.com</span><br>PW: <span style="color:#2e6da4;">Superman1</span></p>
    <p>To see a sample admin view,<br>please contact <a href="http://www.millsmultimedia.net">Mills Multimedia</a>.

</div>

@stop