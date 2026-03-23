<?php 
    class UserModel
    {   
        private $conn;
        public function __construct($db){
            $this->conn = $db;
        }

        public function createUser($firstName,$lastName, $homeID):bool{
            $insertQuery = "INSERT INTO users_tbl(firstName, lastName, homeID, createdAt, updatedAt) VALUES (:firstName, :lastName, :homeID, :createdAt, :updatedAt)";

            $dateNow = date('Y-m-d H:i:s');         
            $response = $this->conn->prepare($insertQuery);
            $response->bindParam(":firstName",$firstName);
            $response->bindParam(":lastName",$lastName);
            $response->bindParam(":homeID",$homeID);
            $response->bindParam(":createdAt",$dateNow);
            $response->bindParam(":updatedAt",$dateNow);
            return $response->execute();
        }

        public function readUser()
        {
            $selectQuery = "SELECT * FROM users_tbl";
            $response = $this->conn->prepare($selectQuery);
            $response->execute();
            return $response;
        }

        public function readAdvancedUser()
        {
            $selectQuery = "SELECT * FROM users_tbl INNER JOIN homes_tbl ON users_tbl.homeID = homes_tbl.homeID";
            $response = $this->conn->prepare($selectQuery);
            $response->execute();
            return $response;
        }

        public function updateUser($userID, $firstName, $lastName, $homeID)
        {
            //Query
            $updateQuery = "UPDATE users_tbl SET firstName = :firstName, lastName = :lastName, homeID = :homeID, updatedAt = :updatedAt  WHERE userID = :userID";

            //Preparing the response
            $response = $this->conn->prepare($updateQuery);

            //Binding the parameters
            $dateNow = date('Y-m-d H:i:s');
            $response->bindParam(":firstName",$firstName);
            $response->bindParam(":lastName",$lastName);
            $response->bindParam(":homeID",$homeID);
            $response->bindParam(":updatedAt", $dateNow);
            $response->bindParam(":userID",$userID);

            $response->execute();
            return $response;
        }

        public function deleteUser($userID)
        {
            $deleteQuery = "DELETE FROM users_tbl WHERE userID = :userID";
            $response = $this->conn->prepare($deleteQuery);
            $response->bindParam(":userID",$userID);
            $response->execute();
            return $response;
        }
    }
?>