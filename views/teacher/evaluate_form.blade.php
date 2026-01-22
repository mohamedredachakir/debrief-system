@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 relative overflow-hidden min-h-screen">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-violet-200/20 to-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -left-40 w-80 h-80 bg-gradient-to-br from-fuchsia-200/20 to-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-2000"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="/teacher/debrief?brief_id={{ $brief_id }}" class="inline-flex items-center text-purple-700 hover:text-purple-900 mb-4 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Learners
            </a>

            <div class="flex items-center gap-4">
                <div class="p-3 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-900 to-violet-700 bg-clip-text text-transparent">
                        Evaluate Learner
                    </h1>
                    <p class="text-purple-600 mt-1">Assess competencies and provide feedback</p>
                </div>
            </div>
        </div>

        <!-- Evaluation Form -->
        <form action="/teacher/evaluate/store" method="POST" class="space-y-6">
            <input type="hidden" name="brief_id" value="{{ $brief_id }}">
            <input type="hidden" name="learner_id" value="{{ $learner_id }}">

            <!-- Info Box -->
            <div class="bg-violet-50/50 backdrop-blur-sm rounded-xl p-4 border-2 border-violet-100/60">
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-purple-50 rounded-lg shadow-sm">
                        <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-purple-900">Evaluation Guidelines</p>
                        <p class="text-xs text-purple-700 mt-1">
                            Assess each competency based on the learner's demonstrated skills. Provide constructive feedback to support their growth.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Competences Grid -->
            <div class="space-y-6">
                @foreach($competences as $c)
                    <div class="card">
                        <div class="card-header">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-lg">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-purple-900">{{ $c->code }}</h3>
                                    <p class="text-sm text-purple-700">{{ $c->label }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Level Selection -->
                            <div>
                                <label for="level_{{ $c->id }}" class="block text-sm font-semibold text-purple-900 mb-2">
                                    Competency Level <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="level_{{ $c->id }}"
                                    name="levels[{{ $c->id }}]" 
                                    required
                                    class="input w-full"
                                >
                                    <option value="">Select level...</option>
                                    <option value="IMITER">🔵 Imiter - Can replicate with guidance</option>
                                    <option value="S_ADAPTER">🟢 S'adapter - Can adapt to new situations</option>
                                    <option value="TRANSPOSER">🟣 Transposer - Can transfer to new contexts</option>
                                </select>
                                <p class="mt-1 text-xs text-purple-600">Choose the level that best represents the learner's mastery</p>
                            </div>

                            <!-- Comment -->
                            <div>
                                <label for="comment_{{ $c->id }}" class="block text-sm font-semibold text-purple-900 mb-2">
                                    Feedback & Comments
                                </label>
                                <textarea 
                                    id="comment_{{ $c->id }}"
                                    name="comments[{{ $c->id }}]" 
                                    rows="4"
                                    placeholder="Provide specific feedback, examples, and suggestions for improvement..."
                                    class="input w-full resize-none"
                                ></textarea>
                                <p class="mt-1 text-xs text-purple-600">Optional but recommended for learner growth</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <div class="pt-6 border-t-2 border-purple-200/40 flex items-center justify-end gap-3">
                <a href="/teacher/debrief?brief_id={{ $brief_id }}" class="btn btn-ghost">
                    Cancel
                </a>
                <button type="submit" class="btn btn-success btn-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Submit Evaluation
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
