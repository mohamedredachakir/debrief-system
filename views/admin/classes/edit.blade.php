@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Edit Class</h1>
    <a href="/admin/classes" class="btn" style="background:var(--bg-card);border:1px solid var(--border);">Back</a>
</div>

<div class="auth-wrapper" style="min-height:auto;">
    <div class="auth-card" style="max-width:600px;">
        <form action="/admin/classes/update" method="POST">
            <input type="hidden" name="id" value="{{ $class->id }}">
            <div class="form-group">
                <label for="name">Class Name</label>
                <input type="text" id="name" name="name" value="{{ $class->name }}" required>
            </div>
            <div class="actions">
                <button type="submit" class="btn" style="width:100%;">Update Class</button>
            </div>
        </form>
    </div>
</div>
@endsection
