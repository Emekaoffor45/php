<?php
    namespace Source\Controller;

    use Source\Model\CustomerModel;

    class CustomerController  {

        public static function getCustomers() {
            // instantiate Customer Model

            $customerModel = new CustomerModel();
            //get Products from database
            return $customerModel->read();
        } 

        
    } 