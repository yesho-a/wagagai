@extends('layouts.admin') @section('content')
<div class="container text-sm">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <div class="container" style="padding: 1rem">
            <div class="row">
              {{ Breadcrumbs::render() }}

              <div class="col">
                <h1></i> Permission</h1>
                <p>- {{$permission->name}}</p>
                <br />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
