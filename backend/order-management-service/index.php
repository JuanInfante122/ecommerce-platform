<?php
require_once 'OrderController.php';

// Permitir solicitudes desde cualquier origen
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Manejo de preflight requests para CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('HTTP/1.1 204 No Content');
    exit;
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$controller = new OrderController();

if ($uri === '/api/orders' && $method === 'GET') {
    $orders = $controller->getOrders();
    header('Content-Type: application/json');
    echo json_encode(array_map(function($order) {
        return [
            'id' => $order->getId(),
            'product' => $order->getProduct(),
            'quantity' => $order->getQuantity()
        ];
    }, $orders));
} elseif ($uri === '/api/orders' && $method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $order = $controller->createOrder($data['product'], $data['quantity']);
    header('Content-Type: application/json');
    echo json_encode([
        'id' => $order->getId(),
        'product' => $order->getProduct(),
        'quantity' => $order->getQuantity()
    ]);
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Not Found']);
}
?>
