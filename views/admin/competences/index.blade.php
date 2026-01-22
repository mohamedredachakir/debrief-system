@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-gradient-to-br from-purple-500 to-violet-600 rounded-xl shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-purple-900">Competence Framework</h1>
                    <p class="text-purple-600 mt-1">Define and manage skills and competencies</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="/admin/dashboard" class="inline-flex items-center px-4 py-2 bg-purple-50 border border-purple-200 text-purple-700 font-medium rounded-lg hover:bg-purple-50 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Dashboard
                </a>
                <a href="/admin/competences/create" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors shadow-sm shadow-purple-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Competence
                </a>
            </div>
        </div>

        @if(count($competences) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($competences as $c)
                    <div class="bg-purple-50 rounded-xl border border-purple-200/60 shadow-sm hover:shadow-md transition-shadow p-6 group">
                        <div class="flex items-start justify-between mb-4">
                            <div class="px-3 py-1 bg-purple-50 text-purple-700 text-sm font-bold rounded-full border border-purple-100">
                                {{ $c->code }}
                            </div>
                            <div class="flex gap-2">
                                <a href="/admin/competences/edit?id={{ $c->id }}" class="p-2 text-slate-400 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-all" title="Edit Competence">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-purple-900 mb-2">{{ $c->label }}</h3>
                        
                        <div class="mt-4 pt-4 border-t border-slate-50 flex items-center text-xs text-slate-500 italic">
                            Used in multiple learning sprints
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-purple-50 rounded-2xl border border-purple-200/60 p-12 text-center">
                <div class="w-16 h-16 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-purple-900 mb-1">No competences found</h3>
                <p class="text-slate-500 mb-6">Start by defining your first skill or competency.</p>
                <a href="/admin/competences/create" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors">
                    Add Competence
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
