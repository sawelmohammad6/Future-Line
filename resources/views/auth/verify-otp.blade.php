@extends('layouts.app')

@section('title', 'Verify Mobile Number')

@section('content')
<section class="bg-slate-100 px-4 py-12 sm:px-6 lg:py-16">
    <div class="mx-auto max-w-md border border-slate-200 bg-white p-6 shadow-xl shadow-slate-900/5 sm:p-9">
        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-emerald-700"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"/><path d="M9.5 12 11 13.5l3.5-3.5"/></svg></div>
        <h1 class="mt-5 text-3xl font-bold tracking-tight text-slate-950">Verify Your Mobile Number</h1><p class="mt-3 text-sm leading-6 text-slate-600">We've sent a verification code to your mobile number.</p><p class="mt-3 text-base font-bold text-slate-900">+880 17******45</p>
        <form class="mt-7" data-demo-form novalidate><fieldset><legend class="text-sm font-semibold text-slate-800">Enter 6-digit verification code</legend><div class="mt-3 grid grid-cols-6 gap-2 sm:gap-3" data-otp-group>
            @for ($i = 0; $i < 6; $i++)
                <input aria-label="Verification code digit {{ $i + 1 }}" inputmode="numeric" pattern="[0-9]" maxlength="1" required data-otp-input class="h-12 min-w-0 border border-slate-300 text-center text-lg font-bold text-slate-900 focus:border-emerald-600 focus:outline-none sm:h-14">
            @endfor
        </div><p class="mt-2 hidden text-xs font-medium text-red-600" data-field-error>Please enter all six digits.</p></fieldset><button type="submit" class="mt-6 w-full border border-emerald-700 bg-emerald-700 px-4 py-3 text-sm font-bold text-white shadow-sm hover:bg-emerald-800">Verify Code</button><p class="mt-3 hidden border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-800" data-demo-feedback></p></form>
        <div class="mt-6 border-t border-slate-200 pt-5 text-center"><p class="text-sm text-slate-500">Resend available in <span class="font-semibold text-slate-700" data-demo-countdown>00:45</span></p><button type="button" class="mt-3 text-sm font-bold text-emerald-700 hover:text-emerald-800" data-resend-button>Resend Code</button></div><a href="{{ route('forgot-password') }}" class="mt-5 block text-center text-sm font-semibold text-slate-600 hover:text-emerald-700">Change Mobile Number</a>
        <x-auth-trust-panel compact />
    </div>
</section>
@endsection
