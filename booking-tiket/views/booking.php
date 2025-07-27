<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pilih Kursi - Booking Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #15151a; color: #fff; }
    .seat { width:32px; height:32px; background:#444; margin:6px; border-radius:8px; text-align:center; line-height:32px; cursor:pointer; transition:background .2s; display:inline-block; }
    .seat.selected { background:#6c5ce7; color:#fff; }
    .seat.booked { background:#aaa; color:#fff; cursor:not-allowed; }
    .screen { height:20px; background: #444; border-radius:10px; margin: 22px auto 24px auto; width: 60%; color:#b2bec3; text-align:center; font-size:15px; letter-spacing:2px; }
    .seat-row { margin-bottom: 12px; }
    .btn-book { background: #6c5ce7; border: none; }
    .btn-book:hover { background: #00b894; }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="row mb-4">
    <div class="col-md-7">
      <div class="bg-dark rounded-4 p-4 mb-3 shadow">
        <h4 class="fw-bold mb-2">Pilih Kursi</h4>
        <div class="screen mb-4">LAYAR</div>
        <!-- Seat Map -->
        <form method="POST">
          <?php foreach ($seat_map as $row => $seats): ?>
            <div class="seat-row">
              <?php foreach ($seats as $seat): ?>
                <span class="seat <?= $seat['status']==='booked' ? 'booked' : '' ?>"
                      data-seat="<?= $seat['id'] ?>"
                      style="user-select:none;">
                  <?= htmlspecialchars($seat['seat_number']) ?>
                  <input type="checkbox" name="seats[]" value="<?= $seat['id'] ?>" hidden <?= $seat['status']==='booked'?'disabled':'' ?> />
                </span>
              <?php endforeach; ?>
            </div>
          <?php endforeach; ?>
          <div class="mt-4">
            <button type="submit" class="btn btn-book px-5" name="booking"<?= $all_booked ? ' disabled' : '' ?>>Booking Sekarang</button>
          </div>
        </form>
        <div class="mt-3 small">
          <span class="seat"></span> Tersedia &nbsp;
          <span class="seat booked"></span> Terisi &nbsp;
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="bg-dark rounded-4 p-4 shadow">
        <h5 class="fw-bold mb-3">Detail Jadwal</h5>
        <div><b><?= htmlspecialchars($movie['title']) ?></b></div>
        <div>Studio: <?= htmlspecialchars($schedule['studio']) ?></div>
        <div>Tanggal: <?= htmlspecialchars(date('d M Y', strtotime($schedule['tanggal']))) ?></div>
        <div>Jam: <?= htmlspecialchars(substr($schedule['jam'],0,5)) ?></div>
        <div>Harga: <b>Rp<?= number_format($schedule['harga'],0,',','.') ?></b> / kursi</div>
      </div>
    </div>
  </div>
</div>
<script>
const seatEls = document.querySelectorAll('.seat:not(.booked)');
seatEls.forEach(seat => {
  seat.addEventListener('click', function() {
    const cb = this.querySelector('input[type=checkbox]');
    if (cb) {
      cb.checked = !cb.checked;
      seat.classList.toggle('selected', cb.checked);
    }
  });
});
</script>
</body>
</html>
