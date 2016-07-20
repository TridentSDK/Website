@extends("sections.wrap-layout")

@section('content')
    <h1>New Topic</h1>

    @if($errors->getBag("topic")->any())
        @include("utils.alert", ["message" => $errors->getBag("topic")->first(), "close" => false, "spacedown" => false])
    @endif

    {!! Form::open(["url" => Request::url()."/post"]) !!}

    <div class="form-group">
        {!! Form::label("topic_title", "Title") !!}
        {!! Form::text("topic_title", null, ["class" => "form-control", "placeholder" => "Enter Title"]) !!}
    </div>

    <div class="form-group">
        {!! Form::label("topic_text", "Text") !!}
        {!! Form::textarea("topic_text", null, ["id" => "topic_text"]) !!}

        <script>
            $(document).ready(function() {
                $('#topic_text').summernote({minHeight: 200});
            });
        </script>
    </div>

    {!! Form::submit("Post", ["class" => "btn btn-success btn-raised pull-right"]) !!}

    {!! Form::close() !!}
@stop