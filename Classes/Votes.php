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



    public function storeVote($voterId, $nomineeId, $categoryId, $comment)
    {
        try {
            if ($voterId === $nomineeId) {
                error_log("Failed to store vote: Employee cannot vote for themselves.");
                return false;
            }

            $sql = "INSERT INTO votes (voter_id, nominee_id, category_id, comment)
                VALUES (:voter_id, :nominee_id, :category_id, :comment)";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':voter_id', $voterId, PDO::PARAM_INT);
            $stmt->bindParam(':nominee_id', $nomineeId, PDO::PARAM_INT);
            $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Failed to store vote: " . $e->getMessage());
            return false;
        }
    }


    public function getAllVotes()
    {
        try {
            $sql = "SELECT 
                        v.id, 
                        e1.name AS voter_name, 
                        e2.name AS nominee_name, 
                        c.name AS category_name, 
                        v.comment,
                        v.created_at
                    FROM votes v
                    INNER JOIN employees e1 ON v.voter_id = e1.id
                    INNER JOIN employees e2 ON v.nominee_id = e2.id
                    INNER JOIN categories c ON v.category_id = c.id";
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Failed to fetch votes: " . $e->getMessage());
            return [];
        }
    }



}