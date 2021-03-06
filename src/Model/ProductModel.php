<?php 
  namespace Source\Model;

  use Source\Config\Database;

  class ProductModel extends Database {
    //table name
    protected $table = 'products';
    
    //contructor

    public function __construct() {
      parent::__construct();
    }

    // function too get products
    public function read() {

      // select query
      $query = 'SELECT  
                  p.product_id, 
                  p.name, p.quantity_in_stock, 
                  p.unit_price
                FROM ' . $this->table . ' p
                ORDER BY
                  p.product_id ASC';
      
      //execute query

      $stmt= $this->conn->query($query);

      return $stmt ;
    }
  }