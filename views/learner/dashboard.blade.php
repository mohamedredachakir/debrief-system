@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 relative overflow-hidden min-h-screen">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-violet-200/20 to-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -left-40 w-80 h-80 bg-gradient-to-br from-fuchsia-200/20 to-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-2000"></div>
        <div class="absolute -bottom-40 right-1/4 w-80 h-80 bg-gradient-to-br from-purple-200/20 to-violet-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-4000"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 gap-4">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-gradient-to-br from-emerald-600 to-green-600 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-900 to-violet-700 bg-clip-text text-transparent">
                        My Learning Journey
                    </h1>
                    <p class="mt-1 text-purple-600">Access your briefs, submit work, and track your progress</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="px-4 py-2 bg-purple-50/90 backdrop-blur-sm rounded-xl border-2 border-purple-200/60 shadow-sm">
                    <div class="text-sm text-purple-600">
                        <span class="font-bold text-purple-900">{{ count($briefs ?? []) }}</span> active briefs
                    </div>
                </div>
                <div class="w-px h-6 bg-purple-300"></div>
                <div class="text-sm text-purple-600">
                    {{ date('l, F j, Y') }}
                </div>
            </div>
        </div>

        @if($briefs && count($briefs) > 0)
            <!-- Briefs Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 mb-12">
                @foreach($briefs as $brief)
                    <div class="card group relative overflow-hidden hover:shadow-2xl hover:border-purple-300 transition-all duration-300">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-purple-600 via-violet-600 to-fuchsia-600"></div>

                        <div class="flex flex-col h-full">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3 flex-1">
                                    <div class="p-2 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition-colors">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1">
                                            <h3 class="text-lg font-bold text-purple-900 group-hover:text-purple-700 transition-colors truncate">
                                                {{ $brief->title }}
                                            </h3>
                                            <span class="badge {{ $brief->type === 'individuel' ? 'badge-primary' : 'badge-success' }} flex-shrink-0">
                                                {{ $brief->type === 'individuel' ? '👤 Solo' : '👥 Team' }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-purple-600 line-clamp-2">
                                            {{ strlen($brief->description) > 120 ? substr($brief->description, 0, 120) . '...' : $brief->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-auto">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center text-sm text-purple-600">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $brief->duration_days }} days</span>
                                    </div>
                                    <div class="text-xs font-semibold text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">
                                        Active
                                    </div>
                                </div>

                                <a href="/learner/submit?brief_id={{ $brief->id }}"
                                   class="btn btn-success w-full justify-center group-hover:shadow-lg transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    Submit Work
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Stats & Tips Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Progress Overview -->
                <div class="card">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-gradient-to-br from-purple-600 via-violet-600 to-fuchsia-600 rounded-xl shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-purple-900">Progress Overview</h3>
                            <p class="text-sm text-purple-600">Track your learning achievements</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-emerald-50 to-green-50 rounded-xl border-2 border-emerald-200/60">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-emerald-900">Completed Briefs</div>
                                    <div class="text-xs text-emerald-600">Keep up the great work!</div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-emerald-600">3</div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-xl border-2 border-amber-200/60">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-amber-900">Pending Submissions</div>
                                    <div class="text-xs text-amber-600">Don't forget to submit!</div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold text-amber-600">{{ count($briefs) - 3 }}</div>
                        </div>
                    </div>
                </div>

                <!-- Learning Tips -->
                <div class="card">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-purple-900">Learning Tips</h3>
                            <p class="text-sm text-purple-600">Improve your learning experience</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="p-4 bg-gradient-to-r from-purple-50 to-violet-50 rounded-xl border-2 border-purple-200/40">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-lg">💡</span>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-purple-900 mb-1">Submit Early</h4>
                                    <p class="text-xs text-purple-700">Submit your work before deadlines to get timely feedback and improve.</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-gradient-to-r from-violet-50 to-fuchsia-50 rounded-xl border-2 border-violet-200/40">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-violet-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-lg">🎯</span>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-purple-900 mb-1">Quality Matters</h4>
                                    <p class="text-xs text-purple-700">Focus on creating high-quality work that showcases your skills and learning.</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-gradient-to-r from-fuchsia-50 to-purple-50 rounded-xl border-2 border-fuchsia-200/40">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-fuchsia-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-lg">📚</span>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-purple-900 mb-1">Document Your Process</h4>
                                    <p class="text-xs text-purple-700">Include detailed reflections about what you learned and challenges faced.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-20">
                <div class="text-center max-w-lg">
                    <div class="mx-auto w-32 h-32 bg-gradient-to-br from-purple-100 to-violet-200 rounded-full flex items-center justify-center mb-8 shadow-xl">
                        <svg class="w-16 h-16 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-900 to-violet-700 bg-clip-text text-transparent mb-4">
                        Ready to Start Learning?
                    </h2>
                    <p class="text-purple-600 mb-8 text-lg">
                        Your learning journey begins here. Briefs and assignments will appear once your teacher creates them for your class.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/learner/dashboard" class="btn btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Check for Updates
                        </a>
                        <div class="text-sm text-purple-600 self-center flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Contact your teacher for assignments
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
