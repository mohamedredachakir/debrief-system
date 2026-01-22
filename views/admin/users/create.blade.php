@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-purple-900">Create New User</h1>
                <p class="text-purple-600 mt-1">Register a new person in the debriefing system.</p>
            </div>
            
            <a href="/admin/users" class="p-2 border border-purple-200 rounded-lg hover:bg-purple-50 text-slate-500 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        <div class="bg-purple-50 rounded-2xl border border-purple-200/60 shadow-xl overflow-hidden">
            <form action="/admin/users/store" method="POST" class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Full Name</label>
                        <input type="text" name="name" required placeholder="John Doe" 
                               class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Email Address</label>
                        <input type="email" name="email" required placeholder="john@example.com" 
                               class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Password</label>
                        <input type="password" name="password" required placeholder="••••••••" 
                               class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">System Role</label>
                        <select name="role" required class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                            <option value="learner">Learner</option>
                            <option value="teacher">Teacher</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Assign Class (Optional)</label>
                        <select name="class_id" class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all bg-purple-50/50">
                            <option value="">No Class / External</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="/admin/users" class="px-6 py-2 text-purple-600 font-medium hover:text-purple-900 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-2 bg-gradient-to-r from-violet-600 to-fuchsia-600 text-white font-bold rounded-lg hover:from-violet-700 hover:to-fuchsia-700 transform active:scale-95 transition-all shadow-lg shadow-violet-200">
                        Create User
                    </button>
                </div>
            </form>
        </div>
        
        <div class="mt-8 p-4 bg-amber-50 rounded-xl border border-amber-100 flex items-start gap-4">
            <div class="p-2 bg-purple-50 rounded-lg shadow-sm">
                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <p class="text-sm text-amber-700">
                <strong>Note:</strong> Learners must be assigned to a class to view briefs and participate in sprints. Teachers can manage all classes they are assigned to.
            </p>
        </div>
    </div>
</div>
@endsection
