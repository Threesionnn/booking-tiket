<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($movie['title']) ?> - CineBooking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #15151a; color: #fff; }
    .btn-book { background: #6c5ce7; border: none; }
    .btn-book:hover { background: #00b894; }
    .card { background: #23232b; border: none; }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="row align-items-center mb-4">
    <div class="col-md-4">
      <img src="/booking-tiket/assets/img/<?= htmlspecialchars($movie['poster']) ?>" alt="..." class="img-fluid">
    </div>
    <div class="col-md-8">
      <h2 class="fw-bold mb-2 text-light"><?= htmlspecialchars($movie['title']) ?></h2>
      <span class="badge bg-secondary mb-2"><?= htmlspecialchars($movie['genre']) ?></span>
      <div class="mb-2">Durasi: <?= htmlspecialchars($movie['duration']) ?> min | Rating: <?= htmlspecialchars($movie['rating']) ?></div>
      <p><?= nl2br(htmlspecialchars($movie['synopsis'])) ?></p>
      <a href="/booking-tiket/home" class="btn btn-secondary">Kembali</a>
    </div>
  </div>

  <hr class="my-5">
  <h4 id="jadwal" class="fw-semibold mb-3">Pilih Jadwal & Studio</h4>
  <div class="row g-3">
  <?php if (empty($schedules)): ?>
    <div class="col-12"><em>Belum ada jadwal film tersedia.</em></div>
  <?php else: foreach ($schedules as $jadwal): ?>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="card bg-dark border-secondary shadow-sm mb-3">
        <div class="card-body text-light">
          <h5 class="card-title fw-bold text-light"> <?= htmlspecialchars($jadwal['studio']) ?></h5>
          <div>Tanggal: <b><?= htmlspecialchars(date('d M Y', strtotime($jadwal['tanggal']))) ?></b></div>
          <div>Jam: <b><?= htmlspecialchars(substr($jadwal['jam'],0,5)) ?></b></div>
          <div>Harga: <b>Rp<?= number_format($jadwal['harga'],0,',','.') ?></b></div>
          <a href="/booking-tiket/booking/<?= $jadwal['id'] ?>" class="btn btn-book mt-3 w-100">Booking Seat</a>
        </div>
      </div>
    </div>
  <?php endforeach; endif; ?>
</div>
</body>
</html>