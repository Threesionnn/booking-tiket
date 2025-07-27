<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once __DIR__.'/../models/Movie.php';
class HomeController {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function index() {
        $movieModel = new Movie($this->pdo);
        $movies = $movieModel->getAll();
        define('APP', 1);
        include __DIR__.'/../views/home.php';
    }
}
