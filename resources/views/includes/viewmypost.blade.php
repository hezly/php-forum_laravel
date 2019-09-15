@extends('layouts.app')

@section('content')

                    @forelse($posts as $post)

                            <div class="module-head">
                                <h4 class="media-heading"><a href="http://localhost/forumfinal/public/question/{{$post->slug}}">{{$post->title}}</a></h4>
                            </div>
                            <div class="module-body">
                                <p class="text-right">By: {{$post->user->name}}</p>
                                <p>{{$post->body}}</p>
                                <ul class="inline unstyled">
                                    <li><span><i class="glyphicon glyphicon-calendar"></i> {{$post->created_at->diffForHumans()}}</span></li>
                                    <li>|</li>

                                    @if($post->replies->count() > 0)
                                        <li><i class="icon-comment"></i>{{$post->replies->count()}} comment (s)</li>
                                    @else
                                        <li><i class="icon-comment"></i>0 Be the first to reply</li>
                                    @endif
                                     @if(Auth::user()->id == $post->user_id || Auth::user()->level == 'admin')
                             <li>
                                {!! Form::open(['route' => 'delete_question', 'id' => 'delete-question-form','method' => 'DELETE','class'=> 'full-right']) !!}
                             {!! Form::hidden('post_id',$post->id)!!}
                             {!! Form::button('Delete',['class' => 'btn btn-danger', 'type' => 'submit'])!!}
                             {!!Form::close()!!}
                            </li>
                             @endif
                          </div>


                    @empty
                    <h2 class="bg-primary"><center>you haven't post before</center></h2>

                        @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
