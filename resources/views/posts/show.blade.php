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

                                    <div class="container pt-4" id="text">
                                       <?php

                                       foreach ($post->cat as $tx) {
                                           $x = $tx;
                                           foreach ($cat  as $value) {
                                               if($value->id == $x){
                                                   echo ($value->title);
                                                   echo "<a class='badge' href='/post' style='background-color:green;margin-left:3px' name='test'>$value->title</a>";

                                                   echo '<br>';
                                               }
                                           }
                                       }


                                       ?>
                                             <hr>
                                       <h6><strong>Tags</strong></h6>
                                 
                                        <?php
                                        foreach($post->tags as $tag) {
                                        
                                        echo "<a class='badge' href='/tags/$tag->name' style='background-color:red;margin-left:3px' name='test'> $tag->name</a>";
                                       

                                  
                                        }
                                       
                                          ?> 
                                    
                                        </div>
                                </div>
                                
                               
                                <p  class="text-center"><b>Author: {{ $post->user->name }}<br>
                                    Published: {{$post->created_at->todatestring()}}</b></p>
                            </div>
                            <h4>Display Comments</h4>
                            @foreach($post->comments as $comment)
                                <div class="display-comment">
                                @if($comment->user_id==0)
                                <strong>Guest</strong>
                                @else
                                <strong>{{$comment->user->name }}</strong>
                                 @endif
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            @endforeach
                            <hr />
                            <h4>Add comment</h4>
                            <form method="post" action="{{ route('comment.add') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="comment" class="form-control" />
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning" value="Add Comment" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection