@extends('panel.client.layout.app')

@section('content')
<main class="cp-main cp-services">
    <section class="cp-products__header">
        <div>
            <p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website content</p>
            <h1>Frequently Asked Questions</h1>
            <p>Add answers to the questions your website visitors ask most.</p>
        </div>
        <button class="cp-add-product" type="button" id="faq-add-open"><span>+</span> Add FAQ</button>
    </section>

    @forelse ($faqs as $faq)
        @if ($loop->first)<section class="cp-service-grid">@endif
            <article class="cp-service-card">
                <div class="cp-service-card__body">
                    <span class="cp-service-card__position">{{ ucfirst($faq->status) }} · Position {{ $faq->sort_order }}</span>
                    <h2>{{ $faq->question }}</h2>
                    <p>{{ Str::limit($faq->answer, 180) }}</p>
                    <div class="cp-service-card__actions">
                        <button type="button" class="faq-edit" data-id="{{ $faq->id }}" data-question="{{ $faq->question }}" data-answer="{{ $faq->answer }}" data-order="{{ $faq->sort_order }}" data-status="{{ $faq->status }}">Edit</button>
                        <button type="button" class="delete-btn" data-id="{{ $faq->id }}" data-url="{{ route('panel.client-faqs.delete', $faq->id) }}">Delete</button>
                    </div>
                </div>
            </article>
        @if ($loop->last)</section>@endif
    @empty
        <section class="cp-gallery-empty"><span>?</span><h2>No FAQs added</h2><p>Add the first answer for your website visitors.</p><button class="cp-add-product" type="button" id="faq-add-empty"><span>+</span> Add FAQ</button></section>
    @endforelse

    @if ($faqs->hasPages())<div class="cp-gallery-pagination">{{ $faqs->links('pagination::tailwind') }}</div>@endif
</main>

<div class="service-modal" id="faq-modal" aria-hidden="true">
    <div class="service-modal__backdrop" data-faq-close></div>
    <section class="service-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="faq-modal-title">
        <header><div><p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website FAQ</p><h2 id="faq-modal-title">Add FAQ</h2></div><button type="button" class="ws-modal__close" data-faq-close>&times;</button></header>
        <form id="faq-form" action="{{ route('panel.client-faqs.store') }}" method="POST">
            @csrf
            <div class="ws-grid">
                <label class="ws-span-2">Question<input name="question" required maxlength="255" placeholder="e.g. What are your opening hours?"></label>
                <label class="ws-span-2">Answer<textarea name="answer" required rows="6" maxlength="5000" placeholder="Write a clear, helpful answer."></textarea></label>
                <label>Display position<input name="sort_order" type="number" min="0" max="999" value="0"></label>
                <label>Status<select name="status"><option value="draft">Draft</option><option value="published">Published</option></select></label>
            </div>
            <footer><button type="submit" class="cp-add-product">Save FAQ</button></footer>
        </form>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('faq-modal'), form = document.getElementById('faq-form');
    function open(button) {
        form.reset(); form.action = "{{ route('panel.client-faqs.store') }}";
        document.getElementById('faq-modal-title').textContent = 'Add FAQ';
        if (button) {
            form.action = "{{ url('/panel/user/faqs') }}/" + button.dataset.id;
            document.getElementById('faq-modal-title').textContent = 'Edit FAQ';
            form.question.value = button.dataset.question;
            form.answer.value = button.dataset.answer;
            form.sort_order.value = button.dataset.order;
            form.status.value = button.dataset.status;
        }
        modal.classList.add('is-open'); modal.setAttribute('aria-hidden', 'false');
    }
    function close() { modal.classList.remove('is-open'); modal.setAttribute('aria-hidden', 'true'); }
    ['faq-add-open', 'faq-add-empty'].forEach(function (id) { var button = document.getElementById(id); if (button) button.addEventListener('click', function () { open(); }); });
    document.querySelectorAll('.faq-edit').forEach(function (button) { button.addEventListener('click', function () { open(button); }); });
    modal.querySelectorAll('[data-faq-close]').forEach(function (button) { button.addEventListener('click', close); });
});
</script>
@endsection
