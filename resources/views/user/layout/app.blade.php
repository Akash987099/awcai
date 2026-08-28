@include('user.layout.header')
<div class="admin-layout-shell">
    @include('user.layout.navbar')
    @include('user.layout.sidebar')
    @yield('content')
</div>
@include('user.layout.footer')
