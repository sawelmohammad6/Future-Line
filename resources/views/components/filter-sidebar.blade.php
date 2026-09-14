@props([
    'categories' => [],
    'grades' => [],
    'sellerTypes' => [],
    'units' => [],
    'locations' => [],
    'brands' => [],
    'mobile' => false,
])

<form action="{{ route('products.index') }}" method="GET" class="@if ($mobile) px-4 pb-6 pt-2 @else border border-slate-200 bg-white p-5 shadow-sm @endif">
    @if ($mobile)
        <div class="mb-4 flex items-center justify-between border-b border-slate-200 pb-4">
            <p class="text-base font-bold text-slate-950">Filters</p>
            <button type="button" data-close-filter class="inline-flex h-9 w-9 items-center justify-center border border-slate-200 text-slate-600" aria-label="Close filters">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 6l12 12M18 6 6 18"/></svg>
            </button>
        </div>
    @endif

    <fieldset class="border-b border-slate-100 pb-5">
        <legend class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Category</legend>
        <div class="mt-3 space-y-2.5">
            @foreach ($categories as $category)
                <label class="flex items-center gap-2.5 text-sm text-slate-700">
                    <input type="checkbox" name="category[]" value="{{ $category }}" class="h-4 w-4 border border-slate-300 text-emerald-700 focus:ring-emerald-600">
                    {{ $category }}
                </label>
            @endforeach
        </div>
    </fieldset>

    <fieldset class="border-b border-slate-100 py-5">
        <legend class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Product Grade</legend>
        <div class="mt-3 space-y-2.5">
            @foreach ($grades as $grade)
                <label class="flex items-center gap-2.5 text-sm text-slate-700">
                    <input type="checkbox" name="grade[]" value="{{ $grade }}" class="h-4 w-4 border border-slate-300 text-emerald-700 focus:ring-emerald-600">
                    {{ $grade }}
                </label>
            @endforeach
        </div>
    </fieldset>

    <fieldset class="border-b border-slate-100 py-5">
        <legend class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Seller Type</legend>
        <div class="mt-3 space-y-2.5">
            @foreach ($sellerTypes as $type)
                <label class="flex items-center gap-2.5 text-sm text-slate-700">
                    <input type="checkbox" name="seller_type[]" value="{{ $type }}" class="h-4 w-4 border border-slate-300 text-emerald-700 focus:ring-emerald-600">
                    {{ $type }}
                </label>
            @endforeach
        </div>
    </fieldset>

    <fieldset class="border-b border-slate-100 py-5">
        <legend class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Unit</legend>
        <div class="mt-3 flex gap-4">
            @foreach ($units as $unit)
                <label class="flex items-center gap-2.5 text-sm text-slate-700">
                    <input type="checkbox" name="unit[]" value="{{ $unit }}" class="h-4 w-4 border border-slate-300 text-emerald-700 focus:ring-emerald-600">
                    {{ $unit }}
                </label>
            @endforeach
        </div>
    </fieldset>

    <fieldset class="border-b border-slate-100 py-5">
        <legend class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Price (৳ / KG)</legend>
        <div class="mt-3 grid grid-cols-2 gap-3">
            <label class="block">
                <span class="sr-only">Minimum price</span>
                <input type="number" name="price_min" placeholder="Min" class="w-full border border-slate-200 px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none">
            </label>
            <label class="block">
                <span class="sr-only">Maximum price</span>
                <input type="number" name="price_max" placeholder="Max" class="w-full border border-slate-200 px-3 py-2 text-sm text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none">
            </label>
        </div>
    </fieldset>

    <fieldset class="border-b border-slate-100 py-5">
        <legend class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Location</legend>
        <div class="mt-3 space-y-2.5">
            @foreach ($locations as $location)
                <label class="flex items-center gap-2.5 text-sm text-slate-700">
                    <input type="checkbox" name="location[]" value="{{ $location }}" class="h-4 w-4 border border-slate-300 text-emerald-700 focus:ring-emerald-600">
                    {{ $location }}
                </label>
            @endforeach
        </div>
    </fieldset>

    <fieldset class="py-5">
        <legend class="text-xs font-bold uppercase tracking-[0.14em] text-slate-500">Brand</legend>
        <div class="mt-3 space-y-2.5">
            @foreach ($brands as $brand)
                <label class="flex items-center gap-2.5 text-sm text-slate-700">
                    <input type="checkbox" name="brand[]" value="{{ $brand }}" class="h-4 w-4 border border-slate-300 text-emerald-700 focus:ring-emerald-600">
                    {{ $brand }}
                </label>
            @endforeach
        </div>
    </fieldset>

    <div class="mt-2 grid grid-cols-2 gap-3">
        <button type="submit" class="inline-flex items-center justify-center bg-emerald-700 px-4 py-2.5 text-sm font-bold text-white transition-colors hover:bg-emerald-800">Apply Filters</button>
        <button type="reset" class="inline-flex items-center justify-center border border-slate-300 px-4 py-2.5 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">Clear All</button>
    </div>
</form>