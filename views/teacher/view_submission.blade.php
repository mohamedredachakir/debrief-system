@extends('layouts.app')

@section('content')
<h1>Submission Details</h1>

<div class="card">
    <h3>{{ $brief->title }}</h3>
    <p><strong>Learner:</strong> {{ $learner->name }}</p>
    <p><strong>Submitted:</strong> {{ $submission ? date('Y-m-d H:i', strtotime($submission->submitted_at)) : 'Not submitted yet' }}</p>

    @if($submission)
        <div style="margin-top: 2rem;">
            <h4>Project Link</h4>
            <p><a href="{{ $submission->project_link }}" target="_blank" style="color: #3b82f6;">{{ $submission->project_link }}</a></p>

            <h4>Learner's Comments</h4>
            <div style="background: #f8fafc; padding: 1rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                <p style="margin: 0; white-space: pre-wrap;">{{ $submission->comments }}</p>
            </div>
        </div>
    @else
        <div style="margin-top: 2rem; padding: 2rem; background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px;">
            <p style="margin: 0; color: #dc2626;">This learner has not submitted their work yet.</p>
        </div>
    @endif
</div>

<div style="margin-top: 2rem; text-align: center;">
    <a href="/teacher/debrief?brief_id={{ $brief->id }}" class="btn btn-secondary" style="margin-right: 1rem;">Back to Learners</a>
    <a href="/teacher/evaluate?brief_id={{ $brief->id }}&learner_id={{ $learner->id }}" class="btn">Evaluate</a>
</div>
@endsection
