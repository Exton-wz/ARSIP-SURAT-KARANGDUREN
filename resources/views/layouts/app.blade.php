<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Arsip Surat')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e3a8a;
            --primary-light: #3b82f6;
            --secondary-color: #f8fafc;
            --accent-color: #059669;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-muted: #9ca3af;
            --border-light: #e5e7eb;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
            --border-radius-lg: 12px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background-color: var(--secondary-color);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-primary);
            line-height: 1.6;
        }

        .main-container {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: var(--primary-color);
            box-shadow: var(--shadow-lg);
            position: sticky;
            top: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar h4 {
            color: var(--white);
            font-weight: 600;
            font-size: 1.25rem;
            margin: 0 0 0.5rem 0;
            letter-spacing: -0.025em;
        }

        .sidebar-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.875rem;
            margin: 0;
            font-weight: 400;
        }

        .nav-menu {
            padding: 1rem;
            flex: 1;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            border-radius: var(--border-radius);
            margin-bottom: 0.25rem;
            padding: 0.875rem 1rem;
            font-weight: 500;
            font-size: 0.875rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.2s ease-in-out;
            border: 1px solid transparent;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: var(--primary-light);
            color: var(--white) !important;
            border-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link .emoji {
            font-size: 1.125rem;
        }

        /* Sidebar footer - removed */

        /* Content Area */
        .content-wrapper {
            flex: 1;
            padding: 2rem;
        }

        .content-area {
            background-color: var(--white);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            min-height: calc(100vh - 4rem);
        }

        /* Profile styling (optional) */
        .profile {
            text-align: center;
            margin-bottom: 2rem;
        }

        .profile img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: var(--border-radius);
            border: 3px solid var(--border-light);
            margin-bottom: 1rem;
        }

        /* Button styles */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--white);
            font-weight: 500;
            border-radius: var(--border-radius);
            padding: 0.625rem 1.25rem;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background-color: var(--primary-light);
            border-color: var(--primary-light);
            color: var(--white);
        }

        .btn-success {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--white);
            font-weight: 500;
            border-radius: var(--border-radius);
            padding: 0.625rem 1.25rem;
            transition: all 0.2s ease-in-out;
        }

        /* Card styles */
        .card {
            border: 1px solid var(--border-light);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            transition: box-shadow 0.2s ease-in-out;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .card-header {
            background-color: var(--secondary-color);
            border-bottom: 1px solid var(--border-light);
            font-weight: 600;
            color: var(--text-primary);
        }

        .table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th {
            background-color: var(--secondary-color);
            border-bottom: 1px solid var(--border-light);
            font-weight: 600;
            color: var(--text-primary);
            padding: 0.875rem;
        }

        .table td {
            border-bottom: 1px solid var(--border-light);
            padding: 0.875rem;
            color: var(--text-secondary);
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            color: var(--text-primary);
            font-weight: 600;
            letter-spacing: -0.025em;
            margin-bottom: 1rem;
        }

        h1 { font-size: 2rem; }
        h2 { font-size: 1.5rem; }
        h3 { font-size: 1.25rem; }
        h4 { font-size: 1.125rem; }

        p {
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }

        .text-muted {
            color: var(--text-muted) !important;
        }

        /* Form elements */
        .form-control {
            border: 1px solid var(--border-light);
            border-radius: var(--border-radius);
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
            outline: 0;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                min-height: auto;
                position: relative;
            }
            
            .content-wrapper {
                padding: 1rem;
            }
            
            .content-area {
                padding: 1.5rem;
                min-height: auto;
            }
            
            .sidebar-header {
                padding: 1.5rem;
            }
            
            .nav-menu {
                padding: 1rem;
            }
        }

        /* Utility classes */
        .badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.375rem 0.75rem;
            border-radius: 9999px;
        }

        .badge-primary {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .badge-success {
            background-color: var(--accent-color);
            color: var(--white);
        }

        .alert {
            border-radius: var(--border-radius);
            border: 1px solid transparent;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .alert-info {
            background-color: #dbeafe;
            border-color: #bfdbfe;
            color: #1e40af;
        }

        .alert-success {
            background-color: #d1fae5;
            border-color: #a7f3d0;
            color: #065f46;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h4>Arsip Surat</h4>
                <div class="sidebar-subtitle">Sistem Manajemen Dokumen Desa Karangduren</div>
            </div>
            
            <div class="nav-menu">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('arsip.index') }}" class="nav-link">
                            <span class="emoji">📑</span>
                            <span>Arsip Dokumen</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kategori.index') }}" class="nav-link">
                            <span class="emoji">🗂</span>
                            <span>Kategori Surat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('arsip.about') }}" class="nav-link">
                            <span class="emoji">ℹ️</span>
                            <span>Tentang Sistem</span>
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>

        <!-- Content -->
        <div class="content-wrapper">
            <div class="content-area">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>