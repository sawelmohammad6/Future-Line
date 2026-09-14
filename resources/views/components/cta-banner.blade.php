@props(['title', 'description', 'primaryHref' => '#', 'secondaryHref' => '#'])
<section class="bg-emerald-950">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 sm:py-12 lg:px-8">
        <div class="flex flex-col gap-7 lg:flex-row lg:items-center lg:justify-between">
            <div class="max-w-2xl"><p class="text-xs font-bold uppercase tracking-[0.18em] text-emerald-300">Bulk sourcing support</p><h2 class="mt-3 text-2xl font-bold tracking-tight text-white sm:text-3xl">{{ $title }}</h2><p class="mt-3 leading-7 text-emerald-50/80">{{ $description }}</p></div>
            <div class="flex flex-col gap-3 sm:flex-row"><a href="{{ $primaryHref }}" class="inline-flex items-center justify-center bg-white px-5 py-3 text-sm font-bold text-emerald-900 transition-colors hover:bg-emerald-50">Find Suppliers</a><a href="{{ $secondaryHref }}" class="inline-flex items-center justify-center border border-emerald-300 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-emerald-900">Request a Quote</a></div>
        </div>
    </div>
</section>
