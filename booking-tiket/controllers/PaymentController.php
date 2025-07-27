<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once __DIR__.'/../config/config.php';

class PaymentController {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function index($booking_id) {
        $stmt = $this->pdo->prepare("SELECT b.*, s.tanggal, s.jam, s.studio, m.title 
            FROM bookings b
            JOIN schedules s ON b.schedule_id = s.id
            JOIN movies m ON s.movie_id = m.id
            WHERE b.id=? AND b.user_id=?");
        $stmt->execute([$booking_id, $_SESSION['user_id']]);
        $booking = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$booking) die("Booking tidak ditemukan!");

        if (isset($_POST['pay'])) {
            $this->pdo->prepare("UPDATE bookings SET payment_status='paid' WHERE id=?")->execute([$booking_id]);
            header("Location: ".BASE_URL."user/dashboard?pay=success");
            exit;
        }
        define('APP', 1);
        include __DIR__.'/../views/payment.php';
    }
}
