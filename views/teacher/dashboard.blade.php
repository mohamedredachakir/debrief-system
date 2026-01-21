@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-brand-50 via-blue-50 to-indigo-100 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%232563eb" fill-opacity="0.02"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
    <div class="absolute top-20 right-20 w-96 h-96 bg-brand-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    <div class="absolute bottom-20 left-20 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    <div class="relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Dashboard</h1>
                <p class="mt-2 text-slate-600">Manage your sprints, briefs, and student evaluations</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="px-4 py-2 bg-white/60 backdrop-blur-sm rounded-lg border border-slate-200/60">
                    <div class="text-sm text-slate-600">
                        <span class="font-medium text-slate-900">{{ count($sprints ?? []) }}</span> active sprints
                    </div>
                </div>
                <div class="w-px h-6 bg-slate-300"></div>
                <div class="text-sm text-slate-500">
                    Last updated: {{ date('M j, Y') }}
                </div>
            </div>
        </div>

        @if($sprints && count($sprints) > 0)
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                @foreach($sprints as $sprint)
                    <div class="card group relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-500 to-brand-600"></div>

                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="p-2 bg-brand-100 rounded-lg">
                                        <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-slate-900 group-hover:text-brand-700 transition-colors">{{ $sprint->name }}</h3>
                                        <p class="text-sm text-slate-500">Sprint Management</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div class="flex items-center text-slate-600">
                                        <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>Started {{ date('M j', strtotime($sprint->start_date)) }}</span>
                                    </div>
                                    <div class="flex items-center text-slate-600">
                                        <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $sprint->duration }} weeks</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3">
                                <a href="/teacher/briefs/create?sprint_id={{ $sprint->id }}" class="btn btn-primary whitespace-nowrap">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Create Brief
                                </a>
                            </div>
                        </div>

                        @if($sprint->briefs && count($sprint->briefs) > 0)
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-sm font-medium text-slate-700 uppercase tracking-wide">Active Briefs</h4>
                                    <span class="text-xs text-slate-500 bg-slate-100 px-2 py-1 rounded-full">{{ count($sprint->briefs) }} briefs</span>
                                </div>

                                <div class="grid gap-3">
                                    @foreach($sprint->briefs as $brief)
                                        <div class="group/item flex items-center justify-between p-4 bg-gradient-to-r from-slate-50 to-white rounded-lg border border-slate-200/60 hover:border-brand-200 hover:shadow-sm transition-all duration-200">
                                            <div class="flex items-center space-x-4 flex-1">
                                                <div class="flex-shrink-0">
                                                    <div class="w-10 h-10 bg-brand-100 rounded-lg flex items-center justify-center group-hover/item:bg-brand-200 transition-colors">
                                                        <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h5 class="text-sm font-medium text-slate-900 truncate">{{ $brief->title }}</h5>
                                                    <div class="flex items-center gap-3 mt-1">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $brief->type === 'individuel' ? 'bg-emerald-100 text-emerald-800' : 'bg-violet-100 text-violet-800' }}">
                                                            {{ $brief->type === 'individuel' ? 'Individual' : 'Group' }}
                                                        </span>
                                                        <span class="text-xs text-slate-500">{{ $brief->duration_days }} days</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <a href="/teacher/debrief?brief_id={{ $brief->id }}"
                                                   class="btn btn-secondary text-xs px-3 py-2 opacity-0 group-hover/item:opacity-100 transition-opacity">
                                                    View Work
                                                </a>
                                                <svg class="w-4 h-4 text-slate-400 group-hover/item:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="mx-auto w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-slate-900 mb-2">No briefs yet</h3>
                                <p class="text-slate-500 mb-6 max-w-sm mx-auto">Get started by creating your first brief for this sprint. Briefs help structure learning activities and track student progress.</p>
                                <a href="/teacher/briefs/create?sprint_id={{ $sprint->id }}" class="btn btn-primary">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Create Your First Brief
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card text-center">
                    <div class="mx-auto w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-slate-900 mb-1">Active Briefs</h4>
                    <p class="text-2xl font-bold text-emerald-600">{{ array_sum(array_map(fn($s) => count($s->briefs ?? []), $sprints ?? [])) }}</p>
                </div>

                <div class="card text-center">
                    <div class="mx-auto w-12 h-12 bg-brand-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-slate-900 mb-1">Total Students</h4>
                    <p class="text-2xl font-bold text-brand-600">42</p>
                </div>

                <div class="card text-center">
                    <div class="mx-auto w-12 h-12 bg-violet-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-slate-900 mb-1">Completion Rate</h4>
                    <p class="text-2xl font-bold text-violet-600">87%</p>
                </div>
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-20">
                <div class="text-center max-w-md">
                    <div class="mx-auto w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 mb-3">Welcome to Your Dashboard</h2>
                    <p class="text-slate-600 mb-8">You haven't been assigned to any classes yet. Once your administrator assigns you to classes and creates sprints, you'll see them here.</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="/teacher/dashboard" class="btn btn-secondary">
                            Refresh Dashboard
                        </a>
                        <div class="text-sm text-slate-500 self-center sm:self-start sm:mt-4">
                            Contact admin if you need access
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>
</div>
@endsection
