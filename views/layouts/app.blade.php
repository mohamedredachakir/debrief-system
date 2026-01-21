<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ getenv('APP_NAME') ?? 'Debrief' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        'brand': {
                            50: '#faf5ff',
                            100: '#f3e8ff',
                            200: '#e9d5ff',
                            300: '#d8b4fe',
                            400: '#c084fc',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7c3aed',
                            800: '#6b21a8',
                            900: '#581c87',
                        },
                        'slate': {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                    },
                },
            },
        }
    </script>
    <style>
        .btn {
            @apply inline-flex items-center justify-center rounded-lg px-4 py-2 text-sm font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none;
        }
        .btn-primary {
            @apply bg-brand-600 text-white hover:bg-brand-700 shadow-sm hover:shadow-md;
        }
        .btn-secondary {
            @apply bg-white text-slate-700 border border-slate-200 hover:bg-slate-50 shadow-sm hover:shadow-md;
        }
        .btn-ghost {
            @apply text-slate-600 hover:text-slate-900 hover:bg-slate-100;
        }
        .input {
            @apply block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 transition-colors;
        }
        .card {
            @apply rounded-xl bg-white p-6 shadow-sm border border-slate-200/60;
        }
        .card-header {
            @apply pb-4 mb-4 border-b border-slate-100;
        }
        .card-title {
            @apply text-lg font-semibold text-slate-900;
        }
        .badge {
            @apply inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium;
        }
        .badge-primary {
            @apply bg-brand-100 text-brand-800;
        }
        .badge-secondary {
            @apply bg-slate-100 text-slate-700;
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        .slide-up {
            animation: slideUp 0.3s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { transform: translateY(10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="bg-slate-50">
    <nav class="nav-blur sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold premium-gradient">
                            Debrief
                        </h1>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    @if(isset($_SESSION['user_id']))
                        <div class="flex items-center space-x-3">
                            <div class="text-sm text-slate-600">
                                <span class="font-medium text-slate-900">{{ $_SESSION['user_name'] }}</span>
                                <span class="text-slate-500">•</span>
                                <span class="capitalize badge badge-secondary">{{ $_SESSION['user_role'] }}</span>
                            </div>
                            @if($_SESSION['user_role'] === 'admin')
                                <a href="/admin/dashboard" class="btn-ghost">Dashboard</a>
                            @elseif($_SESSION['user_role'] === 'teacher')
                                <a href="/teacher/dashboard" class="btn-ghost">Dashboard</a>
                            @elseif($_SESSION['user_role'] === 'learner')
                                <a href="/learner/dashboard" class="btn-ghost">Dashboard</a>
                            @endif
                            <a href="/logout" class="btn-secondary text-red-600 border-red-200 hover:bg-red-50 hover:border-red-300">
                                Sign out
                            </a>
                        </div>
                    @else
                        <a href="/login" class="btn-primary">
                            Sign in
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="min-h-screen">
        @yield('content')
    </main>

    <script src="/js/app.js"></script>
</body>
</html>
