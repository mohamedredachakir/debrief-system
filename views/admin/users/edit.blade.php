@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-purple-900">Edit User</h1>
                <p class="text-purple-600 mt-1">Update profile and permissions for {{ $user->name }}.</p>
            </div>
            
            <a href="/admin/users" class="p-2 border border-purple-200 rounded-lg hover:bg-purple-50 text-slate-500 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        <div class="bg-purple-50 rounded-2xl border border-purple-200/60 shadow-xl overflow-hidden">
            <form action="/admin/users/update" method="POST" class="p-8 space-y-6">
                <input type="hidden" name="id" value="{{ $user->id }}">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Full Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" required placeholder="John Doe" 
                               class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ $user->email }}" required placeholder="john@example.com" 
                               class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">New Password</label>
                        <input type="password" name="password" placeholder="Leave blank to keep current" 
                               class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                        <p class="mt-1 text-[10px] text-slate-400 uppercase tracking-wider font-bold">Only fill if changing password</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">System Role</label>
                        <select name="role" required class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                            <option value="learner" {{ $user->role === 'learner' ? 'selected' : '' }}>Learner</option>
                            <option value="teacher" {{ $user->role === 'teacher' ? 'selected' : '' }}>Teacher</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrator</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Assign Class</label>
                        <select name="class_id" class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                            <option value="">No Class / External</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ $user->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="/admin/users" class="px-6 py-2 text-purple-600 font-medium hover:text-purple-900 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-2 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white font-bold rounded-lg hover:from-violet-700 hover:to-fuchsia-700 transform active:scale-95 transition-all shadow-lg shadow-violet-200">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
