@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-purple-900">Edit Class</h1>
                <p class="text-purple-600 mt-1">Update the details for {{ $class->name }}.</p>
            </div>
            
            <a href="/admin/classes" class="p-2 border border-purple-200 rounded-lg hover:bg-purple-50 text-slate-500 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        <div class="bg-purple-50 rounded-2xl border border-purple-200/60 shadow-xl overflow-hidden">
            <form action="/admin/classes/update" method="POST" class="p-8 space-y-6">
                <input type="hidden" name="id" value="{{ $class->id }}">
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Class Name</label>
                        <input type="text" name="name" value="{{ $class->name }}" required placeholder="e.g., DWWM-2024-A" 
                               class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all bg-purple-50/50">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="/admin/classes" class="px-6 py-2 text-purple-600 font-medium hover:text-purple-900 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-2 bg-purple-600 text-white font-bold rounded-lg hover:bg-purple-700 transform active:scale-95 transition-all shadow-lg shadow-purple-200">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
