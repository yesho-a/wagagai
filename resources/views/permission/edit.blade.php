@extends('layouts.admin') @section('content')
<div class="container text-sm">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          {{ Breadcrumbs::render('perm.edit', $permission) }}
          <div class="container" style="padding: 1rem">
            <div class="row">
              <div class="col">
                <h1><i class="fa fa-key"></i> Edit {{$permission->name}}</h1>
                <br />

                {!! Form::model($permission, ['method' => 'PATCH','route' =>
                ['perm.update', $permission->id]]) !!}

                <div class="form-group">
                  {{ Form::label('name', 'Permission Name') }} {{
                  Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <br />
                {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
