<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User TI - Daftar Proyektor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #3b5998;
            --secondary: #6d84b4;
            --success: #4caf50;
            --info: #2196f3;
            --warning: #ff9800;
            --danger: #f44336;
            --light: #f8f9fa;
            --dark: #343a40;
            --gray: #6c757d;
            --sidebar-width: 250px;
            --text-light: #6c757d;
            --text-dark: #495057;
            --bg-light: #f5f8fa;
            --bg-card: #ffffff;
            --border-light: #e9ecef;
        }

        /* Dark Mode Variables - KONSISTEN dengan template asli */
        .dark-mode {
            --primary: #4a6fa5;
            --secondary: #5d7ba6;
            --light: #1a1d23;
            --dark: #f0f0f0;
            --bg-light: #121212;
            --bg-card: #1e1e1e;
            --text-dark: #e0e0e0;
            --text-light: #a0a0a0;
            --border-light: #333;
            --gray: #8b8b8b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Sidebar Styles - KONSISTEN */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100%;
            background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .dark-mode .sidebar {
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            flex-shrink: 0;
        }

        .sidebar-logo {
            font-size: 2.5rem;
            margin-bottom: 10px;
            opacity: 0.9;
        }

        .sidebar-menu {
            flex: 1;
            overflow-y: auto;
            padding: 20px 0;
        }

        .sidebar-menu::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-menu::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .sidebar-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .menu-item:hover,
        .menu-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid white;
        }

        .menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            opacity: 0.8;
            flex-shrink: 0;
        }

        .menu-item span {
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s;
            min-height: 100vh;
        }

        /* Header - KONSISTEN */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--bg-card);
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            border: 1px solid var(--border-light);
        }

        .dark-mode .header {
            background: var(--bg-card);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .search-bar {
            position: relative;
            width: 300px;
        }

        .search-bar i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid var(--border-light);
            border-radius: 30px;
            outline: none;
            transition: all 0.3s;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .search-bar input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(59, 89, 152, 0.1);
        }

        .dark-mode .search-bar input {
            background-color: #2a2a2a;
            border-color: var(--border-light);
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .theme-toggle {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-light);
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--text-dark);
            border: none;
        }

        .theme-toggle:hover {
            background: #e4e6eb;
            color: var(--primary);
        }

        .dark-mode .theme-toggle {
            background: #2a2a2a;
            color: var(--text-dark);
        }

        .dark-mode .theme-toggle:hover {
            background: #3a3a3a;
            color: var(--primary);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Page Title - KONSISTEN */
        .page-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title h1 {
            color: var(--dark);
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 1.8rem;
        }

        .page-title p {
            color: var(--text-light);
            margin: 0;
        }

        /* Stats Cards - KONSISTEN */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: 8px;
            padding: 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            border: 1px solid var(--border-light);
            cursor: pointer;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .dark-mode .stat-card {
            background: var(--bg-card);
            border-color: var(--border-light);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .stat-card.active {
            border: 2px solid var(--primary);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.5rem;
            color: white;
            opacity: 0.9;
        }

        .stat-icon.total { background: var(--primary); }
        .stat-icon.tersedia { background: #66bb6a; }
        .stat-icon.dipinjam { background: #ffb74d; }
        .stat-icon.rusak { background: #ef5350; }

        .stat-info h3 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
        }

        .stat-info p {
            margin: 0;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Filter Section - DIUBAH dari table header */
        .filter-section {
            background: var(--bg-card);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-light);
        }

        .dark-mode .filter-section {
            background: var(--bg-card);
            border-color: var(--border-light);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .filter-group label {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-light);
            margin-bottom: 5px;
        }

        .filter-group select,
        .filter-group input {
            padding: 10px 12px;
            border: 1px solid var(--border-light);
            border-radius: 6px;
            background: var(--bg-card);
            font-size: 0.9rem;
            color: var(--text-dark);
            width: 100%;
        }

        .dark-mode .filter-group select,
        .dark-mode .filter-group input {
            background: #2a2a2a;
            border-color: var(--border-light);
            color: var(--text-dark);
        }

        .filter-group select:focus,
        .filter-group input:focus {
            border-color: var(--primary);
            outline: none;
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(59, 89, 152, 0.2);
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(59, 89, 152, 0.3);
        }

        .btn-outline {
            border: 1px solid var(--primary);
            color: var(--primary);
            background: transparent;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        /* Projector Grid - DIUBAH dari table */
        .projector-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .projector-card {
            background: var(--bg-card);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid var(--border-light);
        }

        .projector-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .dark-mode .projector-card {
            background: var(--bg-card);
            border-color: var(--border-light);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .projector-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-light);
            background: var(--bg-light);
        }

        .dark-mode .projector-header {
            background: #252525;
            border-color: var(--border-light);
        }

        .projector-kode {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
        }

        .projector-model {
            font-size: 1rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        .projector-body {
            padding: 20px;
        }

        .projector-spec {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-light);
        }

        .spec-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .spec-value {
            color: var(--text-dark);
            font-weight: 500;
        }

        .projector-footer {
            padding: 15px 20px;
            background: var(--bg-light);
            border-top: 1px solid var(--border-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dark-mode .projector-footer {
            background: #252525;
            border-color: var(--border-light);
        }

        /* Status Badges - KONSISTEN */
        .badge {
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: 500;
            font-size: 0.8rem;
            display: inline-block;
        }

        .status-tersedia {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .dark-mode .status-tersedia {
            background: #1b5e20;
            color: #a5d6a7;
        }

        .status-dipinjam {
            background: #fff8e1;
            color: #ff8f00;
        }

        .dark-mode .status-dipinjam {
            background: #5d4037;
            color: #ffcc80;
        }

        .status-rusak {
            background: #ffebee;
            color: #c62828;
        }

        .dark-mode .status-rusak {
            background: #b71c1c;
            color: #ffcdd2;
        }

        /* Detail Button - DIUBAH dari action buttons */
        .btn-detail {
            background: var(--primary);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
        }

        .btn-detail:hover {
            background: var(--secondary);
            color: white;
            transform: translateY(-1px);
        }

        /* Empty State - KONSISTEN */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-light);
            background: var(--bg-card);
            border-radius: 8px;
            grid-column: 1 / -1;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--text-light);
            opacity: 0.5;
        }

        /* Pagination - KONSISTEN */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination {
            margin: 0;
        }

        .page-link {
            color: var(--primary);
            border: 1px solid var(--border-light);
            background: var(--bg-card);
        }

        .page-link:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
        }

        .dark-mode .page-link {
            background: var(--bg-card);
            border-color: var(--border-light);
            color: var(--text-dark);
        }

        .dark-mode .page-link:hover {
            background: var(--primary);
            color: white;
        }

        /* Menu Toggle untuk Mobile - KONSISTEN */
        .menu-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1001;
            display: none;
        }

        /* Responsive - KONSISTEN */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }

            .sidebar-header h2,
            .menu-item span {
                display: none;
            }

            .menu-item {
                justify-content: center;
                padding: 15px;
            }

            .menu-item i {
                margin-right: 0;
            }

            .main-content {
                margin-left: 70px;
            }

            .header {
                flex-direction: column;
                gap: 15px;
            }

            .search-bar {
                width: 100%;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .filter-form {
                grid-template-columns: 1fr;
            }

            .projector-grid {
                grid-template-columns: 1fr;
            }

            .menu-toggle {
                display: flex;
            }
        }

        /* Dark Mode Transition - SMOOTH */
        body,
        .header,
        .filter-section,
        .stat-card,
        .projector-card,
        .page-link,
        .search-bar input,
        .filter-group select,
        .filter-group input {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-laptop-code"></i>
            </div>
            <h2>Lab TIK</h2>
        </div>

        <div class="sidebar-menu">
            <a href="{{ route('user.dashboard') }}" class="menu-item">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('user.projectors.index') }}" class="menu-item active">
                <i class="fas fa-video"></i>
                <span>Daftar Proyektor</span>
            </a>
            <a href="/user/riwayat" class="menu-item">
                <i class="fas fa-history"></i>
                <span>Riwayat Saya</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari kode/merk/model..." id="globalSearch">
            </div>

            <div class="user-actions">
                <div class="theme-toggle" id="theme-toggle">
                    <i class="fas fa-moon"></i>
                </div>

                <div class="user-profile">
                    <div class="user-avatar">U</div>
                    <div>
                        <div>User Lab</div>
                        <div style="font-size: 0.8rem; color: var(--text-light);">Teknologi Informasi</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Title -->
        <div class="page-title">
            <div>
                <h1>Daftar Proyektor</h1>
                <p>Lihat ketersediaan proyektor Lab Teknologi Informasi</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card {{ !request('status') ? 'active' : '' }}" onclick="filterByStatus('')">
                <div class="stat-icon total">
                    <i class="fas fa-video"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $totalCount ?? 0 }}</h3>
                    <p>Total Proyektor</p>
                </div>
            </div>
            <div class="stat-card {{ request('status') == 'tersedia' ? 'active' : '' }}" onclick="filterByStatus('tersedia')">
                <div class="stat-icon tersedia">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $tersediaCount ?? 0 }}</h3>
                    <p>Tersedia</p>
                </div>
            </div>
            <div class="stat-card {{ request('status') == 'dipinjam' ? 'active' : '' }}" onclick="filterByStatus('dipinjam')">
                <div class="stat-icon dipinjam">
                    <i class="fas fa-hand-holding"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $dipinjamCount ?? 0 }}</h3>
                    <p>Dipinjam</p>
                </div>
            </div>
            <div class="stat-card {{ request('status') == 'rusak' ? 'active' : '' }}" onclick="filterByStatus('rusak')">
                <div class="stat-icon rusak">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $rusakCount ?? 0 }}</h3>
                    <p>Rusak</p>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form id="filterForm" method="GET" action="{{ route('user.projectors.index') }}" class="filter-form">
                <div class="filter-group">
                    <label for="search">Cari Proyektor</label>
                    <input type="text" id="search" name="search" placeholder="Kode, merk, atau model..." 
                           value="{{ request('search') }}">
                </div>
                <div class="filter-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="">Semua Status</option>
                        <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="rusak" {{ request('status') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="merk">Merk</label>
                    <select id="merk" name="merk">
                        <option value="">Semua Merk</option>
                        @foreach($merks as $merk)
                            <option value="{{ $merk }}" {{ request('merk') == $merk ? 'selected' : '' }}>{{ $merk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group">
                    <label for="sort">Urutkan</label>
                    <select id="sort" name="sort">
                        <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                        <option value="kode" {{ request('sort') == 'kode' ? 'selected' : '' }}>Kode A-Z</option>
                        <option value="merk" {{ request('sort') == 'merk' ? 'selected' : '' }}>Merk A-Z</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary" style="padding: 10px 20px;">
                        <i class="fas fa-filter"></i> Terapkan Filter
                    </button>
                </div>
                <div class="filter-group">
                    <label>&nbsp;</label>
                    <a href="{{ route('user.projectors.index') }}" class="btn btn-outline" style="padding: 10px 20px; display: inline-flex; align-items: center; gap: 5px;">
                        <i class="fas fa-refresh"></i> Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- Projector Grid -->
        <div class="projector-grid">
            @forelse($projectors as $projector)
                <div class="projector-card">
                    <div class="projector-header">
                        <div class="projector-kode">{{ $projector->kode_proyektor }}</div>
                        <div class="projector-model">{{ $projector->merk }} {{ $projector->model }}</div>
                    </div>
                    
                    <div class="projector-body">
                        <div class="projector-spec">
                            <span class="spec-label">Merk</span>
                            <span class="spec-value">{{ $projector->merk }}</span>
                        </div>
                        <div class="projector-spec">
                            <span class="spec-label">Model</span>
                            <span class="spec-value">{{ $projector->model }}</span>
                        </div>
                        <div class="projector-spec">
                            <span class="spec-label">Keterangan</span>
                            <span class="spec-value">{{ Str::limit($projector->keterangan, 30) ?: '-' }}</span>
                        </div>
                        <div class="projector-spec">
                            <span class="spec-label">Tanggal Input</span>
                            <span class="spec-value">{{ $projector->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="projector-footer">
                        <div>
                            @if($projector->status == 'tersedia')
                                <span class="badge status-tersedia">Tersedia</span>
                            @elseif($projector->status == 'dipinjam')
                                <span class="badge status-dipinjam">Dipinjam</span>
                            @else
                                <span class="badge status-rusak">Rusak</span>
                            @endif
                        </div>
                        <a href="{{ route('user.projectors.show', $projector->id) }}" class="btn-detail">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-video-slash"></i>
                    <h3>Tidak Ada Proyektor</h3>
                    <p>
                        @if(request()->anyFilled(['search', 'status', 'merk']))
                            Tidak ada proyektor yang sesuai dengan filter yang dipilih.
                        @else
                            Belum ada data proyektor yang tersedia.
                        @endif
                    </p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($projectors->hasPages())
            <div class="pagination-container">
                <nav>
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if($projectors->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Sebelumnya</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $projectors->previousPageUrl() }}{{ request()->getQueryString() ? '&' . http_build_query(request()->except('page')) : '' }}">Sebelumnya</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach($projectors->getUrlRange(1, $projectors->lastPage()) as $page => $url)
                            @if($page == $projectors->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}{{ request()->getQueryString() ? '&' . http_build_query(request()->except('page')) : '' }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if($projectors->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $projectors->nextPageUrl() }}{{ request()->getQueryString() ? '&' . http_build_query(request()->except('page')) : '' }}">Selanjutnya</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Selanjutnya</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif

        <!-- Info Jumlah Data -->
        @if($projectors->count() > 0)
            <div style="text-align: center; margin-top: 15px; color: var(--text-light); font-size: 0.9rem;">
                Menampilkan {{ $projectors->firstItem() }} - {{ $projectors->lastItem() }} dari {{ $projectors->total() }} proyektor
            </div>
        @endif

        <div class="menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Dark Mode
        const themeToggle = document.getElementById('theme-toggle');
        
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
                localStorage.setItem('darkMode', 'enabled');
            } else {
                themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
                localStorage.setItem('darkMode', 'disabled');
            }
        }

        themeToggle.addEventListener('click', toggleDarkMode);

        // Load saved theme preference
        document.addEventListener('DOMContentLoaded', function() {
            const darkMode = localStorage.getItem('darkMode');
            if (darkMode === 'enabled') {
                document.body.classList.add('dark-mode');
                themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
            }

            // Set nilai global search dari filter search
            const searchValue = document.getElementById('search').value;
            document.getElementById('globalSearch').value = searchValue;
        });

        // Auto submit filter changes
        document.getElementById('status').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });

        document.getElementById('merk').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });

        document.getElementById('sort').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });

        // Auto submit search dengan debounce
        let searchTimeout;
        document.getElementById('search').addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                document.getElementById('filterForm').submit();
            }, 800);
        });

        // Global search
        document.getElementById('globalSearch').addEventListener('input', function() {
            document.getElementById('search').value = this.value;
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                document.getElementById('filterForm').submit();
            }, 800);
        });

        // Filter dari stats cards
        function filterByStatus(status) {
            document.getElementById('status').value = status;
            document.getElementById('filterForm').submit();
        }

        // Toggle sidebar on mobile
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>