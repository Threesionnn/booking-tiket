<div>
  <h4 class="mb-3">Data Film</h4>
  <a href="/admin/movie_create" class="btn btn-success mb-3">+ Tambah Film</a>
  <table class="table table-dark table-striped">
    <thead>
      <tr><th>Judul</th><th>Genre</th><th>Durasi</th><th>Rilis</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    <?php foreach($movies as $m): ?>
      <tr>
        <td><?= htmlspecialchars($m['title']) ?></td>
        <td><?= htmlspecialchars($m['genre']) ?></td>
        <td><?= htmlspecialchars($m['duration']) ?> mnt</td>
        <td><?= htmlspecialchars($m['release_date']) ?></td>
        <td>
          <a href="/admin/movie_edit?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="/admin/movie_delete?id=<?= $m['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus film ini?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
