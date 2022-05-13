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
          <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/post"><small>Home</small></a></li>
             
              @if ($post->cat==!null)
              <?php
              foreach ($post->cat as $tx) {
              $x = $tx;
              foreach ($cat  as $value) {
                if($value->id == $x){
  
                  echo "<li class='breadcrumb-item'><a href='/ca/$tx'><small>$value->title</small></a></li>";
  
                  }
                 }
             }
  
  
                     ?>
  
              @else
              <p></p>
              @endif
           
  
            </ol>
          </nav>
         <span> <h1 class="m-0 p-0"  style="font-size:2em"><strong>{{$post->post_title}}</strong>
          </h1>
          <small style="color: rgb(95, 89, 89)"><i>{{$post->created_at->todatestring()}}</i></small>

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