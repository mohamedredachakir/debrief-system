@extends('layouts.app')

@section('content')
<h1>Debriefing: {{ $brief->title }}</h1>
<a href="/teacher/dashboard" style="color: #94a3b8; margin-bottom: 20px; display:inline-block;">&larr; Back to Dashboard</a>

<div class="card">
    <h3>Select Learner to Evaluate</h3>
    <div class="class-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem; margin-top: 1rem;">
        @foreach($learners as $learner)
            <div style="background: #1e293b; border: 1px solid #475569; padding: 1rem; border-radius: 8px; text-align: center;">
                <div style="margin-bottom: 10px; font-weight: bold;">{{ $learner->name }}</div>
                <a href="/teacher/evaluate?brief_id={{ $brief->id }}&learner_id={{ $learner->id }}" class="btn">Evaluate</a>
            </div>
        @endforeach
    </div>
</div>
@endsection

