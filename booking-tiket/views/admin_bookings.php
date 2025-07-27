<div>
  <h4 class="mb-3">Semua Booking Tiket</h4>
  <table class="table table-dark table-striped">
    <thead>
      <tr><th>User</th><th>Film</th><th>Studio</th><th>Tanggal</th><th>Jam</th><th>Kursi</th><th>Total</th><th>Status</th></tr>
    </thead>
    <tbody>
    <?php foreach($bookings as $b): ?>
      <tr>
        <td><?= htmlspecialchars($b['user_name']) ?></td>
        <td><?= htmlspecialchars($b['movie_title']) ?></td>
        <td><?= htmlspecialchars($b['studio']) ?></td>
        <td><?= htmlspecialchars($b['tanggal']) ?></td>
        <td><?= htmlspecialchars(substr($b['jam'],0,5)) ?></td>
        <td><?= htmlspecialchars(implode(', ', $b['seats'])) ?></td>
        <td>Rp<?= number_format($b['total'],0,',','.') ?></td>
        <td>
          <span class="badge <?= 
            $b['payment_status']==='paid' ? 'bg-success' :
            ($b['payment_status']==='pending' ? 'bg-warning text-dark' : 'bg-secondary')
          ?>">
            <?= strtoupper($b['payment_status']) ?>
          </span>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
