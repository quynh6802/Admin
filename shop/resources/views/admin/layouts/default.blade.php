<!DOCTYPE html>
<html lang="en">

<head>
    {{-- head_meta --}}
    @include('admin.partials.head_meta')
    <!-- head_script -->
    @include('admin.partials.head_script')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        {{-- header --}}
        @include('admin.partials.header')
        {{-- sidebar --}}
        @include('admin.partials.sidebar')
        {{-- page --}}
        @yield('main_content')

        @include('admin.partials.sidebar_bottom')
        {{-- footer --}}
        @include('admin.partials.footer')

    </div>
    <!-- ./wrapper -->
    {{-- footer script --}}
    @include('admin.partials.footer_script')

</body>

</html>
