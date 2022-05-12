@extends('layouts.admin') @section('content')
<div class="container text-sm">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <div class="container" style="padding: 1rem">
            <div class="row">
                {!! Form::open(['route'=>'add.category']) !!}
 
                <div
                  class="form-group {{ $errors->has('title') ? 'has-error' : '' }} pt-4 pr-4 pl-4"
                >
                  {!! Form::label('Category Name:') !!} {!! Form::text('title',
                  old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Category Names']) !!}
                  <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            
                <div
                  class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}  m-4"
                >
                  {!! Form::label('Parent Category:') !!} {!!
                  Form::select('parent_id',$allCategories, old('parent_id'),
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
    </div>
  </div>
</div>

@endsection