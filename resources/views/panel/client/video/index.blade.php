@extends('panel.client.layout.app')

@section('content')
<main class="cp-main cp-services">
    <section class="cp-products__header">
        <div>
            <p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website content</p>
            <h1>Videos</h1>
            <p>Upload videos or add YouTube links for your website.</p>
        </div>
        <button class="cp-add-product" id="video-open" type="button"><span>+</span> Add video</button>
    </section>

    @if($videos->isEmpty())
        <section class="cp-gallery-empty">
            <span>&#9654;</span>
            <h2>No videos yet</h2>
            <p>Add your first uploaded video or YouTube link.</p>
            <button class="cp-add-product" type="button" onclick="document.getElementById('video-open').click()"><span>+</span> Add video</button>
        </section>
    @else
        <section class="cp-service-grid">
            @foreach($videos as $video)
                <article class="cp-service-card">
                    @if($video->source_type === 'youtube' && $video->youtube_embed_url)
                        <iframe class="cp-video-player" src="{{ $video->youtube_embed_url }}" title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
                    @else
                        <video class="cp-video-player" controls preload="metadata">
                            <source src="{{ asset(ltrim($video->video_path, '/')) }}" type="video/{{ pathinfo($video->video_path, PATHINFO_EXTENSION) }}">
                            Your browser does not support video playback.
                        </video>
                    @endif
                    <div class="cp-service-card__body">
                        <span class="cp-service-card__position">{{ $video->source_type === 'youtube' ? 'YouTube link' : 'Uploaded video' }}</span>
                        <h2>{{ $video->title }}</h2>
                        <p>{{ $video->description ?: 'No description added.' }}</p>
                        <div class="cp-service-card__actions">
                            <a class="cp-video-open" href="{{ $video->source_type === 'youtube' ? $video->youtube_url : asset(ltrim($video->video_path, '/')) }}" target="_blank" rel="noopener">Open {{ $video->source_type === 'youtube' ? 'YouTube' : 'video' }}</a>
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
            <h2 id="video-modal-title">Add video</h2>
            <button type="button" class="ws-modal__close" id="video-x" aria-label="Close">&times;</button>
        </header>
        <form action="{{ route('panel.pnc-videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="ws-grid">
                <label>Video title<input name="title" value="{{ old('title') }}" required></label>
                <fieldset class="video-source-picker">
                    <legend>Video source</legend>
                    <label><input type="radio" name="video_source" value="upload" {{ old('video_source', 'upload') === 'upload' ? 'checked' : '' }}> Upload video</label>
                    <label><input type="radio" name="video_source" value="youtube" {{ old('video_source') === 'youtube' ? 'checked' : '' }}> YouTube link</label>
                </fieldset>
                <label id="video-file-row">Video file<input id="video-file" name="video" type="file" accept="video/mp4,video/webm,video/quicktime,video/x-msvideo,video/x-matroska"><small>MP4, WebM, MOV, AVI, or MKV · maximum 100 MB</small></label>
                <label id="youtube-url-row">YouTube URL<input id="youtube-url" name="youtube_url" type="url" value="{{ old('youtube_url') }}" placeholder="https://www.youtube.com/watch?v=..."><small>Paste the complete YouTube video link.</small></label>
                <label class="ws-span-2">Description<textarea name="description" rows="4">{{ old('description') }}</textarea></label>
            </div>
            <footer><button type="submit" class="cp-add-product">Add video</button></footer>
        </form>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('video-modal');
    var fileRow = document.getElementById('video-file-row');
    var youtubeRow = document.getElementById('youtube-url-row');
    var sourceInputs = document.querySelectorAll('input[name="video_source"]');
    function closeModal() { modal.classList.remove('is-open'); }
    document.getElementById('video-open').addEventListener('click', function () { modal.classList.add('is-open'); });
    document.getElementById('video-close').addEventListener('click', closeModal);
    document.getElementById('video-x').addEventListener('click', closeModal);
    function setVideoSource() {
        var isUpload = document.querySelector('input[name="video_source"]:checked').value === 'upload';
        fileRow.hidden = !isUpload;
        youtubeRow.hidden = isUpload;
    }
    sourceInputs.forEach(function (input) { input.addEventListener('change', setVideoSource); });
    setVideoSource();
});
</script>
<style>
.video-source-picker{display:flex;align-items:center;gap:18px;margin:0;padding:0;border:0;color:#355262;font-size:12px;font-weight:700}.video-source-picker legend{margin-bottom:8px}.video-source-picker label{display:flex;align-items:center;gap:6px;cursor:pointer}.video-source-picker input{width:auto;accent-color:#119b94}
</style>
@endsection
