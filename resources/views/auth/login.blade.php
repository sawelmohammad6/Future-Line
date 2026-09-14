@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
<div class="bg-slate-100">
    <div class="mx-auto max-w-[1440px] lg:grid lg:grid-cols-[1.05fr_.95fr]">
        <x-auth-brand-panel title="Welcome Back to Trusted Trade" description="Sign in to access your products, orders, messages and business activity." />

        <section class="flex min-h-[620px] items-center px-4 py-12 sm:px-8 lg:px-12 xl:px-16">
            <div class="mx-auto w-full max-w-md border border-slate-200 bg-white p-6 shadow-xl shadow-slate-900/5 sm:p-9">
                <div class="flex items-start justify-between gap-4">
                    <div><p class="text-xs font-bold uppercase tracking-[0.15em] text-emerald-700">Account access</p><h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-950">Sign In</h1></div>
                    <a href="{{ route('home') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800">Back to site</a>
                </div>

                <form class="mt-8 space-y-5" data-demo-form novalidate>
                    <div><label for="login-identity" class="block text-sm font-semibold text-slate-800">Email or Mobile Number</label><input id="login-identity" name="identity" type="text" required placeholder="you@company.com or 01XXXXXXXXX" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Please enter your email or mobile number.</p></div>
                    <div><div class="flex items-center justify-between gap-4"><label for="login-password" class="block text-sm font-semibold text-slate-800">Password</label><a href="{{ route('forgot-password') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800">Forgot Password?</a></div><input id="login-password" name="password" type="password" required minlength="6" placeholder="Enter your password" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Password is required.</p></div>
                    <label class="flex items-center gap-2.5 text-sm text-slate-600"><input type="checkbox" class="h-4 w-4 border-slate-300 text-emerald-700 focus:ring-emerald-600"><span>Remember me</span></label>
                    <button type="submit" class="w-full border border-emerald-700 bg-emerald-700 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-emerald-800">Sign In</button>
                    <p class="hidden border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-800" data-demo-feedback></p>
                </form>

                <div class="my-7 flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.14em] text-slate-400"><span class="h-px flex-1 bg-slate-200"></span>OR<span class="h-px flex-1 bg-slate-200"></span></div>
                <a href="{{ route('verify-otp') }}" class="flex w-full items-center justify-center gap-2 border border-slate-300 bg-white px-4 py-3 text-sm font-bold text-slate-700 transition hover:bg-slate-50"><svg class="h-4 w-4 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2.5" width="14" height="19" rx="2"/><path d="M10 18h4"/></svg> Continue with Mobile</a>
                <p class="mt-7 text-center text-sm text-slate-600">Don't have an account? <a href="{{ route('register') }}" class="font-bold text-emerald-700 hover:text-emerald-800">Create Account</a></p>
                <p class="mt-5 text-center text-sm font-medium text-slate-500"><span class="text-emerald-700">বাংলা</span> <span class="px-1 text-slate-300">|</span> English</p>
                <x-auth-trust-panel compact />
            </div>
        </section>
    </div>
</div>
@endsection
