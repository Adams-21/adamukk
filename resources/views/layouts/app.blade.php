<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'WarungGuard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --cream: #f5efe4;
            --cream-soft: #fbf8f2;
            --cream-dark: #e8ddcc;
            --ink: #302738;
            --purple: #382747;
            --purple-soft: #574366;
            --brown: #916644;
            --brown-dark: #704a32;
            --gold: #c49a52;
            --muted: #8b818b;
            --line: #e5daca;
            --danger: #a74b45;
            --success: #557653;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--ink);
            font-family: "Segoe UI", Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: var(--cream-soft);
            border-bottom: 1px solid var(--line);
        }

        .header-inner {
            max-width: 1500px;
            min-height: 78px;
            margin: 0 auto;
            padding: 0 34px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--purple);
            flex-shrink: 0;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--purple);
            border-radius: 10px;
            background: var(--purple);
            color: var(--gold);
            font-size: 20px;
        }

        .brand-name {
            margin: 0;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -0.7px;
        }

        .brand-caption {
            margin-top: 1px;
            color: var(--muted);
            font-size: 10px;
            letter-spacing: 1.1px;
            text-transform: uppercase;
        }

        .main-navigation {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-left: auto;
        }

        .main-navigation a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 14px;
            border-bottom: 2px solid transparent;
            color: #756978;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .main-navigation a:hover {
            color: var(--purple);
        }

        .main-navigation a.active {
            border-bottom-color: var(--gold);
            color: var(--purple);
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-left: 20px;
            border-left: 1px solid var(--line);
        }

        .user-symbol {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--cream-dark);
            color: var(--purple);
        }

        .user-info strong {
            display: block;
            color: var(--purple);
            font-size: 12px;
            font-weight: 800;
        }

        .user-info span {
            display: block;
            margin-top: 1px;
            color: var(--muted);
            font-size: 11px;
        }

        .mobile-menu-button {
            display: none;
            width: 40px;
            height: 40px;
            border: 1px solid var(--line);
            border-radius: 9px;
            background: transparent;
            color: var(--purple);
            font-size: 20px;
        }

        .mobile-navigation {
            display: none;
            padding: 12px 20px 18px;
            border-top: 1px solid var(--line);
            background: var(--cream-soft);
        }

        .mobile-navigation.show {
            display: block;
        }

        .mobile-navigation a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 4px;
            border-bottom: 1px solid var(--line);
            color: var(--purple);
            font-size: 14px;
            font-weight: 600;
        }

        .page-area {
            width: 100%;
            max-width: 1500px;
            margin: 0 auto;
            padding: 38px 34px 60px;
        }

        .page-introduction {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 22px;
            border-bottom: 1px solid var(--line);
        }

        .page-title {
            margin: 0;
            color: var(--purple);
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .page-description {
            max-width: 620px;
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .page-date {
            color: var(--brown);
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .content-section {
            width: 100%;
        }

        .alert {
            border: 1px solid transparent;
            border-radius: 8px;
            font-size: 13px;
        }

        .btn {
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            padding: 10px 17px;
        }

        .btn-primary {
            border-color: var(--purple);
            background: var(--purple);
        }

        .btn-primary:hover {
            border-color: var(--purple-soft);
            background: var(--purple-soft);
        }

        .btn-success {
            border-color: var(--brown);
            background: var(--brown);
        }

        .btn-success:hover {
            border-color: var(--brown-dark);
            background: var(--brown-dark);
        }

        .btn-warning {
            border-color: var(--gold);
            background: var(--gold);
            color: var(--purple);
        }

        .btn-warning:hover {
            border-color: #aa813e;
            background: #aa813e;
            color: var(--purple);
        }

        .card {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: var(--cream-soft);
            box-shadow: none;
        }

        .card-header {
            border-bottom: 1px solid var(--line);
            background: transparent;
            color: var(--purple);
            font-weight: 800;
        }

        .form-label {
            color: var(--purple);
            font-size: 13px;
            font-weight: 700;
        }

        .form-control,
        .form-select {
            min-height: 44px;
            border: 1px solid #d9cdbd;
            border-radius: 7px;
            background: #fffdf8;
            color: var(--ink);
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);
            background: #fffdf8;
            box-shadow: 0 0 0 3px rgba(196, 154, 82, 0.13);
        }

        .table {
            --bs-table-bg: transparent;
            color: var(--ink);
        }

        .table thead th {
            padding-top: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--line);
            color: var(--purple);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .table tbody td {
            padding-top: 14px;
            padding-bottom: 14px;
            border-color: var(--line);
            vertical-align: middle;
            font-size: 13px;
        }

        .footer {
            padding: 22px 34px;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 1100px) {
            .header-inner {
                padding: 0 22px;
            }

            .main-navigation {
                gap: 0;
            }

            .main-navigation a {
                padding: 10px 9px;
                font-size: 12px;
            }

            .header-user {
                padding-left: 12px;
            }

            .user-info {
                display: none;
            }

            .page-area {
                padding: 30px 22px 45px;
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
                min-height: 70px;
            }

            .page-introduction {
                align-items: start;
                flex-direction: column;
                margin-bottom: 24px;
            }

            .page-title {
                font-size: 25px;
            }

            .page-date {
                white-space: normal;
            }
        }

        @media (max-width: 575px) {
            .header-inner {
                padding: 0 16px;
            }

            .brand-name {
                font-size: 17px;
            }

            .brand-caption {
                font-size: 9px;
            }

            .page-area {
                padding: 25px 16px 35px;
            }

            .page-title {
                font-size: 23px;
            }

            .page-description {
                font-size: 12px;
            }

            .footer {
                padding: 20px 16px;
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
                    <h1 class="brand-name">WarungGuard</h1>
                    <div class="brand-caption">Sistem Manajemen UMKM</div>
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
                    <span>Administrator</span>
                </div>
            </div>

            <button class="mobile-menu-button"
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
                <h2 class="page-title">@yield('heading', 'Dashboard')</h2>

                <p class="page-description">
                    Kelola produk, persediaan, dan transaksi usaha kamu dari satu tempat.
                </p>
            </div>

            <div class="page-date">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>
                {{ session('error') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        <section class="content-section">
            @yield('content')
        </section>
    </main>

    <footer class="footer">
        © {{ date('Y') }} WarungGuard — Sistem Manajemen UMKM
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileNavigation = document.getElementById('mobileNavigation');

        mobileMenuButton.addEventListener('click', function () {
            mobileNavigation.classList.toggle('show');

            const icon = mobileMenuButton.querySelector('i');

            if (mobileNavigation.classList.contains('show')) {
                icon.className = 'bi bi-x-lg';
            } else {
                icon.className = 'bi bi-list';
            }
        });
    </script>

    @stack('scripts')
</body>
</html>