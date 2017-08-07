<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
@include('sections.head')
<body>
    @include("sections.navigation")
    <div class="@yield("container-type", "container") mainpage">
        @yield('content')
    </div>
</body>
@include('sections.footer')
</html>