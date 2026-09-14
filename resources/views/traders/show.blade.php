@extends('layouts.app')

@section('title', $trader['name'] . ' | Importer & Exporter Profile | Future Line Trading')
@section('meta_description', $trader['description'])

@section('content')
<div x-data="{ 
    inquiryModalOpen: false, 
    modalProduct: '',
    inquirySuccess: false,
    selectedDoc: null,

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
    {{-- 1. TRADER HEADER                             --}}
    {{-- ============================================ --}}
    <section class="border-b border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <x-breadcrumb :items="['Importers & Exporters', $trader['name']]" />

            <div class="mt-6 flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                {{-- Left: Trader Identity --}}
                <div class="flex flex-col gap-5 sm:flex-row sm:items-start">
                    <span class="inline-flex h-24 w-24 shrink-0 items-center justify-center rounded-2xl border border-blue-200 bg-gradient-to-br from-blue-50 to-indigo-100 text-3xl font-black text-blue-900 shadow-sm">
                        {{ $trader['logo'] }}
                    </span>
                    <div>
                        <div class="flex flex-wrap items-center gap-3">
                            <h1 class="text-2xl font-black tracking-tight text-slate-950 sm:text-3xl lg:text-4xl">
                                {{ $trader['name'] }}
                            </h1>
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-blue-200 bg-blue-50 px-3 py-1 text-xs font-extrabold uppercase tracking-wide text-blue-800 shadow-xs">
                                <svg class="h-4 w-4 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                                </svg>
                                Importer • Exporter
                            </span>
                            <span class="inline-flex items-center gap-1 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-xs font-extrabold text-emerald-800">
                                ✓ Verified Trader
                            </span>
                        </div>
                        <p class="mt-2 text-base font-bold text-slate-700">
                            Bulk Feed Raw Materials & Agricultural Commodity Trading
                        </p>
                        <p class="mt-1 flex items-center gap-2 text-sm font-medium text-slate-500">
                            <svg class="h-4 w-4 text-blue-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" />
                                <circle cx="12" cy="10" r="2.5" />
                            </svg>
                            {{ $trader['location'] }} (Headquarters & Logistics Office)
                        </p>
                    </div>
                </div>

                {{-- Right: Header Actions --}}
                <div class="flex shrink-0 flex-wrap items-center gap-3">
                    <button type="button" 
                        @click="openInquiry('Import Quotation Request')"
                        class="inline-flex items-center justify-center rounded-lg border border-blue-800 bg-blue-800 px-5 py-2.5 text-sm font-extrabold text-white transition-all hover:bg-blue-900 shadow-sm">
                        Request Import Quote
                    </button>
                    <button type="button" 
                        @click="document.getElementById('trade-listings').scrollIntoView({ behavior: 'smooth' })"
                        class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-extrabold text-slate-800 transition-all hover:bg-slate-50 shadow-xs">
                        View Trade Listings
                    </button>
                </div>
            </div>

            {{-- Key Trade Metrics Grid --}}
            <div class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-4 lg:gap-6">
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition-all hover:border-blue-300">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Trade Rating</p>
                    <p class="mt-1 flex items-center gap-2 text-xl font-black text-slate-950">
                        <span class="flex items-center gap-1 text-amber-500">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24"><path d="m12 2 3.1 6.3L22 9.3l-5 4.9 1.2 6.8-6.2-3.3-6.2 3.3 1.2-6.8-5-4.9 6.9-1L12 2Z"/></svg>
                            {{ $trader['rating'] }}
                        </span>
                        <span class="text-xs font-normal text-slate-500">(Verified)</span>
                    </p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition-all hover:border-blue-300">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Active Listings</p>
                    <p class="mt-1 text-xl font-black text-slate-950">{{ $trader['listings_count'] }}</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition-all hover:border-blue-300">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Global Sourcing Markets</p>
                    <p class="mt-1 text-xl font-black text-slate-950">{{ $trader['markets_count'] }}</p>
                </div>
                <div class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition-all hover:border-blue-300">
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Monthly Supply Capacity</p>
                    <p class="mt-1 text-xl font-black text-slate-950">{{ $trader['capacity'] }}</p>
                </div>
            </div>

            {{-- Brief Description --}}
            <p class="mt-6 max-w-4xl text-sm leading-relaxed text-slate-600 font-medium">
                {{ $trader['description'] }}
            </p>
        </div>
    </section>

    {{-- MAIN CONTENT WITH SIDEBAR --}}
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">

            {{-- LEFT MAIN AREA (2 COLS) --}}
            <div class="space-y-10 lg:col-span-2">

                {{-- ============================================ --}}
                {{-- 2. TRADE SUMMARY CARD                        --}}
                {{-- ============================================ --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                    <h2 class="text-xl font-black text-slate-950">Trade Summary & Overview</h2>
                    <p class="mt-1 text-sm text-slate-500">Cross-border feed raw material sourcing and distribution capabilities</p>

                    <dl class="mt-6 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                        @foreach ($trader['summary'] as $label => $val)
                            <div class="border-b border-slate-100 pb-3">
                                <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">{{ $label }}</dt>
                                <dd class="mt-1 text-sm font-extrabold text-slate-800">{{ $val }}</dd>
                            </div>
                        @endforeach
                    </dl>

                    <div class="mt-6 rounded-xl border border-blue-200 bg-blue-50/60 p-4">
                        <div class="flex items-start gap-3">
                            <span class="rounded-lg bg-blue-700 p-2 text-white shrink-0">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                                </svg>
                            </span>
                            <div>
                                <h4 class="text-sm font-extrabold text-blue-950">End-to-End Import Sourcing & Customs Clearance</h4>
                                <p class="mt-1 text-xs text-blue-900 leading-normal">
                                    Global Agro Trading manages sea transport logistics, phytosanitary checks, laboratory testing, and port clearance at Chittagong and Mongla ports for bulk agricultural commodities.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- 3. IMPORT / EXPORT PRODUCTS GRID            --}}
                {{-- ============================================ --}}
                <div id="trade-listings" class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-6">
                        <div>
                            <h2 class="text-xl font-black text-slate-950">Import & Export Commodity Listings</h2>
                            <p class="mt-1 text-sm text-slate-500">Bulk feed ingredients sourced globally and delivered in Bangladesh</p>
                        </div>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-black text-blue-900">
                            {{ count($trader['products']) }} Featured Commodities
                        </span>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                        @foreach ($trader['products'] as $item)
                            <div class="group flex flex-col justify-between overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xs transition-all hover:border-blue-500 hover:shadow-md">
                                <div>
                                    {{-- Image & Origin Badge --}}
                                    <div class="relative h-44 w-full overflow-hidden bg-slate-100">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                                        <span class="absolute top-3 left-3 rounded-md bg-white/90 backdrop-blur-md px-2.5 py-1 text-xs font-black text-slate-900 shadow-xs flex items-center gap-1.5">
                                            <span>Origin:</span>
                                            <span class="font-extrabold text-blue-900">{{ $item['origin'] }}</span>
                                        </span>
                                        <span class="absolute top-3 right-3 rounded-md bg-emerald-700 px-2.5 py-1 text-xs font-extrabold text-white shadow-xs">
                                            {{ $item['availability'] }}
                                        </span>
                                    </div>

                                    {{-- Details --}}
                                    <div class="p-5">
                                        <h3 class="text-base font-extrabold text-slate-950 group-hover:text-blue-900 transition-colors">
                                            {{ $item['name'] }}
                                        </h3>
                                        <p class="mt-1 text-xs font-medium text-slate-500">Grade: {{ $item['grade'] }}</p>

                                        <div class="mt-4 flex items-baseline justify-between border-t border-slate-100 pt-3">
                                            <div>
                                                <span class="text-xs font-semibold text-slate-400 block uppercase">Lot Volume</span>
                                                <span class="text-sm font-black text-slate-950">{{ $item['quantity'] }}</span>
                                            </div>
                                            <div class="text-right">
                                                <span class="text-xs font-semibold text-slate-400 block uppercase">Price Indication</span>
                                                <span class="text-xs font-black text-blue-900">{{ $item['price'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Action Button --}}
                                <div class="border-t border-slate-100 p-4 bg-slate-50/50">
                                    <button type="button" @click="openInquiry('Import Quote Inquiry: ' + '{{ $item['name'] }}' + ' (' + '{{ $item['origin'] }}' + ')')"
                                        class="w-full rounded-lg border border-blue-800 bg-blue-800 py-2.5 text-center text-xs font-extrabold text-white transition-colors hover:bg-blue-900 shadow-xs">
                                        Inquire Import Rate
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- 4. GEOGRAPHIC COVERAGE & SOURCE COUNTRIES     --}}
                {{-- ============================================ --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                    <h2 class="text-xl font-black text-slate-950">Global Sourcing & Export Coverage</h2>
                    <p class="mt-1 text-sm text-slate-500">Active origin sourcing countries and destination trade hubs</p>

                    <div class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-3">
                        @foreach ($trader['countries'] as $c)
                            <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 transition-all hover:border-blue-400 hover:bg-blue-50/40">
                                <span class="text-2xl">{{ $c['flag'] }}</span>
                                <div>
                                    <h4 class="text-sm font-extrabold text-slate-900">{{ $c['name'] }}</h4>
                                    <span class="text-xs text-slate-500 font-medium">Trade Partner</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- 5. LOGISTICS & SHIPPING CAPABILITIES          --}}
                {{-- ============================================ --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                    <h2 class="text-xl font-black text-slate-950">Logistics & Shipping Capabilities</h2>
                    <p class="mt-1 text-sm text-slate-500">Handling sea freight, bulk transport, container loading, and port clearance</p>

                    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                        @foreach ($trader['shipping'] as $title => $val)
                            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">{{ $title }}</span>
                                <span class="mt-1 text-sm font-extrabold text-slate-900 block">{{ $val }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ============================================ --}}
                {{-- 6. TRADE DOCUMENTS & COMPLIANCE              --}}
                {{-- ============================================ --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                    <div class="border-b border-slate-100 pb-6">
                        <h2 class="text-xl font-black text-slate-950">Trade Documents & Quality Compliance</h2>
                        <p class="mt-1 text-sm text-slate-500">Sample documentation provided with bulk import shipments</p>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                        @foreach ($trader['documents'] as $doc)
                            <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-slate-50 p-4">
                                <div class="flex items-center gap-3">
                                    <span class="rounded-lg bg-blue-100 p-2 text-blue-800">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                            <polyline points="14 2 14 8 20 8" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h4 class="text-sm font-extrabold text-slate-900">{{ $doc['name'] }}</h4>
                                        <span class="text-xs text-blue-700 font-bold">✓ Standard Trade Doc</span>
                                    </div>
                                </div>
                                <button type="button" @click="openInquiry('Request Document Sample: ' + '{{ $doc['name'] }}')"
                                    class="rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-xs font-extrabold text-slate-700 hover:border-blue-600 hover:text-blue-800">
                                    Request Sample
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- ============================================ --}}
            {{-- RIGHT SIDEBAR (STICKY ON DESKTOP)            --}}
            {{-- ============================================ --}}
            <div class="space-y-6">

                {{-- Quotation Request Box --}}
                <div class="sticky top-20 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h3 class="text-base font-black text-slate-950">Request Trade Quotation</h3>
                    <p class="mt-1 text-xs text-slate-500">Contact Global Agro Trading Desk</p>

                    <div class="mt-4 space-y-3 text-xs text-slate-600 border-t border-b border-slate-100 py-4">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Response Rate:</span>
                            <span class="font-extrabold text-blue-800">96% Active Trader</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Port Operations:</span>
                            <span class="font-extrabold text-slate-800">Chittagong / Mongla</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Verification:</span>
                            <span class="font-extrabold text-emerald-700">✓ Verified Importer</span>
                        </div>
                    </div>

                    <div class="mt-5 space-y-3">
                        <button type="button" @click="openInquiry('Bulk Import Rate Quote')"
                            class="w-full rounded-xl border border-blue-800 bg-blue-800 py-3 text-center text-xs font-black text-white transition-all hover:bg-blue-900 shadow-xs">
                            Inquire Bulk Import Rate
                        </button>
                        <button type="button" @click="openInquiry('Custom Sourcing Request')"
                            class="w-full rounded-xl border border-slate-300 bg-white py-3 text-center text-xs font-black text-slate-700 transition-all hover:bg-slate-50">
                            Custom Sourcing Request
                        </button>
                    </div>

                    {{-- Contact Buttons --}}
                    <div class="mt-4 grid grid-cols-2 gap-2">
                        <a href="tel:+8801800000000" class="flex items-center justify-center gap-1.5 rounded-lg border border-slate-200 bg-slate-50 py-2 text-xs font-extrabold text-slate-700 hover:bg-blue-50 hover:text-blue-800">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            Call Desk
                        </a>
                        <a href="https://wa.me/8801800000000" target="_blank" class="flex items-center justify-center gap-1.5 rounded-lg border border-emerald-200 bg-emerald-50 py-2 text-xs font-extrabold text-emerald-800 hover:bg-emerald-100">
                            💬 WhatsApp
                        </a>
                    </div>
                </div>

                {{-- Key Trade Info Box --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-xs">
                    <h3 class="text-sm font-black text-slate-950">Trade Compliance Notice</h3>
                    <p class="mt-2 text-xs text-slate-600 leading-relaxed">
                        All import transactions subject to Bangladesh Customs guidelines, LC banking regulations, and phytosanitary certificate verification.
                    </p>
                </div>

            </div>

        </div>
    </div>

    {{-- ============================================ --}}
    {{-- DEMO INQUIRY MODAL                           --}}
    {{-- ============================================ --}}
    <div x-show="inquiryModalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/60 p-4 backdrop-blur-xs" style="display: none;">
        <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-base font-black text-slate-950">Request Quote from {{ $trader['name'] }}</h3>
                <button type="button" @click="closeInquiry()" class="text-slate-400 hover:text-slate-700">✕</button>
            </div>

            <div x-show="inquirySuccess" class="rounded-xl bg-blue-50 p-4 text-center text-xs font-bold text-blue-900 border border-blue-200">
                ✓ Trade Quotation Request Submitted! Sourcing manager will contact you shortly.
            </div>

            <form x-show="!inquirySuccess" @submit.prevent="submitInquiry()" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase">Commodity / Item</label>
                    <input type="text" x-model="modalProduct" class="mt-1 w-full rounded-lg border border-slate-300 p-2.5 text-xs font-bold text-slate-800 focus:border-blue-600 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase">Required Quantity (Metric Tons)</label>
                    <input type="text" placeholder="e.g. 500 MT" class="mt-1 w-full rounded-lg border border-slate-300 p-2.5 text-xs text-slate-800 focus:border-blue-600 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase">Preferred Discharge Port / Destination</label>
                    <input type="text" placeholder="e.g. Chittagong Port / Dhaka Warehouse" class="mt-1 w-full rounded-lg border border-slate-300 p-2.5 text-xs text-slate-800 focus:border-blue-600 focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase">Specification / Grade Notes</label>
                    <textarea rows="3" placeholder="Protein content, moisture level, delivery schedule..." class="mt-1 w-full rounded-lg border border-slate-300 p-2.5 text-xs text-slate-800 focus:border-blue-600 focus:outline-none" required></textarea>
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" @click="closeInquiry()" class="rounded-lg border border-slate-300 px-4 py-2 text-xs font-bold text-slate-700">Cancel</button>
                    <button type="submit" class="rounded-lg bg-blue-800 px-4 py-2 text-xs font-black text-white hover:bg-blue-900">Submit Import Quote Request</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
