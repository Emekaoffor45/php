<?php 
  namespace Source\Model;

  use Source\Config\Database;

  class OrderModel extends Database {
    //table name
    protected $table = 'orders';
    
    //contructor

    public function __construct() {
      parent::__construct();
    }

    // function to get orders
    public function read() {

      // select query
      $query = 'SELECT  
                  p.order_id, 
                  p.customer_id, p.order_date, 
                  p.status, p.comments, 
                  p.shipped_date, p.shipper_id
                FROM ' . $this->table . ' p
                ORDER BY
                  p.order_date DESC';
      
      //execute query

      $stmt= $this->conn->query($query);

      return $stmt ;
    }
    
  }