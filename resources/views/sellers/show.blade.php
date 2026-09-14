@extends('layouts.app')

@section('title', $seller['name'] . ' | Future Line Trading')
@section('meta_description', $seller['description'])

@php
    $transparencyFeatures = [
        ['icon' => 'M20 6 9 17l-5-5', 'title' => 'Product Grade', 'text' => 'Each product listing clearly shows its grade tier before you order.'],
        ['icon' => 'M12 8v4l3 3M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20Z', 'title' => 'Batch / Lot Information', 'text' => 'Batch numbers and manufacturing details are shown on product listings.'],
        ['icon' => 'M9 11H3M9 15H6M13 7h8M13 11h8M13 15h5', 'title' => 'Specifications', 'text' => 'Key specifications such as packaging, origin and shelf life are listed.'],
        ['icon' => 'M9 12l2 2 4-4m5.6 2A9.6 9.6 0 1 1 6.4 4.4 9.6 9.6 0 0 1 18 9.6', 'title' => 'COA / Lab Report', 'text' => 'Where available, lab reports can be requested directly from the seller.'],
    ];
    $verificationItems = ['Business Identity', 'Business Profile', 'Contact Information', 'Product Information'];
@endphp

@section('content')

    {{-- ============================================ --}}
    {{-- 1. PROFILE HEADER                            --}}
    {{-- ============================================ --}}
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <x-breadcrumb :items="['Sellers', $seller['name']]" />

            <div class="mt-6 flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-start">
                    <span class="inline-flex h-20 w-20 shrink-0 items-center justify-center rounded-xl border border-emerald-200 bg-emerald-50 text-2xl font-extrabold text-emerald-800">{{ $seller['logo'] }}</span>
                    <div>
                        <div class="flex flex-wrap items-center gap-2.5">
                            <h1 class="text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">{{ $seller['name'] }}</h1>
                            <span class="inline-flex items-center gap-1 border border-emerald-100 bg-emerald-50 px-2.5 py-1 text-xs font-bold text-emerald-800">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6" /></svg>
                                Verified Business
                            </span>
                        </div>
                        <p class="mt-2 text-sm font-semibold text-slate-700">{{ $seller['type'] }}</p>
                        <p class="mt-1 flex items-center gap-1.5 text-sm text-slate-500">
                            <svg class="h-4 w-4 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" /><circle cx="12" cy="10" r="2.5" /></svg>
                            {{ $seller['location'] }}
                        </p>
                    </div>
                </div>

                <div class="flex shrink-0 flex-wrap items-center gap-3">
                    <button type="button" data-follow-seller class="inline-flex items-center justify-center gap-1.5 border border-slate-300 px-4 py-2.5 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">
                        <svg data-follow-icon class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.9-8.6a5.5 5.5 0 0 0-.1-7.8Z" /></svg>
                        Follow
                    </button>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center border border-emerald-700 bg-emerald-700 px-4 py-2.5 text-sm font-bold text-white transition-colors hover:bg-emerald-800">View Products</a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center border border-emerald-700 bg-white px-4 py-2.5 text-sm font-bold text-emerald-700 transition-colors hover:bg-emerald-50">Contact Seller</a>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-2 gap-px overflow-hidden border border-slate-200 bg-slate-200 sm:grid-cols-4">
                <div class="bg-white px-5 py-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Rating</p>
                    <p class="mt-1 flex items-center gap-1.5 text-lg font-extrabold text-slate-950">
                        <svg class="h-5 w-5 fill-current text-amber-500" viewBox="0 0 24 24"><path d="m12 2 3.1 6.3L22 9.3l-5 4.9 1.2 6.8-6.2-3.3-6.2 3.3 1.2-6.8-5-4.9 6.9-1L12 2Z" /></svg>
                        {{ $seller['rating'] }}
                    </p>
                </div>
                <div class="bg-white px-5 py-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Products</p>
                    <p class="mt-1 text-lg font-extrabold text-slate-950">{{ $seller['products_count'] }}</p>
                </div>
                <div class="bg-white px-5 py-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Buyers</p>
                    <p class="mt-1 text-lg font-extrabold text-slate-950">{{ $seller['buyers_count'] }}</p>
                </div>
                <div class="bg-white px-5 py-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Established</p>
                    <p class="mt-1 text-lg font-extrabold text-slate-950">{{ $seller['established'] }}</p>
                </div>
            </div>

            <p class="mt-6 max-w-3xl text-sm leading-7 text-slate-600">{{ $seller['description'] }}</p>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 2. VERIFICATION PANEL + 3. BUSINESS INFO      --}}
    {{-- ============================================ --}}
    <section class="bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                <div class="border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Business Verification</p>
                        <span class="inline-flex items-center gap-1 border border-emerald-100 bg-emerald-50 px-2.5 py-1 text-xs font-bold text-emerald-800">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6" /></svg>
                            Verified
                        </span>
                    </div>
                    <ul class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2">
                        @foreach ($verificationItems as $item)
                            <li class="flex items-center gap-2.5 border border-slate-100 bg-slate-50 px-3.5 py-3 text-sm font-semibold text-slate-700">
                                <span class="inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-emerald-200 bg-emerald-50 text-emerald-700">
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6" /></svg>
                                </span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                    <p class="mt-4 text-xs leading-5 text-slate-400">Verification status shown here is part of the marketplace trust interface.</p>
                </div>

                <div class="border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Business Information</p>
                    <dl class="mt-5 space-y-3.5">
                        @foreach ($seller['info'] as $label => $value)
                            <div class="flex flex-col gap-0.5 sm:flex-row sm:items-baseline sm:gap-4">
                                <dt class="w-44 shrink-0 text-sm font-medium text-slate-500">{{ $label }}</dt>
                                <dd class="text-sm font-semibold text-slate-900">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>

            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 4. PRODUCTS FROM THIS SELLER                 --}}
    {{-- ============================================ --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <x-section-heading eyebrow="Seller Catalog">Products From This Seller</x-section-heading>
                </div>
                <a href="{{ route('products.index') }}" class="shrink-0 text-sm font-bold text-emerald-700 hover:text-emerald-800">View All Products →</a>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-5 min-[420px]:grid-cols-2 lg:grid-cols-4">
                @foreach ($seller['products'] as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center border border-emerald-700 bg-white px-6 py-3 text-sm font-bold text-emerald-700 transition-colors hover:bg-emerald-50">View All Products</a>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 5. BUSINESS CATEGORIES                       --}}
    {{-- ============================================ --}}
    <section class="border-y border-slate-200 bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Specialisation">Main Categories</x-section-heading>
            <div class="mt-6 flex flex-wrap gap-3">
                @foreach ($seller['main_categories'] as $category)
                    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition-colors hover:border-emerald-300 hover:text-emerald-700">
                        <svg class="h-4 w-4 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 14h6v6h-6z" /></svg>
                        {{ $category }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 6. QUALITY & PRODUCT TRANSPARENCY            --}}
    {{-- ============================================ --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Transparency">Quality & Product Transparency</x-section-heading>
            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500">Buyers can review the available product information — grade, batch, specifications and lab records — directly on each listing before placing an order.</p>

            <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($transparencyFeatures as $feature)
                    <div class="border border-slate-200 bg-white p-5 shadow-sm transition-colors hover:border-emerald-200">
                        <span class="inline-flex h-11 w-11 items-center justify-center border border-emerald-100 bg-emerald-50 text-emerald-700">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="{{ $feature['icon'] }}" /></svg>
                        </span>
                        <h3 class="mt-4 text-base font-bold text-slate-950">{{ $feature['title'] }}</h3>
                        <p class="mt-1.5 text-sm leading-6 text-slate-500">{{ $feature['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 7. BUYER REVIEWS                             --}}
    {{-- ============================================ --}}
    <section class="bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <x-section-heading eyebrow="Reputation">Buyer Reviews</x-section-heading>
                    <div class="mt-3 flex items-center gap-3">
                        <span class="text-3xl font-extrabold text-slate-950">{{ $seller['rating'] }}</span>
                        <div class="flex items-center gap-0.5 text-amber-500">
                            @for ($i = 0; $i < 5; $i++)
                                <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="m12 2 3.1 6.3L22 9.3l-5 4.9 1.2 6.8-6.2-3.3-6.2 3.3 1.2-6.8-5-4.9 6.9-1L12 2Z" /></svg>
                            @endfor
                        </div>
                        <span class="text-sm text-slate-500">Demo average from buyer reviews</span>
                    </div>
                </div>
                <a href="{{ route('products.index') }}" class="shrink-0 text-sm font-bold text-emerald-700 hover:text-emerald-800">Read All Reviews →</a>
            </div>

            <div class="mt-8 grid gap-5 sm:grid-cols-2">
                @foreach ($seller['reviews'] as $review)
                    <article class="border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-700 text-sm font-bold text-white">{{ collect(explode(' ', $review['name']))->take(2)->map(fn($w) => mb_substr($w, 0, 1))->join('') }}</span>
                            <div class="flex-1">
                                <p class="text-sm font-bold text-slate-900">{{ $review['name'] }}</p>
                                <p class="text-xs text-slate-500">{{ $review['location'] }} · {{ $review['date'] }}</p>
                            </div>
                            <span class="inline-flex items-center gap-1 text-sm font-bold text-amber-600">
                                <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="m12 2 3.1 6.3L22 9.3l-5 4.9 1.2 6.8-6.2-3.3-6.2 3.3 1.2-6.8-5-4.9 6.9-1L12 2Z" /></svg>
                                {{ $review['rating'] }}
                            </span>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $review['text'] }}</p>
                        <p class="mt-3 text-[11px] font-bold text-emerald-700">✓ Verified Review</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 8. BUSINESS GALLERY                          --}}
    {{-- ============================================ --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Facility">Business & Facility</x-section-heading>
            <div class="mt-8 grid grid-cols-2 gap-4 lg:grid-cols-3">
                @foreach ($seller['gallery'] as $item)
                    <button type="button" data-gallery-item data-gallery-label="{{ $item['label'] }}" data-gallery-src="{{ $item['image'] }}" class="group relative aspect-[4/3] overflow-hidden border border-slate-200 bg-slate-100 shadow-sm">
                        <img src="{{ $item['image'] }}" alt="{{ $item['label'] }}" loading="lazy" decoding="async" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <span class="absolute inset-0 flex items-end bg-gradient-to-t from-slate-950/60 to-transparent opacity-0 transition group-hover:opacity-100">
                            <span class="px-4 py-3 text-sm font-bold text-white">{{ $item['label'] }}</span>
                        </span>
                        <span class="absolute right-3 top-3 inline-flex h-8 w-8 items-center justify-center bg-white/90 text-slate-700 opacity-0 transition group-hover:opacity-100">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8" /><path d="m21 21-4.3-4.3M8 11h6M11 8v6" /></svg>
                        </span>
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 9. CONTACT / BUSINESS CTA                    --}}
    {{-- ============================================ --}}
    <section class="bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
            <div class="border border-emerald-200 bg-white px-6 py-10 text-center shadow-sm sm:px-10">
                <h2 class="text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">Interested in Buying From This Seller?</h2>
                <p class="mx-auto mt-3 max-w-2xl text-sm leading-6 text-slate-500">Review products, compare available options and contact the seller for business enquiries.</p>
                <div class="mt-7 flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center bg-emerald-700 px-6 py-3 text-sm font-bold text-white transition-colors hover:bg-emerald-800">View Products</a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center border border-emerald-700 bg-white px-6 py-3 text-sm font-bold text-emerald-700 transition-colors hover:bg-emerald-50">Contact Seller</a>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center border border-slate-300 bg-white px-6 py-3 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">Request a Quote</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 10. SIMILAR VERIFIED SELLERS                 --}}
    {{-- ============================================ --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <x-section-heading eyebrow="Marketplace">Similar Verified Sellers</x-section-heading>
                </div>
                <a href="{{ route('sellers.index') }}" class="shrink-0 text-sm font-bold text-emerald-700 hover:text-emerald-800">View All Sellers →</a>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
                @foreach ($similarSellers as $item)
                    <x-seller-card :seller="$item" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- LIGHTBOX                                     --}}
    {{-- ============================================ --}}
    <div data-lightbox class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/80 p-4" role="dialog" aria-modal="true" aria-label="Image preview">
        <button type="button" data-lightbox-close class="absolute right-4 top-4 inline-flex h-11 w-11 items-center justify-center border border-slate-200/30 text-white transition-colors hover:bg-white/10" aria-label="Close preview">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 6l12 12M18 6 6 18" /></svg>
        </button>
        <figure class="max-h-full max-w-3xl">
            <img data-lightbox-image src="" alt="" class="max-h-[80vh] w-full object-contain">
            <figcaption data-lightbox-caption class="mt-3 text-center text-sm font-semibold text-white"></figcaption>
        </figure>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ----- Follow button (frontend only) -----
            var followBtn = document.querySelector('[data-follow-seller]');
            if (followBtn) {
                followBtn.addEventListener('click', function () {
                    var active = followBtn.classList.contains('border-emerald-700');
                    followBtn.classList.toggle('border-emerald-700', !active);
                    followBtn.classList.toggle('bg-emerald-700', !active);
                    followBtn.classList.toggle('text-white', !active);
                    followBtn.classList.toggle('text-slate-700', active);
                    followBtn.classList.toggle('border-slate-300', active);
                    followBtn.childNodes.forEach(function (node) {
                        if (node.nodeType === Node.TEXT_NODE) node.nodeValue = active ? ' Follow' : ' Following';
                    });
                    var icon = followBtn.querySelector('[data-follow-icon]');
                    if (icon) icon.setAttribute('fill', active ? 'none' : 'currentColor');
                });
            }

            // ----- Gallery lightbox -----
            var lightbox = document.querySelector('[data-lightbox]');
            var lightboxImage = document.querySelector('[data-lightbox-image]');
            var lightboxCaption = document.querySelector('[data-lightbox-caption]');
            var galleryItems = document.querySelectorAll('[data-gallery-item]');

            function openLightbox(src, label) {
                if (!lightbox || !lightboxImage) return;
                lightboxImage.src = src;
                lightboxImage.alt = label;
                if (lightboxCaption) lightboxCaption.textContent = label;
                lightbox.classList.remove('hidden');
                lightbox.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            function closeLightbox() {
                if (!lightbox) return;
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
                document.body.style.overflow = '';
            }

            galleryItems.forEach(function (item) {
                item.addEventListener('click', function () { openLightbox(item.dataset.gallerySrc, item.dataset.galleryLabel); });
            });
            document.querySelectorAll('[data-lightbox-close]').forEach(function (btn) { btn.addEventListener('click', closeLightbox); });
            if (lightbox) lightbox.addEventListener('click', function (e) { if (e.target === lightbox) closeLightbox(); });
            document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeLightbox(); });
        });
    </script>
@endpush