@props(['variant' => 'primary', 'href' => null])
@php($classes = $variant === 'secondary' ? 'border border-slate-300 bg-white text-slate-700 hover:bg-slate-50' : 'border border-emerald-700 bg-emerald-700 text-white hover:bg-emerald-800')
@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "inline-flex items-center justify-center px-4 py-2 text-sm font-semibold shadow-sm {$classes}"]) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => "inline-flex items-center justify-center px-4 py-2 text-sm font-semibold shadow-sm {$classes}"]) }}>{{ $slot }}</button>
@endif
