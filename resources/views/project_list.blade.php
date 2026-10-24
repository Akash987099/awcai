@extends('layout.app')
@section('title', 'AryaWeb innovations | Professional Website, App & Digital Marketing Company in Agra')
@section('meta_description', 'AryaWeb innovations is a professional IT company in Agra delivering website development, mobile app development, UI/UX design, eCommerce solutions, SEO, and digital marketing services for startups and businesses.')
@section('meta_keywords', 'AryaWeb innovations, website development company in Agra, app development company in Agra, SEO company in Agra, digital marketing agency in Agra, UI UX design company, eCommerce development, Laravel development')
@section('canonical', route('index'))
@section('meta_image', asset('assets/img/about.jpg'))
@section('content')



    <div class="pt-20 md:pt-16"></div>

    <section class="section-shell welcome-surface">
        <main class="max-w-screen-xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="section-heading font-bold text-primary mb-4">Projects & UI Kits</h2>
                <div class="section-divider"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach ($projects as $key => $val)
                    <div
                        class="max-w-xs uniform-card interactive-card overflow-hidden">
                        <a href="{{ route('project.index', $val->project_url) }}">
                            <img src="{{ asset($val->thumnail ?? 'assets/img/projects/hq720.jpg') }}"
                                alt="Parking Lot Management System" class="w-full h-48 object-contain">
                        </a>
                        <div class="p-4">

                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-base font-bold text-gray-800">{{ $val->name ?? '' }}</h3>
                                <span class="text-sm font-bold text-gray-600">Sales: {{ sales($val->id) }}</span>
                            </div>

                            <div class="flex items-center justify-between mb-3">
                                <div class="flex text-yellow-400 space-x-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= rating($val->id))
                                            <i class="fas fa-star text-sm"></i>
                                        @else
                                            <i class="far fa-star text-sm text-gray-300"></i>
                                        @endif
                                    @endfor
                                </div>

                                <a href="{{ $val->preview_link }}" target="_blank"
                                    class="px-3 py-1 text-xs font-semibold border border-gray-300 rounded-md text-gray-600 hover:bg-gray-100">
                                    Live Preview
                                </a>
                            </div>

                            <div class="flex items-center justify-between border-t pt-3">
                                <div class="flex items-center space-x-1 text-sm text-red-500 font-semibold">
                                    {!! category($val->category)->icon !!}
                                    <span>{{ category($val->category)->name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-500 text-sm line-through mr-2">₹{{ $val->actual_price }}</span>
                                    <span class="text-primary font-bold text-lg">₹{{ $val->price }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </main>
</section>

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "{{ route('index') }}#organization",
      "name": "AryaWeb innovations",
      "url": "{{ route('index') }}",
      "logo": "{{ asset('assets/img/logo.png') }}",
      "image": "{{ asset('assets/img/about.jpg') }}",
      "email": "aryawebcoding@gmail.com",
      "telephone": ["+91 9870992118", "+91 7906948573", "+91 8533074414"],
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Pavitra Marriage home NH-2 road",
        "addressLocality": "Agra",
        "addressRegion": "Uttar Pradesh",
        "addressCountry": "IN"
      },
      "sameAs": [
        "https://wa.me/919870992118"
      ]
    },
    {
      "@type": "WebSite",
      "@id": "{{ route('index') }}#website",
      "url": "{{ route('index') }}",
      "name": "AryaWeb innovations",
      "publisher": {
        "@id": "{{ route('index') }}#organization"
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ route('index') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    },
    {
      "@type": "LocalBusiness",
      "@id": "{{ route('index') }}#localbusiness",
      "name": "AryaWeb innovations",
      "url": "{{ route('index') }}",
      "image": "{{ asset('assets/img/about.jpg') }}",
      "telephone": "+91 9870992118",
      "email": "aryawebcoding@gmail.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Pavitra Marriage home NH-2 road",
        "addressLocality": "Agra",
        "addressRegion": "Uttar Pradesh",
        "addressCountry": "IN"
      },
      "areaServed": "India",
      "priceRange": "$$",
      "founder": "AryaWeb innovations",
      "makesOffer": [
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Website Development"
          }
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Mobile App Development"
          }
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "UI/UX Design"
          }
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Digital Marketing"
          }
        }
      ]
    }
  ]
}
</script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    @foreach($projects as $index => $val)
    {
      "@type": "Product",
      "name": "{{ $val->name }}",
      "description": "{!! $val->description !!}",
      "image": "{{ asset($val->thumnail ?? 'assets/img/projects/hq720.jpg') }}",
      "brand": {
        "@type": "category",
        "name": "{{category($val->category)->name}}"
      },
      "offers": {
        "@type": "Offer",
        "priceCurrency": "INR",
        "price": "{{ $val->price }}",
        "availability": "https://schema.org/InStock",
        "url": "{{ $val->preview_link }}"
      }
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endsection

