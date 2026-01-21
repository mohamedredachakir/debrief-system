@extends('layouts.app')

@section('content')
<h1>Teacher Dashboard</h1>
<div class="card">
    <h3>My Briefs (Active)</h3>
    <div class="list-group">
        @foreach($briefs as $brief)
            <div style="border-bottom: 1px solid #333; padding: 10px 0; display:flex; justify-content:space-between;">
                <span>{{ $brief->title }}</span>
                <a href="/teacher/debrief?brief_id={{ $brief->id }}" class="btn" style="width: auto; padding: 0.5rem 1rem; font-size: 0.9rem;">Debrief</a>
            </div>
        @endforeach
    </div>
</div>
@endsection

