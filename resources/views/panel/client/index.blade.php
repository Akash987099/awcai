@extends('panel.client.layout.app')
@section('content')
@php($client = Auth::guard('client')->user())
<main class="cp-main">
<section class="cp-hero"><div><p class="cp-eyebrow"><span></span> Clinic portal</p><h1>Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 18 ? 'afternoon' : 'evening') }}, {{ strtok($client->name ?? 'there', ' ') }}.</h1><p>Here is a clear view of your workspace and the actions waiting for you today.</p></div><div class="cp-hero__badge"><span>&#10003;</span><div><strong>Secure workspace</strong><small>Your account is protected</small></div></div></section>
@if($client && $client->role_id == 1)
<section class="cp-section-head"><div><p class="cp-eyebrow cp-eyebrow--dark"><span></span> Team management</p><h2>Manage your clinic access</h2></div><a class="cp-link" href="{{ route('panel.tokens') }}">View access tokens <b>&rarr;</b></a></section>
<section class="cp-grid cp-grid--two"><article class="cp-action-card cp-action-card--teal"><div class="cp-action-card__icon">&#9672;</div><p>Staff access</p><h3>Create a secure token</h3><span>Give a team member safe, controlled access to your clinic workspace.</span><a href="{{ route('panel.tokens') }}">Manage tokens <b>&rarr;</b></a></article><article class="cp-action-card"><div class="cp-action-card__icon">&#9823;</div><p>People</p><h3>Build your clinic team</h3><span>Invite and manage staff members from one organized place.</span><a href="{{ route('panel.customer.index') }}">View team <b>&rarr;</b></a></article></section>
@else
<section class="cp-section-head"><div><p class="cp-eyebrow cp-eyebrow--dark"><span></span> Product catalogue</p><h2>Your product workspace</h2></div><a class="cp-link" href="{{ route('panel.product.add') }}">Add product <b>+</b></a></section>
<section class="cp-grid cp-grid--two"><article class="cp-action-card cp-action-card--teal"><div class="cp-action-card__icon">&#9638;</div><p>Catalogue</p><h3>Keep products organised</h3><span>Add, update and manage the products available through your clinic catalogue.</span><a href="{{ route('panel.product.index') }}">Open products <b>&rarr;</b></a></article><article class="cp-action-card"><div class="cp-action-card__icon">+</div><p>Quick action</p><h3>Add a new product</h3><span>Upload a product image and keep your listing ready for your audience.</span><a href="{{ route('panel.product.add') }}">Create product <b>&rarr;</b></a></article></section>
@endif
<section class="cp-info-strip"><span class="cp-info-strip__icon">i</span><div><strong>Need a hand?</strong><p>Our support team can help you keep your clinic portal running smoothly.</p></div><a href="mailto:support@aryawebinnovations.com">Contact support &rarr;</a></section>
</main>
@endsection