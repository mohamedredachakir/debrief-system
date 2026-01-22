@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-violet-200/20 to-purple-200/20 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
    </div>

    <div class="relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-gradient-to-br from-violet-500 to-violet-600 rounded-xl shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-900 to-violet-700 bg-clip-text text-transparent">
                            Manage Users
                        </h1>
                        <p class="text-purple-600 mt-1">Create and manage user accounts</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/admin/dashboard" class="btn btn-secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Dashboard
                    </a>
                    <a href="/admin/users/create" class="btn btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add User
                    </a>
                </div>
            </div>

            <!-- Users Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($users as $user)
                    <div class="card group relative overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r {{ $user->role === 'admin' ? 'from-amber-500 to-orange-500' : ($user->role === 'teacher' ? 'from-purple-500 to-green-500' : 'from-purple-500 to-violet-500') }}"></div>
                        
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-semibold text-lg {{ $user->role === 'admin' ? 'bg-gradient-to-br from-amber-500 to-orange-500' : ($user->role === 'teacher' ? 'bg-gradient-to-br from-purple-500 to-green-500' : 'bg-gradient-to-br from-purple-500 to-violet-500') }}">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-purple-900 group-hover:text-purple-700 transition-colors">
                                        {{ $user->name }}
                                    </h3>
                                    <p class="text-sm text-purple-600">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex items-center gap-2">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $user->role === 'admin' ? 'bg-amber-100 text-amber-800 border border-amber-200' : ($user->role === 'teacher' ? 'bg-purple-100 text-purple-800 border border-purple-200' : 'bg-purple-100 text-purple-800 border border-purple-200') }}">
                                {{ ucfirst($user->role) }}
                            </span>
                            @if($user->class_name)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700 border border-purple-200">
                                    {{ $user->class_name }}
                                </span>
                            @endif
                        </div>

                        <div class="mt-6 pt-4 border-t border-purple-200/60 flex items-center justify-end gap-2">
                            <a href="/admin/users/edit?id={{ $user->id }}" 
                               class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-purple-600 hover:text-purple-700 hover:bg-purple-50 rounded-lg transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if(count($users) === 0)
                <div class="text-center py-20">
                    <div class="mx-auto w-24 h-24 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-purple-900 mb-2">No users yet</h3>
                    <p class="text-purple-600 mb-6">Get started by creating your first user.</p>
                    <a href="/admin/users/create" class="btn btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add User
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
