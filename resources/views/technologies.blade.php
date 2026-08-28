@extends('layout.app')
@section('content')
    <div class="py-8"></div>

 <section class="py-8 bg-gray-200">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold font-heading text-primary mb-4">Technologies</h2>
                <div class="h-1 w-20 bg-accent mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

                <!-- PHP -->

                @foreach ($technology as $key => $item)
                    <div
                        class="relative overflow-hidden bg-box p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300 text-center">
                        <div class="mb-4 flex justify-center">
                            <img src="{!! $item->icon !!}" alt="PHP" class="w-20 h-20 object-contain mx-auto">
                        </div>
                        <h3 class="text-xl font-semibold text-dark mb-3">{{ $item->name }}</h3>

                        <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-green-400/20"></div>
    <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-green-500/20"></div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
