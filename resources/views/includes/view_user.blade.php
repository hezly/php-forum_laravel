@extends('layouts.app')
@section('content')


                </div>
                    @forelse($user as $user)
                      <div class="well">
                            <div class="media">
                                <div class="media-body">
                                    <p class="media-heading">{{$user->name}}</p>
                                    <ul class="list-inline list-unstyled">
                                    <li><span><i class=""></i> {{$user->created_at->diffForHumans()}}</span></li>

                                     @if(Auth::user()->level == 'admin')
                                   
                                    <li>

                                     {!! Form::open(['route' => 'delete_user', 'id' => 'delete-user-form','method' => 'DELETE','class'=> 'full-right']) !!}
                                     {!! Form::hidden('user_id',$user->id)!!}
                                     {!! Form::button('Delete',['class' => 'btn btn-danger', 'type' => 'submit'])!!}
                                     {!!Form::close()!!}</li>
                                     @endif
                                     </ul>
                                     
                                </div>
                            
                            </div>
                        </div>
                    @empty
                    <p> sorry you don't have user</p>
                 @endforelse

@endsection
