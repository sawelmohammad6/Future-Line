@extends('layouts.app')

@section('title', 'Create Account')

@section('content')
<div class="bg-slate-100">
    <div class="mx-auto max-w-[1440px] lg:grid lg:grid-cols-[.88fr_1.12fr]">
        <x-auth-brand-panel title="Join Future Line Trading" description="Create your account and connect with verified businesses." />
        <section class="px-4 py-10 sm:px-8 lg:px-10 xl:px-14">
            <div class="mx-auto max-w-3xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-900/5 sm:p-9">
                <p class="text-xs font-bold uppercase tracking-[0.15em] text-emerald-700">Create your business profile</p><h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-950">Join Future Line Trading</h1><p class="mt-2 text-sm leading-6 text-slate-600">Choose the profile that best represents your place in the trade network.</p>
                <form class="mt-8" data-demo-form novalidate>
                    <div><div class="flex items-center gap-3"><span class="flex h-7 w-7 items-center justify-center rounded-full bg-emerald-700 text-xs font-bold text-white">1</span><h2 class="text-base font-bold text-slate-900">Choose Account Type</h2></div><div class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3">
                        @foreach (['Farmer', 'Buyer', 'Seller', 'Reseller', 'Dealer', 'Supplier', 'Manufacturer', 'Company / Brand Owner', 'Importer', 'Exporter', 'Agent / Commission Partner'] as $index => $role)
                            <label class="cursor-pointer"><input type="radio" name="role" value="{{ $role }}" required @checked($index === 0) class="peer sr-only"><span class="flex min-h-16 items-center border border-slate-200 bg-white px-3 py-3 text-sm font-semibold leading-5 text-slate-700 transition hover:border-emerald-300 peer-checked:border-emerald-700 peer-checked:bg-emerald-50 peer-checked:text-emerald-800 peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-emerald-600"><span class="mr-2 h-2 w-2 shrink-0 rounded-full bg-slate-300 peer-checked:bg-emerald-600"></span>{{ $role }}</span></label>
                        @endforeach
                    </div></div>
                    <div class="mt-9 border-t border-slate-200 pt-7"><div class="flex items-center gap-3"><span class="flex h-7 w-7 items-center justify-center rounded-full bg-emerald-700 text-xs font-bold text-white">2</span><h2 class="text-base font-bold text-slate-900">Basic Information</h2></div><div class="mt-5 grid gap-5 sm:grid-cols-2">
                        <div><label for="full-name" class="block text-sm font-semibold text-slate-800">Full Name</label><input id="full-name" required type="text" placeholder="Your full name" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Full name is required.</p></div>
                        <div><label for="mobile" class="block text-sm font-semibold text-slate-800">Mobile Number</label><input id="mobile" required type="tel" placeholder="01XXXXXXXXX" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Mobile number is required.</p></div>
                        <div><label for="register-email" class="block text-sm font-semibold text-slate-800">Email</label><input id="register-email" required type="email" placeholder="you@company.com" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Enter a valid email address.</p></div>
                        <div><label for="register-password" class="block text-sm font-semibold text-slate-800">Password</label><input id="register-password" required minlength="6" type="password" placeholder="At least 6 characters" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Password must be at least 6 characters.</p></div>
                        <div class="sm:col-span-2"><label for="confirm-password" class="block text-sm font-semibold text-slate-800">Confirm Password</label><input id="confirm-password" required data-confirm-password="register-password" type="password" placeholder="Re-enter your password" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Passwords do not match.</p></div>
                    </div><label class="mt-5 flex items-start gap-2.5 text-sm leading-5 text-slate-600"><input required type="checkbox" class="mt-0.5 h-4 w-4 shrink-0 border-slate-300 text-emerald-700 focus:ring-emerald-600"><span>I agree to the <a href="{{ route('about') }}" class="font-semibold text-emerald-700">Terms &amp; Conditions</a> and <a href="{{ route('about') }}" class="font-semibold text-emerald-700">Privacy Policy</a>.</span></label><button type="submit" class="mt-6 w-full border border-emerald-700 bg-emerald-700 px-4 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-emerald-800">Create Account</button><p class="mt-3 hidden border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-800" data-demo-feedback></p></div>
                </form>
                <p class="mt-7 text-center text-sm text-slate-600">Already have an account? <a href="{{ route('login') }}" class="font-bold text-emerald-700 hover:text-emerald-800">Sign In</a></p><x-auth-trust-panel compact />
            </div>
        </section>
    </div>
</div>
@endsection
