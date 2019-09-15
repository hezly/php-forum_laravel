@extends('layouts.app')

@section('content')
    @include('layouts.partial.formerrors')
    
<div class="module-head">
    <h3>Registration</h3>
</div>

<div class="module-body">
    <form class="form-horizontal"  enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }} 

        <div class="control-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Name</label>
            <div class="controls">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="control-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Address</label>

            <div class="controls">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <input id="level" type="hidden" name="level" value="user" required>
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
            <label for="password-confirm" class="control-label">Confirm Password</label>

            <div class="controls">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        

        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
