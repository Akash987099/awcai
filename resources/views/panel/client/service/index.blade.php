@extends('panel.client.layout.app')

@section('content')
<main class="cp-main cp-services">
    <section class="cp-products__header">
        <div>
            <p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website content</p>
            <h1>Services</h1>
            <p>Create detailed service cards with images for your website.</p>
        </div>
        <button class="cp-add-product" type="button" id="service-add-open"><span>+</span> Add service</button>
    </section>

    @forelse ($services as $service)
        @if ($loop->first)<section class="cp-service-grid">@endif
            <article class="cp-service-card">
                @if ($service->image)<img src="{{ asset(ltrim($service->image, '/')) }}" alt="{{ $service->title }}">@else<div class="cp-service-card__placeholder">&#9672;</div>@endif
                <div class="cp-service-card__body">
                    <span class="cp-service-card__position">Position {{ $service->sort_order }}</span>
                    <h2>{{ $service->title }}</h2>
                    <p>{{ $service->short_description ?: Str::limit($service->description, 115) }}</p>
                    <div class="cp-service-card__actions">
                        <button type="button" class="service-edit" data-id="{{ $service->id }}" data-title="{{ $service->title }}" data-short="{{ $service->short_description }}" data-description="{{ $service->description }}" data-url="{{ $service->service_url }}" data-order="{{ $service->sort_order }}">Edit details</button>
                        <button type="button" class="delete-btn" data-id="{{ $service->id }}" data-url="{{ route('panel.client-services.delete', $service->id) }}">Delete</button>
                    </div>
                </div>
            </article>
        @if ($loop->last)</section>@endif
    @empty
        <section class="cp-gallery-empty"><span>&#9672;</span><h2>No services added</h2><p>Add your first service with its full details and image.</p><button class="cp-add-product" type="button" id="service-add-empty"><span>+</span> Add service</button></section>
    @endforelse

    @if ($services->hasPages())<div class="cp-gallery-pagination">{{ $services->links('pagination::tailwind') }}</div>@endif
</main>

<div class="service-modal" id="service-modal" aria-hidden="true">
    <div class="service-modal__backdrop" data-service-close></div>
    <section class="service-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="service-modal-title">
        <header><div><p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website service</p><h2 id="service-modal-title">Add service</h2></div><button type="button" class="ws-modal__close" data-service-close>&times;</button></header>
        <form id="service-form" action="{{ route('panel.client-services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="ws-grid">
                <label>Service title<input name="title" required maxlength="160" placeholder="e.g. Dental care"></label>
                <label>Display position<input name="sort_order" type="number" min="0" max="999" value="0"></label>
                <label class="ws-span-2">Short description<input name="short_description" maxlength="300" placeholder="One-line service summary"></label>
                <label class="ws-span-2">Full service details<textarea name="description" rows="5" maxlength="3000" placeholder="Explain the service, key benefits and what clients can expect."></textarea></label>
                <label class="ws-span-2">Service page URL (optional)<input name="service_url" type="url" placeholder="https://yourwebsite.com/service"></label>
                <label class="ws-span-2">Service image<input id="service-image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp" required><small id="service-image-hint">JPG, PNG or WEBP up to 4 MB</small></label>
            </div>
            <footer><button type="submit" class="cp-add-product">Save service</button></footer>
        </form>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('service-modal'), form = document.getElementById('service-form');
    var image = document.getElementById('service-image'), hint = document.getElementById('service-image-hint');
    function open(button) {
        form.reset(); form.action = "{{ route('panel.client-services.store') }}";
        document.getElementById('service-modal-title').textContent = 'Add service';
        image.required = true; hint.textContent = 'JPG, PNG or WEBP up to 4 MB';
        if (button && button.classList.contains('service-edit')) {
            form.action = "{{ url('/panel/user/services') }}/" + button.dataset.id;
            document.getElementById('service-modal-title').textContent = 'Edit service';
            form.title.value = button.dataset.title; form.short_description.value = button.dataset.short || '';
            form.description.value = button.dataset.description || ''; form.service_url.value = button.dataset.url || '';
            form.sort_order.value = button.dataset.order || 0; image.required = false;
            hint.textContent = 'Leave empty to keep the current image.';
        }
        modal.classList.add('is-open'); modal.setAttribute('aria-hidden', 'false');
    }
    function close() { modal.classList.remove('is-open'); modal.setAttribute('aria-hidden', 'true'); }
    ['service-add-open','service-add-empty'].forEach(function(id){var b=document.getElementById(id);if(b)b.addEventListener('click',function(){open()})});
    document.querySelectorAll('.service-edit').forEach(function(button){button.addEventListener('click',function(){open(button)})});
    modal.querySelectorAll('[data-service-close]').forEach(function(item){item.addEventListener('click',close)});
});
</script>
@endsection