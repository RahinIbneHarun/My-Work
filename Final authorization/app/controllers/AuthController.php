<?php
session_start();
require_once(__DIR__ . "/../models/User.php");

class AuthController {

    public function signup() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($username) || empty($email) || empty($password)) {
                echo "All fields are required!";
            } else {

                $user = new User();

                if ($user->register($username, $email, $password)) {
                    echo "Signup successful! <a href='index.php?page=login'>Login</a>";
                    return;
                } else {
                    echo "Error!";
                }
            }
        }

        include(__DIR__ . "/../views/signup.php");
    }

    public function login() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $result = $user->findUserByEmail($email);

            if ($result->num_rows > 0) {

                $data = $result->fetch_assoc();

                if (password_verify($password, $data['password'])) {

                    $_SESSION['user'] = $data['username'];
                    header("Location: index.php?page=dashboard");
                    exit();

                } else {
                    echo "Wrong password!";
                }

            } else {
                echo "User not found!";
            }
        }

        include(__DIR__ . "/../views/login.php");
    }

    public function dashboard() {

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit();
        }

        include(__DIR__ . "/../views/dashboard.php");
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?page=login");
        exit();
    }
}
?>