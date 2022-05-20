@extends('layouts.posts')
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



.be-comment-block {
    margin-bottom: 50px !important;
    border: 1px solid #edeff2;
    border-radius: 2px;
    padding: 50px 70px;
    border:1px solid #ffffff;
}

.comments-title {
    font-size: 16px;
    color: #262626;
    margin-bottom: 15px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-img-comment {
    width: 60px;
    height: 60px;
    float: left;
    margin-bottom: 15px;
}

.be-ava-comment {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

.be-comment-content {
    margin-left: 80px;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-name {
    font-size: 13px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-comment-content a {
    color: #383b43;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-time {
    text-align: right;
}

.be-comment-time {
    font-size: 11px;
    color: #b4b7c1;
}

.be-comment-text {
    font-size: 13px;
    line-height: 18px;
    color: #7a8192;
    display: block;
    background: #f6f6f7;
    border: 1px solid #edeff2;
    padding: 15px 20px 20px 20px;
}

</style>

 <div class="container d-flex justify-content-center" style= 'margin-bottom: 3rem;'>
      <div class="card p-4" style="width: 90%">
        <div class="card-body ">
       
         {{ Breadcrumbs::render('display', $post) }} 

         <span> <h1 class="m-0 p-0"  style="font-size:2em"><strong>{{$post->post_title}}</strong>
          </h1>
          <small style="color: rgb(95, 89, 89)">{{$post->created_at->todatestring()}}</small>

        </span>
       
            

          <p class="card-text pt-4" style="text-align:justify">
            <div class="text-center mb-3">
              <img style="width:90%;height:18rem;" src="{{ asset('storage/images/'.$post->image) }} "alt=" {{$post->image}}">
              
          </div>
           
            {!!$post->post_body!!}
            <hr>

           <b>tags:</b>
            @if (count($post->tags)>=1)

            <?php
            foreach($post->tags as $tag) {
            
            echo "<a class='btn badge bg-success' href='/tags/$tag->name' style='margin-left:3px' name='test'> $tag->name</a>";
           
    
      
            }
           
              ?> 
            @else
           
            
            @endif
  
    
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
        <div class="be-comment-block">
          <h1 class="comments-title">Comments (3)</h1>

          <div class="be-comment">
          
            <div class="be-img-comment">	
              <a href="blog-detail-2.html">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
              </a>
            </div>
            <div class="be-comment-content">
              
                <span class="be-comment-name">
                  <a href="blog-detail-2.html">Ravi Sah</a>
                  </span>
                <span class="be-comment-time">
                  <i class="fa fa-clock-o"></i>
                  May 27, 2015 at 3:14am
                </span>
        
              <p class="be-comment-text">
                Pellentesque gravida tristique ultrices. 
                Sed blandit varius mauris, vel volutpat urna hendrerit id. 
                Curabitur rutrum dolor gravida turpis tristique efficitur.
              </p>
            </div>
          </div>
          <div class="be-comment">
            <div class="be-img-comment">	
              <a href="blog-detail-2.html">
                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="be-ava-comment">
              </a>
            </div>
            <div class="be-comment-content">
              <span class="be-comment-name">
                <a href="blog-detail-2.html">Phoenix, the Creative Studio</a>
              </span>
              <span class="be-comment-time">
                <i class="fa fa-clock-o"></i>
                May 27, 2015 at 3:14am
              </span>
              <p class="be-comment-text">
                Nunc ornare sed dolor sed mattis. In scelerisque dui a arcu mattis, at maximus eros commodo. Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant. Proin ut ornare lectus, vel eleifend est. Fusce hendrerit dui in turpis tristique blandit.
              </p>
            </div>
          </div>
          <div class="be-comment">
            <div class="be-img-comment">	
              <a href="blog-detail-2.html">
                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="be-ava-comment">
              </a>
            </div>
            <div class="be-comment-content">
              <span class="be-comment-name">
                <a href="blog-detail-2.html">Cüneyt ŞEN</a>
              </span>
              <span class="be-comment-time">
                <i class="fa fa-clock-o"></i>
                May 27, 2015 at 3:14am
              </span>
              <p class="be-comment-text">
                Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant
              </p>
            </div>
          </div>
        <form method="post" action="{{ route('comment.add') }}">
          @csrf
          <div class="form-group" style="padding-bottom: 1rem">
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
            <label for="comment">Enter Your Comment</label>
            <textarea name="comment" class="form-control" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-info">Send</button>
        </form>
        </div>
       
      </div>

</div>
</div>

</div>
@endsection