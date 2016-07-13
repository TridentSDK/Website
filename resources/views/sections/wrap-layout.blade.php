<!DOCTYPE html>
<html>
@include('sections.head')
<body>
    @include("sections.navigation")
    <div class="container mainpage">
        @yield('content')
    </div>
</body>
@include('sections.footer')
</html>