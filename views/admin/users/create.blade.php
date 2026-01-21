@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Create User</h1>
    <a href="/admin/users" class="btn" style="background:var(--bg-card);">Back</a>
</div>
<div class="auth-wrapper" style="min-height:auto;">
    <div class="auth-card" style="max-width:600px;">
        <form action="/admin/users/store" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
             <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
             <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
             <div class="form-group">
                <label>Role</label>
                <select name="role" required>
                    <option value="learner">Learner</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
             <div class="form-group">
                <label>Class (for Learners)</label>
                <select name="class_id">
                    <option value="">-- None --</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="actions">
                <button type="submit" class="btn" style="width:100%;">Create User</button>
            </div>
        </form>
    </div>
</div>
@endsection
