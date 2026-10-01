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
            --surface: rgba(255, 255, 255, .9);
            --ink: #252a25;
            --ink-soft: #5f665e;
            --muted: #92978f;
            --line: #e6e2d8;
            --line-soft: #efede6;
            --brand: #4f806b;
            --brand-dark: #3d6957;
            --brand-soft: #e8f1eb;
            --danger: #c85c5c;
            --radius: 12px;
            --shadow-sm: 0 2px 8px rgba(70, 65, 50, .05);
            --radius-card: 14px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            color: var(--ink);
            font-family: "Inter", "Segoe UI", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            background:
                radial-gradient(circle at 0% 0%, rgba(215, 230, 217, .6) 0%, rgba(215, 230, 217, 0) 35%),
                radial-gradient(circle at 100% 15%, rgba(244, 226, 194, .55) 0%, rgba(244, 226, 194, 0) 38%),
                linear-gradient(135deg, #fffdf8 0%, #f8f5ed 45%, #f1f4ee 100%);
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

        /* ============ HEADER ============ */

        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 253, 248, .78);
            border-bottom: 1px solid rgba(180, 175, 160, .25);
            box-shadow: 0 4px 20px rgba(70, 65, 50, .04);
            -webkit-backdrop-filter: blur(18px) saturate(140%);
            backdrop-filter: blur(18px) saturate(140%);
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            max-width: 1440px;
            min-height: 68px;
            margin: 0 auto;
            padding: 0 32px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            flex-shrink: 0;
            color: var(--ink);
        }

        .brand-mark {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 10px;
            background: linear-gradient(135deg, #5c8d76, #3f6e5b);
            box-shadow: 0 5px 14px rgba(63, 110, 91, .2);
            color: #fff;
            font-size: 17px;
        }

        .brand-name {
            margin: 0;
            color: var(--ink);
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.4px;
            line-height: 1.15;
        }

        .brand-caption {
            color: var(--muted);
            font-size: 10px;
            font-weight: 500;
            letter-spacing: .4px;
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
            transition: background .2s ease, color .2s ease, transform .2s ease;
        }

        .main-navigation a i {
            color: var(--muted);
            font-size: 14px;
            transition: color .2s ease;
        }

        .main-navigation a:hover {
            background: rgba(232, 241, 235, .75);
            color: var(--brand-dark);
            transform: translateY(-1px);
        }

        .main-navigation a:hover i {
            color: var(--brand);
        }

        .main-navigation a.active {
            background: linear-gradient(135deg, rgba(232, 241, 235, .95), rgba(224, 237, 228, .75));
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .8);
            color: var(--brand-dark);
        }

        .main-navigation a.active i {
            color: var(--brand-dark);
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 6px;
            padding-left: 18px;
            border-left: 1px solid var(--line);
        }

        .user-symbol {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 33px;
            height: 33px;
            border-radius: 50%;
            background: linear-gradient(135deg, #303832, #4b564d);
            box-shadow: 0 4px 10px rgba(50, 55, 50, .12);
            color: #fff;
            font-size: 13px;
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

        /* ============ MOBILE MENU ============ */

        .mobile-menu-button {
            display: none;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: rgba(255, 255, 255, .75);
            color: var(--ink);
            font-size: 18px;
            transition: background .2s ease, color .2s ease;
        }

        .mobile-menu-button:hover {
            background: var(--brand-soft);
            color: var(--brand-dark);
        }

        .mobile-navigation {
            display: none;
            padding: 10px 20px 16px;
            border-top: 1px solid rgba(180, 175, 160, .25);
            background: rgba(255, 253, 248, .94);
            -webkit-backdrop-filter: blur(18px);
            backdrop-filter: blur(18px);
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

        .mobile-navigation a:last-child {
            border-bottom: 0;
        }

        .mobile-navigation a i {
            width: 22px;
            color: var(--brand);
            font-size: 16px;
        }

        .mobile-navigation a.active {
            color: var(--brand-dark);
        }

        /* ============ PAGE AREA ============ */

        .page-area {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 40px 32px 64px;
        }

        .page-introduction {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 32px;
            padding-bottom: 24px;
            border-bottom: 1px solid rgba(210, 207, 196, .65);
        }

        .page-title {
            margin: 0;
            color: var(--ink);
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.8px;
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
            border: 1px solid rgba(220, 216, 204, .85);
            border-radius: 100px;
            background: linear-gradient(135deg, rgba(255, 255, 255, .75), rgba(240, 239, 230, .75));
            box-shadow: 0 3px 10px rgba(70, 65, 50, .04);
            color: var(--ink-soft);
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .page-date i {
            color: var(--brand);
        }

        /* ============ ALERTS ============ */

        .alert {
            border: 1px solid transparent;
            border-radius: var(--radius);
            font-size: 13.5px;
            box-shadow: var(--shadow-sm);
        }

        .alert-success {
            border-color: #cfe6d7;
            background: linear-gradient(135deg, #edf7f0, #e5f1e9);
            color: #376c51;
        }

        .alert-danger {
            border-color: #efd0d0;
            background: linear-gradient(135deg, #fcf0f0, #f9e9e9);
            color: #a94444;
        }

        /* ============ BUTTONS ============ */

        .btn {
            padding: 10px 18px;
            border-radius: 9px;
            font-size: 13.5px;
            font-weight: 700;
            letter-spacing: -.1px;
            transition: transform .15s ease, box-shadow .15s ease, background .15s ease;
        }

        .btn-primary,
        .btn-success {
            border: 0;
            color: #fff;
        }

        .btn-primary {
            background: linear-gradient(135deg, #5c8d76, #3f6e5b);
            box-shadow: 0 4px 14px rgba(63, 110, 91, .2);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #64967e, #457761);
            box-shadow: 0 7px 20px rgba(63, 110, 91, .26);
            transform: translateY(-1px);
        }

        .btn-success {
            background: linear-gradient(135deg, #5a9275, #40765d);
            box-shadow: 0 4px 14px rgba(64, 118, 93, .2);
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #649d80, #477f65);
            box-shadow: 0 7px 20px rgba(64, 118, 93, .26);
            transform: translateY(-1px);
        }

        .btn-warning {
            border: 0;
            background: linear-gradient(135deg, #c99048, #ae7330);
            box-shadow: 0 4px 14px rgba(174, 115, 48, .18);
            color: #fff;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #d19b54, #b97b35);
            box-shadow: 0 7px 18px rgba(174, 115, 48, .24);
            color: #fff;
            transform: translateY(-1px);
        }

        .btn-outline-secondary {
            border-color: var(--line);
            background: rgba(255, 255, 255, .55);
            color: var(--ink-soft);
        }

        .btn-outline-secondary:hover {
            border-color: #d6d1c4;
            background: var(--bg-soft);
            color: var(--ink);
        }

        /* ============ CARDS ============ */

        .card {
            border: 1px solid rgba(220, 216, 204, .8);
            border-radius: var(--radius-card);
            background: linear-gradient(145deg, rgba(255, 255, 255, .94), rgba(249, 247, 240, .88));
            box-shadow: 0 4px 18px rgba(70, 65, 50, .055), inset 0 1px 0 rgba(255, 255, 255, .8);
        }

        .card-header {
            border-bottom: 1px solid var(--line);
            background: transparent;
            color: var(--ink);
            font-size: 14px;
            font-weight: 700;
        }

        /* ============ FORMS ============ */

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
            background: rgba(255, 255, 255, .82);
            color: var(--ink);
            font-size: 13.5px;
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .form-control:hover,
        .form-select:hover {
            border-color: #d6d2c5;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--brand);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(79, 128, 107, .12);
        }

        /* ============ TABLE ============ */

        .table {
            --bs-table-bg: transparent;
            color: var(--ink);
        }

        .table thead th {
            padding: 13px;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(135deg, rgba(244, 241, 232, .95), rgba(238, 241, 235, .85));
            color: var(--ink-soft);
            font-size: 10.5px;
            font-weight: 800;
            letter-spacing: .6px;
            text-transform: uppercase;
        }

        .table tbody td {
            padding: 13px;
            border-color: var(--line-soft);
            font-size: 13.5px;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: background .15s ease;
        }

        .table tbody tr:hover {
            background: rgba(232, 241, 235, .42);
        }

        /* ============ FOOTER ============ */

        .footer {
            padding: 28px 32px;
            border-top: 1px solid rgba(210, 207, 196, .65);
            background: linear-gradient(135deg, #f1eee5, #e9eee8);
            color: var(--muted);
            font-size: 12px;
            text-align: center;
        }

        /* ============ FLOATING GLASS BUBBLE ============ */

        .glass-bubble-wrap {
            position: fixed;
            z-index: 1200;
            touch-action: none;
            user-select: none;
            -webkit-user-select: none;
        }

        .glass-bubble {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border: 1px solid rgba(255, 255, 255, .72);
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 255, 255, .68), rgba(227, 239, 231, .34));
            box-shadow: 0 8px 24px rgba(55, 70, 60, .18), inset 0 1px 1px rgba(255, 255, 255, .9), inset 0 -6px 10px rgba(79, 128, 107, .13);
            cursor: grab;
            -webkit-backdrop-filter: blur(16px) saturate(150%);
            backdrop-filter: blur(16px) saturate(150%);
            transition: box-shadow .2s ease, transform .15s ease;
        }

        .glass-bubble::before {
            content: "";
            position: absolute;
            top: 6px;
            left: 9px;
            width: 18px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .78);
            filter: blur(2px);
            pointer-events: none;
        }

        .glass-bubble i {
            color: var(--brand-dark);
            font-size: 22px;
            pointer-events: none;
        }

        .glass-bubble:active {
            cursor: grabbing;
            transform: scale(.94);
        }

        .glass-bubble-wrap.dragging .glass-bubble {
            box-shadow: 0 14px 34px rgba(55, 70, 60, .25), inset 0 1px 1px rgba(255, 255, 255, .95), inset 0 -6px 10px rgba(79, 128, 107, .18);
        }

        .glass-menu {
            position: absolute;
            right: 0;
            bottom: 72px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px) scale(.9);
            transform-origin: bottom right;
            transition: opacity .2s ease, transform .2s ease, visibility .2s;
        }

        .glass-bubble-wrap.menu-flip .glass-menu {
            top: 72px;
            bottom: auto;
            transform-origin: top right;
        }

        .glass-bubble-wrap.open .glass-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .glass-menu-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px 10px 12px;
            border: 1px solid rgba(255, 255, 255, .7);
            border-radius: 100px;
            background: linear-gradient(135deg, rgba(255, 255, 255, .72), rgba(239, 245, 240, .42));
            box-shadow: 0 6px 18px rgba(55, 70, 60, .15), inset 0 1px 1px rgba(255, 255, 255, .85);
            color: var(--ink);
            font-size: 12.5px;
            font-weight: 700;
            white-space: nowrap;
            -webkit-backdrop-filter: blur(16px) saturate(150%);
            backdrop-filter: blur(16px) saturate(150%);
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .glass-menu-item:hover {
            box-shadow: 0 8px 22px rgba(55, 70, 60, .2), inset 0 1px 1px rgba(255, 255, 255, .9);
            transform: translateX(-3px);
        }

        .glass-menu-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, #5c8d76, #3f6e5b);
            box-shadow: 0 3px 8px rgba(63, 110, 91, .28);
            color: #fff;
            font-size: 14px;
        }

        .glass-menu-item[data-variant="warning"] .glass-menu-icon {
            background: linear-gradient(135deg, #c99048, #ae7330);
            box-shadow: 0 3px 8px rgba(174, 115, 48, .28);
        }

        .glass-menu-item[data-variant="brand"] .glass-menu-icon {
            background: linear-gradient(135deg, #718878, #526d5b);
            box-shadow: 0 3px 8px rgba(82, 109, 91, .28);
        }

        /* ============ RESPONSIVE ============ */

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
            }

            .header-inner {
                min-height: 64px;
            }

            .page-introduction {
                flex-direction: column;
                align-items: flex-start;
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
                padding: 7px 12px;
                font-size: 11px;
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
                padding: 9px 14px 9px 10px;
                font-size: 12px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    @php
        $navigation = [
            ['route' => 'dashboard', 'pattern' => 'dashboard', 'icon' => 'bi-house-door', 'label' => 'Dashboard'],
            ['route' => 'products.index', 'pattern' => 'products.index', 'icon' => 'bi-box-seam', 'label' => 'Produk'],
            ['route' => 'products.create', 'pattern' => 'products.create', 'icon' => 'bi-plus-circle', 'label' => 'Tambah Produk'],
            ['route' => 'cashier.index', 'pattern' => 'cashier.*', 'icon' => 'bi-receipt', 'label' => 'Kasir'],
        ];

        $shortcuts = [
            ['route' => 'cashier.index', 'icon' => 'bi-receipt', 'label' => 'Kasir'],
            ['route' => 'products.create', 'icon' => 'bi-plus-circle', 'label' => 'Tambah Produk', 'variant' => 'warning'],
            ['route' => 'dashboard', 'icon' => 'bi-house-door', 'label' => 'Dashboard', 'variant' => 'brand'],
        ];
    @endphp

    <header class="site-header">
        <div class="header-inner">
            <a href="{{ route('dashboard') }}" class="brand">
                <span class="brand-mark">
                    <i class="bi bi-shop"></i>
                </span>

                <span>
                    <h1 class="brand-name">WarungGuard</h1>
                    <span class="brand-caption">SISTEM MANAJEMEN UMKM</span>
                </span>
            </a>

            <nav class="main-navigation">
                @foreach($navigation as $item)
                    <a href="{{ route($item['route']) }}"
                       class="{{ request()->routeIs($item['pattern']) ? 'active' : '' }}">
                        <i class="bi {{ $item['icon'] }}"></i>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="header-user">
                <span class="user-symbol">
                    <i class="bi bi-person"></i>
                </span>

                <span class="user-info">
                    <strong>Pemilik UMKM</strong>
                    <span>Administrator</span>
                </span>
            </div>

            <button class="mobile-menu-button" id="mobileMenuButton" type="button"
                    aria-label="Buka menu" aria-expanded="false" aria-controls="mobileNavigation">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <nav class="mobile-navigation" id="mobileNavigation">
            @foreach($navigation as $item)
                <a href="{{ route($item['route']) }}"
                   class="{{ request()->routeIs($item['pattern']) ? 'active' : '' }}">
                    <i class="bi {{ $item['icon'] }}"></i>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
    </header>

    <main class="page-area">
        <div class="page-introduction">
            <div>
                @hasSection('heading')
                    <h2 class="page-title">@yield('heading')</h2>
                @else
                    <h2 class="page-title">@yield('title', 'Dashboard')</h2>
                @endif

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
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>
                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <section class="content-section">
            @yield('content')
        </section>
    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} WarungGuard &mdash; Sistem Manajemen UMKM
    </footer>

    <div class="glass-bubble-wrap" id="glassBubbleWrap">
        <div class="glass-menu" id="glassMenu">
            @foreach($shortcuts as $item)
                <a href="{{ route($item['route']) }}" class="glass-menu-item"
                   @isset($item['variant']) data-variant="{{ $item['variant'] }}" @endif>
                    <span class="glass-menu-icon">
                        <i class="bi {{ $item['icon'] }}"></i>
                    </span>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>

        <div class="glass-bubble" id="glassBubble">
            <i class="bi bi-stars"></i>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (function () {
            /* ---------- Mobile menu ---------- */
            const menuButton = document.getElementById('mobileMenuButton');
            const mobileNavigation = document.getElementById('mobileNavigation');

            menuButton.addEventListener('click', function () {
                const isOpen = mobileNavigation.classList.toggle('show');

                menuButton.querySelector('i').className = isOpen ? 'bi bi-x-lg' : 'bi bi-list';
                menuButton.setAttribute('aria-expanded', String(isOpen));
            });

            /* ---------- Draggable glass bubble ---------- */
            const wrap = document.getElementById('glassBubbleWrap');
            const bubble = document.getElementById('glassBubble');

            const MARGIN = 12;
            const STORAGE_KEY = 'wg_bubble_pos';
            const EASE = 'cubic-bezier(0.34, 1.56, 0.64, 1)';

            let dragging = false;
            let moved = false;
            let startPointer = { x: 0, y: 0 };
            let startPos = { x: 0, y: 0 };

            const bubbleSize = () => bubble.getBoundingClientRect().width;

            function clamp(x, y) {
                const size = bubbleSize();

                return {
                    x: Math.min(Math.max(x, MARGIN), Math.max(window.innerWidth - size - MARGIN, MARGIN)),
                    y: Math.min(Math.max(y, MARGIN), Math.max(window.innerHeight - size - MARGIN, MARGIN)),
                };
            }

            function setPosition(x, y, animate = false) {
                wrap.style.transition = animate
                    ? `left .35s ${EASE}, top .35s ${EASE}`
                    : 'none';

                wrap.style.left = x + 'px';
                wrap.style.top = y + 'px';

                wrap.classList.toggle('menu-flip', y > window.innerHeight * 0.6);
            }

            function readStoredPosition() {
                try {
                    const saved = JSON.parse(localStorage.getItem(STORAGE_KEY));

                    return saved && typeof saved.x === 'number' && typeof saved.y === 'number'
                        ? clamp(saved.x, saved.y)
                        : null;
                } catch (error) {
                    return null;
                }
            }

            function savePosition({ x, y }) {
                try {
                    localStorage.setItem(STORAGE_KEY, JSON.stringify({ x, y }));
                } catch (error) {
                    /* storage unavailable, ignore */
                }
            }

            function onDragStart(e) {
                dragging = true;
                moved = false;

                wrap.classList.add('dragging');
                wrap.classList.remove('open');

                startPointer = { x: e.clientX, y: e.clientY };

                const rect = wrap.getBoundingClientRect();
                startPos = { x: rect.left, y: rect.top };

                wrap.style.transition = 'none';
            }

            function onDragMove(e) {
                if (!dragging) {
                    return;
                }

                const dx = e.clientX - startPointer.x;
                const dy = e.clientY - startPointer.y;

                if (Math.abs(dx) > 4 || Math.abs(dy) > 4) {
                    moved = true;
                }

                const next = clamp(startPos.x + dx, startPos.y + dy);

                wrap.style.left = next.x + 'px';
                wrap.style.top = next.y + 'px';
            }

            function onDragEnd() {
                if (!dragging) {
                    return;
                }

                dragging = false;
                wrap.classList.remove('dragging');

                const size = bubbleSize();
                const rect = wrap.getBoundingClientRect();

                const snapX = rect.left + size / 2 < window.innerWidth / 2
                    ? MARGIN
                    : window.innerWidth - size - MARGIN;

                const position = clamp(snapX, rect.top);

                setPosition(position.x, position.y, true);
                savePosition(position);

                if (!moved) {
                    wrap.classList.toggle('open');
                }
            }

            bubble.addEventListener('mousedown', onDragStart);
            bubble.addEventListener('touchstart', onDragStart, { passive: true });

            window.addEventListener('mousemove', onDragMove);
            window.addEventListener('touchmove', onDragMove, { passive: false });

            window.addEventListener('mouseup', onDragEnd);
            window.addEventListener('touchend', onDragEnd);
            window.addEventListener('touchcancel', onDragEnd);

            document.addEventListener('click', function (e) {
                if (!wrap.contains(e.target)) {
                    wrap.classList.remove('open');
                }
            });

            window.addEventListener('resize', function () {
                const rect = wrap.getBoundingClientRect();
                const position = clamp(rect.left, rect.top);

                setPosition(position.x, position.y);
            });

            const initial = readStoredPosition() ?? (() => {
                const size = bubbleSize();

                return clamp(window.innerWidth - size - 22, window.innerHeight - size - 90);
            })();

            setPosition(initial.x, initial.y);
        })();
    </script>

    @stack('scripts')
</body>

</html>