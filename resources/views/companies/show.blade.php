@extends('layouts.app')

@section('title', $company['name'] . ' | Company Profile | Future Line Trading')
@section('meta_description', $company['description'])

@section('content')
<div x-data="{ 
    activeTab: 'overview', 
    activeBrandFilter: 'all',
    selectedImage: null, 
    inquiryModalOpen: false, 
    modalProduct: '',
    inquirySuccess: false,
    followState: false,

    openInquiry(productName = '') {
        this.modalProduct = productName;
        this.inquirySuccess = false;
        this.inquiryModalOpen = true;
    },
    closeInquiry() {
        this.inquiryModalOpen = false;
    },
    submitInquiry() {
        this.inquirySuccess = true;
        setTimeout(() => {
            this.inquiryModalOpen = false;
            this.inquirySuccess = false;
        }, 2000);
    }
}" class="min-h-screen bg-slate-50">

    {{-- ============================================ --}}
    {{-- 1. COMPANY HEADER                            --}}
    {{-- ============================================ --}}
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <x-breadcrumb :items="['Companies', $company['name']]" />

            <div class="mt-6 flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                {{-- Left: Company Identity --}}
                <div class="flex flex-col gap-5 sm:flex-row sm:items-start">
                    <span class="inline-flex h-24 w-24 shrink-0 items-center justify-center rounded-2xl border border-emerald-200 bg-gradient-to-br from-emerald-50 to-emerald-100 text-3xl font-black text-emerald-800 shadow-sm">
                        {{ $company['logo'] }}
                    </span>
                    <div>
                        <div class="flex flex-wrap items-center gap-3">
                            <h1 class="text-2xl font-black tracking-tight text-slate-950 sm:text-3xl lg:text-4xl">
                                {{ $company['name'] }}
                            </h1>
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-extrabold uppercase tracking-wide text-emerald-800 shadow-xs">
                                <svg class="h-4 w-4 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="m5 12 4 4L19 6" />
                                </svg>
                                Verified Business
                            </span>
                        </div>
                        <p class="mt-2 text-base font-bold text-slate-700">
                            {{ $company['type'] }}
                        </p>
                        <p class="mt-1 flex items-center gap-2 text-sm font-medium text-slate-500">
                            <svg class="h-4 w-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" />
                                <circle cx="12" cy="10" r="2.5" />
                            </svg>
                            {{ $company['location'] }}
                        </p>
                    </div>
                </div>

                {{-- Right: Quick Header Actions --}}
                <div class="flex shrink-0 flex-wrap items-center gap-3">
                    <button type="button" 
                        @click="followState = !followState" 
                        :class="followState ? 'bg-emerald-50 border-emerald-600 text-emerald-800' : 'bg-white border-slate-300 text-slate-700 hover:border-emerald-600 hover:text-emerald-800'"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border px-4 py-2.5 text-sm font-extrabold transition-all shadow-xs">
                        <svg class="h-4 w-4" :class="followState ? 'fill-emerald-600 stroke-emerald-600' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.9-8.6a5.5 5.5 0 0 0-.1-7.8Z" />
                        </svg>
                        <span x-text="followState ? 'Following' : 'Follow Brand'"></span>
                    </button>

                    <button type="button" 
                        @click="activeTab = 'products'; $nextTick(() => document.getElementById('tab-content').scrollIntoView({ behavior: 'smooth' }))"
                        class="inline-flex items-center justify-center rounded-lg border border-emerald-700 bg-emerald-700 px-5 py-2.5 text-sm font-extrabold text-white transition-all hover:bg-emerald-800 shadow-sm">
                        View Products
                    </button>

                    <button type="button" 
                        @click="openInquiry('General Business Inquiry')"
                        class="inline-flex items-center justify-center rounded-lg border border-emerald-700 bg-white px-5 py-2.5 text-sm font-extrabold text-emerald-800 transition-all hover:bg-emerald-50 shadow-xs">
                        Contact Company
                    </button>
                </div>
            </div>

            {{-- Key Metrics Bar --}}
            <div class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-4 lg:gap-6">
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition-all hover:border-emerald-300">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Rating</p>
                    <p class="mt-1 flex items-center gap-2 text-xl font-black text-slate-950">
                        <span class="flex items-center gap-1 text-amber-500">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="m12 2 3.1 6.3L22 9.3l-5 4.9 1.2 6.8-6.2-3.3-6.2 3.3 1.2-6.8-5-4.9 6.9-1L12 2Z"/></svg>
                            {{ $company['rating'] }}
                        </span>
                        <span class="text-xs font-normal text-slate-500">(Verified)</span>
                    </p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition-all hover:border-emerald-300">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Products Listed</p>
                    <p class="mt-1 text-xl font-black text-slate-950">{{ $company['products_count'] }}</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition-all hover:border-emerald-300">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Years in Business</p>
                    <p class="mt-1 text-xl font-black text-slate-950">{{ $company['years'] }}</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition-all hover:border-emerald-300">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Country Origin</p>
                    <p class="mt-1 text-xl font-black text-slate-950">{{ $company['country'] }}</p>
                </div>
            </div>

            {{-- Brief Summary Banner --}}
            <p class="mt-6 max-w-4xl text-sm leading-relaxed text-slate-600 font-medium">
                {{ $company['description'] }}
            </p>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- 2. STICKY NAVIGATION TABS                    --}}
    {{-- ============================================ --}}
    <div class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur-md shadow-xs">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <nav class="-mb-px flex space-x-6 overflow-x-auto scrollbar-none" aria-label="Tabs">
                <button type="button" @click="activeTab = 'overview'" 
                    :class="activeTab === 'overview' ? 'border-emerald-600 text-emerald-800 font-black' : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 font-bold'"
                    class="whitespace-nowrap border-b-2 py-4 text-sm transition-colors">
                    Overview
                </button>
                <button type="button" @click="activeTab = 'brands'" 
                    :class="activeTab === 'brands' ? 'border-emerald-600 text-emerald-800 font-black' : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 font-bold'"
                    class="whitespace-nowrap border-b-2 py-4 text-sm transition-colors flex items-center gap-2">
                    Brand Portfolio
                    <span class="rounded-full bg-emerald-100 px-2 py-0.5 text-xs font-black text-emerald-800">{{ count($company['brands']) }}</span>
                </button>
                <button type="button" @click="activeTab = 'products'" 
                    :class="activeTab === 'products' ? 'border-emerald-600 text-emerald-800 font-black' : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 font-bold'"
                    class="whitespace-nowrap border-b-2 py-4 text-sm transition-colors flex items-center gap-2">
                    Products & Categories
                    <span class="rounded-full bg-slate-100 px-2 py-0.5 text-xs font-bold text-slate-700">{{ count($company['products']) }}</span>
                </button>
                <button type="button" @click="activeTab = 'details'" 
                    :class="activeTab === 'details' ? 'border-emerald-600 text-emerald-800 font-black' : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 font-bold'"
                    class="whitespace-nowrap border-b-2 py-4 text-sm transition-colors">
                    Company Details & Capacity
                </button>
                <button type="button" @click="activeTab = 'gallery'" 
                    :class="activeTab === 'gallery' ? 'border-emerald-600 text-emerald-800 font-black' : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 font-bold'"
                    class="whitespace-nowrap border-b-2 py-4 text-sm transition-colors">
                    Factory & Facilities
                </button>
                <button type="button" @click="activeTab = 'documents'" 
                    :class="activeTab === 'documents' ? 'border-emerald-600 text-emerald-800 font-black' : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 font-bold'"
                    class="whitespace-nowrap border-b-2 py-4 text-sm transition-colors">
                    Documents & Audit
                </button>
                <button type="button" @click="activeTab = 'reviews'" 
                    :class="activeTab === 'reviews' ? 'border-emerald-600 text-emerald-800 font-black' : 'border-transparent text-slate-600 hover:text-slate-900 hover:border-slate-300 font-bold'"
                    class="whitespace-nowrap border-b-2 py-4 text-sm transition-colors">
                    Reviews ({{ count($company['reviews']) }})
                </button>
            </nav>
        </div>
    </div>

    {{-- MAIN CONTAINER WITH SIDEBAR --}}
    <div id="tab-content" class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">

            {{-- MAIN TAB CONTENT AREA (2 COLS) --}}
            <div class="space-y-10 lg:col-span-2">

                {{-- ============================================ --}}
                {{-- TAB 1: OVERVIEW                              --}}
                {{-- ============================================ --}}
                <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-200" class="space-y-8">
                    {{-- About Section --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <h2 class="text-xl font-black text-slate-950">About {{ $company['name'] }}</h2>
                        <div class="mt-4 text-sm leading-relaxed text-slate-600 space-y-4">
                            <p>{{ $company['long_description'] }}</p>
                            <p>Equipped with modern manufacturing technology in Gazipur, Bangladesh, {{ $company['name'] }} produces formulated nutrition products adhering to national feed quality benchmarks. The brand portfolio covers high-protein fish feed, balanced cattle feed, broiler/layer poultry feeds, and pure raw ingredients.</p>
                        </div>

                        {{-- Transparency Banner --}}
                        <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50/60 p-4">
                            <div class="flex items-start gap-3">
                                <span class="rounded-lg bg-emerald-600 p-2 text-white shrink-0">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                                    </svg>
                                </span>
                                <div>
                                    <h4 class="text-sm font-extrabold text-emerald-950">Verified Manufacturer & Brand Owner</h4>
                                    <p class="mt-1 text-xs text-emerald-800 leading-normal">
                                        Future Line B2B verified this company's physical office presence, manufacturing site in Gazipur, and brand trademark registrations.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Key Business Highlights Grid --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <h3 class="text-lg font-black text-slate-950">Business Profile & Highlights</h3>
                        <dl class="mt-6 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                            @foreach ($company['info'] as $label => $value)
                                <div class="border-b border-slate-100 pb-3">
                                    <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">{{ $label }}</dt>
                                    <dd class="mt-1 text-sm font-extrabold text-slate-800">{{ $value }}</dd>
                                </div>
                            @endforeach
                        </dl>
                    </div>

                    {{-- Quick Featured Brands Banner inside Overview --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-black text-slate-950">Owned Brands</h3>
                            <button type="button" @click="activeTab = 'brands'" class="text-xs font-extrabold text-emerald-800 hover:underline">View All Brands &rarr;</button>
                        </div>
                        <div class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3">
                            @foreach (array_slice($company['brands'], 0, 3) as $brand)
                                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 text-center">
                                    <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-700 text-base font-black text-white">
                                        {{ $brand['initials'] }}
                                    </span>
                                    <h4 class="mt-3 text-sm font-black text-slate-900">{{ $brand['name'] }}</h4>
                                    <p class="mt-1 text-xs text-slate-500">{{ $brand['count'] }} Products</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- TAB 2: BRAND PORTFOLIO                       --}}
                {{-- ============================================ --}}
                <div x-show="activeTab === 'brands'" x-transition:enter="transition ease-out duration-200" class="space-y-6">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <div class="border-b border-slate-100 pb-6">
                            <h2 class="text-xl font-black text-slate-950">Brand Portfolio</h2>
                            <p class="mt-1 text-sm text-slate-500">
                                {{ $company['name'] }} owns and operates {{ count($company['brands']) }} distinct market brand labels tailored to different livestock & aquaculture segments.
                            </p>
                        </div>

                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                            @foreach ($company['brands'] as $brand)
                                <div class="flex flex-col justify-between rounded-xl border border-slate-200 bg-white p-5 shadow-xs transition-all hover:border-emerald-500 hover:shadow-md">
                                    <div>
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-700 to-emerald-900 text-lg font-black text-white shadow-xs">
                                                {{ $brand['initials'] }}
                                            </span>
                                            <div>
                                                <h3 class="text-base font-black text-slate-950">{{ $brand['name'] }}</h3>
                                                <span class="inline-flex rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-extrabold text-emerald-800">
                                                    {{ $brand['count'] }} Listed Items
                                                </span>
                                            </div>
                                        </div>
                                        <p class="mt-4 text-xs leading-relaxed text-slate-600">
                                            {{ $brand['description'] }}
                                        </p>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-slate-100">
                                        <button type="button" 
                                            @click="activeBrandFilter = '{{ $brand['name'] }}'; activeTab = 'products';"
                                            class="w-full inline-flex items-center justify-center gap-1.5 rounded-lg border border-slate-200 bg-slate-50 px-4 py-2 text-xs font-extrabold text-slate-700 transition-colors hover:border-emerald-600 hover:bg-emerald-50 hover:text-emerald-800">
                                            View {{ $brand['name'] }} Products
                                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- TAB 3: PRODUCTS & CATEGORIES                 --}}
                {{-- ============================================ --}}
                <div x-show="activeTab === 'products'" x-transition:enter="transition ease-out duration-200" class="space-y-6">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between border-b border-slate-100 pb-6">
                            <div>
                                <h2 class="text-xl font-black text-slate-950">Products Catalog</h2>
                                <p class="mt-1 text-sm text-slate-500">Filter product listings by brand or category</p>
                            </div>
                            
                            {{-- Brand Filter Selector --}}
                            <div class="flex flex-wrap items-center gap-2">
                                <button type="button" @click="activeBrandFilter = 'all'"
                                    :class="activeBrandFilter === 'all' ? 'bg-emerald-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                                    class="rounded-lg px-3 py-1.5 text-xs font-extrabold transition-colors">
                                    All Products
                                </button>
                                @foreach ($company['brands'] as $brand)
                                    <button type="button" @click="activeBrandFilter = '{{ $brand['name'] }}'"
                                        :class="activeBrandFilter === '{{ $brand['name'] }}' ? 'bg-emerald-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                                        class="rounded-lg px-3 py-1.5 text-xs font-extrabold transition-colors">
                                        {{ $brand['name'] }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Products Grid --}}
                        <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                            @foreach ($company['products'] as $product)
                                <div x-show="activeBrandFilter === 'all' || activeBrandFilter === '{{ $product['brand'] }}'"
                                    class="group flex flex-col justify-between overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xs transition-all hover:border-emerald-500 hover:shadow-md">
                                    <div>
                                        {{-- Image Container --}}
                                        <div class="relative h-48 w-full overflow-hidden bg-slate-100">
                                            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                                            <span class="absolute top-3 left-3 rounded-md bg-white/90 backdrop-blur-md px-2.5 py-1 text-xs font-black text-emerald-800 shadow-xs">
                                                {{ $product['brand'] }}
                                            </span>
                                            <span class="absolute top-3 right-3 rounded-md bg-emerald-700 px-2.5 py-1 text-xs font-extrabold text-white shadow-xs">
                                                {{ $product['grade'] }}
                                            </span>
                                        </div>

                                        {{-- Content --}}
                                        <div class="p-5">
                                            <h3 class="text-base font-extrabold text-slate-950 group-hover:text-emerald-800 transition-colors">
                                                {{ $product['name'] }}
                                            </h3>
                                            <p class="mt-1 text-xs text-slate-500">{{ $product['location'] }}</p>

                                            <div class="mt-4 flex items-baseline justify-between border-t border-slate-100 pt-3">
                                                <div>
                                                    <span class="text-xs font-semibold text-slate-400 block uppercase">Price</span>
                                                    <span class="text-base font-black text-slate-950">{{ $product['price'] }}</span>
                                                    <span class="text-xs text-slate-500"> ({{ $product['priceTon'] }}/MT)</span>
                                                </div>
                                                <div class="text-right">
                                                    <span class="text-xs font-semibold text-slate-400 block uppercase">MOQ</span>
                                                    <span class="text-xs font-black text-slate-800">{{ $product['moq'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Actions --}}
                                    <div class="border-t border-slate-100 p-4 bg-slate-50/50 flex gap-2">
                                        <button type="button" @click="openInquiry('{{ $product['name'] }}')"
                                            class="flex-1 rounded-lg border border-emerald-700 bg-emerald-700 py-2 text-center text-xs font-extrabold text-white transition-colors hover:bg-emerald-800 shadow-xs">
                                            Inquire Now
                                        </button>
                                        <a href="{{ route('products.show', $product['slug']) }}"
                                            class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-center text-xs font-extrabold text-slate-700 transition-colors hover:bg-slate-100">
                                            Details
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- TAB 4: COMPANY DETAILS & CAPACITY            --}}
                {{-- ============================================ --}}
                <div x-show="activeTab === 'details'" x-transition:enter="transition ease-out duration-200" class="space-y-6">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs space-y-8">
                        <div>
                            <h2 class="text-xl font-black text-slate-950">Company Infrastructure & Capacity</h2>
                            <p class="mt-1 text-sm text-slate-500">Manufacturing setup, trade focus, and operational details</p>
                        </div>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                                <h4 class="text-xs font-extrabold uppercase tracking-wider text-emerald-800">Factory Facility Specs</h4>
                                <ul class="mt-3 space-y-2 text-xs text-slate-700">
                                    <li class="flex justify-between border-b border-slate-200/60 pb-1.5">
                                        <span class="text-slate-500 font-medium">Plant Area:</span>
                                        <span class="font-extrabold text-slate-900">200,000+ sq ft</span>
                                    </li>
                                    <li class="flex justify-between border-b border-slate-200/60 pb-1.5">
                                        <span class="text-slate-500 font-medium">Location:</span>
                                        <span class="font-extrabold text-slate-900">Gazipur Industrial Zone</span>
                                    </li>
                                    <li class="flex justify-between border-b border-slate-200/60 pb-1.5">
                                        <span class="text-slate-500 font-medium">Annual Production:</span>
                                        <span class="font-extrabold text-slate-900">50,000+ MT / Year</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-slate-500 font-medium">Testing Lab:</span>
                                        <span class="font-extrabold text-emerald-700">In-house Quality Lab</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                                <h4 class="text-xs font-extrabold uppercase tracking-wider text-emerald-800">Trade & Distribution Coverage</h4>
                                <ul class="mt-3 space-y-2 text-xs text-slate-700">
                                    <li class="flex justify-between border-b border-slate-200/60 pb-1.5">
                                        <span class="text-slate-500 font-medium">Primary Markets:</span>
                                        <span class="font-extrabold text-slate-900">All 64 Districts, BD</span>
                                    </li>
                                    <li class="flex justify-between border-b border-slate-200/60 pb-1.5">
                                        <span class="text-slate-500 font-medium">Supply Type:</span>
                                        <span class="font-extrabold text-slate-900">Wholesale / Dealership</span>
                                    </li>
                                    <li class="flex justify-between border-b border-slate-200/60 pb-1.5">
                                        <span class="text-slate-500 font-medium">Export Readiness:</span>
                                        <span class="font-extrabold text-slate-900">Regional Export Ready</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-slate-500 font-medium">Transport Fleet:</span>
                                        <span class="font-extrabold text-slate-900">Dedicated Logistics</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- Factory Video Showcase Placeholder --}}
                        <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-900 p-8 text-white text-center">
                            <div class="absolute inset-0 bg-gradient-to-r from-emerald-950/80 to-slate-950/80"></div>
                            <div class="relative z-10 mx-auto max-w-md space-y-4">
                                <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-600/90 text-white shadow-lg">
                                    <svg class="h-8 w-8 ml-1" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                                </span>
                                <h3 class="text-lg font-black">Factory & Production Video Tour</h3>
                                <p class="text-xs text-slate-300">
                                    Demo facility tour highlighting automated mixing, pelleting lines and quality assurance testing.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- TAB 5: FACTORY & GALLERY                    --}}
                {{-- ============================================ --}}
                <div x-show="activeTab === 'gallery'" x-transition:enter="transition ease-out duration-200" class="space-y-6">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <h2 class="text-xl font-black text-slate-950">Factory & Facility Photos</h2>
                        <p class="mt-1 text-sm text-slate-500">Verified facility photos from {{ $company['name'] }} Gazipur plant</p>

                        <div class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3">
                            @foreach ($company['gallery'] as $img)
                                <div @click="selectedImage = '{{ asset($img['image']) }}'" class="group relative cursor-pointer overflow-hidden rounded-xl border border-slate-200 bg-slate-100 aspect-4/3">
                                    <img src="{{ asset($img['image']) }}" alt="{{ $img['label'] }}" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                                    <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                        <span class="text-xs font-bold text-white">{{ $img['label'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- TAB 6: DOCUMENTS & COMPLIANCE               --}}
                {{-- ============================================ --}}
                <div x-show="activeTab === 'documents'" x-transition:enter="transition ease-out duration-200" class="space-y-6">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <div class="border-b border-slate-100 pb-6">
                            <h2 class="text-xl font-black text-slate-950">Verification & Compliance Documents</h2>
                            <p class="mt-1 text-sm text-slate-500">Official business certificates verified by Future Line B2B team</p>
                        </div>

                        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            @foreach ($company['documents'] as $doc)
                                <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-slate-50 p-4">
                                    <div class="flex items-center gap-3">
                                        <span class="rounded-lg bg-emerald-100 p-2 text-emerald-800">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                                <polyline points="14 2 14 8 20 8" />
                                            </svg>
                                        </span>
                                        <div>
                                            <h4 class="text-sm font-extrabold text-slate-900">{{ $doc['name'] }}</h4>
                                            <span class="text-xs text-emerald-700 font-bold">✓ Verified Status</span>
                                        </div>
                                    </div>
                                    <button type="button" @click="openInquiry('Request Document Copy: ' + '{{ $doc['name'] }}')"
                                        class="rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-xs font-extrabold text-slate-700 hover:border-emerald-600 hover:text-emerald-800">
                                        Request Copy
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6 rounded-xl border border-blue-200 bg-blue-50/60 p-4 text-xs text-blue-900">
                            <p class="font-bold">🔒 Future Line Verification Notice</p>
                            <p class="mt-1">All business documentation and physical factory photos were audited as part of the Future Line Verified Business certification process.</p>
                        </div>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- TAB 7: REVIEWS                              --}}
                {{-- ============================================ --}}
                <div x-show="activeTab === 'reviews'" x-transition:enter="transition ease-out duration-200" class="space-y-6">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-6">
                            <div>
                                <h2 class="text-xl font-black text-slate-950">Buyer Reviews & Ratings</h2>
                                <p class="mt-1 text-sm text-slate-500">Feedback from verified commercial buyers and distributors</p>
                            </div>
                            <div class="text-right">
                                <span class="text-3xl font-black text-slate-950">{{ $company['rating'] }}</span>
                                <span class="text-sm text-slate-400">/ 5.0</span>
                            </div>
                        </div>

                        <div class="mt-6 space-y-6 divide-y divide-slate-100">
                            @foreach ($company['reviews'] as $review)
                                <div class="pt-6 first:pt-0">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="h-8 w-8 rounded-full bg-emerald-100 text-emerald-800 font-black text-xs flex items-center justify-center">
                                                {{ substr($review['name'], 0, 1) }}
                                            </span>
                                            <div>
                                                <h4 class="text-sm font-extrabold text-slate-900">{{ $review['name'] }}</h4>
                                                <p class="text-xs text-slate-500">{{ $review['location'] }}</p>
                                            </div>
                                        </div>
                                        <span class="flex items-center gap-1 text-xs font-bold text-amber-500">
                                            <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="m12 2 3.1 6.3L22 9.3l-5 4.9 1.2 6.8-6.2-3.3-6.2 3.3 1.2-6.8-5-4.9 6.9-1L12 2Z"/></svg>
                                            {{ $review['rating'] }}
                                        </span>
                                    </div>
                                    <p class="mt-3 text-xs leading-relaxed text-slate-600">
                                        "{{ $review['text'] }}"
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8 rounded-xl bg-slate-50 p-4 text-center text-xs text-slate-500 border border-slate-200">
                            Note: Review submission is restricted to buyers who have completed verified orders on Future Line Trading.
                        </div>
                    </div>
                </div>

            </div>

            {{-- ============================================ --}}
            {{-- RIGHT SIDEBAR (STICKY ON DESKTOP)            --}}
            {{-- ============================================ --}}
            <div class="space-y-6">

                {{-- Contact / Action Box --}}
                <div class="sticky top-20 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-black text-slate-950">Direct Supplier Contact</h3>
                    <p class="mt-1 text-xs text-slate-500">Bengal Agro Foods Sales Team</p>

                    <div class="mt-4 space-y-3 text-xs text-slate-600 border-t border-b border-slate-100 py-4">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Response Rate:</span>
                            <span class="font-extrabold text-emerald-700">98% Very Responsive</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Avg Response:</span>
                            <span class="font-extrabold text-slate-800">~2 Hours</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Verification:</span>
                            <span class="font-extrabold text-emerald-700">✓ On-site Audit Completed</span>
                        </div>
                    </div>

                    <div class="mt-5 space-y-3">
                        <button type="button" @click="openInquiry('Bulk Supply Inquiry')"
                            class="w-full rounded-xl border border-emerald-700 bg-emerald-700 py-3 text-center text-xs font-black text-white transition-all hover:bg-emerald-800 shadow-xs">
                            Send Quotation Inquiry
                        </button>
                        <button type="button" @click="openInquiry('Request Product Catalog PDF')"
                            class="w-full rounded-xl border border-slate-300 bg-white py-3 text-center text-xs font-black text-slate-700 transition-all hover:bg-slate-50">
                            Request Product Catalog
                        </button>
                    </div>

                    {{-- Demo Call / WhatsApp Buttons --}}
                    <div class="mt-4 grid grid-cols-2 gap-2">
                        <a href="tel:+8801700000000" class="flex items-center justify-center gap-1.5 rounded-lg border border-slate-200 bg-slate-50 py-2 text-xs font-extrabold text-slate-700 hover:bg-emerald-50 hover:text-emerald-800">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            Call Direct
                        </a>
                        <a href="https://wa.me/8801700000000" target="_blank" class="flex items-center justify-center gap-1.5 rounded-lg border border-emerald-200 bg-emerald-50 py-2 text-xs font-extrabold text-emerald-800 hover:bg-emerald-100">
                            💬 WhatsApp
                        </a>
                    </div>
                </div>

                {{-- Suggested Manufacturers Box --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xs">
                    <h3 class="text-sm font-black text-slate-950">Similar Manufacturers</h3>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-extrabold text-emerald-800">DN</span>
                            <div>
                                <h4 class="text-xs font-black text-slate-900">Delta Nutrition Ltd.</h4>
                                <p class="text-2xs text-slate-500">Dhaka • Cattle & Poultry Feed</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-extrabold text-emerald-800">AF</span>
                            <div>
                                <h4 class="text-xs font-black text-slate-900">Aqua Feed Solutions</h4>
                                <p class="text-2xs text-slate-500">Chattogram • Aqua Nutrition</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-extrabold text-emerald-800">PF</span>
                            <div>
                                <h4 class="text-xs font-black text-slate-900">Prime Feed Industries</h4>
                                <p class="text-2xs text-slate-500">Rajshahi • Poultry Feed</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- ============================================ --}}
    {{-- LIGHTBOX MODAL FOR GALLERY PHOTOS             --}}
    {{-- ============================================ --}}
    <div x-show="selectedImage" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4 backdrop-blur-sm" style="display: none;">
        <div class="relative max-w-4xl w-full">
            <button type="button" @click="selectedImage = null" class="absolute -top-10 right-0 text-white font-extrabold text-sm hover:text-slate-300">
                ✕ Close Preview
            </button>
            <img :src="selectedImage" alt="Selected company gallery image" class="w-full rounded-2xl max-h-[80vh] object-contain shadow-2xl">
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- DEMO INQUIRY MODAL                           --}}
    {{-- ============================================ --}}
    <div x-show="inquiryModalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/60 p-4 backdrop-blur-xs" style="display: none;">
        <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-base font-black text-slate-950">Send Inquiry to {{ $company['name'] }}</h3>
                <button type="button" @click="closeInquiry()" class="text-slate-400 hover:text-slate-700">✕</button>
            </div>

            <div x-show="inquirySuccess" class="rounded-xl bg-emerald-50 p-4 text-center text-xs font-bold text-emerald-800 border border-emerald-200">
                ✓ Demo Inquiry Sent Successfully! The sales team will respond via Future Line dashboard.
            </div>

            <form x-show="!inquirySuccess" @submit.prevent="submitInquiry()" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase">Subject / Product</label>
                    <input type="text" x-model="modalProduct" class="mt-1 w-full rounded-lg border border-slate-300 p-2.5 text-xs font-bold text-slate-800 focus:border-emerald-600 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase">Estimated Quantity / Volume</label>
                    <input type="text" placeholder="e.g. 5 Metric Tons" class="mt-1 w-full rounded-lg border border-slate-300 p-2.5 text-xs text-slate-800 focus:border-emerald-600 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase">Message Details</label>
                    <textarea rows="3" placeholder="Specify grade requirements, target destination district, and delivery timeframe..." class="mt-1 w-full rounded-lg border border-slate-300 p-2.5 text-xs text-slate-800 focus:border-emerald-600 focus:outline-none" required></textarea>
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" @click="closeInquiry()" class="rounded-lg border border-slate-300 px-4 py-2 text-xs font-bold text-slate-700">Cancel</button>
                    <button type="submit" class="rounded-lg bg-emerald-700 px-4 py-2 text-xs font-black text-white hover:bg-emerald-800">Submit Demo Inquiry</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
