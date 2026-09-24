<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'WarungGuard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        :root {
            --bg: #fffdf8;
            --bg-soft: #f4f1e8;
            --surface: rgba(255, 255, 255, 0.90);

            --ink: #252a25;
            --ink-soft: #5f665e;
            --muted: #92978f;

            --line: #e6e2d8;
            --line-soft: #efede6;

            --brand: #4f806b;
            --brand-dark: #3d6957;
            --brand-soft: #e8f1eb;

            --success: #4f806b;
            --success-soft: #e9f4ed;

            --danger: #c85c5c;
            --danger-soft: #faeeee;

            --warning: #c58a3a;
            --warning-soft: #faf2e3;

            --radius: 12px;

            --shadow-sm: 0 2px 8px rgba(70, 65, 50, 0.05);
            --shadow-md: 0 8px 24px rgba(70, 65, 50, 0.08);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            color: var(--ink);
            font-family: "Inter", "Segoe UI", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 0% 0%,
                    rgba(215, 230, 217, 0.60) 0%,
                    rgba(215, 230, 217, 0) 35%
                ),
                radial-gradient(
                    circle at 100% 15%,
                    rgba(244, 226, 194, 0.55) 0%,
                    rgba(244, 226, 194, 0) 38%
                ),
                linear-gradient(
                    135deg,
                    #fffdf8 0%,
                    #f8f5ed 45%,
                    #f1f4ee 100%
                );

            background-attachment: fixed;
        }

        a {
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        /* =========================
           HEADER
        ========================= */

        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;

            background: rgba(255, 253, 248, 0.78);

            backdrop-filter: blur(18px) saturate(140%);
            -webkit-backdrop-filter: blur(18px) saturate(140%);

            border-bottom: 1px solid rgba(180, 175, 160, 0.25);

            box-shadow:
                0 4px 20px rgba(70, 65, 50, 0.04);
        }

        .header-inner {
            max-width: 1440px;
            min-height: 68px;
            margin: 0 auto;
            padding: 0 32px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;

            color: var(--ink);
            flex-shrink: 0;
        }

        .brand-mark {
            width: 35px;
            height: 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background:
                linear-gradient(
                    135deg,
                    #5c8d76,
                    #3f6e5b
                );

            color: #ffffff;
            font-size: 17px;

            box-shadow:
                0 5px 14px rgba(63, 110, 91, 0.20);
        }

        .brand-name {
            margin: 0;

            font-size: 17px;
            font-weight: 800;

            letter-spacing: -0.4px;

            color: var(--ink);
        }

        .brand-caption {
            margin-top: 0;

            color: var(--muted);

            font-size: 10px;
            font-weight: 500;

            letter-spacing: 0.4px;
        }

        .main-navigation {
            display: flex;
            align-items: center;

            gap: 3px;

            margin-left: auto;
        }

        .main-navigation a {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            padding: 8px 14px;

            border-radius: 9px;

            color: var(--ink-soft);

            font-size: 13.5px;
            font-weight: 600;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }

        .main-navigation a i {
            font-size: 14px;
            color: var(--muted);

            transition: color 0.2s ease;
        }

        .main-navigation a:hover {
            background: rgba(232, 241, 235, 0.75);
            color: var(--brand-dark);

            transform: translateY(-1px);
        }

        .main-navigation a:hover i {
            color: var(--brand);
        }

        .main-navigation a.active {
            background:
                linear-gradient(
                    135deg,
                    rgba(232, 241, 235, 0.95),
                    rgba(224, 237, 228, 0.75)
                );

            color: var(--brand-dark);

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.8);
        }

        .main-navigation a.active i {
            color: var(--brand-dark);
        }

        /* =========================
           HEADER USER
        ========================= */

        .header-user {
            display: flex;
            align-items: center;

            gap: 10px;

            padding-left: 18px;
            margin-left: 6px;

            border-left: 1px solid var(--line);
        }

        .user-symbol {
            width: 33px;
            height: 33px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #303832,
                    #4b564d
                );

            color: #ffffff;

            font-size: 13px;

            box-shadow:
                0 4px 10px rgba(50, 55, 50, 0.12);
        }

        .user-info strong {
            display: block;

            color: var(--ink);

            font-size: 12.5px;
            font-weight: 700;

            line-height: 1.3;
        }

        .user-info span {
            display: block;

            color: var(--muted);

            font-size: 10.5px;

            line-height: 1.3;
        }

        /* =========================
           MOBILE MENU
        ========================= */

        .mobile-menu-button {
            display: none;

            width: 38px;
            height: 38px;

            border: 1px solid var(--line);
            border-radius: 10px;

            background: rgba(255, 255, 255, 0.75);

            color: var(--ink);

            font-size: 18px;

            transition: 0.2s ease;
        }

        .mobile-menu-button:hover {
            background: var(--brand-soft);
            color: var(--brand-dark);
        }

        .mobile-navigation {
            display: none;

            padding: 10px 20px 16px;

            border-top: 1px solid rgba(180, 175, 160, 0.25);

            background: rgba(255, 253, 248, 0.94);

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .mobile-navigation.show {
            display: block;
        }

        .mobile-navigation a {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 12px 4px;

            border-bottom: 1px solid var(--line-soft);

            color: var(--ink);

            font-size: 14px;
            font-weight: 600;
        }

        .mobile-navigation a i {
            width: 22px;

            color: var(--brand);

            font-size: 16px;
        }

        /* =========================
           PAGE AREA
        ========================= */

        .page-area {
            width: 100%;
            max-width: 1440px;

            margin: 0 auto;

            padding: 40px 32px 64px;
        }

        .page-introduction {
            display: flex;
            align-items: end;
            justify-content: space-between;

            gap: 20px;

            margin-bottom: 32px;
            padding-bottom: 24px;

            border-bottom: 1px solid rgba(210, 207, 196, 0.65);
        }

        .page-title {
            margin: 0;

            color: var(--ink);

            font-size: 26px;
            font-weight: 800;

            letter-spacing: -0.8px;
        }

        .page-description {
            max-width: 620px;

            margin: 8px 0 0;

            color: var(--ink-soft);

            font-size: 13.5px;
            line-height: 1.7;
        }

        .page-date {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            padding: 8px 14px;

            border-radius: 100px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.75),
                    rgba(240, 239, 230, 0.75)
                );

            border: 1px solid rgba(220, 216, 204, 0.85);

            color: var(--ink-soft);

            font-size: 12px;
            font-weight: 600;

            white-space: nowrap;

            box-shadow:
                0 3px 10px rgba(70, 65, 50, 0.04);
        }

        .page-date i {
            color: var(--brand);
        }

        .content-section {
            width: 100%;
        }

        /* =========================
           ALERTS
        ========================= */

        .alert {
            border: 1px solid transparent;

            border-radius: var(--radius);

            font-size: 13.5px;

            box-shadow: var(--shadow-sm);
        }

        .alert-success {
            background:
                linear-gradient(
                    135deg,
                    #edf7f0,
                    #e5f1e9
                );

            border-color: #cfe6d7;

            color: #376c51;
        }

        .alert-danger {
            background:
                linear-gradient(
                    135deg,
                    #fcf0f0,
                    #f9e9e9
                );

            border-color: #efd0d0;

            color: #a94444;
        }

        /* =========================
           BUTTONS
        ========================= */

        .btn {
            border-radius: 9px;

            font-size: 13.5px;
            font-weight: 700;

            padding: 10px 18px;

            letter-spacing: -0.1px;

            transition:
                transform 0.15s ease,
                box-shadow 0.15s ease,
                background 0.15s ease;
        }

        .btn-primary {
            border: none;

            background:
                linear-gradient(
                    135deg,
                    #5c8d76,
                    #3f6e5b
                );

            box-shadow:
                0 4px 14px rgba(63, 110, 91, 0.20);
        }

        .btn-primary:hover {
            transform: translateY(-1px);

            background:
                linear-gradient(
                    135deg,
                    #64967e,
                    #457761
                );

            box-shadow:
                0 7px 20px rgba(63, 110, 91, 0.26);
        }

        .btn-success {
            border: none;

            background:
                linear-gradient(
                    135deg,
                    #5a9275,
                    #40765d
                );

            box-shadow:
                0 4px 14px rgba(64, 118, 93, 0.20);
        }

        .btn-success:hover {
            transform: translateY(-1px);

            background:
                linear-gradient(
                    135deg,
                    #649d80,
                    #477f65
                );

            box-shadow:
                0 7px 20px rgba(64, 118, 93, 0.26);
        }

        .btn-warning {
            border: none;

            background:
                linear-gradient(
                    135deg,
                    #c99048,
                    #ae7330
                );

            color: #ffffff;

            box-shadow:
                0 4px 14px rgba(174, 115, 48, 0.18);
        }

        .btn-warning:hover {
            transform: translateY(-1px);

            background:
                linear-gradient(
                    135deg,
                    #d19b54,
                    #b97b35
                );

            box-shadow:
                0 7px 18px rgba(174, 115, 48, 0.24);

            color: #ffffff;
        }

        .btn-outline-secondary {
            border-color: var(--line);

            color: var(--ink-soft);

            background: rgba(255,255,255,0.55);
        }

        .btn-outline-secondary:hover {
            background: var(--bg-soft);

            border-color: #d6d1c4;

            color: var(--ink);
        }

        /* =========================
           CARDS
        ========================= */

        .card {
            border: 1px solid rgba(220, 216, 204, 0.8);

            border-radius: 14px;

            background:
                linear-gradient(
                    145deg,
                    rgba(255, 255, 255, 0.94),
                    rgba(249, 247, 240, 0.88)
                );

            box-shadow:
                0 4px 18px rgba(70, 65, 50, 0.055),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
        }

        .card-header {
            border-bottom: 1px solid var(--line);

            background: transparent;

            color: var(--ink);

            font-weight: 700;
            font-size: 14px;
        }

        /* =========================
           FORMS
        ========================= */

        .form-label {
            color: var(--ink);

            font-size: 13px;
            font-weight: 700;
        }

        .form-control,
        .form-select {
            min-height: 42px;

            border: 1px solid var(--line);

            border-radius: 9px;

            background: rgba(255,255,255,0.82);

            color: var(--ink);

            font-size: 13.5px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .form-control:hover,
        .form-select:hover {
            border-color: #d6d2c5;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--brand);

            background: #ffffff;

            box-shadow:
                0 0 0 3px rgba(79, 128, 107, 0.12);
        }

        /* =========================
           TABLE
        ========================= */

        .table {
            --bs-table-bg: transparent;

            color: var(--ink);
        }

        .table thead th {
            padding-top: 13px;
            padding-bottom: 13px;

            border-bottom: 1px solid var(--line);

            background:
                linear-gradient(
                    135deg,
                    rgba(244, 241, 232, 0.95),
                    rgba(238, 241, 235, 0.85)
                );

            color: var(--ink-soft);

            font-size: 10.5px;
            font-weight: 800;

            letter-spacing: 0.6px;

            text-transform: uppercase;
        }

        .table tbody td {
            padding-top: 13px;
            padding-bottom: 13px;

            border-color: var(--line-soft);

            vertical-align: middle;

            font-size: 13.5px;
        }

        .table tbody tr {
            transition: background 0.15s ease;
        }

        .table tbody tr:hover {
            background: rgba(232, 241, 235, 0.42);
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            padding: 28px 32px;

            border-top: 1px solid rgba(210, 207, 196, 0.65);

            background:
                linear-gradient(
                    135deg,
                    #f1eee5,
                    #e9eee8
                );

            color: var(--muted);

            font-size: 12px;

            text-align: center;
        }

        /* =========================
           LIQUID GLASS FLOATING BUBBLE
        ========================= */

        .glass-bubble-wrap {
            position: fixed;

            z-index: 1200;

            touch-action: none;
            user-select: none;
            -webkit-user-select: none;
        }

        .glass-bubble {
            width: 60px;
            height: 60px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            cursor: grab;

            position: relative;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.68),
                    rgba(227,239,231,0.34)
                );

            backdrop-filter: blur(16px) saturate(150%);
            -webkit-backdrop-filter: blur(16px) saturate(150%);

            border: 1px solid rgba(255,255,255,0.72);

            box-shadow:
                0 8px 24px rgba(55, 70, 60, 0.18),
                inset 0 1px 1px rgba(255,255,255,0.9),
                inset 0 -6px 10px rgba(79,128,107,0.13);

            transition:
                box-shadow 0.2s ease,
                transform 0.15s ease;
        }

        .glass-bubble::before {
            content: "";

            position: absolute;

            top: 6px;
            left: 9px;

            width: 18px;
            height: 10px;

            border-radius: 50%;

            background: rgba(255,255,255,0.78);

            filter: blur(2px);

            pointer-events: none;
        }

        .glass-bubble i {
            font-size: 22px;

            color: var(--brand-dark);

            pointer-events: none;
        }

        .glass-bubble:active {
            cursor: grabbing;

            transform: scale(0.94);
        }

        .glass-bubble-wrap.dragging .glass-bubble {
            box-shadow:
                0 14px 34px rgba(55, 70, 60, 0.25),
                inset 0 1px 1px rgba(255,255,255,0.95),
                inset 0 -6px 10px rgba(79,128,107,0.18);
        }

        .glass-menu {
            position: absolute;

            bottom: 72px;
            right: 0;

            display: flex;
            flex-direction: column;

            gap: 10px;

            opacity: 0;
            visibility: hidden;

            transform:
                translateY(10px)
                scale(0.9);

            transform-origin: bottom right;

            transition:
                opacity 0.2s ease,
                transform 0.2s ease,
                visibility 0.2s;
        }

        .glass-bubble-wrap.menu-flip .glass-menu {
            bottom: auto;
            top: 72px;

            transform-origin: top right;
        }

        .glass-bubble-wrap.open .glass-menu {
            opacity: 1;
            visibility: visible;

            transform:
                translateY(0)
                scale(1);
        }

        .glass-menu-item {
            display: flex;
            align-items: center;

            gap: 10px;

            padding: 10px 16px 10px 12px;

            border-radius: 100px;

            white-space: nowrap;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.72),
                    rgba(239,245,240,0.42)
                );

            backdrop-filter: blur(16px) saturate(150%);
            -webkit-backdrop-filter: blur(16px) saturate(150%);

            border: 1px solid rgba(255,255,255,0.7);

            box-shadow:
                0 6px 18px rgba(55, 70, 60, 0.15),
                inset 0 1px 1px rgba(255,255,255,0.85);

            color: var(--ink);

            font-size: 12.5px;
            font-weight: 700;

            transition:
                transform 0.15s ease,
                box-shadow 0.15s ease;
        }

        .glass-menu-item:hover {
            transform: translateX(-3px);

            box-shadow:
                0 8px 22px rgba(55, 70, 60, 0.20),
                inset 0 1px 1px rgba(255,255,255,0.9);

            color: var(--ink);
        }

        .glass-menu-item .glass-menu-icon {
            width: 30px;
            height: 30px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #5c8d76,
                    #3f6e5b
                );

            color: #fff;

            font-size: 14px;

            flex-shrink: 0;

            box-shadow:
                0 3px 8px rgba(63, 110, 91, 0.28);
        }

        .glass-menu-item[data-variant="warning"] .glass-menu-icon {
            background:
                linear-gradient(
                    135deg,
                    #c99048,
                    #ae7330
                );

            box-shadow:
                0 3px 8px rgba(174, 115, 48, 0.28);
        }

        .glass-menu-item[data-variant="brand"] .glass-menu-icon {
            background:
                linear-gradient(
                    135deg,
                    #718878,
                    #526d5b
                );

            box-shadow:
                0 3px 8px rgba(82, 109, 91, 0.28);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {

            .header-inner {
                padding: 0 20px;
            }

            .main-navigation a {
                padding: 8px 10px;
                font-size: 12.5px;
            }

            .header-user {
                padding-left: 12px;
            }

            .user-info {
                display: none;
            }

            .page-area {
                padding: 32px 20px 48px;
            }
        }

        @media (max-width: 850px) {

            .main-navigation,
            .header-user {
                display: none;
            }

            .mobile-menu-button {
                display: inline-flex;

                align-items: center;
                justify-content: center;
            }

            .header-inner {
                min-height: 64px;
            }

            .page-introduction {
                align-items: flex-start;

                flex-direction: column;

                margin-bottom: 26px;
            }

            .page-title {
                font-size: 23px;
            }

            .page-date {
                margin-top: 4px;
            }
        }

        @media (max-width: 575px) {

            .header-inner {
                padding: 0 16px;
            }

            .brand-name {
                font-size: 16px;
            }

            .brand-caption {
                font-size: 9px;
            }

            .page-area {
                padding: 24px 16px 36px;
            }

            .page-title {
                font-size: 21px;
            }

            .page-description {
                font-size: 12px;
            }

            .page-date {
                font-size: 11px;
                padding: 7px 12px;
            }

            .footer {
                padding: 20px 16px;
            }

            .glass-bubble {
                width: 54px;
                height: 54px;
            }

            .glass-bubble i {
                font-size: 20px;
            }

            .glass-menu-item {
                font-size: 12px;
                padding: 9px 14px 9px 10px;
            }
        }

    </style>

    @stack('styles')

</head>

<body>

    <header class="site-header">

        <div class="header-inner">

            <a href="{{ route('dashboard') }}" class="brand">

                <div class="brand-mark">
                    <i class="bi bi-shop"></i>
                </div>

                <div>
                    <h1 class="brand-name">
                        WarungGuard
                    </h1>

                    <div class="brand-caption">
                        SISTEM MANAJEMEN UMKM
                    </div>
                </div>

            </a>

            <nav class="main-navigation">

                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    <i class="bi bi-house-door"></i>
                    Dashboard

                </a>

                <a href="{{ route('products.index') }}"
                   class="{{ request()->routeIs('products.index') ? 'active' : '' }}">

                    <i class="bi bi-box-seam"></i>
                    Produk

                </a>

                <a href="{{ route('products.create') }}"
                   class="{{ request()->routeIs('products.create') ? 'active' : '' }}">

                    <i class="bi bi-plus-circle"></i>
                    Tambah Produk

                </a>

                <a href="{{ route('cashier.index') }}"
                   class="{{ request()->routeIs('cashier.*') ? 'active' : '' }}">

                    <i class="bi bi-receipt"></i>
                    Kasir

                </a>

            </nav>

            <div class="header-user">

                <div class="user-symbol">
                    <i class="bi bi-person"></i>
                </div>

                <div class="user-info">

                    <strong>Pemilik UMKM</strong>

                    <span>
                        Administrator
                    </span>

                </div>

            </div>

            <button
                class="mobile-menu-button"
                id="mobileMenuButton"
                type="button"
                aria-label="Buka menu">

                <i class="bi bi-list"></i>

            </button>

        </div>

        <nav class="mobile-navigation" id="mobileNavigation">

            <a href="{{ route('dashboard') }}">

                <i class="bi bi-house-door"></i>

                Dashboard

            </a>

            <a href="{{ route('products.index') }}">

                <i class="bi bi-box-seam"></i>

                Produk

            </a>

            <a href="{{ route('products.create') }}">

                <i class="bi bi-plus-circle"></i>

                Tambah Produk

            </a>

            <a href="{{ route('cashier.index') }}">

                <i class="bi bi-receipt"></i>

                Kasir

            </a>

        </nav>

    </header>

    <main class="page-area">

        <div class="page-introduction">

            <div>

                <h2 class="page-title">
                    @yield('heading', 'Dashboard')
                </h2>

                <p class="page-description">
                    Kelola produk, persediaan, dan transaksi usaha kamu dari satu tempat.
                </p>

            </div>

            <div class="page-date">

                <i class="bi bi-calendar3"></i>

                {{ now()->translatedFormat('l, d F Y') }}

            </div>

        </div>

        @if(session('success'))

            <div
                class="alert alert-success alert-dismissible fade show mb-4"
                role="alert">

                <i class="bi bi-check-circle me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif

        @if(session('error'))

            <div
                class="alert alert-danger alert-dismissible fade show mb-4"
                role="alert">

                <i class="bi bi-exclamation-triangle me-2"></i>

                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif

        @if($errors->any())

            <div
                class="alert alert-danger alert-dismissible fade show mb-4"
                role="alert">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif

        <section class="content-section">

            @yield('content')

        </section>

    </main>

    <footer class="footer">

        © {{ date('Y') }} WarungGuard — Sistem Manajemen UMKM

    </footer>

    <div
        class="glass-bubble-wrap"
        id="glassBubbleWrap">

        <div
            class="glass-menu"
            id="glassMenu">

            <a
                href="{{ route('cashier.index') }}"
                class="glass-menu-item">

                <span class="glass-menu-icon">
                    <i class="bi bi-receipt"></i>
                </span>

                Kasir

            </a>

            <a
                href="{{ route('products.create') }}"
                class="glass-menu-item"
                data-variant="warning">

                <span class="glass-menu-icon">
                    <i class="bi bi-plus-circle"></i>
                </span>

                Tambah Produk

            </a>

            <a
                href="{{ route('dashboard') }}"
                class="glass-menu-item"
                data-variant="brand">

                <span class="glass-menu-icon">
                    <i class="bi bi-house-door"></i>
                </span>

                Dashboard

            </a>

        </div>

        <div
            class="glass-bubble"
            id="glassBubble">

            <i class="bi bi-stars"></i>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        const mobileMenuButton =
            document.getElementById('mobileMenuButton');

        const mobileNavigation =
            document.getElementById('mobileNavigation');

        mobileMenuButton.addEventListener('click', function () {

            mobileNavigation.classList.toggle('show');

            const icon =
                mobileMenuButton.querySelector('i');

            if (mobileNavigation.classList.contains('show')) {

                icon.className = 'bi bi-x-lg';

            } else {

                icon.className = 'bi bi-list';

            }

        });

    </script>

    <script>

        (function () {

            const wrap =
                document.getElementById('glassBubbleWrap');

            const bubble =
                document.getElementById('glassBubble');

            const menu =
                document.getElementById('glassMenu');

            const MARGIN = 12;

            const STORAGE_KEY = 'wg_bubble_pos';

            function bubbleSize() {

                return bubble.getBoundingClientRect().width;

            }

            function clamp(x, y) {

                const size = bubbleSize();

                const maxX =
                    window.innerWidth - size - MARGIN;

                const maxY =
                    window.innerHeight - size - MARGIN;

                return {

                    x: Math.min(
                        Math.max(x, MARGIN),
                        Math.max(maxX, MARGIN)
                    ),

                    y: Math.min(
                        Math.max(y, MARGIN),
                        Math.max(maxY, MARGIN)
                    )

                };

            }

            function setPosition(x, y, animate) {

                wrap.style.transition = animate
                    ? 'left 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), top 0.35s cubic-bezier(0.34, 1.56, 0.64, 1)'
                    : 'none';

                wrap.style.left = x + 'px';
                wrap.style.top = y + 'px';

                if (y > window.innerHeight * 0.6) {

                    wrap.classList.add('menu-flip');

                } else {

                    wrap.classList.remove('menu-flip');

                }

            }

            function savePosition(x, y) {

                try {

                    localStorage.setItem(
                        STORAGE_KEY,
                        JSON.stringify({ x, y })
                    );

                } catch (e) {

                }

            }

            function loadInitialPosition() {

                let saved = null;

                try {

                    saved =
                        JSON.parse(
                            localStorage.getItem(STORAGE_KEY)
                        );

                } catch (e) {

                    saved = null;

                }

                if (
                    saved &&
                    typeof saved.x === 'number' &&
                    typeof saved.y === 'number'
                ) {

                    const clamped =
                        clamp(saved.x, saved.y);

                    setPosition(
                        clamped.x,
                        clamped.y,
                        false
                    );

                    return;

                }

                const size = bubbleSize();

                setPosition(
                    window.innerWidth - size - 22,
                    window.innerHeight - size - 90,
                    false
                );

            }

            let dragging = false;
            let moved = false;

            let startPointer = {
                x: 0,
                y: 0
            };

            let startPos = {
                x: 0,
                y: 0
            };

            function pointerPos(e) {

                if (
                    e.touches &&
                    e.touches.length
                ) {

                    return {

                        x: e.touches[0].clientX,

                        y: e.touches[0].clientY

                    };

                }

                return {

                    x: e.clientX,

                    y: e.clientY

                };

            }

            function onDragStart(e) {

                dragging = true;

                moved = false;

                wrap.classList.add('dragging');

                wrap.classList.remove('open');

                const p = pointerPos(e);

                startPointer = p;

                const rect =
                    wrap.getBoundingClientRect();

                startPos = {

                    x: rect.left,

                    y: rect.top

                };

                wrap.style.transition = 'none';

            }

            function onDragMove(e) {

                if (!dragging) {
                    return;
                }

                const p = pointerPos(e);

                const dx =
                    p.x - startPointer.x;

                const dy =
                    p.y - startPointer.y;

                if (
                    Math.abs(dx) > 4 ||
                    Math.abs(dy) > 4
                ) {

                    moved = true;

                }

                const next =
                    clamp(
                        startPos.x + dx,
                        startPos.y + dy
                    );

                wrap.style.left =
                    next.x + 'px';

                wrap.style.top =
                    next.y + 'px';

                if (e.cancelable) {

                    e.preventDefault();

                }

            }

            function onDragEnd() {

                if (!dragging) {
                    return;
                }

                dragging = false;

                wrap.classList.remove('dragging');

                const rect =
                    wrap.getBoundingClientRect();

                const size =
                    bubbleSize();

                const centerX =
                    rect.left + size / 2;

                const snapX =
                    centerX < window.innerWidth / 2
                        ? MARGIN
                        : window.innerWidth - size - MARGIN;

                const clamped =
                    clamp(
                        snapX,
                        rect.top
                    );

                setPosition(
                    clamped.x,
                    clamped.y,
                    true
                );

                savePosition(
                    clamped.x,
                    clamped.y
                );

                if (!moved) {

                    wrap.classList.toggle('open');

                }

            }

            bubble.addEventListener(
                'mousedown',
                onDragStart
            );

            window.addEventListener(
                'mousemove',
                onDragMove
            );

            window.addEventListener(
                'mouseup',
                onDragEnd
            );

            bubble.addEventListener(
                'touchstart',
                onDragStart,
                { passive: true }
            );

            window.addEventListener(
                'touchmove',
                onDragMove,
                { passive: false }
            );

            window.addEventListener(
                'touchend',
                onDragEnd
            );

            document.addEventListener(
                'click',
                function (e) {

                    if (!wrap.contains(e.target)) {

                        wrap.classList.remove('open');

                    }

                }
            );

            window.addEventListener(
                'resize',
                function () {

                    const rect =
                        wrap.getBoundingClientRect();

                    const clamped =
                        clamp(
                            rect.left,
                            rect.top
                        );

                    setPosition(
                        clamped.x,
                        clamped.y,
                        false
                    );

                }
            );

            loadInitialPosition();

        })();

    </script>

    @stack('scripts')

</body>

</html>