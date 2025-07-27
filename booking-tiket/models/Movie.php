<?php
class Movie {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM movies ORDER BY release_date DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM movies WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
