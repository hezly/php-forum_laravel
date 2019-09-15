@extends('layouts.app')

@section('content')



    <div class="module-head">
        <h3>Edit</h3>
    </div>

    <div class="module-body">
         @include('layouts.partial.formerrors')

        {!! Form::model($post, ['route'=> 'edit_post', 'id' => 'edit-post-form', 'class' => 'form-horizontal row-fluid'])!!}
        {!! Form::hidden('post_id', $post->id)!!}
        <div class="control-group">

            {!! Form::label('title', 'Title',['class' => 'control-label'])!!}
            <div class="controls">
                {!! Form::text('title', null, ['id' => 'title', 'class' => 'span8', 'require'])!!}
            </div>
            <br>

            {!! Form::label('category','Category',['class' => 'control-label'])!!}
            <div class="controls">
                <select name="category" class="span2">
                 	@foreach($categories as $category)
                 	     @if($category->id == $post->category_id)
                 	     	<option value="{{$category->id}}" selected>{{$category->title}}</option>
                 	     @else
                 	     	<option value="{{$category->id}}"> {{$category->title}}</option>
                 	     @endif
                 	@endforeach
                </select>
             </div>
             <br>

             {!! Form::label('body','Body', ['class' => 'control-label']) !!}
             <div class="controls">
             {!! Form::textarea('body', null, ['id' => 'body', 'class' => 'span8', 'placeholder' => 'type your description here','require']) !!}
             </div>
             <br>

    		{!! Form::label('keywords', 'Keywords', ['class' => 'control-label'])!!}
            <div class="controls">
                {!! Form::text('keywords', null, ['id' => 'keywords', 'class' => 'span8', 'require'])!!} 
             <br/>
            </div>
            
        </div>
        <div class="control-group">
            <div class="controls">
                {!! Form::button('Edit',['class' => 'btn btn-lg btn-primary span8', 'type' => 'submit'])!!}
                {!! Form::close()!!}
            </div>
        </div>
@endsection