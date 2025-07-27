<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once __DIR__.'/../models/Movie.php';
require_once __DIR__.'/../config/config.php'; 

class BookingController {
    private $pdo;

    public function __construct($pdo) { $this->pdo = $pdo; }

    public function index($schedule_id) {

        $stmt = $this->pdo->prepare("SELECT s.*, m.title FROM schedules s JOIN movies m ON s.movie_id=m.id WHERE s.id=?");
        $stmt->execute([$schedule_id]);
        $schedule = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$schedule) die("Jadwal tidak ditemukan");

        $stmt = $this->pdo->prepare("SELECT * FROM seats WHERE schedule_id=? ORDER BY seat_number");
        $stmt->execute([$schedule_id]);
        $seats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $seat_map = [];
        foreach ($seats as $s) {
            $row = strtoupper(substr($s['seat_number'],0,1));
            $seat_map[$row][] = $s;
        }

        $all_booked = count(array_filter($seats, fn($x)=>$x['status']==='booked')) === count($seats);

        $msg = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking'])) {
            $selected = isset($_POST['seats']) ? explode(',', $_POST['seats']) : [];
            if (empty($selected) || empty($selected[0])) {
                $msg = "Silakan pilih kursi!";
            } else {
                try {
                    $this->pdo->beginTransaction();

                    $user_id = $_SESSION['user_id'] ?? null;
                    if (!$user_id) throw new Exception('Anda harus login.');

                    $seat_count = count($selected);
                    $total = $seat_count * $schedule['harga'];

                    $stmt = $this->pdo->prepare("INSERT INTO bookings (user_id, schedule_id, total, payment_status) VALUES (?, ?, ?, 'pending')");
                    $stmt->execute([$user_id, $schedule['id'], $total]);
                    $booking_id = $this->pdo->lastInsertId();

                    $stmtIns = $this->pdo->prepare("INSERT INTO booking_seats (booking_id, seat_id) VALUES (?, ?)");
                    $stmtUpd = $this->pdo->prepare("UPDATE seats SET status='booked' WHERE id=? AND status='available'");

                    foreach ($selected as $seat_code) {
                        $stmtSeat = $this->pdo->prepare("SELECT id FROM seats WHERE schedule_id=? AND seat_number=? AND status='available' LIMIT 1");
                        $stmtSeat->execute([$schedule_id, $seat_code]);
                        $seat = $stmtSeat->fetch(PDO::FETCH_ASSOC);
                        if ($seat) {
                            $seat_id = $seat['id'];
                            $stmtIns->execute([$booking_id, $seat_id]);
                            $stmtUpd->execute([$seat_id]);
                        }
                    }

                    $this->pdo->commit();

                    header("Location: " . BASE_URL . "payment/$booking_id");
                    exit;
                } catch (Exception $e) {
                    $this->pdo->rollBack();
                    $msg = "Gagal booking: " . $e->getMessage();
                }
            }
        }
        define('APP', 1); 
        include __DIR__.'/../views/booking_seat.php';
    }

}
