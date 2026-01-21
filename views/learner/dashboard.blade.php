@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-emerald-50/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8 gap-4">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-gradient-to-br from-emerald-100 to-brand-100 rounded-xl">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">My Learning Journey</h1>
                    <p class="mt-1 text-slate-600">Access your briefs, submit work, and track your progress</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="px-4 py-2 bg-white/60 backdrop-blur-sm rounded-lg border border-slate-200/60">
                    <div class="text-sm text-slate-600">
                        <span class="font-medium text-slate-900">{{ count($briefs ?? []) }}</span> active briefs
                    </div>
                </div>
                <div class="w-px h-6 bg-slate-300"></div>
                <div class="text-sm text-slate-500">
                    {{ date('l, F j, Y') }}
                </div>
            </div>
        </div>

        @if($briefs && count($briefs) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 mb-12">
                @foreach($briefs as $brief)
                    <div class="card group relative overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-500 to-brand-500"></div>

                        <div class="flex flex-col h-full">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3 flex-1">
                                    <div class="p-2 bg-emerald-100 rounded-lg group-hover:bg-emerald-200 transition-colors">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1">
                                            <h3 class="text-lg font-semibold text-slate-900 group-hover:text-brand-700 transition-colors truncate">
                                                {{ $brief->title }}
                                            </h3>
                                            <span class="badge {{ $brief->type === 'individuel' ? 'badge-primary' : 'badge-secondary' }} flex-shrink-0">
                                                {{ $brief->type === 'individuel' ? 'Individual' : 'Group' }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-slate-600 line-clamp-2">
                                            {{ strlen($brief->description) > 120 ? substr($brief->description, 0, 120) . '...' : $brief->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-auto">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center text-sm text-slate-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $brief->duration_days }} days duration</span>
                                    </div>
                                    <div class="text-xs text-slate-400 bg-slate-100 px-2 py-1 rounded-full">
                                        Active
                                    </div>
                                </div>

                                <a href="/learner/submit?brief_id={{ $brief->id }}"
                                   class="btn btn-primary w-full justify-center group-hover:shadow-lg transition-all duration-200">
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

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="card">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">Progress Overview</h3>
                            <p class="text-sm text-slate-600">Track your learning achievements</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-emerald-50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-emerald-900">Completed Briefs</div>
                                    <div class="text-xs text-emerald-600">Keep up the great work!</div>
                                </div>
                            </div>
                            <div class="text-2xl font-bold text-emerald-600">3</div>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-amber-50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-amber-900">Pending Submissions</div>
                                    <div class="text-xs text-amber-600">Don't forget to submit!</div>
                                </div>
                            </div>
                            <div class="text-2xl font-bold text-amber-600">{{ count($briefs) - 3 }}</div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-gradient-to-br from-violet-100 to-purple-100 rounded-xl">
                            <svg class="w-8 h-8 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">Learning Tips</h3>
                            <p class="text-sm text-slate-600">Improve your learning experience</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="p-3 bg-gradient-to-r from-brand-50 to-brand-100/50 rounded-lg border border-brand-200/30">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-brand-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-xs font-bold text-brand-600">💡</span>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-slate-900 mb-1">Submit Early</h4>
                                    <p class="text-xs text-slate-600">Submit your work before deadlines to get timely feedback.</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-gradient-to-r from-emerald-50 to-emerald-100/50 rounded-lg border border-emerald-200/30">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-xs font-bold text-emerald-600">🎯</span>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-slate-900 mb-1">Quality Matters</h4>
                                    <p class="text-xs text-slate-600">Focus on creating high-quality work that showcases your skills.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="flex flex-col items-center justify-center py-20">
                <div class="text-center max-w-lg">
                    <div class="mx-auto w-32 h-32 bg-gradient-to-br from-slate-100 to-slate-200 rounded-full flex items-center justify-center mb-8">
                        <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">Ready to Start Learning?</h2>
                    <p class="text-slate-600 mb-8 text-lg">Your learning journey begins here. Briefs and assignments will appear once your teacher creates them for your class.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/learner/dashboard" class="btn btn-secondary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Check for Updates
                        </a>
                        <div class="text-sm text-slate-500 self-center sm:self-start sm:mt-4 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
