@php
    $client = Auth::guard('client')->user();
@endphp

<aside class="cp-sidebar" id="cp-sidebar">
    <a class="cp-brand" href="{{ route('panel.index') }}">
        <span class="cp-brand__mark">+</span>
        <span><strong>AWC Care</strong><small>Clinic network portal</small></span>
    </a>
    <nav class="cp-nav" aria-label="Clinic portal navigation">
        <p class="cp-nav__label">Workspace</p>
        <a class="{{ request()->routeIs('panel.index') ? 'is-active' : '' }}" href="{{ route('panel.index') }}"><span>&#8962;</span> Dashboard</a>
        @if ($client && $client->role_id == 1)
            <a class="{{ request()->routeIs('panel.tokens') ? 'is-active' : '' }}" href="{{ route('panel.tokens') }}"><span>&#9672;</span> Access tokens</a>
            <a class="{{ request()->routeIs('panel.customer.*') ? 'is-active' : '' }}" href="{{ route('panel.customer.index') }}"><span>&#9823;</span> Team members</a>
        @endif
        @if ($client && $client->role_id == 2)
            <a class="{{ request()->routeIs('panel.product.*') ? 'is-active' : '' }}" href="{{ route('panel.product.index') }}"><span>&#9638;</span> Products</a>
        @endif
        <a class="{{ request()->routeIs('panel.client-services.*') ? 'is-active' : '' }}" href="{{ route('panel.client-services.index') }}"><span>&#10022;</span> Services</a>
        <a class="{{ request()->routeIs('panel.client-blogs.*') ? 'is-active' : '' }}" href="{{ route('panel.client-blogs.index') }}"><span>&#9998;</span> Blogs</a>
        <a class="{{ request()->routeIs('panel.client-articles.*') ? 'is-active' : '' }}" href="{{ route('panel.client-articles.index') }}"><span>&#9997;</span> Articles</a>
        <a class="{{ request()->routeIs('panel.slider.*') ? 'is-active' : '' }}" href="{{ route('panel.slider.index') }}"><span>&#9645;</span> Slider images</a>
        <a class="{{ request()->routeIs('panel.pnc-reviews.*') ? 'is-active' : '' }}" href="{{ route('panel.pnc-reviews.index') }}"><span>&#9733;</span> Reviews &amp; feedback</a>
        <a href="{{ route('panel.pnc-videos.index') }}"><span>&#9654;</span> Videos</a>
        <p class="cp-nav__label cp-nav__label--bottom">Portal settings</p>
        <button type="button" class="cp-nav__button cp-settings-open"><span>&#9881;</span> Website settings</button>
        <a href="mailto:support@aryawebinnovations.com"><span>?</span> Help &amp; support</a>
    </nav>
    <div class="cp-sidebar__footer"><span class="cp-status-dot"></span> System secure</div>
</aside>
<div class="cp-sidebar-overlay" id="cp-sidebar-overlay"></div>