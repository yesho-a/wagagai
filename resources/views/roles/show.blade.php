@extends('layouts.admin') @section('content')
<div class="container text-sm">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <div class="container" style="padding: 1rem">
            <div class="row">
              <div class="col">
                <span style="margin-left: 1rem">           
                   {{ Breadcrumbs::render('roles.show', $role) }}

                  <a href="/roles/create" class="btn btn-success" id="user"
                    ><b>Create New Role</b></a
                  >
                </span>
                <div class="container pt-3">
                  <h2>Role :{{$role->name}}</h2>

                  <hr />
                  <b>Permissions:</b><br />
                  @foreach ($groupsWithRoles as $post) -{{ $post}}<br />
                  @endforeach
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
