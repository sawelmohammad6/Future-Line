@props(['company' => []])
<article class="flex h-full flex-col border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-950/5">
    <div class="flex h-16 w-16 items-center justify-center border border-slate-200 bg-slate-50 text-lg font-bold tracking-tight text-slate-800">{{ $company['logo'] ?? 'FT' }}</div>
    <div class="mt-5 flex items-start justify-between gap-3">
        <h3 class="text-lg font-bold leading-6 text-slate-950">{{ $company['name'] ?? 'Company name' }}</h3>
        <span class="shrink-0 border border-emerald-100 bg-emerald-50 px-2 py-1 text-[10px] font-bold tracking-wide text-emerald-800">VERIFIED BUSINESS</span>
    </div>
    <p class="mt-2 text-sm font-semibold text-slate-600">{{ $company['industry'] ?? 'Trade partner' }}</p>
    <p class="mt-1 flex items-center gap-1.5 text-sm text-slate-500">
        <svg class="h-4 w-4 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>
        {{ $company['location'] ?? 'Bangladesh' }}
    </p>
    <div class="mt-5 grid grid-cols-2 border-y border-slate-100 py-3 text-sm">
        <div><p class="font-bold text-slate-900">{{ $company['years'] ?? '0 Years' }}</p><p class="mt-0.5 text-xs text-slate-500">Experience</p></div>
        <div class="border-l border-slate-200 pl-4"><p class="font-bold text-slate-900">{{ $company['count'] ?? '0' }}</p><p class="mt-0.5 text-xs text-slate-500">Products</p></div>
    </div>
    <p class="mt-4 text-sm leading-6 text-slate-600">{{ $company['description'] ?? '' }}</p>
    <a href="{{ route('companies.show', $company['slug'] ?? 'company') }}" class="mt-5 inline-flex items-center justify-center gap-2 border border-emerald-700 px-4 py-2.5 text-sm font-bold text-emerald-800 transition-colors hover:bg-emerald-700 hover:text-white">View Company <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
</article>
