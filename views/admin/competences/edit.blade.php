@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Edit Competence</h1>
    <a href="/admin/competences" class="btn" style="background:var(--bg-card);">Back</a>
</div>
<div class="auth-wrapper" style="min-height:auto;">
    <div class="auth-card" style="max-width:600px;">
        <form action="/admin/competences/update" method="POST">
            <input type="hidden" name="id" value="{{ $competence->id }}">
            <div class="form-group">
                <label>Code</label>
                <input type="text" name="code" value="{{ $competence->code }}" required>
            </div>
            <div class="form-group">
                 <label>Label</label>
                 <textarea name="label" required rows="3">{{ $competence->label }}</textarea>
            </div>
            <div class="actions">
                <button type="submit" class="btn" style="width:100%;">Update Competence</button>
            </div>
        </form>
    </div>
</div>
@endsection
