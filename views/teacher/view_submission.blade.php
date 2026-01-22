@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 relative overflow-hidden min-h-screen">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-violet-200/20 to-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="/teacher/debrief?brief_id={{ $brief->id }}" class="inline-flex items-center text-purple-700 hover:text-purple-900 mb-4 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Learners
            </a>

            <div class="flex items-center gap-4">
                <div class="p-3 bg-gradient-to-br from-purple-600 via-violet-600 to-fuchsia-600 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-900 to-violet-700 bg-clip-text text-transparent">
                        Submission Details
                    </h1>
                    <p class="text-purple-600 mt-1">Review learner's work and progress</p>
                </div>
            </div>
        </div>

        <!-- Brief & Learner Info -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Brief Card -->
            <div class="card">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 bg-purple-100 rounded-lg">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-purple-900">Brief Information</h2>
                </div>
                <p class="text-purple-700 font-semibold">{{ $brief->title }}</p>
            </div>

            <!-- Learner Card -->
            <div class="card">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 bg-violet-100 rounded-lg">
                        <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-purple-900">Learner</h2>
                </div>
                <p class="text-purple-700 font-semibold mb-2">{{ $learner->name }}</p>
                @if($submission)
                    <div class="flex items-center gap-2 text-sm">
                        <span class="badge badge-success">Submitted</span>
                        <span class="text-purple-600">{{ date('M d, Y at H:i', strtotime($submission->submitted_at)) }}</span>
                    </div>
                @else
                    <span class="badge badge-warning">Not Submitted</span>
                @endif
            </div>
        </div>

        <!-- Submission Content -->
        @if($submission)
            <div class="space-y-6">
                <!-- Project Link Card -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title flex items-center gap-2">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                            Project Link
                        </h2>
                    </div>
                    <a href="{{ $submission->project_link }}" target="_blank" rel="noopener noreferrer" 
                       class="inline-flex items-center gap-2 text-purple-600 hover:text-purple-800 font-medium transition-colors">
                        {{ $submission->project_link }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>

                <!-- Learner's Comments Card -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title flex items-center gap-2">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            Learner's Reflection
                        </h2>
                    </div>
                    <div class="bg-purple-50/80 rounded-xl p-6 border-2 border-purple-100/60">
                        <p class="text-purple-800 whitespace-pre-wrap leading-relaxed">{{ $submission->comments }}</p>
                    </div>
                </div>
            </div>
        @else
            <!-- No Submission State -->
            <div class="card">
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-purple-900 mb-2">No Submission Yet</h3>
                    <p class="text-purple-600">This learner has not submitted their work for this brief.</p>
                </div>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="mt-8 flex items-center justify-center gap-4">
            <a href="/teacher/debrief?brief_id={{ $brief->id }}" class="btn btn-secondary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Learners
            </a>
            @if($submission)
                <a href="/teacher/evaluate?brief_id={{ $brief->id }}&learner_id={{ $learner->id }}" class="btn btn-primary btn-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    Evaluate This Submission
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
