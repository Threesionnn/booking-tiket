<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once __DIR__.'/../models/Movie.php';
class MovieController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function detail($id) {
        $movieModel = new Movie($this->pdo);
        $movie = $movieModel->find($id);

        // Ambil semua jadwal film ini
        $stmt = $this->pdo->prepare("SELECT * FROM schedules WHERE movie_id = ? ORDER BY tanggal, jam");
        $stmt->execute([$id]);
        $schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$movie) {
            echo "<h2>Film tidak ditemukan</h2>";
            return;
        }
        define('APP', 1);
        include __DIR__.'/../views/movie_detail.php';
    }
}