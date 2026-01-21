@extends('layouts.app')

@section('content')
<h1>Create New Class</h1>

<div class="card" style="max-width: 600px;">
    <form action="/admin/classes/store" method="POST">
        <div class="form-group">
            <label>Class Name</label>
            <input type="text" name="name" placeholder="e.g. DWWM-2026" required>
        </div>
        <button type="submit" class="btn">Create Class</button>
    </form>
</div>
@endsection
