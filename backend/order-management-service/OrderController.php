<?php
require_once 'database.php';
require_once 'Order.php';

class OrderController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getOrders() {
        $sql = "SELECT * FROM orders";
        $result = $this->db->query($sql);
        $orders = [];

        while ($row = $result->fetch_assoc()) {
            $orders[] = new Order($row['id'], $row['product'], $row['quantity']);
        }

        return $orders;
    }

    public function createOrder($product, $quantity) {
        $sql = "INSERT INTO orders (product, quantity) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('si', $product, $quantity);
        $stmt->execute();

        return new Order($this->db->insert_id, $product, $quantity);
    }
}
?>
