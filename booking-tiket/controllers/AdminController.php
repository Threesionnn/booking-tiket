<?php
if (session_status() == PHP_SESSION_NONE) session_start();

class AdminController {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function dashboard() {
        // Cek hak akses (misal: role = 'admin')
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }
        // Statistik, jumlah film/jadwal/booking
        $total_movies = $this->pdo->query("SELECT COUNT(*) FROM movies")->fetchColumn();
        $total_booking = $this->pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn();
        $total_user = $this->pdo->query("SELECT COUNT(*) FROM users WHERE role='user'")->fetchColumn();

        $stats = [
        'total_movies' => $total_movies,
        'total_booking' => $total_booking,
        'total_user' => $total_user
        ];

        $movies = $this->pdo->query("SELECT * FROM movies")->fetchAll(PDO::FETCH_ASSOC);

    // Semua booking
        $bookings = $this->pdo->query("
            SELECT b.*, u.name as user_name, m.title as film, s.tanggal, s.jam,
                GROUP_CONCAT(seat.seat_number ORDER BY seat.seat_number) as kursi
            FROM bookings b
            JOIN users u ON b.user_id = u.id
            JOIN schedules s ON b.schedule_id = s.id
            JOIN movies m ON s.movie_id = m.id
            JOIN booking_seats bs ON b.id = bs.booking_id
            JOIN seats seat ON bs.seat_id = seat.id
            GROUP BY b.id
            ORDER BY b.id DESC
        ")->fetchAll(PDO::FETCH_ASSOC);

        define('APP', 1); 
        include __DIR__.'/../views/admin_dashboard.php';
    }

    public function movies() {
        // List data film
        $stmt = $this->pdo->query("SELECT * FROM movies ORDER BY id DESC");
        $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__.'/../views/admin_movies.php';
    }

    public function addMovie() {
        // Form tambah film (handle POST)
        // ...
    }

    // Tambahkan fungsi editMovie, deleteMovie dsb

    public function schedules() {
        // List jadwal film (join movie)
        $stmt = $this->pdo->query("SELECT s.*, m.title FROM schedules s JOIN movies m ON s.movie_id = m.id ORDER BY s.tanggal, s.jam");
        $schedules = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__.'/../views/admin_schedules.php';
    }

    // Tambahkan fungsi addSchedule, editSchedule, deleteSchedule dsb

    public function bookings() {
        // List semua booking user
        $stmt = $this->pdo->query(
            "SELECT b.*, u.name, m.title, s.tanggal, s.jam, s.studio
             FROM bookings b
             JOIN users u ON b.user_id=u.id
             JOIN schedules s ON b.schedule_id=s.id
             JOIN movies m ON s.movie_id=m.id
             ORDER BY b.id DESC"
        );
        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__.'/../views/admin_bookings.php';
    }
}