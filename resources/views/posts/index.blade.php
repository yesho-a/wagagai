@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
@foreach ($posts as $post)
      <div class="col-lg-8 col-md-8">
        <div class="card mb-3" id="card" style="margin-bottom: 25px">
          <div class="row no-gutters">
            <div class="col-md-4"></div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$post->post_title}}</h5>
                <small style="color: lightskyblue"
                  ><span style="margin-right: 6px">{{$post->created_at->todatestring()}}</span>{{$post->user->name}}</small
                >
                <p class="card-text">
                 {!! Str::words("$post->post_body", 15, ' .....') !!}
                 {{$post->excerpt}}
                </p>
              
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection