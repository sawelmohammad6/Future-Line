@props(['title', 'description'])
<div class="flex gap-3">
    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
    </span>
    <div>
        <h3 class="text-sm font-bold text-slate-950">{{ $title }}</h3>
        <p class="mt-1 text-xs leading-5 text-slate-600">{{ $description }}</p>
    </div>
</div>
