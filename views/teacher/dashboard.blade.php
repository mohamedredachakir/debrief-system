@extends('layouts.app')

@section('content')
<h1>Teacher Dashboard</h1>

@if($sprints)
    @foreach($sprints as $sprint)
        <div class="card" style="margin-bottom: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h3>{{ $sprint->name }}</h3>
                <a href="/teacher/briefs/create?sprint_id={{ $sprint->id }}" class="btn" style="width: auto;">Create Brief</a>
            </div>

            @if($sprint->briefs)
                <div class="list-group">
                    @foreach($sprint->briefs as $brief)
                        <div style="border-bottom: 1px solid #333; padding: 10px 0; display:flex; justify-content:space-between;">
                            <span>{{ $brief->title }}</span>
                            <a href="/teacher/debrief?brief_id={{ $brief->id }}" class="btn" style="width: auto; padding: 0.5rem 1rem; font-size: 0.9rem;">Debrief</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No briefs created for this sprint yet.</p>
            @endif
        </div>
    @endforeach
@else
    <div class="card">
        <p>You are not assigned to any classes yet.</p>
    </div>
@endif
@endsection
