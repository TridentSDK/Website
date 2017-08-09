@extends("sections.wrap-layout")

@section("title", "oh no...")

@section('content')
  <div class="jumbotron" style="text-align: center; width: 610px; margin: 0 auto;">
    <h1>408</h1>
    <img src="{{ URL::to("/assets/images/404.gif") }}" />
    <p style="margin-top: 30px">A team of professional cats will take it from here.</p>
  </div>
@stop