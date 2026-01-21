<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ getenv('APP_NAME') ?? 'Debrief' }}</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Debrief System</div>
        <div class="nav-links">
            @if(isset($_SESSION['user_id']))
                <span>Welcome, {{ $_SESSION['user_name'] }} ({{ ucfirst($_SESSION['user_role']) }})</span>
                @if($_SESSION['user_role'] === 'admin')
                    <a href="/admin/dashboard">Dashboard</a>
                @elseif($_SESSION['user_role'] === 'teacher')
                    <a href="/teacher/dashboard">Dashboard</a>
                @elseif($_SESSION['user_role'] === 'learner')
                    <a href="/learner/dashboard">Dashboard</a>
                @endif
                <a href="/logout" class="btn-logout">Logout</a>
            @else
                <a href="/login">Login</a>
            @endif
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
