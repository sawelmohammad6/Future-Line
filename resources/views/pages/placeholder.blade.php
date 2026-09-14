@extends('layouts.app')

@section('title', $pageTitle ?? 'Future Line Trading')

@section('content')
    <section class="mx-auto min-h-[calc(100vh-13rem)] max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <x-breadcrumb :items="[$pageTitle ?? 'Page']" />
        <div class="mt-8 max-w-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <x-section-heading eyebrow="Future Line Trading">{{ $pageTitle ?? 'Page' }}</x-section-heading>
            <p class="mt-4 text-slate-600">This frontend placeholder is ready for the next implementation phase.</p>
        </div>
    </section>
@endsection
