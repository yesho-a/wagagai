@extends('layouts.admin')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>       

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="container" style="padding: 1rem;">
                        <div class="row">
                          <div class="col mr-5 ml-5">
                            <h1> <strong></i>Add Post</u></strong></h1>
                            {!! Form::open(['action'=>'App\Http\Controllers\PostController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}                     
                            @csrf
                            <div class="form-group">
                                <div class="col-11">
                                {{Form::label('title','Title')}}
                                  {{Form::text('post_title','',['class'=>'form-control','placeholder'=>'Post Title'])}}
                                </div>
                            </div>
                                <div class="form-group pb-3">
                                    <div class="col-11">
                                    {{Form::label('post','Post')}}
                                    {{Form::textarea('post_body','',['class'=>'form-control','placeholder'=>'Post'])}}
                                    </div>
                                </div>
                                <div class="form-group pb-3">
                                    {{Form::label('Feature Photo','Feature Photo')}}

                                    {{Form::file('image')}}
                               
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                      <strong>Select Category:</strong>
                                      <br/>
                                      @foreach($allCategeories  as $value)
                                      <label>{{ Form::checkbox('cat[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->title }}</label>
                                  <br/>
                                  @endforeach
                                    </div>
                                  </div>
                                  <div class="form-group pb-3">
                                    <label for="Tags">Tags:</label>
                                    <input type="text" data-role="tagsinput" class="form-control" name="tags">
                                  </div>



                                  

                                <div class="form-group">
                                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                                    {!! Form::close() !!}
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection