<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../config/config.php';

class AuthController {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function login() {
        $error = '';
        if (isset($_POST['login'])) {
            $userModel = new User($this->pdo);
            $user = $userModel->findByEmail($_POST['email'] ?? '');
            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                if ($user['role'] === 'admin') {
                    header('Location: ' . BASE_URL . 'admin/dashboard');
                } else {
                    header('Location: ' . BASE_URL . 'home');
                }
                exit;
            } else {
                $error = 'Email atau password salah!';
            }
        }
        define('APP', 1);
        include __DIR__.'/../views/login.php';
    }

    public function register() {
        $error = '';
        if (isset($_POST['register'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new User($this->pdo);
            if ($userModel->findByEmail($email)) {
                $error = 'Email sudah terdaftar!';
            } else {
                $hashed = password_hash($password, PASSWORD_BCRYPT);
                $userModel->create($name, $email, $hashed);
                header('Location: ' . BASE_URL . 'login?register=success');
                exit;
            }
        }
        define('APP', 1);
        include __DIR__.'/../views/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
        exit;
    }
}
