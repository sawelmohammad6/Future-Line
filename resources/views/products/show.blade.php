@extends('layouts.app')

@section('title', $product['name'] . ' | Future Line Trading')
@section('meta_description', $product['overview'])

@php
    $tabs = [
        'overview' => 'Overview',
        'specifications' => 'Specifications',
        'quality' => 'Quality & Grade',
        'seller' => 'Seller Information',
        'reviews' => 'Reviews',
    ];
    $grades = [
        ['name' => 'Grade 1', 'label' => 'Premium / Highest Quality', 'bar' => 'bg-emerald-600', 'active' => true],
        ['name' => 'Grade 2', 'label' => 'Standard Quality', 'bar' => 'bg-sky-500', 'active' => false],
        ['name' => 'Grade 3', 'label' => 'Commercial Quality', 'bar' => 'bg-amber-500', 'active' => false],
        ['name' => 'Grade 4', 'label' => 'Economy Quality', 'bar' => 'bg-slate-400', 'active' => false],
    ];
@endphp

@section('content')

    {{-- ============================================ --}}
    {{-- 1. BREADCRUMB                              --}}
    {{-- ============================================ --}}
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
            <x-breadcrumb :items="['Products', $product['category'], $product['name']]" />
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 2 & 3. GALLERY + PRODUCT INFORMATION         --}}
    {{-- ============================================ --}}
    <section class="bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

                {{-- Gallery --}}
                <div>
                    <div class="relative border border-slate-200 bg-white p-2 shadow-sm">
                        <img data-main-image src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                            class="aspect-square w-full object-cover">
                        <button type="button" data-wishlist-gallery
                            class="absolute right-4 top-4 inline-flex h-10 w-10 items-center justify-center border border-slate-200 bg-white/95 text-slate-600 shadow-sm transition-colors hover:border-emerald-300 hover:text-emerald-700"
                            aria-label="Add to wishlist">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">
                                <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.9-8.6a5.5 5.5 0 0 0-.1-7.8Z" />
                            </svg>
                        </button>
                        <button type="button"
                            class="absolute bottom-4 right-4 inline-flex h-10 w-10 items-center justify-center border border-slate-200 bg-white/95 text-slate-600 shadow-sm transition-colors hover:border-emerald-300 hover:text-emerald-700"
                            aria-label="Zoom image">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2"><circle cx="11" cy="11" r="8" /><path d="m21 21-4.3-4.3M8 11h6M11 8v6" /></svg>
                        </button>
                    </div>

                    <div class="mt-3 grid grid-cols-4 gap-3">
                        @foreach ($product['gallery'] as $image)
                            <button type="button" data-thumb="{{ $image }}"
                                class="aspect-square overflow-hidden border-2 bg-slate-100 transition-colors @if ($loop->first) border-emerald-600 @else border-slate-200 hover:border-emerald-300 @endif"
                                aria-label="View image {{ $loop->iteration }}">
                                <img src="{{ $image }}" alt="" loading="lazy"
                                    class="h-full w-full object-cover">
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Product information --}}
                <div class="flex flex-col">
                    <div class="border border-slate-200 bg-white p-6 shadow-sm">
                        <span class="inline-flex items-center gap-1 border border-emerald-100 bg-emerald-50 px-2.5 py-1 text-xs font-bold text-emerald-800">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5"><path d="m5 12 4 4L19 6" /></svg>
                            Verified Product
                        </span>

                        <h1 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">{{ $product['name'] }}</h1>

                        <dl class="mt-4 space-y-1.5 text-sm">
                            <div class="flex">
                                <dt class="w-32 shrink-0 font-medium text-slate-500">Brand</dt>
                                <dd class="font-semibold text-slate-900">{{ $product['brand'] }}</dd>
                            </div>
                            <div class="flex">
                                <dt class="w-32 shrink-0 font-medium text-slate-500">Seller</dt>
                                <dd class="font-semibold text-slate-900">{{ $product['seller'] }}</dd>
                            </div>
                            <div class="flex">
                                <dt class="w-32 shrink-0 font-medium text-slate-500">Location</dt>
                                <dd class="font-semibold text-slate-900">{{ $product['location'] }}</dd>
                            </div>
                        </dl>

                        <div class="mt-4 flex flex-wrap items-center gap-3 border-y border-slate-100 py-4">
                            <div class="flex items-center gap-0.5 text-amber-500">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="m12 2 3.1 6.3L22 9.3l-5 4.9 1.2 6.8-6.2-3.3-6.2 3.3 1.2-6.8-5-4.9 6.9-1L12 2Z" /></svg>
                                @endfor
                            </div>
                            <p class="text-sm font-bold text-slate-900">{{ $product['rating'] }}
                                <a href="#reviews-tab" data-jump-tab="reviews" class="ml-1 font-medium text-slate-500 hover:text-emerald-700">({{ $product['reviews_count'] }} Reviews)</a>
                            </p>
                        </div>

                        <div class="mt-4 flex items-center gap-2">
                            <span class="text-sm font-medium text-slate-500">Grade:</span>
                            <span class="font-bold text-slate-900">{{ $product['grade'] }}</span>
                            <span class="text-xs text-slate-400">—</span>
                            <span class="text-xs font-medium text-emerald-700">{{ $product['grade_note'] }}</span>
                        </div>

                        <div class="mt-4 border-b border-slate-100 pb-4">
                            <div class="flex flex-wrap items-end gap-x-8 gap-y-3">
                                <div>
                                    <p class="text-lg font-extrabold text-slate-950">{{ $product['price_kg'] }} <span class="text-sm font-semibold text-slate-500">/ KG</span></p>
                                    <p class="mt-0.5 text-sm text-slate-500">{{ $product['price_ton'] }} <span class="text-slate-400">/ Ton</span></p>
                                </div>
                                <div class="text-sm">
                                    <p class="text-slate-500">MOQ: <span class="font-semibold text-slate-700">{{ $product['moq'] }}</span></p>
                                    <p class="text-emerald-700">
                                        <span class="inline-block h-2 w-2 rounded-full bg-emerald-600"></span>
                                        {{ $product['stock'] }}
                                    </p>
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-slate-500">Available Quantity: <span class="font-semibold text-slate-700">{{ $product['available_qty'] }}</span></p>
                        </div>

                        {{-- Unit selector --}}
                        <div class="mt-4">
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Select Unit</p>
                            <div class="mt-2 grid grid-cols-2 gap-2 sm:max-w-xs">
                                <button type="button" data-unit="KG"
                                    class="inline-flex items-center justify-center border bg-emerald-700 px-4 py-2.5 text-sm font-bold text-white transition-colors hover:bg-emerald-800">KG</button>
                                <button type="button" data-unit="Ton"
                                    class="inline-flex items-center justify-center border border-slate-300 px-4 py-2.5 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">Ton</button>
                            </div>
                        </div>

                        {{-- Quantity selector --}}
                        <div class="mt-4">
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Quantity</p>
                            <div class="mt-2 inline-flex items-stretch border border-slate-300">
                                <button type="button" data-qty-minus
                                    class="inline-flex w-12 items-center justify-center border-r border-slate-300 text-lg font-bold text-slate-600 transition-colors hover:bg-slate-50" aria-label="Decrease quantity">−</button>
                                <input type="text" data-qty-input readonly value="500 KG"
                                    class="w-32 text-center text-sm font-bold text-slate-900 focus:outline-none">
                                <button type="button" data-qty-plus
                                    class="inline-flex w-12 items-center justify-center border-l border-slate-300 text-lg font-bold text-slate-600 transition-colors hover:bg-slate-50" aria-label="Increase quantity">+</button>
                            </div>
                            <p class="mt-2 text-xs text-slate-500">Minimum order {{ $product['moq'] }} · Step 500 KG</p>
                        </div>

                        {{-- Actions --}}
                        <div class="mt-5 grid grid-cols-2 gap-3">
                            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-1.5 bg-emerald-700 px-4 py-3 text-sm font-bold text-white transition-colors hover:bg-emerald-800">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 4h2l2.1 10.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L20 8H6" /></svg>
                                Add to Cart
                            </a>
                            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-1.5 border border-slate-900 bg-slate-900 px-4 py-3 text-sm font-bold text-white transition-colors hover:bg-slate-800">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 11h14M13 5l6 6-6 6" /></svg>
                                Buy Now
                            </a>
                            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center border border-slate-300 px-4 py-2.5 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">Request for Quote</a>
                            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center border border-slate-300 px-4 py-2.5 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">Contact Seller</a>
                        </div>
                    </div>

                    {{-- 5. Trust information --}}
                    <div class="mt-4 border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Marketplace Trust</p>
                        <ul class="mt-3 grid grid-cols-1 gap-2.5 sm:grid-cols-2">
                            @foreach ($product['trust'] as $trust)
                                <li class="flex items-center gap-2 text-sm text-slate-700">
                                    <span class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-emerald-200 bg-emerald-50 text-emerald-700">
                                        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6" /></svg>
                                    </span>
                                    {{ $trust }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 6. PRODUCT DETAILS TABS                      --}}
    {{-- ============================================ --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="overflow-x-auto border-b border-slate-200">
                <div role="tablist" class="flex min-w-max gap-1">
                    @foreach ($tabs as $key => $label)
                        <button type="button" role="tab" data-tab-btn="{{ $key }}"
                            @class([
                                'px-4 py-3 text-sm font-bold transition-colors border-b-2',
                                'border-emerald-700 text-emerald-700' => $loop->first,
                                'border-transparent text-slate-500 hover:text-slate-800' => !$loop->first,
                            ])>{{ $label }}</button>
                    @endforeach
                </div>
            </div>

            {{-- Overview --}}
            <div data-tab-panel="overview" class="py-8">
                <div class="max-w-3xl space-y-4">
                    <h2 class="text-xl font-bold text-slate-950">Product Overview</h2>
                    <p class="text-sm leading-7 text-slate-600">{{ $product['overview'] }}</p>
                    <p class="text-sm leading-7 text-slate-600">Each batch is produced in a controlled facility, packed in sealed
                        25 KG bags and shipped with clear batch and manufacturing information. Buyers are encouraged to review
                        the grade, packaging and batch details shown on this page before placing an order.</p>
                </div>
            </div>

            {{-- Specifications --}}
            <div data-tab-panel="specifications" class="hidden py-8">
                <h2 class="text-xl font-bold text-slate-950">Specifications</h2>
                <div class="mt-5 max-w-3xl overflow-hidden border border-slate-200">
                    <table class="w-full text-sm">
                        <tbody>
                            @foreach ($product['specs'] as $label => $value)
                                <tr class="border-b border-slate-100 last:border-b-0">
                                    <th scope="row" class="w-1/3 bg-slate-50 px-4 py-3 text-left font-semibold text-slate-600">{{ $label }}</th>
                                    <td class="px-4 py-3 font-medium text-slate-900">{{ $value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Quality & Grade --}}
            <div data-tab-panel="quality" class="hidden py-8">
                <h2 class="text-xl font-bold text-slate-950">Quality & Grade</h2>
                <div class="mt-5 grid max-w-3xl gap-4 sm:grid-cols-2">
                    <div class="border border-emerald-200 bg-emerald-50/60 p-5">
                        <p class="text-sm font-bold uppercase tracking-wide text-emerald-800">Current Product Grade</p>
                        <p class="mt-2 text-2xl font-extrabold text-slate-950">{{ $product['grade'] }}</p>
                        <p class="mt-1 text-sm font-semibold text-emerald-700">{{ $product['grade_note'] }} — Highest available quality tier.</p>
                    </div>
                    <div class="space-y-3">
                        @foreach ($grades as $grade)
                            <div class="flex items-center gap-3">
                                <span class="h-8 w-1.5 shrink-0 {{ $grade['bar'] }}"></span>
                                <div class="flex-1">
                                    <p class="text-sm font-bold text-slate-900">{{ $grade['name'] }}</p>
                                    <p class="text-xs text-slate-500">{{ $grade['label'] }}</p>
                                </div>
                                @if ($grade['active'])
                                    <span class="text-[11px] font-bold text-emerald-700">This Product</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Seller Information --}}
            <div data-tab-panel="seller" class="hidden py-8">
                <h2 class="text-xl font-bold text-slate-950">Seller Information</h2>
                <div class="mt-5 max-w-3xl border border-slate-200 bg-slate-50/60 p-6">
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="inline-flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-emerald-700 text-xl font-extrabold text-white">GF</span>
                        <div class="flex-1">
                            <p class="text-lg font-extrabold text-slate-950">{{ $product['seller'] }}</p>
                            <span class="mt-1 inline-flex items-center gap-1 border border-emerald-100 bg-emerald-50 px-2 py-0.5 text-xs font-bold text-emerald-800">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6" /></svg>
                                Verified Business
                            </span>
                        </div>
                    </div>
                    <dl class="mt-5 space-y-1.5 text-sm">
                        <div class="flex"><dt class="w-32 shrink-0 font-medium text-slate-500">Business Type</dt><dd class="font-semibold text-slate-900">{{ $product['seller_type'] }}</dd></div>
                        <div class="flex"><dt class="w-32 shrink-0 font-medium text-slate-500">Location</dt><dd class="font-semibold text-slate-900">{{ $product['location'] }}</dd></div>
                        <div class="flex"><dt class="w-32 shrink-0 font-medium text-slate-500">Products</dt><dd class="font-semibold text-slate-900">120+ Products</dd></div>
                        <div class="flex"><dt class="w-32 shrink-0 font-medium text-slate-500">Rating</dt><dd class="font-semibold text-slate-900">4.9 / 5</dd></div>
                    </dl>
                    <div class="mt-5">
                        <a href="{{ route('sellers.show', $product['seller_slug']) }}" class="inline-flex items-center justify-center bg-emerald-700 px-5 py-2.5 text-sm font-bold text-white transition-colors hover:bg-emerald-800">View Seller Profile</a>
                    </div>
                </div>
            </div>

            {{-- Reviews --}}
            <div data-tab-panel="reviews" class="hidden py-8" id="reviews-tab">
                <div class="flex flex-wrap items-end justify-between gap-3">
                    <div>
                        <h2 class="text-xl font-bold text-slate-950">Customer Reviews</h2>
                        <p class="mt-1 text-sm text-slate-500">{{ $product['reviews_count'] }} verified reviews · Average {{ $product['rating'] }}/5</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center border border-slate-300 px-4 py-2 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">Write a Review</a>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @foreach ($product['reviews'] as $review)
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
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 7. BATCH / QUALITY INFORMATION               --}}
    {{-- ============================================ --}}
    <section class="bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <h2 class="text-xl font-bold text-slate-950">Batch / Lot Information</h2>
                    <span class="inline-flex items-center gap-1.5 border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-800">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10" /></svg>
                        Quality Controlled Batch
                    </span>
                </div>
                <dl class="mt-5 grid grid-cols-1 gap-px overflow-hidden border border-slate-200 bg-slate-200 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ([
                        ['Batch Number', $product['batch']['batch_number']],
                        ['Manufacturing Date', $product['batch']['manufacturing_date']],
                        ['Best Before', $product['batch']['best_before']],
                        ['COA / Lab Report', $product['batch']['coa']],
                    ] as [$label, $value])
                        <div class="bg-white px-5 py-4">
                            <dt class="text-xs font-semibold uppercase tracking-wide text-slate-400">{{ $label }}</dt>
                            <dd class="mt-1 text-sm font-bold text-slate-900">{{ $value }}</dd>
                        </div>
                    @endforeach
                </dl>
                <p class="mt-4 text-xs text-slate-500">Batch details are illustrative frontend demo content and will be tied to the product database in a later phase.</p>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 8. RELATED PRODUCTS                          --}}
    {{-- ============================================ --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between gap-4">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-emerald-700">Marketplace</p>
                    <h2 class="mt-1 text-2xl font-extrabold text-slate-950">Related Products</h2>
                </div>
                <a href="{{ route('products.index') }}" class="hidden shrink-0 text-sm font-bold text-emerald-700 hover:text-emerald-800 sm:inline-block">View All →</a>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-5 min-[420px]:grid-cols-2 xl:grid-cols-4">
                @foreach ($related as $item)
                    <x-product-card :product="$item" />
                @endforeach
            </div>

            <div class="mt-6 text-center sm:hidden">
                <a href="{{ route('products.index') }}" class="inline-block text-sm font-bold text-emerald-700 hover:text-emerald-800">View All Products →</a>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 9. BUYER INFORMATION NOTICE                  --}}
    {{-- ============================================ --}}
    <section class="bg-white border-t border-slate-100 pb-16">
        <div class="mx-auto max-w-7xl px-4 pt-2 sm:px-6 lg:px-8">
            <div class="flex items-start gap-3 border border-slate-200 bg-slate-50 px-5 py-4">
                <svg class="mt-0.5 h-5 w-5 shrink-0 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10" /><path d="M12 16v-4M12 8h.01" /></svg>
                <p class="text-sm leading-6 text-slate-600">Before placing an order, review product grade, quantity, pricing, seller information and applicable marketplace charges.</p>
            </div>
        </div>
    </section>

    <div class="h-20 lg:hidden" aria-hidden="true"></div>

    {{-- Mobile sticky purchase bar --}}
    <div class="fixed inset-x-0 bottom-0 z-40 border-t border-slate-200 bg-white px-4 py-3 shadow-[0_-4px_20px_-8px_rgba(15,23,42,0.15)] lg:hidden">
        <div class="mx-auto flex max-w-md items-center gap-3">
            <div class="shrink-0">
                <p class="text-base font-extrabold text-slate-950">{{ $product['price_kg'] }}<span class="text-xs font-semibold text-slate-500"> / KG</span></p>
                <p class="text-[11px] text-slate-500">MOQ {{ $product['moq'] }}</p>
            </div>
            <a href="{{ route('products.index') }}" class="inline-flex flex-1 items-center justify-center bg-emerald-700 px-4 py-3 text-sm font-bold text-white transition-colors hover:bg-emerald-800">Add to Cart</a>
            <a href="{{ route('products.index') }}" class="inline-flex flex-1 items-center justify-center border border-slate-900 bg-slate-900 px-4 py-3 text-sm font-bold text-white transition-colors hover:bg-slate-800">Buy Now</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ----- Gallery -----
            var mainImage = document.querySelector('[data-main-image]');
            var thumbs = document.querySelectorAll('[data-thumb]');
            thumbs.forEach(function (thumb) {
                thumb.addEventListener('click', function () {
                    mainImage.src = thumb.dataset.thumb;
                    thumbs.forEach(function (t) {
                        t.classList.toggle('border-emerald-600', t === thumb);
                        t.classList.toggle('border-slate-200', t !== thumb);
                    });
                });
            });

            // ----- Tabs -----
            var tabBtns = document.querySelectorAll('[data-tab-btn]');
            var panels = document.querySelectorAll('[data-tab-panel]');
            function activateTab(key) {
                tabBtns.forEach(function (btn) {
                    var active = btn.dataset.tabBtn === key;
                    btn.classList.toggle('border-emerald-700', active);
                    btn.classList.toggle('text-emerald-700', active);
                    btn.classList.toggle('border-transparent', !active);
                    btn.classList.toggle('text-slate-500', !active);
                    btn.classList.toggle('hover:text-slate-800', !active);
                });
                panels.forEach(function (panel) {
                    panel.classList.toggle('hidden', panel.dataset.tabPanel !== key);
                });
            }
            tabBtns.forEach(function (btn) {
                btn.addEventListener('click', function () { activateTab(btn.dataset.tabBtn); });
            });
            document.querySelectorAll('[data-jump-tab]').forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    activateTab(link.dataset.jumpTab);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            });

            // ----- Unit toggle (frontend only) -----
            var unitKg = document.querySelector('[data-unit="KG"]');
            var unitTon = document.querySelector('[data-unit="Ton"]');
            var qtyInput = document.querySelector('[data-qty-input]');
            var qtyMinus = document.querySelector('[data-qty-minus]');
            var qtyPlus = document.querySelector('[data-qty-plus]');
            var unit = 'KG';
            var qtyKg = 500;

            function formatQty() {
                var value = unit === 'KG' ? qtyKg : Math.round((qtyKg / 1000) * 10) / 10;
                var display = value.toLocaleString('en-US');
                if (unit === 'Ton' && Number.isInteger(value)) display = value.toFixed(1);
                qtyInput.value = display + ' ' + unit;
            }

            function setUnit(next) {
                unit = next;
                var kgActive = next === 'KG';
                unitKg.classList.toggle('bg-emerald-700', kgActive);
                unitKg.classList.toggle('text-white', kgActive);
                unitKg.classList.toggle('border-emerald-700', kgActive);
                unitKg.classList.toggle('border-slate-300', !kgActive);
                unitKg.classList.toggle('text-slate-700', !kgActive);
                unitTon.classList.toggle('bg-emerald-700', !kgActive);
                unitTon.classList.toggle('text-white', !kgActive);
                unitTon.classList.toggle('border-emerald-700', !kgActive);
                unitTon.classList.toggle('border-slate-300', kgActive);
                unitTon.classList.toggle('text-slate-700', kgActive);
                formatQty();
            }
            if (unitKg && unitTon) {
                unitKg.addEventListener('click', function () { setUnit('KG'); });
                unitTon.addEventListener('click', function () { setUnit('Ton'); });
            }
            if (qtyPlus && qtyMinus && qtyInput) {
                qtyPlus.addEventListener('click', function () { qtyKg = Math.min(25000, qtyKg + 500); formatQty(); });
                qtyMinus.addEventListener('click', function () { qtyKg = Math.max(500, qtyKg - 500); formatQty(); });
            }

            // ----- Wishlist (frontend only) -----
            document.querySelectorAll('[data-wishlist-gallery]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var svg = btn.querySelector('svg');
                    var active = btn.classList.contains('text-rose-600');
                    btn.classList.toggle('text-rose-600', !active);
                    btn.classList.toggle('border-rose-200', !active);
                    if (svg) svg.setAttribute('fill', active ? 'none' : 'currentColor');
                });
            });
        });
    </script>
@endpush