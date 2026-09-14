@props(['title' => 'Dashboard', 'breadcrumb' => 'Buyer Account'])

<header class="border-b border-slate-200 bg-white px-4 py-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between gap-4">
        <div class="flex min-w-0 items-center gap-3">
            <button type="button" data-dashboard-toggle class="inline-flex h-10 w-10 shrink-0 items-center justify-center border border-slate-200 text-slate-700 lg:hidden" aria-expanded="false" aria-controls="dashboard-sidebar" aria-label="Open dashboard menu"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16"/></svg></button>
            <div class="min-w-0"><p class="text-xs font-medium text-slate-500">{{ $breadcrumb }}</p><h1 class="truncate text-xl font-bold tracking-tight text-slate-950 sm:text-2xl">{{ $title }}</h1></div>
        </div>
        <div class="flex items-center gap-1.5 sm:gap-3">
            <button type="button" class="hidden h-10 w-10 items-center justify-center text-slate-600 hover:bg-slate-50 sm:inline-flex" aria-label="Search"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="6"/><path d="m16 16 4 4"/></svg></button>
            <button type="button" class="relative inline-flex h-10 w-10 items-center justify-center text-slate-600 hover:bg-slate-50" aria-label="Notifications"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/></svg><span class="absolute right-1 top-1 min-w-4 rounded-full bg-emerald-700 px-1 text-[10px] font-bold leading-4 text-white">3</span></button>
            <button type="button" class="relative inline-flex h-10 w-10 items-center justify-center text-slate-600 hover:bg-slate-50" aria-label="Messages"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 11.5a7.5 7.5 0 0 1-8 7.5 8.7 8.7 0 0 1-3.4-.7L4 20l1.4-3.5A7.3 7.3 0 0 1 4 12a7.5 7.5 0 0 1 8-7.5 7.5 7.5 0 0 1 8 7Z"/></svg><span class="absolute right-1 top-1 min-w-4 rounded-full bg-emerald-700 px-1 text-[10px] font-bold leading-4 text-white">2</span></button>
            <div class="ml-1 hidden items-center gap-2 border-l border-slate-200 pl-3 sm:flex"><span class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-100 text-sm font-bold text-emerald-800">MR</span><div class="hidden xl:block"><p class="text-sm font-bold text-slate-800">Mohammad Rahman</p><p class="text-xs text-slate-500">Buyer Account</p></div><svg class="h-4 w-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg></div>
        </div>
    </div>
</header>
