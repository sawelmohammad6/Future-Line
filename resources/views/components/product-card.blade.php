@props(['product' => []])

<article class="group flex h-full flex-col overflow-hidden border border-slate-200 bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-950/5">
    <div class="product-image relative aspect-[4/3] overflow-hidden bg-slate-100">
        <img src="{{ asset($product['image'] ?? '') }}" alt="{{ $product['name'] ?? 'Product' }}" loading="lazy" decoding="async" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
        <button type="button" class="absolute right-3 top-3 inline-flex h-9 w-9 items-center justify-center border border-slate-200 bg-white/95 text-slate-600 shadow-sm transition-colors hover:border-emerald-300 hover:text-emerald-700" aria-label="Add {{ $product['name'] ?? 'product' }} to wishlist">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.9-8.6a5.5 5.5 0 0 0-.1-7.8Z"/></svg>
        </button>
    </div>
    <div class="flex flex-1 flex-col p-4">
        <div class="flex items-center justify-between gap-2">
            <span class="inline-flex items-center gap-1 border border-emerald-100 bg-emerald-50 px-2 py-1 text-[11px] font-bold text-emerald-800">
                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
                Verified Seller
            </span>
            @if (($product['stock'] ?? 'In Stock') === 'Out of Stock')
                <span class="text-[11px] font-bold text-rose-600">Out of Stock</span>
            @else
                <span class="flex items-center gap-1 text-[11px] font-bold text-emerald-700">
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-emerald-600"></span>
                    In Stock
                </span>
            @endif
        </div>

        <h3 class="mt-3 text-[15px] font-bold leading-6 text-slate-950">{{ $product['name'] ?? 'Product name' }}</h3>

        <p class="mt-1 text-xs font-medium text-slate-500">
            @if (!empty($product['brand']))
                {{ $product['brand'] }} <span class="px-1 text-slate-300">|</span>
            @endif
            {{ $product['grade'] ?? 'Standard' }}
        </p>

        <p class="mt-1 text-xs text-slate-500">
            {{ $product['seller'] ?? 'Verified supplier' }}
            <span class="px-1 text-slate-300">|</span>
            {{ $product['location'] ?? 'Bangladesh' }}
        </p>

        <div class="mt-4 border-y border-slate-100 py-3">
            <div class="flex items-end justify-between gap-3">
                <div>
                    <p class="text-lg font-bold text-slate-950">{{ $product['price'] ?? 'Price on request' }}</p>
                    @if (!empty($product['priceTon']))
                        <p class="mt-0.5 text-xs text-slate-500">{{ $product['priceTon'] }} <span class="text-slate-400">/ Ton</span></p>
                    @endif
                </div>
                <div class="flex items-center gap-1 text-sm font-bold text-amber-600">
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="m12 2 3.1 6.3L22 9.3l-5 4.9 1.2 6.8-6.2-3.3-6.2 3.3 1.2-6.8-5-4.9 6.9-1L12 2Z"/></svg>
                    {{ $product['rating'] ?? '0.0' }}
                </div>
            </div>
            @if (!empty($product['moq']))
                <p class="mt-2 text-xs text-slate-500">MOQ: <span class="font-semibold text-slate-700">{{ $product['moq'] }}</span></p>
            @endif
        </div>

        <div class="mt-4 grid grid-cols-2 gap-2">
            <a href="{{ route('products.show', $product['slug'] ?? 'product') }}" class="inline-flex items-center justify-center border border-slate-300 px-3 py-2.5 text-xs font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">View Product</a>
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-1 bg-emerald-700 px-3 py-2.5 text-xs font-bold text-white transition-colors hover:bg-emerald-800">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 4h2l2.1 10.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L20 8H6"/></svg>
                Add to Cart
            </a>
        </div>
    </div>
</article>
