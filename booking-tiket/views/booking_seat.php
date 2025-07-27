<?php defined('APP') or die('No direct script access allowed'); ?>
<?php
$rows = ['A','B','C','D','E'];
$cols = range(1, 8);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pilih Kursi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .seat-map { display: flex; flex-direction: column; gap: 12px; align-items:center; }
    .seat-row { display: flex; gap: 12px; }
    .seat {
      width: 38px; height: 38px; border-radius: 8px;
      background: #444; color: #fff; display: flex; align-items: center; justify-content: center;
      cursor: pointer; border: none; font-weight: bold; transition: .2s;
    }
    .seat.selected { background: #6c5ce7; }
    .seat.booked { background: #636e72; cursor: not-allowed; opacity: .7; }
    .seat:hover:not(.booked):not(.selected) { background: #00b894; }
    .screen { background: #fff3; color: #fff; border-radius: 8px; text-align: center; padding: 5px; margin-bottom: 18px; width: 100%; }
  </style>
</head>
<body>
<div class="container py-5">
  <h3 class="text-center mb-4 fw-bold">Pilih Kursi</h3>

  <?php if (!empty($msg)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($msg) ?></div>
  <?php endif; ?>

  <div class="mx-auto" style="max-width:430px;">
    <div class="bg-white text-dark rounded px-3 py-2 mb-4 fw-bold text-center shadow-sm" style="letter-spacing:2px;">
      LAYAR BIOSKOP
    </div>
    <div class="seat-map mb-4">
      <?php foreach ($rows as $row): ?>
        <div class="seat-row">
          <?php foreach ($cols as $col): 
            $code = $row . $col;
            $seat = null;
            foreach ($seat_map[$row] ?? [] as $s) {
              if ($s['seat_number'] === $code) { $seat = $s; break; }
            }
            $seat_id = $seat ? $seat['id'] : '';
            $booked = $seat && $seat['status']==='booked';
          ?>
            <button type="button"
              class="seat<?= $booked ? ' booked' : '' ?>"
              data-seat="<?= $code ?>"
              data-seat-id="<?= $seat_id ?>"
              <?= $booked ? 'disabled' : '' ?>>
              <?= $code ?>
            </button>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>

  <form method="POST" id="bookingForm">
    <input type="hidden" name="seats" id="selectedSeats">
    <button type="submit" name="booking" class="btn btn-book w-100">Booking Sekarang</button>
  </form>

  <div class="text-center mt-3">
    <a href="<?= BASE_URL ?>movie/<?= htmlspecialchars($schedule['movie_id']) ?>" class="btn btn-link text-warning text-decoration-underline">
      ← Kembali ke Detail Film
    </a>
</div>
<script>
  let selected = [];
  document.querySelectorAll('.seat:not(.booked)').forEach(btn => {
    btn.addEventListener('click', function() {
      const seat = this.dataset.seat;
      if (this.classList.contains('selected')) {
        this.classList.remove('selected');
        selected = selected.filter(s => s !== seat);
      } else {
        this.classList.add('selected');
        selected.push(seat);
      }
      document.getElementById('selectedSeats').value = selected.join(',');
    });
  });
</script>
</body>
</html>
