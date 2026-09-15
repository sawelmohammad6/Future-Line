@props([
    'href' => null,
    'variant' => 'light',
    'showTagline' => true,
    'brandClass' => 'text-base font-bold tracking-tight sm:text-lg',
    'tagline' => 'Brokerage • Agent • Commission',
    'taglineClass' => null,
    'logoClass' => 'w-[140px] sm:w-[170px]',
])

@php
    $logoUrl = frontend_image_url('logo.main');
    $link = $href ?? route('home');
    $accent = $variant === 'dark' ? 'text-emerald-400' : 'text-emerald-700';
    $defaultTaglineClass = $variant === 'dark'
        ? 'mt-1 block text-[10px] font-medium tracking-wide text-emerald-200/80 sm:text-[11px]'
        : 'mt-1 block text-[10px] font-medium tracking-wide text-slate-500 sm:text-[11px]';
    $taglineClasses = $taglineClass ?? $defaultTaglineClass;
@endphp

<a href="{{ $link }}" {{ $attributes->merge(['class' => 'inline-block min-w-0']) }} aria-label="Future Line Trading home">
    @if ($logoUrl)
        <img src="{{ $logoUrl }}" alt="Future Line Trading" class="{{ $logoClass }} h-auto max-h-14 object-contain">
        @if ($showTagline)
            <span class="{{ $taglineClasses }}">{{ $tagline }}</span>
        @endif
    @else
        <span class="block {{ $brandClass }}">Future Line <span class="{{ $accent }}">Trading</span></span>
        @if ($showTagline)
            <span class="{{ $taglineClasses }}">{{ $tagline }}</span>
        @endif
    @endif
</a>
