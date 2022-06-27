<?php
    namespace Source\Controller;

    use Source\Model\OrderModel;
    class OrderController  {

        public static function getOrders() {
            // instantiate Order Model

            $orderModel = new OrderModel();
            //get Products from database
            return $orderModel->read();
        }
    } 