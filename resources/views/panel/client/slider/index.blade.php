@extends('panel.client.layout.app')

@section('content')
<main class="cp-main cp-sliders">
    <section class="cp-products__header">
        <div>
            <p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website appearance</p>
            <h1>Slider images</h1>
            <p>Add banners for your website slider. Lower position numbers appear first.</p>
        </div>
        <button class="cp-add-product" type="button" id="slider-upload-open"><span>+</span> Add slider image</button>
    </section>

    @forelse ($sliders as $slider)
        @if ($loop->first)<section class="cp-slider-grid">@endif
            <article class="cp-slider-card">
                <img src="/{{ ltrim($slider->image, '/') }}" alt="{{ $slider->title ?: 'Website slider image' }}">
                <div class="cp-slider-card__body">
                    <div><h2>{{ $slider->title ?: 'Untitled slide' }}</h2><span>Position {{ $slider->sort_order }}</span></div>
                    <button class="delete-btn" type="button" data-id="{{ $slider->id }}" data-url="{{ route('panel.slider.delete', $slider->id) }}">Delete</button>
                </div>
            </article>
        @if ($loop->last)</section>@endif
    @empty
        <section class="cp-gallery-empty">
            <span>&#9638;</span><h2>No slider images yet</h2>
            <p>Upload your first banner to build your website slider.</p>
            <button class="cp-add-product" type="button" id="slider-upload-empty"><span>+</span> Add slider image</button>
        </section>
    @endforelse

    @if ($sliders->hasPages())<div class="cp-gallery-pagination">{{ $sliders->links('pagination::tailwind') }}</div>@endif
</main>

<div class="slider-upload-modal" id="slider-upload-modal" aria-hidden="true">
    <div class="slider-upload-modal__backdrop" data-slider-close></div>
    <section class="slider-upload-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="slider-upload-title">
        <button type="button" class="ws-modal__close" data-slider-close aria-label="Close">&times;</button>
        <p class="cp-eyebrow cp-eyebrow--dark"><span></span> New slide</p>
        <h2 id="slider-upload-title">Upload slider image</h2>
        <p>Use a wide image for best results. JPG, PNG and WEBP up to 4 MB are supported.</p>
        <form action="{{ route('panel.slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Slider image<input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" required></label>
            <div class="ws-grid">
                <label>Optional title<input name="title" maxlength="120" placeholder="e.g. New clinic opening"></label>
                <label>Display position<input type="number" name="sort_order" min="0" max="999" value="0"></label>
            </div>
            <button type="submit" class="cp-add-product">Save slider image</button>
        </form>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('slider-upload-modal');
    function open() { modal.classList.add('is-open'); modal.setAttribute('aria-hidden', 'false'); }
    function close() { modal.classList.remove('is-open'); modal.setAttribute('aria-hidden', 'true'); }
    ['slider-upload-open', 'slider-upload-empty'].forEach(function (id) {
        var button = document.getElementById(id); if (button) button.addEventListener('click', open);
    });
    modal.querySelectorAll('[data-slider-close]').forEach(function (item) { item.addEventListener('click', close); });
});
</script>
@endsection