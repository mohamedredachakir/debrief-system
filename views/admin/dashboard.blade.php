@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-100/50 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-brand-200/20 to-blue-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -left-40 w-80 h-80 bg-gradient-to-br from-emerald-200/20 to-teal-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-2000"></div>
        <div class="absolute -bottom-40 right-1/4 w-80 h-80 bg-gradient-to-br from-violet-200/20 to-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-4000"></div>
    </div>

    <div class="relative">
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-xl border-b border-slate-200/60 sticky top-16 z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-gradient-to-br from-brand-500 to-brand-600 rounded-xl shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent">
                                Administration Dashboard
                            </h1>
                            <p class="text-slate-600 mt-1">Comprehensive system analytics and management</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 px-4 py-2 bg-emerald-50 rounded-lg border border-emerald-200/50">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-emerald-700">System Online</span>
                        </div>
                        <div class="text-sm text-slate-500">
                            Last updated: {{ date('M j, Y \a\t g:i A') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Key Metrics Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="card group relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-500 to-emerald-600"></div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-600 mb-1">Total Users</p>
                            <p class="text-3xl font-bold text-slate-900">16</p>
                            <p class="text-xs text-emerald-600 flex items-center mt-1">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                +12% from last month
                            </p>
                        </div>
                        <div class="p-3 bg-emerald-100 rounded-xl">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="card group relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-500 to-brand-600"></div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-600 mb-1">Active Classes</p>
                            <p class="text-3xl font-bold text-slate-900">4</p>
                            <p class="text-xs text-brand-600 flex items-center mt-1">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                +2 new this week
                            </p>
                        </div>
                        <div class="p-3 bg-brand-100 rounded-xl">
                            <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="card group relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-violet-500 to-violet-600"></div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-600 mb-1">Current Sprints</p>
                            <p class="text-3xl font-bold text-slate-900">5</p>
                            <p class="text-xs text-violet-600 flex items-center mt-1">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                3 ending this week
                            </p>
                        </div>
                        <div class="p-3 bg-violet-100 rounded-xl">
                            <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="card group relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-500 to-amber-600"></div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-600 mb-1">Submissions</p>
                            <p class="text-3xl font-bold text-slate-900">26</p>
                            <p class="text-xs text-amber-600 flex items-center mt-1">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                +8 today
                            </p>
                        </div>
                        <div class="p-3 bg-amber-100 rounded-xl">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                <!-- Management Actions -->
                <div class="xl:col-span-2 space-y-8">
                    <div class="card">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-semibold text-slate-900">Quick Actions</h3>
                            <span class="text-sm text-slate-500">Manage system components</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="/admin/classes" class="group p-4 bg-gradient-to-br from-slate-50 to-slate-100 rounded-xl border border-slate-200/60 hover:border-slate-300 hover:shadow-md transition-all duration-200">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="p-2 bg-slate-100 rounded-lg group-hover:bg-slate-200 transition-colors">
                                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-slate-900">Manage Classes</h4>
                                        <p class="text-sm text-slate-600">Create and organize class structures</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-slate-500">4 active classes</span>
                                    <svg class="w-4 h-4 text-slate-400 group-hover:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="/admin/competences" class="group p-4 bg-gradient-to-br from-emerald-50 to-emerald-100/50 rounded-xl border border-emerald-200/60 hover:border-emerald-300 hover:shadow-md transition-all duration-200">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="p-2 bg-emerald-100 rounded-lg group-hover:bg-emerald-200 transition-colors">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-slate-900">Competence Framework</h4>
                                        <p class="text-sm text-slate-600">Define skills and competencies</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-slate-500">8 competencies</span>
                                    <svg class="w-4 h-4 text-slate-400 group-hover:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="/admin/users" class="group p-4 bg-gradient-to-br from-violet-50 to-violet-100/50 rounded-xl border border-violet-200/60 hover:border-violet-300 hover:shadow-md transition-all duration-200">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="p-2 bg-violet-100 rounded-lg group-hover:bg-violet-200 transition-colors">
                                        <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-slate-900">User Management</h4>
                                        <p class="text-sm text-slate-600">Manage teachers and learners</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-slate-500">16 total users</span>
                                    <svg class="w-4 h-4 text-slate-400 group-hover:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>

                            <a href="/admin/sprints" class="group p-4 bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-xl border border-amber-200/60 hover:border-amber-300 hover:shadow-md transition-all duration-200">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="p-2 bg-amber-100 rounded-lg group-hover:bg-amber-200 transition-colors">
                                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-slate-900">Sprint Management</h4>
                                        <p class="text-sm text-slate-600">Configure learning sprints</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-slate-500">5 active sprints</span>
                                    <svg class="w-4 h-4 text-slate-400 group-hover:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-semibold text-slate-900">Recent Activity</h3>
                            <a href="#" class="text-sm text-brand-600 hover:text-brand-700 font-medium">View all</a>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-3 bg-slate-50 rounded-lg">
                                <div class="p-2 bg-emerald-100 rounded-lg">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-slate-900">New user registered</p>
                                    <p class="text-xs text-slate-600">Sarah Johnson joined as a learner • 2 hours ago</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-3 bg-slate-50 rounded-lg">
                                <div class="p-2 bg-brand-100 rounded-lg">
                                    <svg class="w-4 h-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-slate-900">New class created</p>
                                    <p class="text-xs text-slate-600">DWWM-2024 class added by Admin • 4 hours ago</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-3 bg-slate-50 rounded-lg">
                                <div class="p-2 bg-violet-100 rounded-lg">
                                    <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-slate-900">Brief submitted</p>
                                    <p class="text-xs text-slate-600">Project brief completed by 8 learners • 6 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- System Health -->
                    <div class="card">
                        <h3 class="text-lg font-semibold text-slate-900 mb-4">System Health</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-slate-600">Server Status</span>
                                    <span class="text-emerald-600 font-medium">Online</span>
                                </div>
                                <div class="w-full bg-slate-200 rounded-full h-2">
                                    <div class="bg-emerald-500 h-2 rounded-full w-full"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-slate-600">Database</span>
                                    <span class="text-emerald-600 font-medium">Healthy</span>
                                </div>
                                <div class="w-full bg-slate-200 rounded-full h-2">
                                    <div class="bg-emerald-500 h-2 rounded-full w-full"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-slate-600">Storage</span>
                                    <span class="text-amber-600 font-medium">75%</span>
                                </div>
                                <div class="w-full bg-slate-200 rounded-full h-2">
                                    <div class="bg-amber-500 h-2 rounded-full w-3/4"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="card">
                        <h3 class="text-lg font-semibold text-slate-900 mb-4">Quick Stats</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-3 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg">
                                <div class="text-2xl font-bold text-emerald-600">87%</div>
                                <div class="text-xs text-slate-600">Completion Rate</div>
                            </div>
                            <div class="text-center p-3 bg-gradient-to-br from-brand-50 to-brand-100 rounded-lg">
                                <div class="text-2xl font-bold text-brand-600">4.8</div>
                                <div class="text-xs text-slate-600">Avg Rating</div>
                            </div>
                            <div class="text-center p-3 bg-gradient-to-br from-violet-50 to-violet-100 rounded-lg">
                                <div class="text-2xl font-bold text-violet-600">12</div>
                                <div class="text-xs text-slate-600">Active Briefs</div>
                            </div>
                            <div class="text-center p-3 bg-gradient-to-br from-amber-50 to-amber-100 rounded-lg">
                                <div class="text-2xl font-bold text-amber-600">3</div>
                                <div class="text-xs text-slate-600">Teachers</div>
                            </div>
                        </div>
                    </div>

                    <!-- System Info -->
                    <div class="card">
                        <h3 class="text-lg font-semibold text-slate-900 mb-4">System Info</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-slate-600">Version</span>
                                <span class="font-medium text-slate-900">v2.1.0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-600">Last Backup</span>
                                <span class="font-medium text-slate-900">2 hours ago</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-600">Uptime</span>
                                <span class="font-medium text-emerald-600">99.9%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-600">Environment</span>
                                <span class="font-medium text-slate-900">Production</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
