<?php defined('APP') or die('No direct script access allowed'); ?>
<?php
$tgl = date('d M Y', strtotime($booking['tanggal']));
$jam = substr($booking['jam'], 0, 5);
?> 
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembayaran Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #181822; color: #fff; }
    .card { background: #23232b; border: none; }
    .btn-pay { background: #6c5ce7; border: none; }
    .btn-pay:hover { background: #00b894; }
    .qris-img { width: 170px; border-radius: 12px; background: #fff; box-shadow: 0 4px 16px #0003; margin-bottom: 18px; }
    .total-box { background: #fff; color: #181822; border-radius: 8px; font-weight: bold; font-size: 1.4rem; padding: 10px 0 6px 0; letter-spacing:1px; box-shadow:0 2px 6px #0001; margin-bottom:20px; }
    .label { background: #3567d1; color:#fff; border-radius: 4px; font-weight:bold; padding:2px 8px; margin-right:8px; }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
          <h3 class="fw-bold mb-4 text-center" style="color:#3377ff; background:#1020501A; border-radius:6px;">Pembayaran</h3>
          <div class="mb-3">
            <span class="label">Film:</span>
            <span class="text-light"><?= htmlspecialchars($booking['title']) ?></span>
            </div>
          <div class="mb-3">
            <span class="label">Studio:</span>
            <span class="text-light"><?= htmlspecialchars($booking['studio']) ?></span>
            </div>
          <div class="mb-3">
            <span class="label">Tanggal/Jam:</span>
            <span class="text-light"><?= $tgl ?>, <?= $jam ?></span>
            </div>

          <div class="text-center">
            <img src="/assets/img/qris.png" alt="Kode QRIS" class="qris-img">
            <div class="small text-secondary mb-2">Scan kode QRIS untuk pembayaran</div>
          </div>

          <div class="total-box text-center mb-3">
            Total Bayar: Rp<?= number_format($booking['total'],0,',','.') ?>
          </div>

          <form method="POST">
            <button type="submit" name="pay" class="btn btn-pay w-100 py-2 fs-5">Bayar Sekarang</button>
          </form>
          <div class="text-center mt-3">
            <a href="<?= BASE_URL ?>user/dashboard" class="btn btn-link text-warning fs-5 text-decoration-underline">Kembali ke Dashboard</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>