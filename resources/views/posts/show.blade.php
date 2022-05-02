@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="container" style="padding: 1rem;">
                        <div class="row">
                             <div class="col">
                                 <h1 class="text-center pb-3"> <strong>{{$post->post_title}}</strong></h1>
                             <div class="text-center">
                                 <img style="width:90%;height:18rem;" src="{{ asset('storage/images/'.$post->image) }} "alt=" {{$post->image}}">
                                 
                             </div>
                             <div class="container pt-4" id="text">
                                    {{$post->post_body}}
                                    </div>
                                </div>
                                <p  class="text-center"><b>Author: {{ $post->user->name }}<br>
                                    Published: {{$post->created_at->todatestring()}}</b></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection