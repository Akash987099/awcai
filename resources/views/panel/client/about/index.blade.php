@extends('panel.client.layout.app')

@section('content')
<main class="cp-main cp-services">
    <section class="cp-products__header">
        <div>
            <p class="cp-eyebrow cp-eyebrow--dark"><span></span> Website content</p>
            <h1>About</h1>
            <p>Manage the profile, description, images and achievement counters shown on your About section.</p>
        </div>
    </section>

    <section class="cp-service-card" style="max-width: 1100px;">
        <div class="cp-service-card__body">
            <form action="{{ route('panel.about.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ws-grid">
                    <label>Profile / business name<input name="name" maxlength="160" value="{{ old('name', $about->name) }}" placeholder="e.g. Dr. Mayank Agarwal"></label>
                    <label>Designation<input name="designation" maxlength="180" value="{{ old('designation', $about->designation) }}" placeholder="e.g. Associate Professor"></label>
                    <label class="ws-span-2">Organization / credentials<input name="organization" maxlength="255" value="{{ old('organization', $about->organization) }}" placeholder="e.g. Department of Neurosurgery, SN Medical College"></label>
                    <label class="ws-span-2">About description<textarea name="description" rows="9" maxlength="10000" placeholder="Write the full profile or business story shown beside the images.">{{ old('description', $about->description) }}</textarea></label>
                    <label>Primary profile image<input name="primary_image" type="file" accept=".jpg,.jpeg,.png,.webp"><small>JPG, PNG or WEBP up to 4 MB. Leave blank to keep the current image.</small>@if($about->primary_image)<img class="mt-3 h-24 w-36 rounded-lg object-cover" src="{{ asset($about->primary_image) }}" alt="Current primary image">@endif</label>
                    <label>Secondary achievement image<input name="secondary_image" type="file" accept=".jpg,.jpeg,.png,.webp"><small>JPG, PNG or WEBP up to 4 MB. Leave blank to keep the current image.</small>@if($about->secondary_image)<img class="mt-3 h-24 w-36 rounded-lg object-cover" src="{{ asset($about->secondary_image) }}" alt="Current secondary image">@endif</label>
                    <label>First achievement value<input name="stat_one_value" maxlength="80" value="{{ old('stat_one_value', $about->stat_one_value) }}" placeholder="e.g. 3000+"></label>
                    <label>First achievement label<input name="stat_one_label" maxlength="120" value="{{ old('stat_one_label', $about->stat_one_label) }}" placeholder="e.g. Successful Surgeries"></label>
                    <label>Second achievement value<input name="stat_two_value" maxlength="80" value="{{ old('stat_two_value', $about->stat_two_value) }}" placeholder="e.g. 15+"></label>
                    <label>Second achievement label<input name="stat_two_label" maxlength="120" value="{{ old('stat_two_label', $about->stat_two_label) }}" placeholder="e.g. Years of Experience"></label>
                    <label class="ws-span-2">Read more URL (optional)<input name="read_more_url" type="url" value="{{ old('read_more_url', $about->read_more_url) }}" placeholder="https://yourwebsite.com/about"></label>
                </div>
                <footer class="mt-6"><button type="submit" class="cp-add-product">Save About content</button></footer>
            </form>
        </div>
    </section>
</main>
@endsection
