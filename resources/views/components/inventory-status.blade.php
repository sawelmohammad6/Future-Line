@props(['label','value','tone'=>'emerald'])
@php($colors = ['emerald'=>'border-emerald-100 bg-emerald-50 text-emerald-800','amber'=>'border-amber-100 bg-amber-50 text-amber-800','rose'=>'border-rose-100 bg-rose-50 text-rose-800','sky'=>'border-sky-100 bg-sky-50 text-sky-800'])
<div class="border p-4 {{ $colors[$tone] ?? $colors['emerald'] }}"><p class="text-2xl font-bold">{{ $value }}</p><p class="mt-1 text-sm font-semibold">{{ $label }}</p></div>
