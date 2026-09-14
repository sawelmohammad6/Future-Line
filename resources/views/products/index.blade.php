@extends('layouts.app')

@section('title', 'Explore Products | Future Line Trading')
@section('meta_description', 'Discover quality feed, ingredients and raw materials from verified businesses on Future Line Trading.')

@php
    $productCategories = ['Fish Feed','Cattle Feed','Poultry Feed','Duck Feed','Animal Feed','Feed Raw Materials'];
    $productGrades = ['Grade 1','Grade 2','Grade 3','Grade 4'];
    $sellerTypes = ['Verified Seller','Manufacturer','Supplier','Importer','Exporter'];
    $units = ['KG','Ton'];
    $locations = ['Bangladesh','Dhaka','Chattogram','Gazipur','Rajshahi','Mymensingh'];
    $demoBrands = ['GreenLine','AquaPlus','DeltaFeed','RoyalMix','GoldenGrain','MarineSource','CoastalFeed','AgroSource'];
    $sortOptions = ['Relevance'=>'relevance','Newest'=>'newest','Price: Low to High'=>'price_asc','Price: High to Low'=>'price_desc','Highest Rated'=>'rating'];

    $demoProducts = [
        [
            'name' => 'Premium Pangas Fish Feed',
            'slug' => 'premium-pangas-fish-feed',
            'brand' => 'GreenLine',
            'grade' => 'Grade 1',
            'seller' => 'Green Feed Industries',
            'location' => 'Dhaka, Bangladesh',
            'price' => '৳55 / KG',
            'priceTon' => '৳55,000',
            'moq' => '500 KG',
            'rating' => '4.8',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Tilapia Floating Feed',
            'slug' => 'tilapia-floating-feed',
            'brand' => 'AquaPlus',
            'grade' => 'Grade 1',
            'seller' => 'Bluewater Feeds',
            'location' => 'Khulna, Bangladesh',
            'price' => '৳52 / KG',
            'priceTon' => '৳52,000',
            'moq' => '500 KG',
            'rating' => '4.7',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Shrimp Feed Premium',
            'slug' => 'shrimp-feed-premium',
            'brand' => 'CoastalFeed',
            'grade' => 'Grade 1',
            'seller' => 'Coastal Feed Mills',
            'location' => 'Chattogram, Bangladesh',
            'price' => '৳78 / KG',
            'priceTon' => '৳78,000',
            'moq' => '300 KG',
            'rating' => '4.9',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1615141982883-c7ad0e69fd62?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Shing Fish Feed',
            'slug' => 'shing-fish-feed',
            'brand' => 'AquaPlus',
            'grade' => 'Grade 2',
            'seller' => 'Bengal Aqua Nutrition',
            'location' => 'Mymensingh, Bangladesh',
            'price' => '৳58 / KG',
            'priceTon' => '৳58,000',
            'moq' => '500 KG',
            'rating' => '4.6',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Dairy Cattle Feed',
            'slug' => 'dairy-cattle-feed',
            'brand' => 'DeltaFeed',
            'grade' => 'Grade 1',
            'seller' => 'Delta Animal Feed',
            'location' => 'Gazipur, Bangladesh',
            'price' => '৳42 / KG',
            'priceTon' => '৳42,000',
            'moq' => '1,000 KG',
            'rating' => '4.8',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1516467508483-a7212febe31a?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Beef Cattle Feed',
            'slug' => 'beef-cattle-feed',
            'brand' => 'DeltaFeed',
            'grade' => 'Grade 2',
            'seller' => 'Delta Animal Feed',
            'location' => 'Gazipur, Bangladesh',
            'price' => '৳38 / KG',
            'priceTon' => '৳38,000',
            'moq' => '1,000 KG',
            'rating' => '4.5',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1527153857715-3908f2bae5e8?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Broiler Starter Feed',
            'slug' => 'broiler-starter-feed',
            'brand' => 'RoyalMix',
            'grade' => 'Grade 1',
            'seller' => 'Royal Poultry Nutrition',
            'location' => 'Chattogram, Bangladesh',
            'price' => '৳61 / KG',
            'priceTon' => '৳61,000',
            'moq' => '500 KG',
            'rating' => '4.6',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1548013146-72479768bada?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Layer Feed',
            'slug' => 'layer-feed',
            'brand' => 'GoldenGrain',
            'grade' => 'Grade 1',
            'seller' => 'Golden Grain Ltd.',
            'location' => 'Dhaka, Bangladesh',
            'price' => '৳49 / KG',
            'priceTon' => '৳49,000',
            'moq' => '500 KG',
            'rating' => '4.7',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Duck Grower Feed',
            'slug' => 'duck-grower-feed',
            'brand' => 'GreenLine',
            'grade' => 'Grade 2',
            'seller' => 'Fresh Feed & Ingredients',
            'location' => 'Rajshahi, Bangladesh',
            'price' => '৳45 / KG',
            'priceTon' => '৳45,000',
            'moq' => '500 KG',
            'rating' => '4.6',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1474511320723-9a56873571b7?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Fish Meal',
            'slug' => 'fish-meal',
            'brand' => 'MarineSource',
            'grade' => 'Grade 1',
            'seller' => 'Marine Source BD',
            'location' => 'Chattogram, Bangladesh',
            'price' => '৳112 / KG',
            'priceTon' => '৳112,000',
            'moq' => '500 KG',
            'rating' => '4.8',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1534483509719-8c792003e543?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Soybean Meal',
            'slug' => 'soybean-meal',
            'brand' => 'DeltaFeed',
            'grade' => 'Grade 1',
            'seller' => 'Delta Commodities',
            'location' => 'Dhaka, Bangladesh',
            'price' => '৳68 / KG',
            'priceTon' => '৳68,000',
            'moq' => '1,000 KG',
            'rating' => '4.9',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600&h=450&fit=crop',
        ],
        [
            'name' => 'Maize',
            'slug' => 'maize',
            'brand' => 'AgroSource',
            'grade' => 'Grade 2',
            'seller' => 'Agro Source Bangladesh',
            'location' => 'Narayanganj, Bangladesh',
            'price' => '৳38 / KG',
            'priceTon' => '৳38,000',
            'moq' => '2 Ton',
            'rating' => '4.6',
            'stock' => 'In Stock',
            'image' => 'https://images.unsplash.com/photo-1551754655-cd27e38d2076?w=600&h=450&fit=crop',
        ],
    ];
