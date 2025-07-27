<?php defined('APP') or die('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - CineBooking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #181822; color: #fff; }
    .card { background: #23232b; border: none; }
    .btn-book { background: #6c5ce7; border: none; }
    .btn-book:hover { background: #00b894; }
    label, .form-label { color: #ffe066 !important; font-weight: 500; }
    input::placeholder { color: #bababa !important; opacity: 1; }
    .small-link { color: #ffe066; text-decoration: underline; }
    .small-link:hover { color: #fdcb6e; }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
          <h3 class="fw-bold mb-4 text-center text-light">Buat Akun Baru</h3>
          <?php if (!empty($error)) echo '<div class="alert alert-danger">'.$error.'</div>'; ?>
          <form method="POST" autocomplete="off">
            <div class="mb-3">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="register" class="btn btn-book w-100 py-2 mt-1 mb-2">Register</button>
          </form>
          <div class="text-center mt-3">
            <span class="text-secondary">Sudah punya akun?</span>
            <a href="login" class="small-link">Login di sini</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
