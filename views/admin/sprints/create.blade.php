@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Create Sprint</h1>
    @if($default_class_id)
        <a href="/admin/classes/sprints?class_id={{ $default_class_id }}" class="btn" style="background:var(--bg-card);">Back</a>
    @else
        <a href="/admin/classes" class="btn" style="background:var(--bg-card);">Back</a>
    @endif
</div>
<div class="auth-wrapper" style="min-height:auto;">
    <div class="auth-card" style="max-width:600px;">
        <form action="/admin/sprints/store" method="POST">
            <input type="hidden" name="default_class_id" value="{{ $default_class_id }}">
            
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required placeholder="Sprint X: Topic">
            </div>
            
            <div class="form-group">
                 <label>Start Date</label>
                 <input type="date" name="start_date" required>
            </div>
            
            <div class="form-group">
                 <label>Duration (Days)</label>
                 <input type="number" name="duration" required min="1" value="5">
            </div>

            <div class="form-group">
                <label>Assign to Classes</label>
                <select name="class_ids[]" multiple style="height:100px;">
                    @foreach($classes as $c)
                        <option value="{{ $c->id }}" {{ $default_class_id == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
                <small style="color:var(--text-muted)">Hold Ctrl/Cmd to select multiple</small>
            </div>

            <div class="form-group">
                <label>Link Competences</label>
                <select name="competence_ids[]" multiple style="height:150px;">
                    @foreach($competences as $comp)
                        <option value="{{ $comp->id }}">
                            {{ $comp->code }} - {{ $comp->label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="actions">
                <button type="submit" class="btn" style="width:100%;">Create Sprint</button>
            </div>
        </form>
    </div>
</div>
@endsection
