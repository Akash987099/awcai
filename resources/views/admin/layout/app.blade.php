@include('admin.layout.header')
<div class="admin-layout-shell">
    @include('admin.layout.navbar')
    @include('admin.layout.sidebar')
    @yield('content')
</div>
@include('admin.layout.footer')
