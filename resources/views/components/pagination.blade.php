@props(['current' => 1, 'pages' => 5])

<nav aria-label="Pagination" class="flex flex-wrap items-center gap-2 text-sm">
    <span class="inline-flex items-center gap-1 border border-slate-200 px-3.5 py-2 text-slate-400 select-none">
        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
        Previous
    </span>
    @for ($i = 1; $i <= $pages; $i++)
        <a href="#" @class([
            'inline-flex h-9 w-9 items-center justify-center border transition-colors',
            'border-emerald-700 bg-emerald-700 text-white' => $i === $current,
            'border-slate-200 text-slate-600 hover:border-emerald-300 hover:text-emerald-700' => $i !== $current,
        ])>{{ $i }}</a>
    @endfor
    <a href="#" class="inline-flex items-center gap-1 border border-slate-300 px-3.5 py-2 font-semibold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">
        Next
        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
    </a>
</nav>