@extends('layouts.app')

@section('title', 'Verified Companies & Trade Partners | Future Line Trading')
@section('meta_description', 'Directory of verified manufacturers, brand owners, importers, and exporters on Future Line B2B marketplace.')

@section('content')
<div class="min-h-screen bg-slate-50 py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Breadcrumb --}}
        <x-breadcrumb :items="['Directory', 'Verified Companies & Trade Partners']" />

        <div class="mt-6 flex flex-col gap-4 md:flex-row md:items-end md:justify-between border-b border-slate-200 pb-8">
            <div>
                <h1 class="text-3xl font-black tracking-tight text-slate-950 sm:text-4xl">
                    Verified Companies & Trade Partners
                </h1>
                <p class="mt-2 text-base font-medium text-slate-600">
                    Browse verified animal feed manufacturers, brand owners, importers, and exporters in Bangladesh.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-extrabold text-emerald-800">
                    ✓ All Profiles Audited & Verified
                </span>
            </div>
        </div>

        {{-- Companies Grid --}}
        <div class="mt-10 grid grid-cols-1 gap-8 md:grid-cols-2">

            {{-- 1. Bengal Agro Foods (Company / Brand Owner) --}}
            <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition-all hover:border-emerald-500 hover:shadow-md">
                <div>
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <span class="flex h-16 w-16 items-center justify-center rounded-2xl border border-emerald-200 bg-emerald-50 text-2xl font-black text-emerald-800">
                                BA
                            </span>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h2 class="text-xl font-black text-slate-950">Bengal Agro Foods</h2>
                                    <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-2xs font-extrabold text-emerald-800">Verified</span>
                                </div>
                                <p class="text-xs font-bold text-slate-600 mt-0.5">Manufacturer • Brand Owner</p>
                                <p class="text-xs text-slate-400">Gazipur, Bangladesh</p>
                            </div>
                        </div>
                        <span class="flex items-center gap-1 text-sm font-black text-amber-500">
                            ★ 4.8
                        </span>
                    </div>

                    <p class="mt-5 text-xs leading-relaxed text-slate-600">
                        Verified manufacturer and brand owner of fish feed, cattle feed, poultry feed, and feed ingredients. Operates 6 specialized brands including GreenLine and MarineSource.
                    </p>

                    <div class="mt-5 grid grid-cols-3 gap-2 border-t border-slate-100 pt-4 text-center">
                        <div>
                            <span class="text-2xs uppercase text-slate-400 block font-bold">Listings</span>
                            <span class="text-sm font-black text-slate-900">85+</span>
                        </div>
                        <div>
                            <span class="text-2xs uppercase text-slate-400 block font-bold">Brands</span>
                            <span class="text-sm font-black text-slate-900">6 Owned</span>
                        </div>
                        <div>
                            <span class="text-2xs uppercase text-slate-400 block font-bold">Experience</span>
                            <span class="text-sm font-black text-slate-900">15+ Years</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href="{{ route('companies.show', 'bengal-agro-foods') }}" class="block w-full rounded-xl border border-emerald-700 bg-emerald-700 py-3 text-center text-xs font-extrabold text-white transition-all hover:bg-emerald-800 shadow-xs">
                        View Corporate Profile & Brands &rarr;
                    </a>
                </div>
            </div>

            {{-- 2. Global Agro Trading (Importer / Exporter) --}}
            <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-xs transition-all hover:border-blue-500 hover:shadow-md">
                <div>
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <span class="flex h-16 w-16 items-center justify-center rounded-2xl border border-blue-200 bg-blue-50 text-2xl font-black text-blue-900">
                                GA
                            </span>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h2 class="text-xl font-black text-slate-950">Global Agro Trading</h2>
                                    <span class="rounded-full bg-blue-100 px-2.5 py-0.5 text-2xs font-extrabold text-blue-800">Verified</span>
                                </div>
                                <p class="text-xs font-bold text-slate-600 mt-0.5">Importer • Exporter</p>
                                <p class="text-xs text-slate-400">Dhaka, Bangladesh</p>
                            </div>
                        </div>
                        <span class="flex items-center gap-1 text-sm font-black text-amber-500">
                            ★ 4.7
                        </span>
                    </div>

                    <p class="mt-5 text-xs leading-relaxed text-slate-600">
                        International feed raw material import-export business. Sourcing bulk soybean meal, maize, fish meal, and DDGS across 6 global trade markets with sea freight delivery.
                    </p>

                    <div class="mt-5 grid grid-cols-3 gap-2 border-t border-slate-100 pt-4 text-center">
                        <div>
                            <span class="text-2xs uppercase text-slate-400 block font-bold">Listings</span>
                            <span class="text-sm font-black text-slate-900">45+ Commodities</span>
                        </div>
                        <div>
                            <span class="text-2xs uppercase text-slate-400 block font-bold">Global Markets</span>
                            <span class="text-sm font-black text-slate-900">6 Countries</span>
                        </div>
                        <div>
                            <span class="text-2xs uppercase text-slate-400 block font-bold">Capacity</span>
                            <span class="text-sm font-black text-slate-900">2,500+ MT</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100">
                    <a href="{{ route('traders.show', 'global-agro-trading') }}" class="block w-full rounded-xl border border-blue-800 bg-blue-800 py-3 text-center text-xs font-extrabold text-white transition-all hover:bg-blue-900 shadow-xs">
                        View Importer / Exporter Profile &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
