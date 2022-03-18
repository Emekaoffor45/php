<?php 

  //Get Database Details

    require_once '../config/dbCredentials.php';

    class Database {
      protected $conn;
      
      //connect to database

      public function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
      
        // Check connection
        if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
        }


        return $this->conn;
      }

      
    }