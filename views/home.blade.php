@extends('layouts.app')

@section('content')
<div class="relative overflow-hidden bg-gradient-to-br from-purple-50 via-violet-50 to-fuchsia-100">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%232563eb" fill-opacity="0.03"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="absolute top-20 left-10 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
    <div class="absolute top-40 right-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-4000"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">
        <div class="text-center">
            <div class="inline-flex items-center px-4 py-2 rounded-full bg-purple-100/80 text-purple-800 text-sm font-medium mb-8">
                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2 animate-pulse"></span>
                Professional Learning Management
            </div>

            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight">
                <span class="block text-purple-900">Premium</span>
                <span class="block premium-gradient">
                    Debrief System
                </span>
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg sm:text-xl text-purple-600 leading-relaxed">
                A sophisticated platform for managing pedagogical sprints, briefs, and skills assessment.
                Experience enterprise-grade education management with cutting-edge design.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                @if(isset($_SESSION['user_id']))
                    @if($_SESSION['user_role'] === 'admin')
                        <a href="/admin/dashboard" class="btn btn-primary px-8 py-3 text-lg shadow-2xl shadow-purple-500/25">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Access Dashboard
                        </a>
                    @elseif($_SESSION['user_role'] === 'teacher')
                        <a href="/teacher/dashboard" class="btn btn-primary px-8 py-3 text-lg shadow-2xl shadow-purple-500/25">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Teacher Portal
                        </a>
                    @elseif($_SESSION['user_role'] === 'learner')
                        <a href="/learner/dashboard" class="btn btn-primary px-8 py-3 text-lg shadow-2xl shadow-purple-500/25">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Learning Hub
                        </a>
                    @endif
                    <a href="/logout" class="btn btn-secondary px-8 py-3 text-lg">
                        Sign out
                    </a>
                @else
                    <a href="/login" class="btn btn-primary px-8 py-3 text-lg shadow-2xl shadow-purple-500/25">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Get Started
                    </a>
                    <div class="text-sm text-slate-500 self-center sm:self-start sm:mt-4 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Demo accounts available
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-20 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="card group hover:shadow-xl transition-all duration-300 border-purple-200/60 hover:border-purple-200">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-purple-900">For Teachers</h3>
                </div>
                <p class="text-purple-600 leading-relaxed">
                    Create and manage briefs, evaluate competencies, and track student progress efficiently.
                    Get comprehensive insights into learning outcomes and skill development.
                </p>
            </div>

            <div class="card group hover:shadow-xl transition-all duration-300 border-purple-200/60 hover:border-purple-200">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-purple-900">For Learners</h3>
                </div>
                <p class="text-purple-600 leading-relaxed">
                    Access briefs, submit work with detailed descriptions, and track your skill progression.
                    Get clear feedback and understand your learning journey.
                </p>
            </div>

            <div class="card group hover:shadow-xl transition-all duration-300 border-purple-200/60 hover:border-purple-200">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2 bg-violet-100 rounded-lg group-hover:bg-violet-200 transition-colors">
                        <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-purple-900">For Administrators</h3>
                </div>
                <p class="text-purple-600 leading-relaxed">
                    Manage users, classes, sprints, and competencies. Configure the entire learning ecosystem
                    with powerful administrative tools and comprehensive oversight.
                </p>
            </div>
        </div>

        <div class="mt-20 text-center">
            <div class="inline-flex items-center space-x-6 bg-purple-50/80 backdrop-blur-sm rounded-full px-6 py-3 border border-purple-200/60">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-sm text-purple-600">System Online</span>
                </div>
                <div class="w-px h-4 bg-slate-300"></div>
                <div class="text-sm text-slate-500">
                    16 users • 11 briefs • 26 submissions
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
