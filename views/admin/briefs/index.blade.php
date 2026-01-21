@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Manage Briefs</h1>
    <a href="#" class="btn" style="width:auto;">Add Brief</a>
</div>

<div class="card-grid">
    @foreach($briefs as $brief)
        <div class="card">
            <h3>{{ $brief->title }}</h3>
            <p>{{ $brief->description }}</p>
            <p><strong>Duration:</strong> {{ $brief->duration_days }} days | <strong>Type:</strong> {{ $brief->type }}</p>
            <div class="actions">
                <a href="#" class="text-primary">Edit</a>
                <a href="#" class="text-primary">Manage Skills</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
