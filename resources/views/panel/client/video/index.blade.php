@extends('panel.client.layout.app')

@section('content')
<main class="cp-main cp-services">
    <section class="cp-products__header">
        <div>
            <p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website content</p>
            <h1>Videos</h1>
            <p>Upload and manage videos for your website.</p>
        </div>
        <button class="cp-add-product" id="video-open" type="button"><span>+</span> Add video</button>
    </section>

    @if($videos->isEmpty())
        <section class="cp-gallery-empty">
            <span>&#9654;</span>
            <h2>No videos yet</h2>
            <p>Upload your first website video.</p>
            <button class="cp-add-product" type="button" onclick="document.getElementById('video-open').click()"><span>+</span> Add video</button>
        </section>
    @else
        <section class="cp-service-grid">
            @foreach($videos as $video)
                <article class="cp-service-card">
                    <video class="cp-video-player" controls preload="metadata">
                        <source src="{{ asset(ltrim($video->video_path, '/')) }}" type="video/{{ pathinfo($video->video_path, PATHINFO_EXTENSION) }}">
                        Your browser does not support video playback.
                    </video>
                    <div class="cp-service-card__body">
                        <span class="cp-service-card__position">Uploaded video</span>
                        <h2>{{ $video->title }}</h2>
                        <p>{{ $video->description ?: 'No description added.' }}</p>
                        <div class="cp-service-card__actions">
                            <a class="cp-video-open" href="{{ asset(ltrim($video->video_path, '/')) }}" target="_blank" rel="noopener">Open video</a>
                            <button type="button" class="delete-btn" data-id="{{ $video->id }}" data-url="{{ route('panel.pnc-videos.delete', $video->id) }}">Delete</button>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
        <div class="cp-gallery-pagination">{{ $videos->links() }}</div>
    @endif
</main>

<div class="service-modal" id="video-modal" aria-hidden="true">
    <div class="service-modal__backdrop" id="video-close"></div>
    <section class="service-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="video-modal-title">
        <header>
            <h2 id="video-modal-title">Upload video</h2>
            <button type="button" class="ws-modal__close" id="video-x" aria-label="Close">&times;</button>
        </header>
        <form action="{{ route('panel.pnc-videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="ws-grid">
                <label>Video title<input name="title" value="{{ old('title') }}" required></label>
                <label>Video file<input name="video" type="file" accept="video/mp4,video/webm,video/quicktime,video/x-msvideo,video/x-matroska" required><small>MP4, WebM, MOV, AVI, or MKV · maximum 100 MB</small></label>
                <label class="ws-span-2">Description<textarea name="description" rows="4">{{ old('description') }}</textarea></label>
            </div>
            <footer><button type="submit" class="cp-add-product">Upload video</button></footer>
        </form>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('video-modal');
    function closeModal() { modal.classList.remove('is-open'); }
    document.getElementById('video-open').addEventListener('click', function () { modal.classList.add('is-open'); });
    document.getElementById('video-close').addEventListener('click', closeModal);
    document.getElementById('video-x').addEventListener('click', closeModal);
});
</script>
@endsection
