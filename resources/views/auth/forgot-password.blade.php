@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<section class="bg-slate-100 px-4 py-12 sm:px-6 lg:py-16">
    <div class="mx-auto max-w-md border border-slate-200 bg-white p-6 shadow-xl shadow-slate-900/5 sm:p-9">
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 hover:text-emerald-800"><span aria-hidden="true">←</span> Back to Sign In</a>
        <div class="mt-7 flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-emerald-700"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg></div>
        <h1 class="mt-5 text-3xl font-bold tracking-tight text-slate-950">Forgot Your Password?</h1><p class="mt-3 text-sm leading-6 text-slate-600">Enter your registered email or mobile number and we'll help you reset your password.</p>
        <form class="mt-7 space-y-5" data-demo-form novalidate><div><label for="reset-identity" class="block text-sm font-semibold text-slate-800">Email / Mobile Number</label><input id="reset-identity" required type="text" placeholder="you@company.com or 01XXXXXXXXX" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Please enter your email or mobile number.</p></div><button type="submit" class="w-full border border-emerald-700 bg-emerald-700 px-4 py-3 text-sm font-bold text-white shadow-sm hover:bg-emerald-800">Send Reset Code</button><p class="hidden border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-800" data-demo-feedback></p></form>
        <x-auth-trust-panel compact />
    </div>
</section>
@endsection
