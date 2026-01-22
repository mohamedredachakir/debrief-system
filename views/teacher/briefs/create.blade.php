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
                <div class="p-3 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-900 to-violet-700 bg-clip-text text-transparent">
                        Create New Brief
                    </h1>
                    <p class="text-purple-600 mt-1">For Sprint: <span class="font-semibold">{{ $sprint->name }}</span></p>
                </div>
            </div>

            <a href="/teacher/dashboard" class="btn btn-secondary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Form Card -->
        <div class="card max-w-3xl mx-auto">
            <form action="/teacher/briefs/store" method="POST" class="space-y-6">
                <input type="hidden" name="sprint_id" value="{{ $sprint->id }}">

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-purple-900 mb-2">
                        Brief Title <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        required 
                        placeholder="e.g., Build a Responsive Landing Page"
                        class="input w-full"
                    >
                    <p class="mt-1 text-xs text-purple-600">A clear, descriptive title for the assignment</p>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-purple-900 mb-2">
                        Description
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="6"
                        placeholder="Provide detailed instructions, requirements, and expectations..."
                        class="input w-full resize-none"
                    ></textarea>
                    <p class="mt-1 text-xs text-purple-600">Include objectives, deliverables, and evaluation criteria</p>
                </div>

                <!-- Duration and Type Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Duration -->
                    <div>
                        <label for="duration_days" class="block text-sm font-semibold text-purple-900 mb-2">
                            Duration (Days)
                        </label>
                        <input 
                            type="number" 
                            id="duration_days" 
                            name="duration_days" 
                            min="1"
                            placeholder="7"
                            class="input w-full"
                        >
                        <p class="mt-1 text-xs text-purple-600">How many days to complete this brief</p>
                    </div>

                    <!-- Type -->
                    <div>
                        <label for="type" class="block text-sm font-semibold text-purple-900 mb-2">
                            Work Type
                        </label>
                        <select id="type" name="type" class="input w-full">
                            <option value="">Select work type</option>
                            <option value="individuel">Individual Work</option>
                            <option value="collectif">Team/Collective Work</option>
                        </select>
                        <p class="mt-1 text-xs text-purple-600">Individual or collaborative assignment</p>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-violet-50/50 backdrop-blur-sm rounded-xl p-4 border-2 border-violet-100/60">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-purple-50 rounded-lg shadow-sm">
                            <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-purple-900">Assignment Guidelines</p>
                            <p class="text-xs text-purple-700 mt-1">
                                Ensure the brief is clear, achievable within the sprint timeframe, and aligned with the learning competencies.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="pt-4 border-t-2 border-purple-200/40 flex items-center justify-end gap-3">
                    <a href="/teacher/dashboard" class="btn btn-ghost">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Brief
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
