@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Dashboard</h1>
        <p class="mt-2 text-slate-600">Manage your sprints, briefs, and student evaluations</p>
    </div>

    @if($sprints && count($sprints) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($sprints as $sprint)
                <div class="card group">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-xl font-semibold text-slate-900 mb-2">{{ $sprint->name }}</h3>
                            <div class="flex items-center space-x-4 text-sm text-slate-500">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Started {{ date('M j, Y', strtotime($sprint->start_date)) }}
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $sprint->duration }} weeks
                                </span>
                            </div>
                        </div>
                        <a href="/teacher/briefs/create?sprint_id={{ $sprint->id }}" class="btn btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create Brief
                        </a>
                    </div>

                    @if($sprint->briefs && count($sprint->briefs) > 0)
                        <div class="space-y-3">
                            @foreach($sprint->briefs as $brief)
                                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg border border-slate-200 hover:bg-slate-100 transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-2 h-2 bg-brand-500 rounded-full"></div>
                                        <div>
                                            <h4 class="font-medium text-slate-900">{{ $brief->title }}</h4>
                                            <p class="text-sm text-slate-500">
                                                {{ $brief->type === 'individuel' ? 'Individual' : 'Group' }} •
                                                {{ $brief->duration_days }} days
                                            </p>
                                        </div>
                                    </div>
                                    <a href="/teacher/debrief?brief_id={{ $brief->id }}"
                                       class="btn btn-secondary text-sm px-4 py-2">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        View Submissions
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-sm font-medium text-slate-900 mb-1">No briefs yet</h3>
                            <p class="text-sm text-slate-500">Get started by creating your first brief for this sprint.</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-16">
            <svg class="w-16 h-16 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <h3 class="text-lg font-medium text-slate-900 mb-2">No sprints assigned</h3>
            <p class="text-slate-500 max-w-md mx-auto">
                You haven't been assigned to any classes yet. Contact your administrator to get started.
            </p>
        </div>
    @endif
</div>
@endsection
