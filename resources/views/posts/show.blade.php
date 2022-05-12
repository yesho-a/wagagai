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
           
         <span class="card-title p-4"> <h1  style="font-size:2em">{{$post->post_title}}
          </h1>
          <small style="color: lightskyblue">{{$post->created_at->todatestring()}} #  {{ $post->user->name }}</small>
        </span>
          <div class="text-center">
            <img style="width:90%;height:18rem;" src="{{ asset('storage/images/'.$post->image) }} "alt=" {{$post->image}}">
            
        </div>  
       
            

          <p class="card-text" style="text-align:justify">
            {{$post->post_body}}

 
         
        </div>
        <hr>
      
</div>
</div>

</div>
@endsection