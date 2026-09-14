@props(['value', 'label', 'detail', 'icon' => 'box', 'tone' => 'emerald'])
@php($tones = ['emerald' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-700', 'dot' => 'bg-emerald-600'], 'amber' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-700', 'dot' => 'bg-amber-600'], 'sky' => ['bg' => 'bg-sky-50', 'text' => 'text-sky-700', 'dot' => 'bg-sky-600'], 'rose' => ['bg' => 'bg-rose-50', 'text' => 'text-rose-700', 'dot' => 'bg-rose-600']])
@php($toneClasses = $tones[$tone] ?? $tones['emerald'])

<article class="border border-slate-200 bg-white p-5 shadow-sm">
    <div class="flex items-start justify-between gap-3"><div><p class="text-sm font-semibold text-slate-600">{{ $label }}</p><p class="mt-2 text-3xl font-bold tracking-tight text-slate-950">{{ $value }}</p></div><span class="flex h-10 w-10 items-center justify-center {{ $toneClasses['bg'] }} {{ $toneClasses['text'] }}"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">@if($icon === 'orders')<path d="M5 4h14v17H5zM8 9h8M8 13h8M8 17h5"/>@elseif($icon === 'clock')<circle cx="12" cy="12" r="8"/><path d="M12 8v4l3 2"/>@elseif($icon === 'check')<circle cx="12" cy="12" r="8"/><path d="m8.5 12 2.3 2.3 4.7-4.7"/>@else<path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.9-8.6a5.5 5.5 0 0 0-.1-7.8Z"/>@endif</svg></span></div>
    <p class="mt-4 flex items-center gap-1.5 text-xs font-medium text-slate-500"><span class="h-1.5 w-1.5 rounded-full {{ $toneClasses['dot'] }}"></span>{{ $detail }}</p>
</article>
