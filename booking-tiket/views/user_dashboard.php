<?php
defined('APP') or die('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #181822; color: #fff; }
        .card { background: #23232b; border: none; }
        .badge-paid { background: #00b894; }
        .badge-pending { background: #fdcb6e; color:#23232b; }
        .table-dark tr th, .table-dark tr td { vertical-align:middle;}
    </style>
</head>
<body>
<div class="container py-5">
    <h3 class="fw-bold mb-4 text-center">Riwayat Booking Tiket Saya</h3>
    <div class=".table-responsive">
        <table class="table table-dark table-striped align-middle rounded shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Film</th>
                    <th>Studio</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Kursi</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (empty($bookings)): ?>
                <tr><td colspan="9" class="text-center text-secondary">Belum ada booking.</td></tr>
            <?php else: foreach ($bookings as $i=>$row): ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= htmlspecialchars($row['film']) ?></td>
                    <td><?= htmlspecialchars($row['studio']) ?></td>
                    <td><?= date('d/m/Y', strtotime($row['tanggal'])) ?></td>
                    <td><?= substr($row['jam'],0,5) ?></td>
                    <td><?= htmlspecialchars(implode(', ', $row['seats'])) ?></td>
                    <td>Rp<?= number_format($row['total'],0,',','.') ?></td>
                    <td>
                        <?php if ($row['payment_status']=='paid'): ?>
                            <span class="badge badge-paid">Lunas</span>
                        <?php else: ?>
                            <span class="badge badge-pending">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/booking-tiket/?page=home" class="btn btn-sm btn-info">Home</a>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <a href="<?= BASE_URL ?>" class="btn btn-warning fw-bold px-4">Kembali ke Home</a>
    </div>
</div>
</body>
</html>