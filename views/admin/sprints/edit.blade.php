@extends('layouts.app')

@section('content')
<div class="header-flex">
    <h1>Edit Sprint</h1>
    <a href="/admin/classes" class="btn" style="background:var(--bg-card);">Back</a>
</div>
<div class="auth-wrapper" style="min-height:auto;">
    <div class="auth-card" style="max-width:600px;">
        <form action="/admin/sprints/update" method="POST">
            <input type="hidden" name="id" value="{{ $sprint->id }}">
            <!-- Passing a class_id to return to if present in query, bit complex, lets default back to classes list usually -->
            
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $sprint->name }}" required>
            </div>
            
            <div class="form-group">
                 <label>Start Date</label>
                 <input type="date" name="start_date" value="{{ $sprint->start_date }}" required>
            </div>
            
            <div class="form-group">
                 <label>Duration (Days)</label>
                 <input type="number" name="duration" value="{{ $sprint->duration }}" required min="1">
            </div>

            <div class="form-group">
                <label>Assign to Classes</label>
                <select name="class_ids[]" multiple style="height:100px;">
                    @foreach($classes as $c)
                        <option value="{{ $c->id }}" {{ in_array($c->id, $assignedClassIds) ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Link Competences</label>
                <select name="competence_ids[]" multiple style="height:150px;">
                    @foreach($competences as $comp)
                        <option value="{{ $comp->id }}" {{ in_array($comp->id, $assignedCompIds) ? 'selected' : '' }}>
                            {{ $comp->code }} - {{ $comp->label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="actions">
                <button type="submit" class="btn" style="width:100%;">Update Sprint</button>
            </div>
        </form>
    </div>
</div>
@endsection
