@props(['step', 'title', 'description'])
<div class="relative z-10 bg-white px-3 text-center sm:px-4 lg:bg-slate-50">
    <span class="mx-auto flex h-12 w-12 items-center justify-center rounded-full border-4 border-slate-50 bg-emerald-700 text-sm font-bold text-white shadow-sm">{{ $step }}</span>
    <h3 class="mt-4 text-base font-bold text-slate-950">{{ $title }}</h3>
    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $description }}</p>
</div>
