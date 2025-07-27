<?php
if (session_status() == PHP_SESSION_NONE) session_start();
class UserController {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function dashboard() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $user_id = $_SESSION['user_id'];
        $stmt = $this->pdo->prepare("
            SELECT b.id AS booking_id, m.title AS film, s.studio, s.tanggal, s.jam, b.total, b.payment_status,
                   GROUP_CONCAT(seat.seat_number ORDER BY seat.seat_number) AS kursi
            FROM bookings b
            JOIN schedules s ON b.schedule_id = s.id
            JOIN movies m ON s.movie_id = m.id
            JOIN booking_seats bs ON b.id = bs.booking_id
            JOIN seats seat ON bs.seat_id = seat.id
            WHERE b.user_id = ?
            GROUP BY b.id
            ORDER BY b.id DESC
        ");
        $stmt->execute([$user_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $i => $b) {
            $stmt2 = $this->pdo->prepare("
                SELECT seats.seat_number FROM booking_seats 
                JOIN seats ON booking_seats.seat_id = seats.id 
                WHERE booking_seats.booking_id = ?
                ORDER BY seats.seat_number
            ");
            $stmt2->execute([$b['booking_id']]);
        $rows[$i]['seats'] = array_column($stmt2->fetchAll(PDO::FETCH_ASSOC), 'seat_number');
        }
        $bookings = $rows;
        define('APP', 1);
        include __DIR__.'/../views/user_dashboard.php';
    }
}
