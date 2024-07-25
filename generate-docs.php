<?php

require 'swagger-config.php';
use OpenApi\Generator;

$openapi = Generator::scan(['/product-catalog-service/ProductController.php']);
header('Content-Type: application/json');
echo $openapi->toJson();
