@extends('layouts.app')
@section('content')

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
   
</div>
<div class="form-group">
 {{Form::label('title','Title')}}
    {{Form::text('post_title','',['class'=>'form-control','placeholder'=>'Post Title'])}}
</div>


<div class="form-group pb-3">
   {{Form::label('post','Post')}}
    {{Form::textarea('post_body','',['class'=>'form-control','placeholder'=>'Post'])}}

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