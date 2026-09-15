@php
    $navLinks = [
        ['label' => __('common.home'), 'route' => 'home'],
        ['label' => __('common.products'), 'route' => 'products.index'],
        ['label' => __('common.categories'), 'route' => 'categories.index'],
        ['label' => __('common.sellers'), 'route' => 'sellers.index'],
        ['label' => __('common.companies'), 'route' => 'companies.index'],
        ['label' => __('common.about'), 'route' => 'about'],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 shadow-sm backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-[68px] items-center justify-between gap-4 lg:h-[76px]">
            <x-logo class="min-w-0 shrink-0" variant="light" brand-class="text-base font-bold tracking-tight text-slate-950 sm:text-lg" tagline-class="block truncate text-[10px] font-medium tracking-wide text-slate-500 sm:text-[11px]" />

            <nav class="hidden items-center gap-1 lg:flex" aria-label="Primary navigation">
                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route']) }}" @class([
                        'px-3 py-2 text-sm font-medium transition-colors',
                        'text-emerald-700' => request()->routeIs($link['route']),
                        'text-slate-600 hover:text-emerald-700' => !request()->routeIs($link['route']),
                    ])>{{ $link['label'] }}</a>
                @endforeach
            </nav>

            <div class="hidden items-center gap-1 lg:flex">
                <a href="{{ route('products.index') }}" class="inline-flex h-9 w-9 items-center justify-center text-slate-600 hover:text-emerald-700" aria-label="Search products">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="6"/><path d="m16 16 4 4"/></svg>
                </a>
                <a href="{{ route('products.index') }}" class="inline-flex h-9 w-9 items-center justify-center text-slate-600 hover:text-emerald-700" aria-label="Wishlist">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.9-8.6a5.5 5.5 0 0 0-.1-7.8Z"/></svg>
                </a>
                <a href="{{ route('products.index') }}" class="relative inline-flex h-9 w-9 items-center justify-center text-slate-600 hover:text-emerald-700" aria-label="Cart">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 4h2l2.1 10.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L20 8H6"/><circle cx="9" cy="20" r="1"/><circle cx="17" cy="20" r="1"/></svg>
                    <span class="absolute right-0 top-0 h-2 w-2 rounded-full bg-emerald-600"></span>
                </a>
                <span class="mx-2 h-5 w-px bg-slate-200"></span>
                <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-semibold text-slate-700 hover:text-emerald-700">{{ __('common.login') }}</a>
                <a href="{{ route('register') }}" class="border border-emerald-700 bg-emerald-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-800">{{ __('common.become_seller') }}</a>
                <div class="ml-2 flex items-center whitespace-nowrap text-xs font-semibold" aria-label="Language selector">
                    <a href="{{ route('language.switch', 'bn') }}" @class(['transition-colors hover:text-emerald-700', 'text-emerald-700' => app()->isLocale('bn'), 'text-slate-400' => ! app()->isLocale('bn')])>{{ __('common.language_bangla') }}</a>
                    <span class="px-1.5 text-slate-300">|</span>
                    <a href="{{ route('language.switch', 'en') }}" @class(['transition-colors hover:text-emerald-700', 'text-emerald-700' => app()->isLocale('en'), 'text-slate-400' => ! app()->isLocale('en')])>{{ __('common.language_english') }}</a>
                </div>
            </div>

            <div class="flex items-center gap-1 lg:hidden">
                <a href="{{ route('products.index') }}" class="relative inline-flex h-10 w-10 items-center justify-center text-slate-700" aria-label="Cart">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 4h2l2.1 10.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L20 8H6"/><circle cx="9" cy="20" r="1"/><circle cx="17" cy="20" r="1"/></svg>
                    <span class="absolute right-1 top-1 h-2 w-2 rounded-full bg-emerald-600"></span>
                </a>
                <button type="button" data-mobile-menu-button aria-expanded="false" aria-controls="mobile-navigation" class="inline-flex h-10 w-10 items-center justify-center border border-slate-200 text-slate-700" aria-label="Open navigation menu">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-navigation" data-mobile-menu class="hidden border-t border-slate-200 bg-white lg:hidden">
        <nav class="mx-auto max-w-7xl space-y-1 px-4 py-4 sm:px-6" aria-label="Mobile navigation">
            @foreach ($navLinks as $link)
                <a href="{{ route($link['route']) }}" @class(['block border-l-2 px-3 py-2.5 text-sm font-semibold', 'border-emerald-700 bg-emerald-50 text-emerald-800' => request()->routeIs($link['route']), 'border-transparent text-slate-700 hover:bg-slate-50' => !request()->routeIs($link['route'])])>{{ $link['label'] }}</a>
            @endforeach
            <a href="{{ route('login') }}" class="block border-l-2 border-transparent px-3 py-2.5 text-sm font-semibold text-slate-700">{{ __('common.login') }}</a>
            <a href="{{ route('register') }}" class="mt-3 block border border-emerald-700 bg-emerald-700 px-3 py-2.5 text-center text-sm font-semibold text-white">{{ __('common.register') }} / {{ __('common.become_seller') }}</a>
            <div class="flex items-center pt-3 text-sm font-semibold" aria-label="Language selector">
                <a href="{{ route('language.switch', 'bn') }}" @class(['transition-colors', 'text-emerald-700' => app()->isLocale('bn'), 'text-slate-400' => ! app()->isLocale('bn')])>{{ __('common.language_bangla') }}</a>
                <span class="px-1.5 text-slate-300">|</span>
                <a href="{{ route('language.switch', 'en') }}" @class(['transition-colors', 'text-emerald-700' => app()->isLocale('en'), 'text-slate-400' => ! app()->isLocale('en')])>{{ __('common.language_english') }}</a>
            </div>
        </nav>
    </div>
</header>
