@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Administration</h1>
        <p class="mt-2 text-slate-600">Manage the entire learning ecosystem</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <div class="card group hover:shadow-xl transition-all duration-300 border-slate-200/60 hover:border-slate-300">
            <div class="flex items-center space-x-3 mb-4">
                <div class="p-2 bg-slate-100 rounded-lg group-hover:bg-slate-200 transition-colors">
                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Structure Management</h3>
            </div>
            <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                Organize classes, sprints, and briefs to create structured learning paths.
            </p>
            <a href="/admin/classes" class="btn btn-primary w-full justify-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Manage Structure
            </a>
        </div>

        <div class="card group hover:shadow-xl transition-all duration-300 border-slate-200/60 hover:border-slate-300">
            <div class="flex items-center space-x-3 mb-4">
                <div class="p-2 bg-emerald-100 rounded-lg group-hover:bg-emerald-200 transition-colors">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">Competence Framework</h3>
            </div>
            <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                Define and manage the global skills framework and competency codes.
            </p>
            <a href="/admin/competences" class="btn btn-primary w-full justify-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Manage Competences
            </a>
        </div>

        <div class="card group hover:shadow-xl transition-all duration-300 border-slate-200/60 hover:border-slate-300">
            <div class="flex items-center space-x-3 mb-4">
                <div class="p-2 bg-violet-100 rounded-lg group-hover:bg-violet-200 transition-colors">
                    <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">User Management</h3>
            </div>
            <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                Manage teachers, learners, and user permissions across the platform.
            </p>
            <a href="/admin/users" class="btn btn-primary w-full justify-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Manage Users
            </a>
        </div>
    </div>

    <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl p-8 border border-slate-200">
        <div class="text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 mb-2">System Overview</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-6">
                <div class="text-center">
                    <div class="text-2xl font-bold text-brand-600">16</div>
                    <div class="text-sm text-slate-600">Total Users</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-emerald-600">4</div>
                    <div class="text-sm text-slate-600">Active Classes</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-violet-600">5</div>
                    <div class="text-sm text-slate-600">Current Sprints</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-slate-600">26</div>
                    <div class="text-sm text-slate-600">Submissions</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
