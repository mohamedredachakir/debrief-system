@extends('layouts.app')

@section('content')
    <h1>Admin Dashboard</h1>
    <div class="card-grid">
        <div class="card">
            <h3>Structure Management</h3>
            <p>Manage Classes, Sprints, and Briefs.</p>
            <a href="/admin/classes" class="btn">Manage Classes</a>
        </div>
        <div class="card">
            <h3>Competence Framework</h3>
            <p>Define global skills and codes.</p>
            <a href="/admin/competences" class="btn">Manage Competences</a>
        </div>
        <div class="card">
            <h3>User Management</h3>
            <p>Manage Teachers and Learners.</p>
            <a href="/admin/users" class="btn">Manage Users</a>
        </div>
    </div>
@endsection

