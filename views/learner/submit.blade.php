@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-violet-200/20 to-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-gradient-to-br from-emerald-600 to-green-600 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-900 to-violet-700 bg-clip-text text-transparent">
                        Submit Your Work
                    </h1>
                    <p class="text-purple-600 mt-1">Upload your project and share your progress</p>
                </div>
            </div>

            <a href="/learner/dashboard" class="btn btn-secondary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Brief Info Card -->
        <div class="card mb-6">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-purple-100 rounded-xl">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-xl font-bold text-purple-900 mb-2">{{ $brief->title }}</h2>
                    <p class="text-purple-700 leading-relaxed">{{ $brief->description }}</p>
                </div>
            </div>
        </div>

        <!-- Submission Form -->
        <div class="card max-w-3xl mx-auto">
            <form action="/learner/submit" method="POST" class="space-y-6">
                <input type="hidden" name="brief_id" value="{{ $brief->id }}">

                <!-- Project Link -->
                <div>
                    <label for="project_link" class="block text-sm font-semibold text-purple-900 mb-2">
                        Project Link <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                        </div>
                        <input 
                            type="url" 
                            id="project_link" 
                            name="project_link" 
                            value="{{ $submission->project_link ?? '' }}" 
                            required 
                            placeholder="https://github.com/your-repo or https://your-project.com"
                            class="input w-full pl-10"
                        >
                    </div>
                    <p class="mt-1 text-xs text-purple-600">Provide a link to your GitHub repository, live demo, or project files</p>
                </div>

                <!-- Comments -->
                <div>
                    <label for="comments" class="block text-sm font-semibold text-purple-900 mb-2">
                        Project Description & Reflection
                    </label>
                    <textarea 
                        id="comments" 
                        name="comments" 
                        rows="8"
                        placeholder="Describe your project, the challenges you faced, what you learned, and any additional notes..."
                        class="input w-full resize-none"
                    >{{ $submission->comments ?? '' }}</textarea>
                    <p class="mt-1 text-xs text-purple-600">Share your experience, learnings, and any challenges you overcame</p>
                </div>

                <!-- Tips Box -->
                <div class="bg-emerald-50/50 backdrop-blur-sm rounded-xl p-4 border-2 border-emerald-100/60">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-purple-50 rounded-lg shadow-sm">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-purple-900">Submission Tips</p>
                            <ul class="text-xs text-purple-700 mt-1 space-y-1 list-disc list-inside">
                                <li>Ensure your project link is accessible and working</li>
                                <li>Include a README file in your repository</li>
                                <li>Describe what you learned and how you solved problems</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="pt-4 border-t-2 border-purple-200/40 flex items-center justify-end gap-3">
                    <a href="/learner/dashboard" class="btn btn-ghost">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-success btn-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $submission ? 'Update Submission' : 'Submit Work' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
