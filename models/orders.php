<?php

require_once("base.php");

class Orders extends Base
{

    public function createHeader($user_id, $payment_reference)
    {
        $query = $this->db->prepare("INSERT INTO 
            orders 
            (user_id, payment_reference) 
        VALUES 
            (?, ?)
        ");

        $query->execute([
            $user_id,
            $payment_reference
        ]);

        return $this->db->lastInsertId();
    }

    public function createDetail($order_id, $item)
    {
        $query = $this->db->prepare("INSERT INTO 
            orderdetails 
            (order_id, product_id, quantity, price_each) 
        VALUES 
            (?, ?, ?, ?)
        ");

        return $query->execute([
            $order_id,
            $item["product_id"],
            $item["quantity"],
            $item["price"]
        ]);
    }

    public function getPaymentRef()
    {
        return mt_rand(10000000000000, 99999999999999);
    }

    public function getCount()
    {
        $query = $this->db->prepare("SELECT 
            COUNT(*) 
        FROM 
            orders
        ");

        $query->execute();

        return $query->fetchColumn();
    }
}
