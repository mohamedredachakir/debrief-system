@extends('layouts.app')

@section('content')
<div style="text-align: center; padding: 4rem 0;">
    <h1 style="font-size: 3rem; margin-bottom: 1rem; background: linear-gradient(to right, #818cf8, #c084fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Debriefing System</h1>
    <p style="font-size: 1.25rem; color: var(--text-muted); max-width: 600px; margin: 0 auto 3rem;">
        A comprehensive platform for managing pedagogical sprints, briefs, and skills assessment.
    </p>

    <div style="display: flex; gap: 2rem; justify-content: center; flex-wrap: wrap;">
        <div class="card" style="width: 300px; text-align: left;">
            <h3>For Teachers</h3>
            <p>Manage briefs, evaluate competencies, and track student progress efficiently.</p>
        </div>
        <div class="card" style="width: 300px; text-align: left;">
            <h3>For Learners</h3>
            <p>Access your briefs, view your evaluations, and understand your skill progression.</p>
        </div>
    </div>

    <div style="margin-top: 4rem;">
        @if(isset($_SESSION['user_id']))
            <a href="/logout" class="btn">Logout</a>
        @else
            <a href="/login" class="btn" style="padding: 1rem 2.5rem; font-size: 1.1rem;">Login to Dashboard</a>
        @endif
    </div>
</div>
@endsection
