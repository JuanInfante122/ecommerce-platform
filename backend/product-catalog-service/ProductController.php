<?php
require_once 'database.php';
require_once 'Product.php';

/**
 * @OA\Tag(
 *     name="Products",
 *     description="Operaciones relacionadas con productos"
 * )
 */

class ProductController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Obtiene todos los productos",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de productos",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
     *         )
     *     )
     * )
     */
    public function getProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);
        $products = [];

        while ($row = $result->fetch_assoc()) {
            $products[] = new Product($row['id'], $row['name'], $row['price']);
        }

        return $products;
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     summary="Obtiene un producto por ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del producto",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Producto encontrado",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Producto no encontrado"
     *     )
     * )
     */
    public function getProduct($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        return new Product($result['id'], $result['name'], $result['price']);
    }
}
?>
