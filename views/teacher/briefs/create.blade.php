@extends('layouts.app')

@section('content')
<h1>Create New Brief</h1>

<div class="card">
    <h3>Brief for Sprint: {{ $sprint->name }}</h3>

    <form action="/teacher/briefs/store" method="POST">
        <input type="hidden" name="sprint_id" value="{{ $sprint->id }}">

        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="duration_days">Duration (days)</label>
            <input type="number" id="duration_days" name="duration_days" min="1">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select id="type" name="type">
                <option value="">Select type</option>
                <option value="individuel">Individual</option>
                <option value="collectif">Collective</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn">Create Brief</button>
            <a href="/teacher/dashboard" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
