@extends('panel.client.layout.app')

@section('content')
<main class="cp-main cp-products">
    <section class="cp-products__header">
        <div>
            <p class="cp-eyebrow cp-eyebrow--dark"><span></span> Product catalogue</p>
            <h1>Products gallery</h1>
            <p>Manage your product images and details in one visual catalogue.</p>
        </div>
        <a class="cp-add-product" href="{{ route('panel.product.add') }}"><span>+</span> Add product</a>
    </section>

    <div class="cp-gallery-toolbar">
        <label class="cp-gallery-search" for="gallery-search"><span aria-hidden="true">&#8981;</span><input id="gallery-search" type="search" placeholder="Search products..." autocomplete="off"></label>
        <span class="cp-gallery-count">{{ $products->total() }} {{ Str::plural('product', $products->total()) }}</span>
    </div>

    @forelse ($products as $item)
        @if ($loop->first)
            <section class="cp-product-gallery" id="product-gallery">
        @endif
                <article class="cp-product-card" data-product-name="{{ strtolower($item->name) }}">
                    <div class="cp-product-card__image">
                        @if ($item->image)
                            <img src="{{ asset(ltrim($item->image, '/')) }}" alt="{{ $item->name }}" loading="lazy">
                        @else
                            <span class="cp-product-card__placeholder">&#9638;</span>
                        @endif
                        <span class="cp-product-card__number">#{{ $products->firstItem() + $loop->index }}</span>
                    </div>
                    <div class="cp-product-card__body">
                        <h2 title="{{ $item->name }}">{{ $item->name }}</h2>
                        <p>Catalogue item</p>
                        <div class="cp-product-card__actions">
                            <a href="{{ route('panel.product.edit', $item->id) }}" aria-label="Edit {{ $item->name }}">Edit <span>&rarr;</span></a>
                            <button type="button" class="delete-btn" data-id="{{ $item->id }}" data-url="{{ route('panel.product.delete', $item->id) }}" aria-label="Delete {{ $item->name }}">Delete</button>
                        </div>
                    </div>
                </article>
        @if ($loop->last)
            </section>
        @endif
    @empty
        <section class="cp-gallery-empty">
            <span>&#9638;</span>
            <h2>Your gallery is empty</h2>
            <p>Add your first product to start building the catalogue.</p>
            <a class="cp-add-product" href="{{ route('panel.product.add') }}"><span>+</span> Add your first product</a>
        </section>
    @endforelse

    <p class="cp-gallery-no-result" id="gallery-no-result" hidden>No matching products found.</p>

    @if ($products->hasPages())
        <div class="cp-gallery-pagination">{{ $products->links('pagination::tailwind') }}</div>
    @endif
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var search = document.getElementById('gallery-search');
    var cards = Array.from(document.querySelectorAll('.cp-product-card'));
    var noResult = document.getElementById('gallery-no-result');
    if (!search) return;
    search.addEventListener('input', function () {
        var query = this.value.trim().toLowerCase();
        var visible = 0;
        cards.forEach(function (card) {
            var matches = !query || card.dataset.productName.includes(query);
            card.hidden = !matches;
            if (matches) visible++;
        });
        noResult.hidden = visible !== 0;
    });
});
</script>
@endsection