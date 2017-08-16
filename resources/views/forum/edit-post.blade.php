@extends("sections.wrap-layout")

@section('content')
    <h1>Edit Post</h1>

    @if($errors->getBag("post")->any())
        @include("utils.alert", ["message" => $errors->getBag("post")->first(), "close" => false, "spacedown" => false])
    @endif

    {!! Form::open(["url" => Request::url()."/save"]) !!}

    <div class="form-group">
        {!! Form::textarea("edit_post", $post->text, ["id" => "edit_post"]) !!}

        <script>
            $(document).ready(function() {
                $('#edit_post').summernote({minHeight: 200});
                $('.note-popover').css({ display: 'none' });
            });
        </script>
    </div>

    {!! Form::submit("Save", ["class" => "btn btn-success btn-raised pull-right"]) !!}

    {!! Form::close() !!}
@stop