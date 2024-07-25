<?php
class Order {
    private $id;
    private $product;
    private $quantity;

    public function __construct($id, $product, $quantity) {
        $this->id = $id;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getId() {
        return $this->id;
    }

    public function getProduct() {
        return $this->product;
    }

    public function getQuantity() {
        return $this->quantity;
    }
}
?>
