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
        </div>
        <hr>
        <div class="col-4">
        <h5 class="title" style="border-bottom: 3px solid black"><b>Tags</b></h5>
        @if (count($post->tags)>=1)
        <h6><strong>Tags</strong></h6>

        <?php
        foreach($post->tags as $tag) {
        
        echo "<a class='btn badge' href='/tags/$tag->name' style='background-color:red;margin-left:3px' name='test'> $tag->name</a>";
       

  
        }
       
          ?> 
        @else
       
        
        @endif

            
        </div>
</div>
</div>

</div>
@endsection