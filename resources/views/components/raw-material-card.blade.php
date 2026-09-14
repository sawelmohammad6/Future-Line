@props(['material' => []])
<article class="group flex h-full flex-col overflow-hidden border border-slate-200 bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-950/5">
    <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">
        <img src="{{ asset($material['image'] ?? '') }}" alt="{{ $material['name'] ?? 'Raw material' }}" loading="lazy" decoding="async" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
        <span class="absolute left-3 top-3 inline-flex items-center gap-1 border border-emerald-100 bg-white/95 px-2 py-1 text-[10px] font-bold text-emerald-800"><svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>Verified Supplier</span>
    </div>
    <div class="flex flex-1 flex-col p-4">
        <h3 class="text-base font-bold text-slate-950">{{ $material['name'] ?? 'Material' }}</h3>
        <p class="mt-1 text-sm leading-5 text-slate-600">{{ $material['description'] ?? '' }}</p>
        <p class="mt-3 flex items-center gap-1.5 text-xs font-medium text-slate-500"><svg class="h-3.5 w-3.5 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></svg>Origin: {{ $material['origin'] ?? '-' }}</p>
        <div class="mt-4 border-y border-slate-100 py-3"><p class="font-bold text-slate-950">{{ $material['price'] ?? 'Price on request' }}</p><p class="mt-0.5 text-xs text-slate-500">MOQ: {{ $material['moq'] ?? '-' }}</p></div>
        <a href="{{ route('products.show', $material['slug'] ?? 'raw-material') }}" class="mt-4 inline-flex items-center justify-center bg-emerald-700 px-3 py-2.5 text-xs font-bold text-white transition-colors hover:bg-emerald-800">Explore Product</a>
    </div>
</article>
