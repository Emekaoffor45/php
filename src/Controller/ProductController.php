<?php
    namespace Source\Controller;

    use Source\Model\ProductModel;
    class ProductController  {


        //function to get products from database

        public static function getProducts() {
            // instantiate Product Model

            $productsModel = new ProductModel();
            //get Products from database
            return $productsModel->read();
        } 

    } 