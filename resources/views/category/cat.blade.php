@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        {{$posts->post_body}}
    </div>
  </div>
@endsection

