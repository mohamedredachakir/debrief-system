@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Edit User</h1>
    <a href="/admin/users" class="btn btn-secondary">Back</a>
</div>
<div class="auth-wrapper" style="min-height:auto;">
    <div class="auth-card" style="max-width:600px;">
        <form action="/admin/users/update" method="POST">
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" required>
            </div>
             <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" required>
            </div>
             <div class="form-group">
                <label>Password (Leave blank to keep current)</label>
                <input type="password" name="password">
            </div>
             <div class="form-group">
                <label>Role</label>
                <select name="role" required>
                    <option value="learner" {{ $user->role === 'learner' ? 'selected' : '' }}>Learner</option>
                    <option value="teacher" {{ $user->role === 'teacher' ? 'selected' : '' }}>Teacher</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
             <div class="form-group">
                <label>Class (for Learners)</label>
                <select name="class_id">
                    <option value="">-- None --</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}" {{ $user->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="actions">
                <button type="submit" class="btn btn-primary w-full">Update User</button>
            </div>
        </form>
    </div>
</div>
@endsection
