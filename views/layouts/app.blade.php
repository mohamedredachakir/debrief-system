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
                            700: '#7e22ce',
                            800: '#6b21a8',
                            900: '#581c87',
                        },
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
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
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '1', boxShadow: '0 0 20px rgba(139, 92, 246, 0.4)' },
                            '50%': { opacity: '0.8', boxShadow: '0 0 40px rgba(139, 92, 246, 0.6)' },
                        },
                    },
                },
            },
        }
    </script>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="bg-gradient-to-br from-purple-50 via-violet-50/30 to-fuchsia-50/20 min-h-screen flex flex-col">
    <nav class="nav-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-gradient-to-br from-purple-600 via-violet-600 to-fuchsia-600 rounded-xl shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold premium-gradient">
                        Debrief
                    </h1>
                </div>

                <div class="flex items-center space-x-4">
                    @if(isset($_SESSION['user_id']))
                        <div class="flex items-center space-x-3">
                            <div class="text-sm">
                                <span class="font-semibold text-purple-900">{{ $_SESSION['user_name'] }}</span>
                                <span class="text-purple-400 mx-2">•</span>
                                <span class="capitalize badge badge-secondary">{{ $_SESSION['user_role'] }}</span>
                            </div>
                            @if($_SESSION['user_role'] === 'admin')
                                <a href="/admin/dashboard" class="btn-ghost px-4 py-2 rounded-xl">Dashboard</a>
                            @elseif($_SESSION['user_role'] === 'teacher')
                                <a href="/teacher/dashboard" class="btn-ghost px-4 py-2 rounded-xl">Dashboard</a>
                            @elseif($_SESSION['user_role'] === 'learner')
                                <a href="/learner/dashboard" class="btn-ghost px-4 py-2 rounded-xl">Dashboard</a>
                            @endif
                            <a href="/logout" class="px-4 py-2 text-sm font-medium text-red-600 bg-red-50 border border-red-200 rounded-xl hover:bg-red-100 hover:border-red-300 transition-all">
                                Sign out
                            </a>
                        </div>
                    @else
                        <a href="/login" class="btn-primary px-6 py-2.5">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Sign in
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="bg-purple-50/90 backdrop-blur-xl border-t border-purple-200/50 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="p-2 bg-gradient-to-br from-purple-600 via-violet-600 to-fuchsia-600 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold premium-gradient">Debrief</h3>
                    </div>
                    <p class="text-sm text-purple-700">
                        Professional learning management system for pedagogical excellence.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold text-purple-900 mb-3">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        @if(isset($_SESSION['user_id']))
                            @if($_SESSION['user_role'] === 'admin')
                                <li><a href="/admin/dashboard" class="text-purple-700 hover:text-purple-900 transition-colors">Dashboard</a></li>
                                <li><a href="/admin/classes" class="text-purple-700 hover:text-purple-900 transition-colors">Classes</a></li>
                                <li><a href="/admin/sprints" class="text-purple-700 hover:text-purple-900 transition-colors">Sprints</a></li>
                            @elseif($_SESSION['user_role'] === 'teacher')
                                <li><a href="/teacher/dashboard" class="text-purple-700 hover:text-purple-900 transition-colors">Dashboard</a></li>
                            @elseif($_SESSION['user_role'] === 'learner')
                                <li><a href="/learner/dashboard" class="text-purple-700 hover:text-purple-900 transition-colors">Dashboard</a></li>
                            @endif
                        @else
                            <li><a href="/login" class="text-purple-700 hover:text-purple-900 transition-colors">Sign In</a></li>
                        @endif
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-purple-900 mb-3">System Status</h4>
                    <div class="flex items-center gap-2 text-sm">
                        <div class="w-2 h-2 bg-purple-500 rounded-full animate-pulse"></div>
                        <span class="text-purple-700">All systems operational</span>
                    </div>
                    <p class="text-xs text-purple-600 mt-3">
                        © {{ date('Y') }} Debrief System. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="/js/app.js"></script>
</body>
</html>
