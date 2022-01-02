<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.inc.header')


<!-- If Arabic -->
<!-- Add dir="rtl" class="rtl"-->

<body class="main-body">

    @include('admin.layouts.inc.main-header')

    @include('admin.layouts.inc.horizontal-menu')

    @include('admin.layouts.inc.sidebar')

    @include('admin.layouts.inc.side-settings')

    @yield('main')

    @include('admin.layouts.inc.footer')

    @stack('scripts')
</body>

</html>