# E-commerce API

Bienvenido a la **E-commerce API**. Esta API permite la gestión de productos y pedidos en una plataforma de comercio electrónico.

## Tabla de Contenidos

- [Descripción](#descripción)
- [Tecnologías](#tecnologías)
- [Instalación](#instalación)
- [Uso](#uso)
- [Endpoints](#endpoints)
  - [Productos](#productos)
  - [Pedidos](#pedidos)
- [Documentación de Swagger](#documentación-de-swagger)
- [Contribuciones](#contribuciones)
- [Licencia](#licencia)

## Descripción

Esta API proporciona endpoints para gestionar productos y pedidos. Permite la creación, lectura, actualización y eliminación de productos y pedidos.

## Tecnologías

- PHP
- MySQL
- Swagger (OpenAPI) para la documentación

## Instalación

1. **Clona el repositorio:**

    ```bash
    git clone https://github.com/tuusuario/ecommerce-api.git
    ```

2. **Instala las dependencias:**

    Asegúrate de tener [Composer](https://getcomposer.org/) instalado. Luego, ejecuta:

    ```bash
    composer install
    ```

3. **Configura el archivo `database.php`:**

    Copia el archivo de configuración de ejemplo y edítalo para incluir tus credenciales de base de datos:

    ```bash
    cp config/database.example.php config/database.php
    ```

    Luego, edita `config/database.php` con tus detalles de conexión a la base de datos.

4. **Importa el esquema de la base de datos:**

    Ejecuta el script SQL proporcionado en el archivo `schema.sql` para crear las tablas necesarias en tu base de datos.

## Uso

1. **Inicia el servidor:**

    Asegúrate de tener un servidor web compatible con PHP (como Apache o Nginx) y un servidor MySQL en ejecución.

2. **Accede a la API:**

    Los endpoints están disponibles en `http://localhost:8000`.

## Endpoints

### Productos

- **Obtener todos los productos:**

    ```
    GET /api/products
    ```

- **Obtener un producto por ID:**

    ```
    GET /api/products/{id}
    ```

### Pedidos

- **Crear un nuevo pedido:**

    ```
    POST /api/orders
    ```

    **Cuerpo de la solicitud:**

    ```json
    {
      "product_id": 1,
      "quantity": 2
    }
    ```

- **Obtener todos los pedidos:**

    ```
    GET /api/orders
    ```

- **Obtener un pedido por ID:**

    ```
    GET /api/orders/{id}
    ```

## Documentación de Swagger

La documentación de Swagger para la API está disponible en [http://localhost:3000/swagger](http://localhost:3000/swagger). Swagger proporciona una interfaz interactiva para explorar y probar la API.

## Contribuciones

Las contribuciones son bienvenidas. Por favor, abre un **issue** o realiza un **pull request** en [GitHub](https://github.com/tuusuario/ecommerce-api).

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

