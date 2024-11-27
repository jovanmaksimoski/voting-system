<?php

namespace Classes;

use PDO;

require_once ("DbConnection.php");


class Categories extends DbConnection
{
    public function getCategoryName()
    {

        $conn = $this->getDbConnection();
        $query = "SELECT id, name FROM categories";
        $statement = $conn->prepare($query);

        $statement->execute();


        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }
}
