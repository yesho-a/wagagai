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
       
          {{-- {{ Breadcrumbs::render('post.show', $post) }} --}}


         <span> <h1 class="m-0 p-0"  style="font-size:2em"><strong>{{$post->post_title}}</strong>
          </h1>
          <small style="color: rgb(95, 89, 89)">{{$post->created_at->todatestring()}}</small>

        </span>
       
            

          <p class="card-text pt-4" style="text-align:justify">
            <div class="text-center mb-3">
              <img style="width:90%;height:18rem;" src="{{ asset('storage/images/'.$post->image) }} "alt=" {{$post->image}}">
              
          </div>
            {{$post->post_body}}
           <br>
           <b><i>tags:</i></b>
            @if (count($post->tags)>=1)

            <?php
            foreach($post->tags as $tag) {
            
            echo "<a class='btn badge bg-success' href='/tags/$tag->name' style='margin-left:3px' name='test'> $tag->name</a>";
           
    
      
            }
           
              ?> 
            @else
           
            
            @endif
  
     

        <hr>
        <span style="font-family: Cambria, Cochin, Georgia, Times;font-size:1rem"><strong>Comments</strong></span>
        @foreach($post->comments as $comment)
            <div class="display-comment mt-1">
            @if($comment->user_id==0)
            <strong>Guest</strong>
            @else
           {{$comment->user->name }}
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