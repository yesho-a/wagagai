<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laravel 8 Ajax Post Request Tutorial - Online Web Tutor</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style type="text/css">
      .label-info{
          background-color: #17a2b8;

      }
      .label {
          display: inline-block;
          padding: .25em .4em;
          font-size: 75%;
          font-weight: 700;
          line-height: 1;
          text-align: center;
          white-space: nowrap;
          vertical-align: baseline;
          border-radius: .25rem;
          transition: color .15s ease-in-out,background-color .15s ease-in-out,
          border-color .15s ease-in-out,box-shadow .15s ease-in-out;
      }
  </style>
  </head>

  <body>
    <div class="container">
      <div class="row bg-danger">
        <div class="col-7">
          <h4 style="text-align: center">
            Laravel 8 Ajax Post Request Tutorial - Online Web Tutor
          </h4>
          <form action="javascript:void(0)" id="frm" method="post">
         
            <div class="form-group">
              <label for="title">Title:</label>
              <input
                type="text"
                class="form-control"
                required
                id="title"
                name="post_title"
                placeholder="Enter name"
              />
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea
                class="form-control"
                id="description"
                required
                name="post_body"
                placeholder="Enter description"
              ></textarea>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>

            <div class="form-group pb-3">
              {{Form::label('Feature Photo','Feature Photo')}}

              {{Form::file('image')}}
         
            </div>
            <div class="form-group pb-3">
              <label for="Tags">Tags:</label>
              <input type="text" data-role="tagsinput" class="form-control" name="tags">
              <?php
              // foreach($tx as $tag) {
              //     echo "<span class='badge' style='background-color:red;margin-left:3px' name='test'> $tag->name</span>";
              //  }
              //   echo '<br>';
                ?>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="submit-post">
                Submit
              </button>
            </div>
          </form>
        </div>
        <div class="col-3" style="padding-top: 4.4em">
          <form id="fm2" method="post">
            <select name="cat" id="labC" class="form-control">
              <option value="0" selected="true">Select Category</option>
            </select>
          </form>
          <a
            class="text-dark"
            data-toggle="collapse"
            href="#collapseExample"
            role="button"
            aria-expanded="false"
            aria-controls="collapseExample"
          >
            Add Category
          </a>
          <div class="collapse bg-info" id="collapseExample">
            {!! Form::open(['route'=>'add.category']) !!}
         
            <div
              class="form-group {{ $errors->has('title') ? 'has-error' : '' }} pt-4 pr-4 pl-4"
            >
              {!! Form::label('Category Name:') !!} {!! Form::text('title',
              old('title'), ['class'=>'form-control', 'placeholder'=>'Enter
              Category Names']) !!}
              <span class="text-danger">{{ $errors->first('title') }}</span>
            </div>

            <div
              class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}  m-4"
            >
              {!! Form::label('Parent Category:') !!} {!!
              Form::select('parent_id',$allCategories, old('parent_id'),
              ['class'=>'form-control', 'placeholder'=>'Select Parent
              Category']) !!}
              <span class="text-danger">{{ $errors->first('parent_id') }}</span>
            </div>
            <div class="form-group m-4 pb-4">
              <button class="btn btn-success">Add New</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>

    <div id="test"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function () {
        $.ajax({
          url: "list",
          type: "GET",
          dataType: "json", // added data type
          success: function (res) {
            jQuery.each(res, function (key, value) {
              // $('#name').append(`<li>${value.title} <br></li>`);
              $("#labC").append(
                $("<option></option>").val(value.title).html(value.title)
              );
              // $('#test').append($("<button></button>").val(value.title).html(value.title));
            });
          },
        });
      });
      $(document).ready(function () {
        $("#frm").on("submit", function () {
          $.ajaxSetup({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
          });
          event.preventDefault();
          let x = $("#frm").serialize();
          let y = $("#fm2").serialize();
          var data = x + "&" + y;
          console.log(data);

          $.ajax({
            url: "ajax",
            type: "post",
            data: data,
            dataType: "json", // added data type
            success: function (data) {
              console.log(data);
            },
          });
        });
      });
    </script>
  </body>
</html>
