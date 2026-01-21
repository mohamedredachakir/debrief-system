@extends('layouts.app')

@section('content')
<h1>Evaluate Learner</h1>
<div class="card">
    <form action="/teacher/evaluate/store" method="POST">
        <input type="hidden" name="brief_id" value="{{ $brief_id }}">
        <input type="hidden" name="learner_id" value="{{ $learner_id }}">
        
        <h3>Competences</h3>
        @foreach($competences as $c)
            <div style="margin-bottom: 2rem; border-bottom: 1px solid #334155; padding-bottom: 1rem;">
                <h4>{{ $c->code }} - {{ $c->label }}</h4>
                <div class="form-group">
                    <label>Level</label>
                    <select name="levels[{{ $c->id }}]" style="width: 100%; padding: 0.5rem; background: #0f172a; color: white; border: 1px solid #334155;">
                        <option value="IMITER">Imiter</option>
                        <option value="S_ADAPTER">S'adapter</option>
                        <option value="TRANSPOSER">Transposer</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Comment</label>
                    <textarea name="comments[{{ $c->id }}]" rows="2" style="width: 100%; padding: 0.5rem; background: #0f172a; color: white; border: 1px solid #334155;" placeholder="Optional comment..."></textarea>
                </div>
            </div>
        @endforeach
        
        <button type="submit" class="btn">Submit Evaluation</button>
    </form>
</div>
@endsection

