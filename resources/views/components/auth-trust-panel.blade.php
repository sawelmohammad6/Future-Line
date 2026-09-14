@props(['compact' => false])

<div @class(['border border-emerald-100 bg-emerald-50/70 p-5', 'mt-6' => $compact])>
    <p class="text-xs font-bold uppercase tracking-[0.16em] text-emerald-800">Trade with confidence</p>
    <ul class="mt-3 space-y-2.5 text-sm text-slate-700">
        <li class="flex items-center gap-2"><span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-emerald-700 text-xs font-bold text-white">✓</span> Secure Account</li>
        <li class="flex items-center gap-2"><span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-emerald-700 text-xs font-bold text-white">✓</span> Verified Business Support</li>
        <li class="flex items-center gap-2"><span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-emerald-700 text-xs font-bold text-white">✓</span> Protected Business Information</li>
    </ul>
</div>
