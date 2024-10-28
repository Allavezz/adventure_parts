<?php

require_once("base.php");

class Orders extends Base
{
    public function getAll()
    {
        $query = $this->db->prepare("SELECT
            o.order_id,
            o.user_id,
            o.order_date,
            o.payment_date,
            o.payment_reference,
            u.email,
            COALESCE(SUM(od.quantity * od.price_each), 0) AS total_price
        FROM
            orders o
        INNER JOIN
            users u ON o.user_id = u.user_id
        LEFT JOIN
            orderdetails od ON o.order_id = od.order_id
        WHERE 
            o.payment_date IS null
        GROUP BY 
            o.order_id, o.user_id, o.order_date, o.payment_date, o.payment_reference, u.email
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function get($id)
    {
        $query = $this->db->prepare("SELECT
            order_id 
        FROM 
            orders
        WHERE 
            order_id = ?
        ");

        $query->execute([$id]);

        return $query->fetch();
    }

    public function getOrderDetails($id)
    {
        $query = $this->db->prepare("SELECT 
            product_id,
            quantity
        FROM 
            orderdetails 
        WHERE 
            order_id = ?
        ");

        $query->execute([$id]);

        return $query->fetchAll();
    }

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

    public function deleteOrder($id)
    {
        $query = $this->db->prepare("DELETE 
        FROM 
            orders
        WHERE 
            order_id = ?
        ");

        return $query->execute([$id]);
    }
}
