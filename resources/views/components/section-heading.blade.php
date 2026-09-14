@props(['eyebrow' => null])
<div {{ $attributes }}>
    @if ($eyebrow)<p class="mb-2 text-xs font-bold uppercase tracking-widest text-emerald-700">{{ $eyebrow }}</p>@endif
    <h2 class="text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">{{ $slot }}</h2>
</div>
