@props(['from' => 1, 'to' => 12, 'total' => 120, 'sortOptions' => [], 'view' => 'grid'])

<div class="flex flex-wrap items-center justify-between gap-3 border border-slate-200 bg-white px-4 py-3">
    <p class="text-sm text-slate-600">{{ __('products.showing_products', ['from' => $from, 'to' => $to, 'total' => $total]) }}</p>
    <div class="flex items-center gap-3">
        <label for="sort-by" class="sr-only">Sort by</label>
        <select id="sort-by" class="border border-slate-200 bg-white px-3 py-2 text-sm text-slate-700 focus:border-emerald-500 focus:outline-none">
            @foreach ($sortOptions as $label => $value)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select>
        <div class="hidden items-center border border-slate-200 sm:flex">
            <button type="button" data-view="grid" class="inline-flex h-9 w-9 items-center justify-center text-emerald-700" aria-label="Grid view">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
            </button>
            <span class="h-5 w-px bg-slate-200"></span>
            <button type="button" data-view="list" class="inline-flex h-9 w-9 items-center justify-center text-slate-400 hover:text-slate-600" aria-label="List view">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
</div>
