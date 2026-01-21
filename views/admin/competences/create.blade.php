@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Create Competence</h1>
    <a href="/admin/competences" class="btn" style="background:var(--bg-card);">Back</a>
</div>
<div class="auth-wrapper" style="min-height:auto;">
    <div class="auth-card" style="max-width:600px;">
        <form action="/admin/competences/store" method="POST">
            <div class="form-group">
                <label>Code</label>
                <input type="text" name="code" required placeholder="e.g. C7">
            </div>
            <div class="form-group">
                 <label>Label</label>
                 <textarea name="label" required rows="3" placeholder="Description of the competence"></textarea>
            </div>
            <div class="actions">
                <button type="submit" class="btn" style="width:100%;">Create Competence</button>
            </div>
        </form>
    </div>
</div>
@endsection
