@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <h2>Login</h2>
        @if(isset($error))
            <div class="alert alert-danger">{{ $error }}</div>
        @endif
        <form action="/login" method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
@endsection
