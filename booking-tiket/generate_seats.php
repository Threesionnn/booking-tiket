<?php
require_once __DIR__.'/config/database.php'; // $pdo

$rows = ['A','B','C','D','E'];
$cols = range(1,8);

$schedules = $pdo->query("SELECT id FROM schedules")->fetchAll(PDO::FETCH_ASSOC);

foreach ($schedules as $sch) {
    $schedule_id = $sch['id'];
    foreach ($rows as $row) {
        foreach ($cols as $col) {
            $seat_number = $row . $col;
            $cek = $pdo->prepare("SELECT COUNT(*) FROM seats WHERE schedule_id=? AND seat_number=?");
            $cek->execute([$schedule_id, $seat_number]);
            if ($cek->fetchColumn() == 0) {
                $ins = $pdo->prepare("INSERT INTO seats (schedule_id, seat_number, status) VALUES (?, ?, 'available')");
                $ins->execute([$schedule_id, $seat_number]);
                echo "Inserted seat $seat_number for schedule $schedule_id<br>";
            }
        }
    }
}
echo "SELESAI!";
?>