<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Sistem Peminjaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: #f5f7fb;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-custom {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .card-custom {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: var(--box-shadow);
            transition: transform 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(67, 97, 238, 0.4);
        }

        .table-container {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .table th {
            border: none;
            padding: 16px;
            font-weight: 600;
        }

        .table td {
            padding: 16px;
            vertical-align: middle;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .status-menunggu {
            background-color: #ffc107;
            color: #000;
        }

        .status-disetujui {
            background-color: #198754;
            color: #fff;
        }

        .status-ditolak {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            margin: 0 4px;
        }

        .empty-state {
            padding: 40px 0;
            text-align: center;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 60px;
            margin-bottom: 15px;
            color: #dee2e6;
        }

        .search-container {
            position: relative;
            margin-bottom: 20px;
        }

        .search-container i {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #6c757d;
        }

        .search-input {
            padding-left: 40px;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
        }

        .pagination-custom .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .pagination-custom .page-link {
            color: var(--primary);
            border-radius: 8px;
            margin: 0 4px;
            border: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .btn-success-custom {
            background: linear-gradient(135deg, #198754, #0f5132);
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-danger-custom {
            background: linear-gradient(135deg, #dc3545, #a71d2a);
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-success-custom:hover, .btn-danger-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
            }

            .btn-action {
                margin-bottom: 5px;
            }
            
            .action-buttons {
                display: flex;
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-user-shield me-2"></i>
                <strong>Dashboard Admin</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tasks me-1"></i> Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users me-1"></i> Pengguna
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-bar me-1"></i> Laporan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="mb-0"><i class="fas fa-tasks text-primary me-2"></i> Kelola Peminjaman</h2>
                <p class="text-muted">Kelola semua permohonan peminjaman ruangan dan proyektor</p>
            </div>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Card Filter dan Pencarian -->
        <div class="card card-custom mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="search-container">
                            <i class="fas fa-search"></i>
                            <input type="text" class="form-control search-input" id="admin-search"
                                placeholder="Cari berdasarkan peminjam, ruang, keperluan...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" id="admin-status-filter">
                            <option value="semua">Semua Status</option>
                            <option value="pending">Menunggu</option>
                            <option value="disetujui">Disetujui</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Peminjaman -->
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Peminjam</th>
                        <th>Tanggal</th>
                        <th>Ruang</th>
                        <th>Proyektor</th>
                        <th>Keperluan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjamans as $peminjaman)
                        <tr data-status="{{ $peminjaman->status }}">
                            <td class="fw-bold">{{ $loop->iteration }}</td>
                            <td>
                                <i class="fas fa-user text-info me-1"></i>
                                {{ $peminjaman->user->name ?? 'Guest' }}
                            </td>
                            <td>
                                <i class="fas fa-calendar-day text-primary me-1"></i>
                                {{ \Carbon\Carbon::parse($peminjaman->tanggal)->format('d M Y') }}
                            </td>
                            <td>
                                <i class="fas fa-door-open text-info me-1"></i>
                                {{ $peminjaman->ruang }}
                            </td>
                            <td>
                                @if($peminjaman->proyektor)
                                    <span class="badge bg-success status-badge"><i class="fas fa-check me-1"></i> Ya</span>
                                @else
                                    <span class="badge bg-secondary status-badge"><i class="fas fa-times me-1"></i> Tidak</span>
                                @endif
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($peminjaman->keperluan, 40) }}</td>
                            <td>
                                @if($peminjaman->status == 'disetujui')
                                    <span class="badge status-badge status-disetujui">
                                        <i class="fas fa-check-circle me-1"></i> Disetujui
                                    </span>
                                @elseif($peminjaman->status == 'ditolak')
                                    <span class="badge status-badge status-ditolak">
                                        <i class="fas fa-times-circle me-1"></i> Ditolak
                                    </span>
                                @else
                                    <span class="badge status-badge status-menunggu">
                                        <i class="fas fa-clock me-1"></i> Menunggu
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if($peminjaman->status == 'pending')
                                    <div class="d-flex action-buttons">
                                        <form action="{{ route('admin.peminjaman.approve', $peminjaman->id) }}" method="POST" class="me-1">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-success-custom btn-sm">
                                                <i class="fas fa-check me-1"></i> Setujui
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.peminjaman.reject', $peminjaman->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-danger-custom btn-sm">
                                                <i class="fas fa-times me-1"></i> Tolak
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <em class="text-muted">Tidak ada aksi</em>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <i class="fas fa-inbox"></i>
                                    <h4 class="mt-3">Belum ada data peminjaman</h4>
                                    <p class="text-muted">Semua permohonan peminjaman akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($peminjamans->count() > 0)
            <div class="d-flex justify-content-center mt-4">
                <nav>
                    <ul class="pagination pagination-custom">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk pencarian real-time
        document.getElementById('admin-search').addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            const statusFilter = document.getElementById('admin-status-filter').value;

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const rowStatus = row.getAttribute('data-status');
                
                // Filter berdasarkan pencarian dan status
                const textMatch = text.includes(searchText);
                const statusMatch = statusFilter === 'semua' || rowStatus === statusFilter;
                
                if (textMatch && statusMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Filter berdasarkan status
        document.getElementById('admin-status-filter').addEventListener('change', function() {
            const statusFilter = this.value;
            const searchText = document.getElementById('admin-search').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const rowStatus = row.getAttribute('data-status');
                
                // Filter berdasarkan pencarian dan status
                const textMatch = text.includes(searchText);
                const statusMatch = statusFilter === 'semua' || rowStatus === statusFilter;
                
                if (textMatch && statusMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Konfirmasi untuk aksi setujui/tolak
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const action = this.action.includes('approve') ? 'menyetujui' : 'menolak';
                if (!confirm(`Apakah Anda yakin ingin ${action} peminjaman ini?`)) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>