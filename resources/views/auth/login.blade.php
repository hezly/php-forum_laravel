@extends('layouts.app')

@section('content')
@include('layouts.partial.formerrors')
<div class="module-head">
    <h3>Log In</h3>
</div>

<div class="module-body">
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="control-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <label for="email" class="control-label">E-Mail Address</label>
            <div class="controls">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            </div>

        </div>

         

        <div class="control-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Password</label>
            <div class="controls">
                <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
                <!--
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                -->
            </div>
        </div>
    </form>
</div>

@endsection
