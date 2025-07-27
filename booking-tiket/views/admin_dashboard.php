<?php defined('APP') or die('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #181822; color: #fff; }
    .card { background: #23232b; border: none; color: #fff; }
    .table-dark tr th, .table-dark tr td { vertical-align:middle;}
    .stat-card { background: #23232b; border-radius: 16px; padding: 18px 24px; margin-bottom: 18px;}
    .stat-label { color: #888; font-size: 14px;}
    .stat-value { font-size: 2rem; font-weight: 700;}
    .btn-action { padding: 2px 12px; font-size: 14px; }
  </style>
</head>
<body>
<div class="container py-5">
  <h2 class="fw-bold mb-4 text-center">Dashboard Admin</h2>

  <!-- Statistik -->
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="stat-card text-center">
        <div class="stat-label">Total Film</div>
        <div class="stat-value"><?= isset($stats['total_movies']) ? $stats['total_movies'] : 0 ?></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card text-center">
        <div class="stat-label">Total Booking</div>
        <div class="stat-value"><?= isset($stats['total_booking']) ? $stats['total_booking'] : 0 ?></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card text-center">
        <div class="stat-label">Total User</div>
        <div class="stat-value"><?= isset($stats['total_user']) ? $stats['total_user'] : 0 ?></div>
      </div>
    </div>
  </div>

  <!-- Manajemen Film -->
  <div class="card mb-4 shadow">
    <div class="card-body">
      <h5 class="mb-3">Manajemen Film</h5>
      <div class="table-responsive">
        <table class="table table-dark table-striped align-middle rounded shadow">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul</th>
              <th>Genre</th>
              <th>Durasi</th>
              <th>Rating</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php if (empty($movies)): ?>
            <tr><td colspan="6" class="text-center text-secondary">Belum ada film.</td></tr>
          <?php else: foreach ($movies as $i => $film): ?>
            <tr>
              <td><?= $i+1 ?></td>
              <td><?= htmlspecialchars($film['title']) ?></td>
              <td><?= htmlspecialchars($film['genre']) ?></td>
              <td><?= htmlspecialchars($film['duration']) ?> min</td>
              <td><?= htmlspecialchars($film['rating']) ?></td>
              <td>
                <a href="#" class="btn btn-sm btn-info btn-action">Edit</a>
                <a href="#" class="btn btn-sm btn-danger btn-action">Hapus</a>
              </td>
            </tr>
          <?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Monitoring Booking -->
  <div class="card mb-4 shadow">
    <div class="card-body">
      <h5 class="mb-3">Monitoring Booking</h5>
      <div class="table-responsive">
        <table class="table table-dark table-striped align-middle rounded shadow">
          <thead>
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Film</th>
              <th>Tanggal</th>
              <th>Jam</th>
              <th>Kursi</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php if (empty($bookings)): ?>
            <tr><td colspan="8" class="text-center text-secondary">Belum ada booking.</td></tr>
          <?php else: foreach ($bookings as $i => $b): ?>
            <tr>
              <td><?= $i+1 ?></td>
              <td><?= htmlspecialchars($b['user_name']) ?></td>
              <td><?= htmlspecialchars($b['film']) ?></td>
              <td><?= date('d/m/Y', strtotime($b['tanggal'])) ?></td>
              <td><?= substr($b['jam'], 0, 5) ?></td>
              <td><?= htmlspecialchars($b['kursi']) ?></td>
              <td>Rp<?= number_format($b['total'], 0, ',', '.') ?></td>
              <td>
                <?php if ($b['payment_status'] == 'paid'): ?>
                  <span class="badge bg-success">Lunas</span>
                <?php else: ?>
                  <span class="badge bg-warning text-dark">Pending</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>