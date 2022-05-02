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
                                 <h1 class="text-center"> <strong>{{$post->post_title}}</strong></h1>
                                 <div class='container pt-4'>
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