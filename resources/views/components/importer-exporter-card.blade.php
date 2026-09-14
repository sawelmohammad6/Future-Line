@props(['partner' => []])
<article class="flex h-full flex-col border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-950/5">
    <div class="flex items-start justify-between gap-4">
        <div class="flex h-14 w-14 shrink-0 items-center justify-center border border-emerald-100 bg-emerald-50 text-sm font-bold text-emerald-800">{{ $partner['logo'] ?? 'FT' }}</div>
        <span class="inline-flex items-center gap-1 border border-emerald-100 bg-emerald-50 px-2 py-1 text-[10px] font-bold tracking-wide text-emerald-800"><svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>VERIFIED BUSINESS</span>
    </div>
    <h3 class="mt-5 text-lg font-bold leading-6 text-slate-950">{{ $partner['name'] ?? 'Business name' }}</h3>
    <p class="mt-2 text-sm font-semibold text-emerald-700">{{ $partner['type'] ?? 'Importer' }}</p>
    <p class="mt-1 flex items-center gap-1.5 text-sm text-slate-500"><svg class="h-4 w-4 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>{{ $partner['country'] ?? 'Bangladesh' }}</p>
    <p class="mt-4 border-t border-slate-100 pt-4 text-sm font-semibold text-slate-700">{{ $partner['products'] ?? 'Trade products' }}</p>
    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $partner['description'] ?? '' }}</p>
    <div class="mt-4 border-l-2 border-emerald-500 bg-emerald-50 px-3 py-2 text-sm"><span class="font-bold text-slate-900">Available:</span> <span class="text-slate-600">{{ $partner['quantity'] ?? '-' }}</span></div>
    <a href="{{ route('companies.show', $partner['slug'] ?? 'company') }}" class="mt-5 inline-flex items-center justify-center border border-slate-300 px-4 py-2.5 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">View Profile</a>
</article>
