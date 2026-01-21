@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">My Learning Journey</h1>
        <p class="mt-2 text-slate-600">Access your briefs, submit work, and track your progress</p>
    </div>

    @if($briefs && count($briefs) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($briefs as $brief)
                <div class="card group hover:shadow-xl transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <h3 class="text-lg font-semibold text-slate-900 group-hover:text-brand-600 transition-colors">
                                    {{ $brief->title }}
                                </h3>
                                <span class="badge {{ $brief->type === 'individuel' ? 'badge-primary' : 'badge-secondary' }}">
                                    {{ $brief->type === 'individuel' ? 'Individual' : 'Group' }}
                                </span>
                            </div>
                            <p class="text-slate-600 text-sm leading-relaxed mb-4">
                                {{ strlen($brief->description) > 120 ? substr($brief->description, 0, 120) . '...' : $brief->description }}
                            </p>
                            <div class="flex items-center text-sm text-slate-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $brief->duration_days }} days
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-3">
                        <a href="/learner/submit?brief_id={{ $brief->id }}" class="btn btn-primary flex-1 justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            Submit Work
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12 bg-gradient-to-r from-brand-50 to-emerald-50 rounded-xl p-8 border border-brand-100">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-slate-900 mb-2">Keep Learning!</h3>
                <p class="text-slate-600 max-w-md mx-auto">
                    Complete your briefs on time and submit quality work to demonstrate your skills and progress.
                </p>
            </div>
        </div>
    @else
        <div class="text-center py-16">
            <svg class="w-16 h-16 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <h3 class="text-lg font-medium text-slate-900 mb-2">No briefs available</h3>
            <p class="text-slate-500 max-w-md mx-auto">
                You don't have any active briefs at the moment. Check back later or contact your teacher.
            </p>
        </div>
    @endif
</div>
@endsection
