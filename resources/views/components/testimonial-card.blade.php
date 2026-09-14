@props(['testimonial' => []])
<article class="flex h-full flex-col border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-950/5 sm:p-6">
    <div class="flex items-center justify-between gap-3">
        <span class="inline-flex items-center gap-1 border border-emerald-100 bg-emerald-50 px-2 py-1 text-[10px] font-bold tracking-wide text-emerald-800"><svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>Verified Review</span>
        <span class="inline-flex items-center gap-1 text-sm font-bold text-emerald-700"><svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="m12 2 3.1 6.3L22 9.3l-5 4.9 1.2 6.8-6.2-3.3-6.2 3.3 1.2-6.8-5-4.9 6.9-1L12 2Z"/></svg>{{ $testimonial['rating'] ?? '0.0' }}</span>
    </div>
    <blockquote class="mt-5 text-base leading-7 text-slate-700">&ldquo;{{ $testimonial['review'] ?? '' }}&rdquo;</blockquote>
    <div class="mt-6 flex items-center gap-3 border-t border-slate-100 pt-5">
        <img src="{{ asset($testimonial['photo'] ?? '') }}" alt="{{ $testimonial['name'] ?? 'Customer' }}" loading="lazy" decoding="async" class="h-12 w-12 rounded-full object-cover">
        <div class="min-w-0"><p class="truncate font-bold text-slate-950">{{ $testimonial['name'] ?? 'Customer name' }}</p><p class="truncate text-sm text-slate-500">{{ $testimonial['business'] ?? '' }}</p><p class="truncate text-xs text-slate-500">{{ $testimonial['location'] ?? '' }}</p></div>
    </div>
    <div class="mt-5 flex items-center gap-3 border-l-2 border-emerald-500 bg-slate-50 p-2.5">
        <img src="{{ asset($testimonial['productImage'] ?? '') }}" alt="{{ $testimonial['product'] ?? 'Product' }}" loading="lazy" decoding="async" class="h-9 w-9 object-cover">
        <div><p class="text-[10px] font-bold uppercase tracking-wide text-slate-500">Product Used</p><p class="text-xs font-semibold text-slate-700">{{ $testimonial['product'] ?? '' }}</p></div>
    </div>
</article>
