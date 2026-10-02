@extends('panel.client.layout.app')

@section('content')
<main class="cp-main cp-services">
    <section class="cp-products__header">
        <div>
            <p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website content</p>
            <h1>News</h1>
            <p>Publish news updates with images and SEO details.</p>
        </div>
        <button class="cp-add-product" id="news-open" type="button"><span>+</span> Add news</button>
    </section>

    @forelse($news as $item)
        @if($loop->first)<section class="cp-service-grid">@endif
            <article class="cp-service-card">
                @if($item->featured_image)<img src="{{ asset(ltrim($item->featured_image, '/')) }}" alt="{{ $item->title }}">@endif
                <div class="cp-service-card__body">
                    <span class="cp-service-card__position">{{ $item->status }}</span>
                    <h2>{{ $item->title }}</h2>
                    <p>{{ $item->summary ?: Str::limit($item->content, 115) }}</p>
                    <div class="cp-service-card__actions">
                        <button class="delete-btn" data-id="{{ $item->id }}" data-url="{{ route('panel.client-news.delete', $item->id) }}">Delete</button>
                    </div>
                </div>
            </article>
        @if($loop->last)</section>@endif
    @empty
        <section class="cp-gallery-empty">
            <span>&#128240;</span>
            <h2>No news items</h2>
            <p>Add your first news update.</p>
        </section>
    @endforelse
</main>

<div class="service-modal" id="news-modal">
    <div class="service-modal__backdrop"></div>
    <section class="service-modal__dialog">
        <header><h2>Add news</h2><button class="ws-modal__close" id="news-close">&times;</button></header>
        <form action="{{ route('panel.client-news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="ws-grid">
                <label>Title<input name="title" required></label>
                <label>Date<input name="publish_date" type="date"></label>
                <label>Status<select name="status"><option value="draft">Draft</option><option value="published">Published</option></select></label>
                <label>Featured image<input name="featured_image" type="file" required></label>
                <label class="ws-span-2">Summary<input name="summary"></label>
                <label class="ws-span-2">Full news<textarea name="content" rows="7"></textarea></label>
                <label class="ws-span-2">SEO title<input name="meta_title"></label>
                <label class="ws-span-2">SEO description<textarea name="meta_description"></textarea></label>
            </div>
            <footer><button class="cp-add-product">Save news</button></footer>
        </form>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('news-modal');
    document.getElementById('news-open').onclick = () => modal.classList.add('is-open');
    document.getElementById('news-close').onclick = () => modal.classList.remove('is-open');
});
</script>
@endsection
