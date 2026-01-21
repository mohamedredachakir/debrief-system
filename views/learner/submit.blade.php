@extends('layouts.app')

@section('content')
<h1>Submit Your Work</h1>

<div class="card">
    <h3>{{ $brief->title }}</h3>
    <p>{{ $brief->description }}</p>

    <form action="/learner/submit" method="POST">
        <input type="hidden" name="brief_id" value="{{ $brief->id }}">

        <div class="form-group">
            <label for="project_link">Project Link *</label>
            <input type="url" id="project_link" name="project_link" value="{{ $submission->project_link ?? '' }}" required placeholder="https://github.com/your-repo or https://your-project-link.com">
        </div>

        <div class="form-group">
            <label for="comments">Comments</label>
            <textarea id="comments" name="comments" rows="6" placeholder="Describe your project, challenges faced, what you learned, etc.">{{ $submission->comments ?? '' }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn">{{ $submission ? 'Update Submission' : 'Submit Work' }}</button>
            <a href="/learner/dashboard" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
