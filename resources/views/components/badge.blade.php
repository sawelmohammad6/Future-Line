@props(['variant' => 'default'])
<span {{ $attributes->merge(['class' => 'inline-flex items-center border border-emerald-100 bg-emerald-50 px-2 py-0.5 text-xs font-semibold text-emerald-800']) }}>{{ $slot }}</span>
