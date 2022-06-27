<?php 
  namespace Source\Model;

  use Source\Config\Database;

  class CustomerModel extends Database {
    //table name
    protected $table = 'customers';
    
    //contructor

    public function __construct() {
      parent::__construct();
    }

    // function too get customers
    public function read() {

      // select query
      $query = 'SELECT  
                  p.customer_id, 
                  p.first_name, p.last_name, 
                  p.birth_date, p.phone, 
                  p.address, p.city
                FROM ' . $this->table . ' p
                ORDER BY
                  p.customer_id ASC';
      
      //execute query

      $stmt= $this->conn->query($query);

      return $stmt;
    }

    
    
  }