@extends('layouts.app')
@section('content')



                @include('layouts.partial.dashboard')
                </div>

                    @forelse($posts as $post)
                    <div class="module">

                        <div class="module-head">
                            <h4 class="media-heading"><a href="http://localhost/forumfinal/public/question/{{$post->slug}}">{{$post->title}}</a></h4>
                        </div>
                        <div class="module-body">

                            <p class="text-right">By: {{$post->user->name}}</p>    
                            <p>{{$post->body}}</p>
                            <ul class="inline unstyled">
                                <li><span><i class="icon-calendar"></i> {{$post->created_at->diffForHumans()}}</span></li>
                                <li>|</li>


                                @if($post->replies->count() > 0)
                                    <li><i class="icon-comment"></i>{{$post->replies->count()}}<a href="http://localhost/forumfinal/public/question/{{$post->slug}}"> comment (s)</a></li>
                                    @else
                                    <li><i class="icon-comment"></i>0<a href="http://localhost/forumfinal/public/question/{{$post->slug}}"> Be the first to reply</a></li>
                                @endif
                                <li>|</li>
                                @guest
                                    x
                                @else
                                @if(Auth::user()->id == $post->user_id )
                                 <li><span><i class="icon-pencil"></i> <a href="{{URL::route('get_edit_post',['id' => $post->id])}}">Edit</a></span></li>
                                <li>|</li>
                                @endif
                                
                                @if(Auth::user()->id == $post->user_id || Auth::user()->level == 'admin')
                                 <li>
                                {!! Form::open(['route' => 'delete_question', 'id' => 'delete-question-form','method' => 'DELETE','class'=> 'full-right']) !!}
                                {!! Form::hidden('post_id',$post->id)!!}
                                  {!! Form::button('Delete',['class' => 'btn btn-danger', 'type' => 'submit'])!!}
                                {!!Form::close()!!}
                                </li>
                                 @endif
                                 @endguest
                             </ul>
                        </div>
                    </div>
                    @empty
                    <p> We have no Problem right here</p>
                 @endforelse
                        {!! $posts->appends(Request::all())->render() !!}   
@endsection