@extends('layouts.app')

@section('content')
</div>
                    <div class="module">

                            <div class="module-head">
                                <h4 class="media-heading">{{$post->title}}</h4>
                            </div>
                            <div class="module-body">
                                <p class="text-right">By : {{$post->user->name}}</p>
                                <p>{{$post->body}}</p>
                                <ul class="inline unstyled">
                                    <li><span><i class="icon-calendar"></i>{{$post->created_at->diffForHumans()}}</span></li>
                                    <li>|</li>
                            </div>

                    </div>

                @forelse($post->replies as $replies)

                    <div class="module">

                            <div class="module-head">
                                <p class="text-right">By : {{$replies->user->name}}</p>
                                <p>{{$replies->body}} </p>
                                <ul class="inline unstyled">
                                    <li><span><i class="icon-calendar"></i>{{$replies->created_at->diffForHumans()}}</span></li>
                                     @if(Auth::user()->id == $replies->user_id || Auth::user()->level == 'admin' || Auth::user()->id == $replies->post->user_id)
                             <li>
                                {!! Form::open(['route' => 'delete_reply', 'id' => 'delete-reply-form','method' => 'DELETE','class'=> 'full-right']) !!}
                             {!! Form::hidden('reply_id',$replies->id)!!}
                             {!! Form::button('Delete',['class' => 'btn btn-danger', 'type' => 'submit'])!!}
                             {!!Form::close()!!}
                            </li>
                             @endif
                            </div>
                    </div>
                    @empty
                    <div class="bg-primary">
                    <h2> <center>Be the first to reply <center></h2>
                    </div>
                   @endforelse
                   <br>
                    {!! Form::open(['route' => 'save_reply', 'id' => 'reply-question-form']) !!}
                     {!! Form::hidden('slug',$post->slug)!!}
                     {!!Form::textarea('body', null, ['id' => 'body', 'class' => 'span9','placeholder' => 'type your reply here','require'])!!}
                     {!! Form::button('Reply',['class' => 'btn btn-lg btn-primary btn-block', 'type' => 'submit'])!!}
                     {!!Form::close()!!}
            
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
