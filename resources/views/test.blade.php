<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Laravel 8 Ajax Post Request Tutorial - Online Web Tutor</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
      #frm-create-post label.error {
        color: red;
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
                name="title"
                placeholder="Enter name"
              />
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              <textarea
                class="form-control"
                id="description"
                required
                name="description"
                placeholder="Enter description"
              ></textarea>
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

          $.ajax({
            url: "ajax",
            type: "post",
            //data: { title: title,description: description},
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
