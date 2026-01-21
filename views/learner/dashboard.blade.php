@extends('layouts.app')

@section('content')
<h1>My Learning Journey</h1>
<div class="card">
    <h3>My Briefs</h3>
    <div class="card-grid" style="margin-top: 1rem;">
    @foreach($briefs as $brief)
        <div class="card" style="border: 1px solid #475569;">
            <h4>{{ $brief->title }}</h4>
            <p>{{ $brief->description }}</p>
            <span style="font-size: 0.8rem; background: #334155; padding: 2px 8px; border-radius: 4px;">{{ $brief->type }}</span>
            <div style="margin-top: 1rem;">
                <a href="/learner/submit?brief_id={{ $brief->id }}" class="btn">Submit Work</a>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
