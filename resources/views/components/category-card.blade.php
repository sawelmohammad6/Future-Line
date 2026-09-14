@props(['category' => []])
<a href="{{ route('categories.index') }}" class="group block overflow-hidden border border-slate-200 bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-300 hover:shadow-lg hover:shadow-emerald-950/5">
    <div class="relative aspect-[16/9] overflow-hidden bg-slate-100">
        <img src="{{ $category['image'] ?? '' }}" alt="{{ $category['name'] ?? 'Category' }}" loading="lazy" decoding="async" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
        <span class="absolute right-3 top-3 border border-white/70 bg-white/95 px-2.5 py-1 text-xs font-bold text-emerald-800">{{ $category['count'] ?? '0' }} products</span>
    </div>
    <div class="p-5">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-slate-950">{{ $category['name'] ?? 'Category name' }}</h3>
                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $category['description'] ?? '' }}</p>
            </div>
            <span class="mt-1 shrink-0 text-emerald-700 transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </span>
        </div>
        <p class="mt-4 border-t border-slate-100 pt-3 text-xs font-medium leading-5 text-slate-500">{{ $category['subcategories'] ?? '' }}</p>
    </div>
</a>
