<?php


namespace Classes;

use PDO;

require_once ("DbConnection.php");

class Votes
{
    private \PDO $dbConnection;

    public function __construct()
    {
        $db = new DbConnection();
        $this->dbConnection = $db->getDbConnection();
    }

    public function storeVote($voterId, $nomineeId, $categoryId, $comment) {
        try {
            $voterName = $this->getEmployeeNameById($voterId);
            $nomineeName = $this->getEmployeeNameById($nomineeId);

            $categoryName = $this->getCategoryNameById($categoryId);

            $sql = "INSERT INTO votes (voter_id, nominee_id, category_id, comment) 
                VALUES (:voter_name, :nominee_name, :category_name, :comment)";
            $stmt = $this->dbConnection->prepare($sql);

            $stmt->bindParam(':voter_name', $voterName, \PDO::PARAM_STR);
            $stmt->bindParam(':nominee_name', $nomineeName, \PDO::PARAM_STR);
            $stmt->bindParam(':category_name', $categoryName, \PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, \PDO::PARAM_STR);

            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Failed to store vote: " . $e->getMessage());
            return false;
        }
    }


    private function getEmployeeNameById($employeeId) {
        try {
            $sql = "SELECT name FROM employees WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $employeeId, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (\PDOException $e) {
            error_log("Failed to fetch employee name: " . $e->getMessage());
            return null;
        }
    }


    private function getCategoryNameById($categoryId) {
        try {
            $sql = "SELECT name FROM categories WHERE id = :id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':id', $categoryId, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (\PDOException $e) {
            error_log("Failed to fetch category name: " . $e->getMessage());
            return null;
        }
    }

}