<!DOCTYPE html>
<html lang="en">

@include('backend.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
            @include('backend.header')
            @include('backend.menu')
            @yield("main_content")
            @include('backend.footer')

</div>
@include('backend.script')
</body>

</html>

