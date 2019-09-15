@extends('layouts.app')

@section('content')

@include('layouts.partial.formerrors')
<div class="module-head">
    <h3>Add Post</h3>
</div>

<div class="module-body">
    
                <div class="pull-right">
                    <a href="{{'/forumfinal/public/'}}" data-toggle="tooltip" title="Back To Grid" class="btn btn-default"><i class="fa fa-refresh"></i> Back</a>
                </div>


                <form class="form-horizontal" method="post" action="{{url('question')}}">
                     {{csrf_field()}}
        
                    <div class="control-group required">
                        <label class="control-label">Title</label>
                        <div class="controls">
                            <input type="text" name="title" class="span4 required"/>
                        </div>
                    </div>
                    <div class="control-group required">
                        <label class="control-label">Category</label>
                        <div class="controls">
                            <select name="category" id="category" class="span1">
                                @foreach($categories as $a)
                                    <option value="{{$a->id}}"> {{$a->title}} </option>       

                                @endforeach      
                            </select>
                        </div>
                    </div>
                    <div class="control-group required">
                    <label class="control-label">Body</label>
                        <div class="controls">
                     {!!Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control','placeholder' => 'type your reply here','require', 'class' => 'span4'])!!}
                        </div>
                    </div>
                    <div class="control-group required">
                        <label class="control-label">Keywords</label>
                        <div class="controls">
                            <input type="text" name="keywords" class="span4 required"/>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <button type="reset" data-toggle="tooltip" title="Reset Form" class="btn btn-warning">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                        <button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </form>
</div>

</div>
<script type="text/javascript">
    $(document).ready(function(){

         $('#region_id').change(function(){
            $('#country_id').html(empty('country'));
            $('#province_id').html(empty('province'));
            $('#city_id').html(empty('city'));
            var value = $(this).val();
            var country = LoadHTML('employee/country/'+value);
            $('#country_id').html(country);
        });

         $('#country_id').change(function(){
            $('#province_id').html(empty('province'));
            $('#city_id').html(empty('city'));
            var value = $(this).val();
            var province = LoadHTML('employee/province/'+value);
            $('#province_id').html(province);
        });
        
         $('#province_id').change(function(){
            $('#city_id').html(empty('city'));
            var value = $(this).val();
            var city = LoadHTML('employee/city/'+value);
            $('#city_id').html(city);
         });

    });
</script>
@endsection
