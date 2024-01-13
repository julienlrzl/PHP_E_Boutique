<?php

class Orders extends Modele
{
    public function ajouterCommande($customer_id, $total, $session, $payment_type = 'cheque') {
        $sql = "INSERT INTO orders (customer_id, registered, delivery_add_id, payment_type, date, session, total, confirmer) 
                VALUES (:customer_id, 1, 11, :payment_type, CURDATE(), :session, :total, 0)";
        $parametres = array(
            ":customer_id" => $customer_id,
            ":payment_type" => $payment_type,
            ":session" => $session,
            ":total" => $total
        );

        $this->executerRequete($sql, $parametres);
        return $this->getBdd()->lastInsertId();

    }

    public function ajouterOrderItems($order_id, $product_id, $quantity) {
        $sql = "INSERT INTO orderitems (order_id, product_id, quantity) 
            VALUES (:order_id, :product_id, :quantity)";
        $parametres = array(
            ":order_id" => $order_id,
            ":product_id" => $product_id,
            ":quantity" => $quantity
        );

        $this->executerRequete($sql, $parametres);
    }


}
