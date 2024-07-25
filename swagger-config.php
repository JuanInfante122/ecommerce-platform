<?php

require 'vendor/autoload.php';

/**
 * @OA\Info(
 *     title="E-commerce API",
 *     version="1.0.0",
 *     description="API para la gestión de productos y pedidos en una plataforma de comercio electrónico."
 * )
 */

/**
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Servidor de desarrollo"
 * )
 */

/**
 * @OA\PathItem(
 *     path="/api/products"
 * )
 */

/**
 * @OA\PathItem(
 *     path="/api/products/{id}"
 * )
 */

/**
 * @OA\Components(
 *     @OA\Schema(
 *         schema="Product",
 *         type="object",
 *         required={"id", "name", "price"},
 *         @OA\Property(
 *             property="id",
 *             type="integer",
 *             example=1
 *         ),
 *         @OA\Property(
 *             property="name",
 *             type="string",
 *             example="Product A"
 *         ),
 *         @OA\Property(
 *             property="price",
 *             type="number",
 *             format="float",
 *             example=19.99
 *         )
 *     )
 * )
 */

// Generate Swagger documentation
$openapi = \OpenApi\Generator::scan([__DIR__ . '/ProductController.php', __DIR__ . '/OrderController.php']);
header('Content-Type: application/x-yaml');
echo $openapi->toYaml();
