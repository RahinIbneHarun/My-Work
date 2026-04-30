<?php
require_once(__DIR__ . "/../../core/Database.php");

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function register($username, $email, $password) {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password)
                VALUES ('$username', '$email', '$password')";

        return $this->conn->query($sql);
    }

    public function findUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        return $this->conn->query($sql);
    }
}
?>