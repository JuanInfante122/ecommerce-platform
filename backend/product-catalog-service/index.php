<?php
require_once 'ProductController.php';

// Permitir solicitudes desde cualquier origen
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$controller = new ProductController();

if ($uri === '/api/products' && $method === 'GET') {
    $products = $controller->getProducts();
    header('Content-Type: application/json');
    echo json_encode(array_map(function($product) {
        return [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice()
        ];
    }, $products));
} elseif (preg_match('/\/api\/products\/(\d+)/', $uri, $matches) && $method === 'GET') {
    $id = (int)$matches[1];
    $product = $controller->getProduct($id);
    header('Content-Type: application/json');
    echo json_encode([
        'id' => $product->getId(),
        'name' => $product->getName(),
        'price' => $product->getPrice()
    ]);
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Not Found']);
}
?>
