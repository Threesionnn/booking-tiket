<div>
  <h4 class="mb-3">Data Jadwal Film</h4>
  <a href="/admin/schedule_create" class="btn btn-success mb-3">+ Tambah Jadwal</a>
  <table class="table table-dark table-striped">
    <thead>
      <tr><th>Film</th><th>Studio</th><th>Tanggal</th><th>Jam</th><th>Harga</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    <?php foreach($schedules as $s): ?>
      <tr>
        <td><?= htmlspecialchars($s['title']) ?></td>
        <td><?= htmlspecialchars($s['studio']) ?></td>
        <td><?= htmlspecialchars($s['tanggal']) ?></td>
        <td><?= htmlspecialchars(substr($s['jam'],0,5)) ?></td>
        <td>Rp<?= number_format($s['harga'],0,',','.') ?></td>
        <td>
          <a href="/admin/schedule_edit?id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="/admin/schedule_delete?id=<?= $s['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus jadwal ini?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
