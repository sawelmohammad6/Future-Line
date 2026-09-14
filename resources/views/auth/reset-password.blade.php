@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<section class="bg-slate-100 px-4 py-12 sm:px-6 lg:py-16">
    <div class="mx-auto max-w-md border border-slate-200 bg-white p-6 shadow-xl shadow-slate-900/5 sm:p-9">
        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-emerald-700"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 1 1 8 0v3"/></svg></div>
        <h1 class="mt-5 text-3xl font-bold tracking-tight text-slate-950">Create a New Password</h1><p class="mt-3 text-sm leading-6 text-slate-600">Choose a password you do not use elsewhere to help protect your business profile.</p>
        <form class="mt-7 space-y-5" data-demo-form novalidate><div><label for="new-password" class="block text-sm font-semibold text-slate-800">New Password</label><input id="new-password" required minlength="6" type="password" data-password-strength placeholder="At least 6 characters" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Use at least 6 characters.</p><div class="mt-3 flex gap-1.5" aria-hidden="true"><span data-strength-bar class="h-1.5 flex-1 bg-slate-200"></span><span data-strength-bar class="h-1.5 flex-1 bg-slate-200"></span><span data-strength-bar class="h-1.5 flex-1 bg-slate-200"></span></div><p class="mt-1.5 text-xs font-medium text-slate-500" data-strength-label>Password strength</p></div><div><label for="new-password-confirm" class="block text-sm font-semibold text-slate-800">Confirm New Password</label><input id="new-password-confirm" required data-confirm-password="new-password" type="password" placeholder="Re-enter your password" class="mt-2 block w-full border border-slate-300 px-3.5 py-3 text-sm placeholder:text-slate-400 focus:border-emerald-600 focus:outline-none"><p class="mt-1.5 hidden text-xs font-medium text-red-600" data-field-error>Passwords do not match.</p></div><button type="submit" class="w-full border border-emerald-700 bg-emerald-700 px-4 py-3 text-sm font-bold text-white shadow-sm hover:bg-emerald-800">Update Password</button><p class="hidden border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-800" data-demo-feedback></p></form>
        <x-auth-trust-panel compact />
    </div>
</section>
@endsection
