<?php
require_once 'modele.php';


class Admin extends modele
{

    public function seConnecterAdmin($usernameadmin, $passwordadmin)
    {
        $sql = "SELECT admin.username, admin.password
        FROM admin 
        WHERE admin.username = :username AND admin.password = :password";

        $parametres = array(
            ':username' => $usernameadmin,
            ':password' => $passwordadmin,

        );

        return $this->executerRequete($sql, $parametres)->fetchAll();

    }

    public function getAllOrders() {
        $sql = "SELECT o.id, o.customer_id, o.payment_type, o.confirmer,
                   oi.order_id, oi.product_id, oi.quantity, 
                   p.name as product_name, p.price,
                   SUM(p.price * oi.quantity) as total_price
            FROM orders o
            LEFT JOIN orderitems oi ON o.id = oi.order_id
            LEFT JOIN products p ON oi.product_id = p.id
            GROUP BY o.id, oi.order_id, oi.product_id";

        $result = $this->executerRequete($sql)->fetchAll();

        $orders = [];
        foreach ($result as $row) {
            $orderId = $row['id'];
            if (!isset($orders[$orderId])) {
                $orders[$orderId] = [
                    'id' => $orderId,
                    'customer_id' => $row['customer_id'],
                    'payment_type' => $row['payment_type'],
                    'confirmer' => $row['confirmer'],
                    'total_price' => 0,
                    'products' => []
                ];
            }
            $orders[$orderId]['products'][] = [
                'name' => $row['product_name'],
                'quantity' => $row['quantity'],
                'price' => $row['price']
            ];
            $orders[$orderId]['total_price'] += $row['total_price'];
        }

        return $orders;
    }

    public function confirmOrder($orderId) {
        $sql = "UPDATE orders SET confirmer = true WHERE id = :orderId";
        $this->executerRequete($sql, [':orderId' => $orderId]);
    }


}