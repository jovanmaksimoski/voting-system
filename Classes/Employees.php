<?php

namespace Classes;
session_start();

require_once ("DbConnection.php");


class Employees extends DbConnection
{

    public function __construct()
    {
        parent::__construct();
    }

    public function register($name, $surname, $email, $password)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO employees (name, surname, email, password) VALUES (:name, :surname, :email, :password)";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                return header("Location: dashboard.php");
            } else {
                return "Registration failed!";
            }
        } catch (\PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {
            $sql = "SELECT * FROM employees WHERE email = :email";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $employee = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($employee && password_verify($password, $employee['password'])) {
                $_SESSION['user_name'] = $employee['name'];
                $_SESSION['logged_in'] = true;

                return true;
            } else {
                return "Invalid email or password.";
            }
        } catch (\PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
