<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Tiket Bioskop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #15151a; color: #fff; }
    .navbar { background: #181822; }
    .movie-card { background: #23232b; border-radius: 18px; transition: box-shadow 0.2s; }
    .movie-card:hover { box-shadow: 0 4px 16px #0003; }
    .movie-poster { height: 340px; object-fit: cover; border-radius: 14px 14px 0 0; }
    .genre-badge { background: #3a3a4d; color: #d6bcfa; border-radius: 6px; font-size: 13px; padding: 3px 10px; }
    .btn-book { background: #6c5ce7; border: none; }
    .btn-book:hover { background: #00b894; }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg mb-5 shadow-sm">
    <div class="container">
      <a class="navbar-brand text-light fw-bold" href="/">🎬 CineBooking</a>
      <div class="ms-auto">
        <a href="login" class="btn btn-outline-light me-2">Login</a>
        <a href="register" class="btn btn-light">Register</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="d-flex justify-content-end mb-3">
      <a href="user/dashboard" class="btn btn-info fw-bold px-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-clock-history mb-1 me-1" viewBox="0 0 16 16">
          <path d="M8.515 3.879a.5.5 0 0 0-1 0V8a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 1 0 .496-.868l-3.248-1.855V3.879z"/>
          <path d="M8 16A8 8 0 1 1 16 8a8 8 0 0 1-8 8zm0-1A7 7 0 1 0 1 8a7 7 0 0 0 7 7z"/>
          <path d="M7.5 8V4h1v4h-1zm-1-6A6 6 0 1 1 1 8a6 6 0 0 1 6-6z"/>
        </svg>
        Riwayat Booking Saya
      </a>
    </div>

    <h2 class="mb-4 fw-semibold">Now Showing</h2>
    <div class="row g-4">
      <?php foreach($movies as $movie): ?>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="movie-card shadow">
          <img src="assets/img/<?= htmlspecialchars($movie['poster']) ?>" class="w-100 movie-poster" alt="<?= htmlspecialchars($movie['title']) ?>">
          <div class="p-3">
            <span class="genre-badge mb-2 d-inline-block"><?= htmlspecialchars($movie['genre']) ?></span>
            <h5 class="fw-bold mt-1 mb-2"><?= htmlspecialchars($movie['title']) ?></h5>
            <div class="small mb-1">Durasi: <?= htmlspecialchars($movie['duration']) ?> min &bull; Rating: <?= htmlspecialchars($movie['rating']) ?></div>
            <div class="text-truncate mb-3" title="<?= htmlspecialchars($movie['synopsis']) ?>">
              <?= mb_strimwidth(htmlspecialchars($movie['synopsis']), 0, 80, '...') ?>
            </div>
            <a href="movie/<?= $movie['id'] ?>" class="btn btn-book w-100">Lihat Jadwal</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>