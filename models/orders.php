<?php

require_once("base.php");

class Orders extends Base
{
    public function getFullOrder($id)
    {
        $query = $this->db->prepare("SELECT
            o.order_id,
            o.user_id,
            o.order_date,
            o.payment_date,
            o.shipping_date,
            o.delivered_date,
            o.payment_reference,
            u.name,
            u.email,
            u.street_address,
            u.city,
            u.postal_code,
            u.country,
            u.phone,
            od.product_id,
            od.quantity,
            od.price_each,
            p.product_name,
            (od.quantity * od.price_each) AS line_total
        FROM
            orders o
        INNER JOIN
            users u ON o.user_id = u.user_id
        INNER JOIN
            orderdetails od ON o.order_id = od.order_id 
        INNER JOIN
            products p ON od.product_id = p.product_id
        WHERE 
            o.order_id = ?
        ");

        $query->execute([$id]);

        return $query->fetchAll();
    }

    public function getUnpaidAll()
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
            o.payment_date IS NULL
        GROUP BY 
            o.order_id, o.user_id, o.order_date, o.payment_date, o.payment_reference, u.email
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getPaidAll()
    {
        $query = $this->db->prepare("SELECT
            o.order_id,
            o.user_id,
            u.email,
            o.order_date,
            o.payment_date
        FROM 
            orders o
        INNER JOIN 
            users u ON o.user_id = u.user_id 
        WHERE 
            o.payment_date IS NOT NULL AND o.shipping_date IS NULL
        ");

        $query->execute();

        return $query->fetchAll();
    }

    public function getShippedAll()
    {
        $query = $this->db->prepare("SELECT
        o.order_id,
            o.user_id,
            u.email,
            o.order_date,
            o.payment_date,
            o.shipping_date,
            o.delivered_date
        FROM 
            orders o
        INNER JOIN 
            users u ON o.user_id = u.user_id 
        WHERE 
            o.payment_date IS NOT NULL AND o.shipping_date IS NOT NULL
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

    public function updatePayment($id)
    {
        $query = $this->db->prepare("UPDATE 
            orders
        SET
            payment_date = NOW()
        WHERE 
            order_id = ?
        ");

        return $query->execute([$id]);
    }

    public function updateShipping($id)
    {
        $query = $this->db->prepare("UPDATE
            orders
        SET
            shipping_date = NOW() 
        WHERE 
            order_id = ?
        ");

        return $query->execute([$id]);
    }

    public function updateDelivering($id)
    {
        $query = $this->db->prepare("UPDATE
            orders
        SET
            delivered_date = NOW() 
        WHERE 
            order_id = ?
        ");

        return $query->execute([$id]);
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
