<?php 
    class HomeModel
    {   
        private $conn;
        public function __construct($db){
            $this->conn = $db;
        }

        public function readHome()
        {
            $selectQuery = "SELECT * FROM homes_tbl";
            $response = $this->conn->prepare($selectQuery);
            $response->execute();
            return $response;
        }

    }
?>