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

            $sql = "INSERT INTO votes (voter_id, voter_name, nominee_id, nominee_name, category_id, category_name, comment)
                VALUES (:voter_id, :voter_name, :nominee_id, :nominee_name, :category_id, :category_name, :comment)";
            $stmt = $this->dbConnection->prepare($sql);

            $stmt->bindParam(':voter_id', $voterId, \PDO::PARAM_INT);
            $stmt->bindParam(':voter_name', $voterName, \PDO::PARAM_STR);
            $stmt->bindParam(':nominee_id', $nomineeId, \PDO::PARAM_INT);
            $stmt->bindParam(':nominee_name', $nomineeName, \PDO::PARAM_STR);
            $stmt->bindParam(':category_id', $categoryId, \PDO::PARAM_INT);
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

    public function getAllVotes() {

            $sql = "SELECT v.id, e1.name AS voter_name, e2.name AS nominee_name, c.name AS category_name, v.comment 
                    FROM votes v
                    JOIN employees e1 ON v.voter_id = e1.id
                    JOIN employees e2 ON v.nominee_id = e2.id
                    JOIN categories c ON v.category_id = c.id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }


}