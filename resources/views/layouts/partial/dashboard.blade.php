<div class="module-head">
    <h3>Dashboard</h3>
</div>
<div class="module-body">
    @if (session('status'))
                      
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@guest
<p>Login First!</p>
@else
 <p> Welcome, {{Auth::user()->name}} </p>
 <p> If you have a question just click the options menu on the top</p>
@endguest
</div>