@extends('panel.client.layout.app')

@section('content')
<main class="cp-main cp-services">
    <section class="cp-products__header">
        <div>
            <p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website content</p>
            <h1>CMS Pages</h1>
            <p>Create and manage custom pages for your website.</p>
        </div>
        <button class="cp-add-product" type="button" id="cms-add-open"><span>+</span> Add page</button>
    </section>

    @forelse ($pages as $page)
        @if ($loop->first)<section class="cp-service-grid">@endif
            <article class="cp-service-card">
                <div class="cp-service-card__body">
                    <span class="cp-service-card__position">{{ ucfirst($page->status) }} · /{{ $page->slug }}</span>
                    <h2>{{ $page->title }}</h2>
                    <p>{{ Str::limit(strip_tags($page->content), 180) }}</p>
                    <div class="cp-service-card__actions">
                        <button type="button" class="cms-edit" data-page='@json(["id" => $page->id, "title" => $page->title, "slug" => $page->slug, "content" => $page->content, "status" => $page->status, "meta_title" => $page->meta_title, "meta_description" => $page->meta_description])'>Edit</button>
                        <button type="button" class="delete-btn" data-id="{{ $page->id }}" data-url="{{ route('panel.client-cms.delete', $page->id) }}">Delete</button>
                    </div>
                </div>
            </article>
        @if ($loop->last)</section>@endif
    @empty
        <section class="cp-gallery-empty"><span>&#9638;</span><h2>No CMS pages added</h2><p>Create your first custom website page.</p><button class="cp-add-product" type="button" id="cms-add-empty"><span>+</span> Add page</button></section>
    @endforelse

    @if ($pages->hasPages())<div class="cp-gallery-pagination">{{ $pages->links('pagination::tailwind') }}</div>@endif
</main>

<div class="service-modal" id="cms-modal" aria-hidden="true">
    <div class="service-modal__backdrop" data-cms-close></div>
    <section class="service-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="cms-modal-title">
        <header><div><p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website CMS</p><h2 id="cms-modal-title">Add CMS page</h2></div><button type="button" class="ws-modal__close" data-cms-close>&times;</button></header>
        <form id="cms-form" action="{{ route('panel.client-cms.store') }}" method="POST">
            @csrf
            <div class="ws-grid">
                <label>Page title<input name="title" required maxlength="180" placeholder="e.g. Privacy Policy"></label>
                <label>Page slug<input name="slug" maxlength="180" placeholder="privacy-policy"><small>Leave blank to create it from the title.</small></label>
                <label>Status<select name="status"><option value="draft">Draft</option><option value="published">Published</option></select></label>
                <label class="ws-span-2">Page content<textarea name="content" required rows="10" maxlength="50000" placeholder="Write the content for this page."></textarea></label>
                <label class="ws-span-2">SEO title<input name="meta_title" maxlength="160"></label>
                <label class="ws-span-2">SEO description<textarea name="meta_description" maxlength="500"></textarea></label>
            </div>
            <footer><button type="submit" class="cp-add-product">Save page</button></footer>
        </form>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('cms-modal'), form = document.getElementById('cms-form');
    function open(page) {
        form.reset(); form.action = "{{ route('panel.client-cms.store') }}";
        document.getElementById('cms-modal-title').textContent = 'Add CMS page';
        if (page) {
            form.action = "{{ url('/panel/user/cms-pages') }}/" + page.id;
            document.getElementById('cms-modal-title').textContent = 'Edit CMS page';
            form.title.value = page.title; form.slug.value = page.slug; form.content.value = page.content;
            form.status.value = page.status; form.meta_title.value = page.meta_title || '';
            form.meta_description.value = page.meta_description || '';
        }
        modal.classList.add('is-open'); modal.setAttribute('aria-hidden', 'false');
    }
    function close() { modal.classList.remove('is-open'); modal.setAttribute('aria-hidden', 'true'); }
    ['cms-add-open', 'cms-add-empty'].forEach(function (id) { var button = document.getElementById(id); if (button) button.addEventListener('click', function () { open(); }); });
    document.querySelectorAll('.cms-edit').forEach(function (button) { button.addEventListener('click', function () { open(JSON.parse(button.dataset.page)); }); });
    modal.querySelectorAll('[data-cms-close]').forEach(function (button) { button.addEventListener('click', close); });
});
</script>
@endsection
