@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Manage Users</h1>
    <div style="display:flex; gap:10px;">
        <a href="/admin/dashboard" class="btn" style="background:var(--bg-card);border:1px solid var(--border);">Back to Dashboard</a>
        <a href="/admin/users/create" class="btn">Add User</a>
    </div>
</div>

<div class="card-grid">
    @foreach($users as $user)
        <div class="card">
            <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                <div>
                    <h3>{{ $user->name }}</h3>
                    <p style="margin-bottom:0.5rem;">{{ $user->email }}</p>
                    <span class="badge {{ $user->role === 'admin' ? 'badge-warning' : ($user->role === 'teacher' ? 'badge-success' : '') }}" style="background:rgba(255,255,255,0.1); color:white;">
                        {{ ucfirst($user->role) }}
                    </span>
                    @if($user->class_name)
                        <span style="font-size:0.85rem; color:var(--text-muted); margin-left:0.5rem;">
                            {{ $user->class_name }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="actions">
                <a href="/admin/users/edit?id={{ $user->id }}" class="text-primary">Edit</a>
            </div>
        </div>
    @endforeach
</div>
@endsection

