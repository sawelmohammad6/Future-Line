<section class="relative hidden overflow-hidden bg-slate-950 lg:flex lg:min-h-[720px] lg:flex-col lg:justify-between">
    <img src="{{ asset(config('frontend-images.hero.auth')) }}" alt="Agricultural fields representing business trade" class="absolute inset-0 h-full w-full object-cover opacity-35">
    <div class="absolute inset-0 bg-slate-950/65"></div>
    <div class="relative z-10 p-10 xl:p-14">
        <a href="{{ route('home') }}" class="inline-block" aria-label="Future Line Trading home">
            <span class="block text-2xl font-bold tracking-tight text-white">Future Line <span class="text-emerald-400">Trading</span></span>
            <span class="mt-1 block text-xs font-semibold tracking-[0.12em] text-emerald-200">Brokerage <span class="px-1">•</span> Agent <span class="px-1">•</span> Commission</span>
        </a>
    </div>
    <div class="relative z-10 max-w-xl p-10 xl:p-14">
        <span class="inline-flex border border-emerald-300/40 bg-emerald-500/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.13em] text-emerald-100">Business marketplace</span>
        <h1 class="mt-5 text-4xl font-bold leading-tight tracking-tight text-white xl:text-5xl">{{ $title }}</h1>
        <p class="mt-5 max-w-lg text-base leading-7 text-slate-200">{{ $description }}</p>
        <div class="mt-10 border-l-2 border-emerald-400 pl-4 text-sm leading-6 text-slate-200">Connecting verified businesses, buyers, sellers and trade partners across Bangladesh.</div>
    </div>
</section>
