@extends('layout.app')
@section('content')
    <div class="py-8"></div>

    <section id="about" class="py-8 bg-gray-200">
        <div class="container relative overflow-hidden mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold font-heading text-primary mb-4">
                    {{ $cms->name }}
                </h2>
                <div class="h-1 w-20 bg-accent mx-auto"></div>
            </div>

            <div class="items-center">

                <p class="text-lg mb-6">
                    {!! $cms->description !!}
                </p>

            </div>

        </div>
    </section>
@endsection