@endphp

@section('content')

    {{-- ============================================ --}}
    {{-- PAGE 1 — MARKETPLACE HEADER                   --}}
    {{-- ============================================ --}}
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <x-breadcrumb :items="['Products']" />

            <div class="mt-6 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-950">Explore Products</h1>
                    <p class="mt-2 max-w-xl text-base text-slate-500">Discover quality feed, ingredients and raw materials from verified businesses.</p>
                </div>

                <div class="flex shrink-0 flex-wrap items-center gap-3">
                    <span class="inline-flex items-center gap-2 border border-slate-200 bg-slate-50 px-3.5 py-2 text-xs font-bold text-slate-700">
                        <svg class="h-4 w-4 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 7 9 18l-5-5"/></svg>
                        500+ Products
                    </span>
                    <span class="inline-flex items-center gap-2 border border-slate-200 bg-slate-50 px-3.5 py-2 text-xs font-bold text-slate-700">
                        <svg class="h-4 w-4 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                        Verified Sellers
                    </span>
                    <span class="inline-flex items-center gap-2 border border-slate-200 bg-slate-50 px-3.5 py-2 text-xs font-bold text-slate-700">
                        <svg class="h-4 w-4 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h6v6H4zM14 4h6v6h-6zM4 14h6v6H4zM14 14h6v6h-6z"/></svg>
                        Multiple Categories
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- PAGE 2 — SEARCH BAR                           --}}
    {{-- ============================================ --}}
    <section class="bg-white border-b border-slate-100">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-col gap-3 sm:flex-row sm:items-stretch">
                <div class="relative flex-1">
                    <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input type="search" name="q" placeholder="Search products, brands, sellers or manufacturers..." class="w-full border border-slate-200 bg-white py-3.5 pl-12 pr-4 text-sm text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none">
                </div>
                <button type="submit" class="inline-flex items-center justify-center gap-2 bg-emerald-700 px-6 py-3.5 text-sm font-bold text-white transition-colors hover:bg-emerald-800">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    Search
                </button>
            </form>

            <div class="mt-3 flex flex-wrap items-center gap-2">
                <span class="text-xs font-medium text-slate-400">Quick:</span>
                @foreach (['Fish Feed','Cattle Feed','Poultry Feed','Fish Meal','Soybean Meal','Maize'] as $tag)
                    <a href="{{ route('products.index') }}?q={{ urlencode($tag) }}" class="inline-flex items-center border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-medium text-slate-600 transition-colors hover:border-emerald-300 hover:text-emerald-700">{{ $tag }}</a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- MAIN LAYOUT — SIDEBAR + TOOLBAR + GRID        --}}
    {{-- ============================================ --}}
    <section class="bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-8 lg:flex-row">

                {{-- Desktop sidebar --}}
                <aside class="hidden w-[280px] shrink-0 lg:block">
                    <x-filter-sidebar :categories="$productCategories" :grades="$productGrades" :seller-types="$sellerTypes" :units="$units" :locations="$locations" :brands="$demoBrands" />
                </aside>

                {{-- Main content area --}}
                <div class="flex-1 min-w-0">

                    {{-- Mobile filter bar --}}
                    <div class="mb-4 flex items-center gap-3 lg:hidden">
                        <button type="button" data-open-filters class="inline-flex flex-1 items-center justify-center gap-2 border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-400 hover:text-emerald-700">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M7 12h10M10 18h4"/></svg>
                            Filters
                        </button>
                    </div>

                    {{-- Toolbar --}}
                    <x-product-toolbar :from="1" :to="12" :total="120" :sort-options="$sortOptions" />

                    {{-- Product grid --}}
                    <div data-product-grid class="mt-6 grid grid-cols-1 min-[420px]:grid-cols-2 xl:grid-cols-3 gap-5">
                        @foreach ($demoProducts as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-8 flex justify-center">
                        <x-pagination :current="1" :pages="5" />
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- MOBILE FILTER DRAWER                          --}}
    {{-- ============================================ --}}
    <div data-filter-overlay class="fixed inset-0 z-40 hidden bg-slate-950/40 lg:hidden" aria-hidden="true"></div>
    <aside data-filter-drawer class="fixed inset-y-0 left-0 z-50 flex w-full max-w-sm -translate-x-full flex-col overflow-y-auto bg-white shadow-2xl transition-transform duration-200 lg:hidden" aria-label="Filters">
        <x-filter-sidebar :categories="$productCategories" :grades="$productGrades" :seller-types="$sellerTypes" :units="$units" :locations="$locations" :brands="$demoBrands" mobile />
    </aside>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var openBtn = document.querySelector('[data-open-filters]');
            var overlay = document.querySelector('[data-filter-overlay]');
            var drawer = document.querySelector('[data-filter-drawer]');
            var closeBtns = document.querySelectorAll('[data-close-filter]');
            var grid = document.querySelector('[data-product-grid]');
            var viewBtns = document.querySelectorAll('[data-view]');

            function openFilters() {
                if (!drawer || !overlay) return;
                drawer.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeFilters() {
                if (!drawer || !overlay) return;
                drawer.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }

            if (openBtn) openBtn.addEventListener('click', openFilters);
            if (overlay) overlay.addEventListener('click', closeFilters);
            closeBtns.forEach(function (btn) { btn.addEventListener('click', closeFilters); });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeFilters();
            });

            viewBtns.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var view = btn.dataset.view;
                    viewBtns.forEach(function (b) {
                        if (b.dataset.view === 'grid') {
                            b.classList.toggle('text-emerald-700', view === 'grid');
                            b.classList.toggle('text-slate-400', view !== 'grid');
                            b.classList.toggle('hover:text-slate-600', view !== 'grid');
                        }
                        if (b.dataset.view === 'list') {
                            b.classList.toggle('text-emerald-700', view === 'list');
                            b.classList.toggle('text-slate-400', view !== 'list');
                            b.classList.toggle('hover:text-slate-600', view !== 'list');
                        }
                    });
                    if (!grid) return;
                    if (view === 'list') {
                        grid.classList.add('product-list-view', 'grid-cols-1');
                        grid.classList.remove('min-[420px]:grid-cols-2', 'xl:grid-cols-3');
                    } else {
                        grid.classList.remove('product-list-view', 'grid-cols-1');
                        grid.classList.add('min-[420px]:grid-cols-2', 'xl:grid-cols-3');
                    }
                });
            });
        });
    </script>
@endpush