@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Manage Competences</h1>
    <div style="display:flex; gap:10px;">
        <a href="/admin/dashboard" class="btn" style="background:var(--bg-card);border:1px solid var(--border);">Back to Dashboard</a>
        <a href="/admin/competences/create" class="btn">Add Competence</a>
    </div>
</div>

<div class="card-grid">
    @foreach($competences as $c)
        <div class="card">
            <h3>{{ $c->code }}</h3>
            <p>{{ $c->label }}</p>
            <div class="actions">
                <a href="/admin/competences/edit?id={{ $c->id }}" class="text-primary">Edit</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
