@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-purple-900">Create Competence</h1>
                <p class="text-purple-600 mt-1">Add a new skill to the competence framework.</p>
            </div>
            
            <a href="/admin/competences" class="p-2 border border-purple-200 rounded-lg hover:bg-purple-50 text-slate-500 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        <div class="bg-purple-50 rounded-2xl border border-purple-200/60 shadow-xl overflow-hidden">
            <form action="/admin/competences/store" method="POST" class="p-8 space-y-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Competence Code</label>
                        <input type="text" name="code" required placeholder="e.g., C1, C7, RE-01" 
                               class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-purple-500 transition-all bg-purple-50/50 uppercase">
                        <p class="mt-1 text-xs text-slate-500 text-right">Short identifier for reference</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-purple-700 mb-1">Label / Description</label>
                        <textarea name="label" required rows="4" placeholder="Describe the skill or competency in detail..." 
                                  class="w-full px-4 py-2 border border-purple-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-purple-500 transition-all bg-purple-50/50 resize-none"></textarea>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="/admin/competences" class="px-6 py-2 text-purple-600 font-medium hover:text-purple-900 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-2 bg-purple-600 text-white font-bold rounded-lg hover:bg-purple-700 transform active:scale-95 transition-all shadow-lg shadow-emerald-200">
                        Create Competence
                    </button>
                </div>
            </form>
        </div>
        
        <div class="mt-8 p-6 bg-purple-50 rounded-2xl border border-purple-100/50">
            <div class="flex gap-4">
                <div class="p-3 bg-purple-50 rounded-xl shadow-sm">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9l-.707.707M16.243 4.857l-.707-.707" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-purple-900 text-sm">Best Practice</h4>
                    <p class="text-xs text-purple-600 mt-1 leading-relaxed">Keep codes unique and concise. Use clear, action-oriented labels that describe what a learner should be able to do.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
