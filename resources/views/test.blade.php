<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laravel 8 Ajax Post Request Tutorial - Online Web Tutor</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style type="text/css">
      .label-info{
          background-color: #17a2b8;

      }
      .label {
          display: inline-block;
          padding: .25em .4em;
          font-size: 75%;
          font-weight: 700;
          line-height: 1;
          text-align: center;
          white-space: nowrap;
          vertical-align: baseline;
          border-radius: .25rem;
          transition: color .15s ease-in-out,background-color .15s ease-in-out,
          border-color .15s ease-in-out,box-shadow .15s ease-in-out;
      }
  </style>
  </head>

  <body>
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
                                      {{Form::textarea('post_body','',['class'=>'ckeditor form-control','placeholder'=>'Post'])}}

  
                                    </div>
                                  </div>
                                  <div class="form-group p-2">
                                      {{Form::label('Feature Photo','Feature Photo')}}
  
                                      {{Form::file('image')}}
                                 
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                        <strong>Select Post Category:</strong>
                                        <br/>
                                        <div class="overflow-auto">
                                        @foreach($allCategories  as $value)
                                        <label>{{ Form::checkbox('cat[]', $value->id, false, array('class' => 'name')) }}
                                        
                                          {{ $value->title }}</label>
                                    <br/>
                                    @endforeach
                                  <!-- Button trigger modal -->
                                  <a class="text-danger" data-toggle="modal" data-target="#exampleModal"
                                  role="button" aria-expanded="false" aria-controls="collapseExample">Add Category</a>

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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'add.category']) !!}
         
        <div
          class="form-group {{ $errors->has('title') ? 'has-error' : '' }} pt-4 pr-4 pl-4"
        >
          {!! Form::label('Category Name:') !!} {!! Form::text('title',
          old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Category Name']) !!}
          <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>

        <div
          class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}  m-4"
        >
          {!! Form::label('Parent Category:') !!} {!!
          Form::select('parent_id',$cax, old('parent_id'),
          ['class'=>'form-control', 'placeholder'=>'Select Parent
          Category']) !!}
          <span class="text-danger">{{ $errors->first('parent_id') }}</span>
        </div>
        <div class="form-group m-4 pb-4">
          <button class="btn btn-success">Add New</button>
        </div>
        {!! Form::close() !!}
      </div>
    
    </div>
  </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>


  </body>
</html>
