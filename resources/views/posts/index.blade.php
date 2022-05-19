@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      {{ Breadcrumbs::render() }}

@foreach ($posts as $post)
      <div class="col-lg-8 col-md-8">
        <div class="card mb-3" id="card" style="margin-bottom: 25px">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="{{ asset('storage/images/'.$post->image) }}" class="card-img" alt="...">

            </div>
            <div class="col-md-8">
              <div class="card-body">
                <a href="/post/{{$post->id}}/{{$post->slug}}" id="link"><h5 class="card-title">{{$post->post_title}}</h5></a>
                <small style="color: lightskyblue"
                  ><span style="margin-right: 6px">{{$post->created_at->todatestring()}}</span></small>
                  <a href="/post/{{$post->id}}/{{$post->slug}}" id="excerpt"> <p class="card-text">
                 {{$post->excerpt}}
                </p>
                  </a>
              
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection