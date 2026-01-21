@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Manage Sprints</h1>
    <div style="display:flex; gap:10px;">
        <a href="/admin/classes" class="btn" style="background:var(--bg-card);border:1px solid var(--border);">Back to Classes</a>
        <a href="/admin/sprints/create?class_id={{ $class_id }}" class="btn">Add Sprint</a>
    </div>
</div>

<div class="card-grid">
    @foreach($sprints as $sprint)
        <div class="card">
            <h3>{{ $sprint->name }}</h3>
            <p>
                Start: {{ $sprint->start_date }}<br>
                Duration: {{ $sprint->duration }} days
            </p>
            <div class="actions">
                <a href="/admin/sprints/edit?id={{ $sprint->id }}" class="text-primary">Edit</a>
                <a href="/admin/sprints/briefs?sprint_id={{ $sprint->id }}" class="text-primary">Manage Briefs</a>
            </div>
        </div>
    @endforeach
</div>
@endsection

