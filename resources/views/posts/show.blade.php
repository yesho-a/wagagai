@extends('layouts.app')
@section('content')
<style>
    .card-body{
        text-align:left;
    }
    
    body {
        background-color: rgb(231, 231, 231);
    }
    
      html {
        background-color: rgb(231, 231, 231);
    }
    
 
 h1{
  font-family: Georgia, sans-serif;
  font-size: 7em;
  letter-spacing: -2px;
}
</style>

 <div class="container d-flex justify-content-center" style= 'margin-bottom: 3rem;'>
      <div class="card shadow-lg p-4" style="width: 80%">

        <div class="card-body ">
           
         <span class="card-title p-4"> <h1  style="font-size:2em"><strong>{{$post->post_title}}</strong>
          </h1>
          
        </span>
          <div class="text-center">
            <img style="width:90%;height:18rem;" src="{{ asset('storage/images/'.$post->image) }} "alt=" {{$post->image}}">
            
        </div>  
       
            

          <p class="card-text pt-4" style="text-align:justify">
            <small style="color: lightskyblue">{{$post->created_at->todatestring()}} #  {{ $post->user->name }}</small>
            <br>
            {{$post->post_body}}
            <br>
            @if (count($post->tags)>=1)

            <?php
            foreach($post->tags as $tag) {
            
            echo "<a class='btn badge' href='/tags/$tag->name' style='background-color:red;margin-left:3px' name='test'> $tag->name</a>";
           
    
      
            }
           
              ?> 
            @else
           
            
            @endif
  
     

        <hr>
        <p style="font-family: Cambria, Cochin, Georgia, Times;font-size:1rem"><strong>Comments</strong></p>
        @foreach($post->comments as $comment)
            <div class="display-comment">
            @if($comment->user_id==0)
            <strong>Guest</strong>
            @else
           <i>{{$comment->user->name }}</i>
             @endif
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach
        <form method="post" action="{{ route('comment.add') }}">
            @csrf
            <div class="form-group pb-3">
                <input type="text" name="comment" class="form-control" placeholder="Add Comment Here" />
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Add Comment" hidden />
            </div>
        </form>
      </div>

</div>
</div>

</div>
@endsection