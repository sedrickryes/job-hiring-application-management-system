<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Job Hiring System' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .admin-layout {
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */
        .admin-sidebar {
            width: 250px;
            background: #111827;
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .sidebar-brand {
            padding: 28px 24px;
            border-bottom: 1px solid #374151;
        }

        .sidebar-brand h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .sidebar-brand p {
            margin: 5px 0 0;
            color: #9ca3af;
            font-size: 13px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 24px 14px;
        }

        .sidebar-section-title {
            color: #6b7280;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 12px 10px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 6px;
            border-radius: 9px;
            color: #d1d5db;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s;
        }

        .sidebar-link:hover {
            background: #1f2937;
            color: white;
        }

        .sidebar-link.active {
            background: #374151;
            color: white;
        }

        .sidebar-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-bottom {
            padding: 18px 14px 22px;
            border-top: 1px solid #374151;
        }

        .logout-button {
            width: 100%;
            border: 0;
            background: transparent;
            color: #d1d5db;
            cursor: pointer;
            text-align: left;
            font-family: inherit;
        }

        .logout-button:hover {
            color: white;
        }

        /* MAIN */
        .admin-main {
            flex: 1;
            min-width: 0;
        }

        .admin-header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 20px 32px;
        }

        .admin-header h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color: #111827;
        }

        .admin-content {
            padding: 32px;
        }

        /* DASHBOARD */
        .welcome-title {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .welcome-text {
            margin-top: 6px;
            color: #6b7280;
            font-size: 14px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-top: 28px;
        }

        .dashboard-card {
            display: block;
            padding: 24px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            text-decoration: none;
            color: inherit;
            transition: 0.2s;
        }

        .dashboard-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-label {
            color: #6b7280;
            font-size: 14px;
        }

        .card-number {
            margin-top: 8px;
            font-size: 32px;
            font-weight: 700;
            color: #111827;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .card-link {
            margin-top: 22px;
            color: #4f46e5;
            font-size: 14px;
            font-weight: 600;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .admin-sidebar {
                width: 220px;
            }
        }

        @media (max-width: 640px) {
            .admin-layout {
                flex-direction: column;
            }

            .admin-sidebar {
                width: 100%;
                min-height: auto;
            }

            .sidebar-nav {
                padding-bottom: 10px;
            }

            .sidebar-bottom {
                border-top: none;
            }

            .admin-content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="admin-layout">

    <!-- SIDEBAR -->
    <aside class="admin-sidebar">

        <div class="sidebar-brand">
            <h1>Job Hiring</h1>
            <p>Management System</p>
        </div>

        <nav class="sidebar-nav">

            <div class="sidebar-section-title">
                Main Menu
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link">
                <span class="sidebar-icon">🏠</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="sidebar-link">
                <span class="sidebar-icon">👥</span>
                <span>User Management</span>
            </a>

            <a href="{{ route('admin.jobs.index') }}"
               class="sidebar-link">
                <span class="sidebar-icon">💼</span>
                <span>Job Management</span>
            </a>

            <a href="#"
               class="sidebar-link">
                <span class="sidebar-icon">📋</span>
                <span>Applications</span>
            </a>

        </nav>

        <div class="sidebar-bottom">

            <a href="{{ route('profile.edit') }}"
               class="sidebar-link">
                <span class="sidebar-icon">⚙️</span>
                <span>Profile</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="sidebar-link logout-button">
                    <span class="sidebar-icon">🚪</span>
                    <span>Logout</span>
                </button>
            </form>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="admin-main">

        <header class="admin-header">
            <h2>
                {{ $header ?? 'Administrator / HR' }}
            </h2>
        </header>

        <div class="admin-content">
            {{ $slot }}
        </div>

    </main>

</div>

</body>
</html>