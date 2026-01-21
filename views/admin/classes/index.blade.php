@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Manage Classes</h1>
    <div style="display:flex; gap:10px;">
        <a href="/admin/dashboard" class="btn" style="background:var(--bg-card);border:1px solid var(--border);">Back to Dashboard</a>
        <a href="/admin/classes/create" class="btn">Add Class</a>
    </div>
</div>

<div class="card-grid">
    @foreach($classes as $class)
        <div class="card">
            <h3>{{ $class->name }}</h3>
            <p>Created: {{ $class->created_at }}</p>
            <div class="actions">
                <a href="/admin/classes/edit?id={{ $class->id }}" class="text-primary">Edit</a>
                <a href="/admin/classes/sprints?class_id={{ $class->id }}" class="text-primary">Manage Sprints</a>
            </div>
        </div>
    @endforeach
</div>
@endsection

