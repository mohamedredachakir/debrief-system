@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-200/20 to-violet-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -left-40 w-80 h-80 bg-gradient-to-br from-violet-200/20 to-fuchsia-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-2000"></div>
        <div class="absolute -bottom-40 right-1/4 w-80 h-80 bg-gradient-to-br from-fuchsia-200/20 to-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-4000"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center justify-center min-h-[80vh]">
            <div class="max-w-md w-full space-y-8">
                <!-- Header -->
                <div class="text-center">
                    <div class="flex justify-center mb-6">
                        <div class="p-4 bg-gradient-to-br from-purple-600 via-violet-600 to-fuchsia-600 rounded-2xl shadow-2xl shadow-purple-200">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-900 to-violet-700 bg-clip-text text-transparent">
                        Welcome Back
                    </h1>
                    <p class="mt-3 text-purple-700 font-medium">
                        Sign in to access your debriefing dashboard
                    </p>
                </div>

                <!-- Login Card -->
                <div class="bg-purple-50/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-purple-200/60 overflow-hidden">
                    <form class="p-8 space-y-6" action="/login" method="POST">
                        @if(isset($error))
                            <div class="rounded-xl bg-gradient-to-r from-red-50 to-rose-50 p-4 border border-red-200/60 shadow-sm">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="p-1 bg-red-100 rounded-lg">
                                            <svg class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-800">{{ $error }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif>

                        <div class="space-y-5">
                            <div>
                                <label for="email" class="block text-sm font-semibold text-purple-900 mb-2">
                                    Email Address
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        autocomplete="email"
                                        required
                                        class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all bg-purple-50/50 text-purple-900 placeholder-purple-400"
                                        placeholder="you@example.com"
                                    >
                                </div>
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-semibold text-purple-900 mb-2">
                                    Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        autocomplete="current-password"
                                        required
                                        class="w-full pl-10 pr-4 py-3 border border-purple-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all bg-purple-50/50 text-purple-900 placeholder-purple-400"
                                        placeholder="••••••••"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full flex items-center justify-center px-6 py-3 bg-gradient-to-r from-purple-600 via-violet-600 to-fuchsia-600 text-white font-bold rounded-xl hover:from-purple-700 hover:via-violet-700 hover:to-fuchsia-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transform active:scale-95 transition-all shadow-lg shadow-purple-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Sign In to Dashboard
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Demo Info -->
                <div class="bg-purple-50/50 backdrop-blur-sm rounded-xl p-4 border border-purple-100/60">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-purple-50 rounded-lg shadow-sm">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-purple-900">Demo Accounts Available</p>
                            <p class="text-xs text-purple-700 mt-1">Use test credentials to explore the platform features</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
