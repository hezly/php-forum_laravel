@extends('layouts.app')

@section('content')
<div class="module-head">
    <h3>Log In</h3>
</div>

<div class="module-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
</div>
@endsection
