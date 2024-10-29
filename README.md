# SuperStore API

API en Laravel para la tienda **SuperStore** que permite gestionar productos, categorías y aliados, proporcionando endpoints específicos para el uso de productos en el estilo de dropshipping.

## Requisitos

- **PHP** >= 8.0
- **Composer**
- **Laravel** >= 8.0
- **MySQL** u otro gestor de base de datos compatible
- **Postman** o **cURL** (opcional para probar los endpoints)

## Instalación

1. Clona el repositorio:
    ```bash
    git clone https://github.com/Alexpedrasa10/SuperStore
    cd SuperStore
    ```

2. Instala las dependencias:
    ```bash
    composer install
    ```

3. Crea y configura el archivo `.env`:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configura la base de datos en el archivo `.env`:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_base_datos
    DB_USERNAME=usuario
    DB_PASSWORD=contraseña
    ```

5. Ejecuta las migraciones:
    ```bash
    php artisan migrate
    php artisan db:seed
    ```

6. Inicia el servidor:
    ```bash
    php artisan serve
    ```
## Endpoints Products

### Obtener todos los productos

- **Ruta:** `GET /api/productos`
- **Descripción:** Retorna una lista de todos los productos.
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Productos mostrados con exito.",
        "data": [
            {
                "id": 1,
                "name": "Air Max",
                "description": "Amazing Shoes",
                "image_url": "https://nikearprod.vtexassets.com/arquivos/ids/878729/FD9082_107_A_PREM.jpg?v=638467294655030000",
                "cta_url": "https://nike.com.ar",
                "created_at": "2024-10-29T14:40:43.000000Z",
                "updated_at": "2024-10-29T14:40:43.000000Z"
            },
            {
                "id": 2,
                "name": "Vans Knu",
                "description": "Amazing Street Shoes",
                "image_url": "https://www.cristobalcolon.com/fullaccess/item33929foto137370.jpg",
                "cta_url": "https://vans.com.ar",
                "created_at": "2024-10-29T14:40:43.000000Z",
                "updated_at": "2024-10-29T14:40:43.000000Z"
            }
        ]
    }
    ```

### Crear productos

- **Ruta:** `POST /api/productos`
- **Descripción:** Crea productos
- **Ejemplo de solicitud:**

    ```json
    {
        "name": "Vans WonderStreet",
        "description": "Incredible shoes",
        "cta_url": "https://www.vans.com",
        "image_url":"https://example.com",
        "categories" : [1] //opcional
    }
    ```
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Productos creado con exito.",
        "data": {
            "name": "Vans WonderStreet",
            "description": "amazing shoes",
            "image_url": "https://example.com",
            "cta_url": "https://www.vans.com",
            "updated_at": "2024-10-29T14:53:34.000000Z",
            "created_at": "2024-10-29T14:53:34.000000Z",
            "id": 5
        }
    }
    ```

### Editar productos

- **Ruta:** `PUT /api/productos/{id}`
- **Descripción:** Edita productos
- **Ejemplo de solicitud:**

    ```json
    {
        "image_url" : "https://www.moov.com.ar/on/demandware.static/-/Sites-365-dabra-catalog/default/dw4119fb6b/products/VAVN0009QC6BT1/VAVN0009QC6BT1-2.JPG"
    }
    ```
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Productos actualizado con exito.",
        "data": {
            "id": 5,
            "name": "Vans WonderStreet",
            "description": "amazing shoes",
            "image_url": "https://www.moov.com.ar/on/demandware.static/-/Sites-365-dabra-catalog/default/dw4119fb6b/products/VAVN0009QC6BT1/VAVN0009QC6BT1-2.JPG",
            "cta_url": "https://www.vans.com",
            "created_at": "2024-10-29T14:53:34.000000Z",
            "updated_at": "2024-10-29T14:55:58.000000Z"
        }
    }
    ```

### Eliminar productos

- **Ruta:** `DELETE /api/productos/{id}`
- **Descripción:** Elimina producto especifico
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Productos eliminado con exito.",
        "data": {
            "id": 3,
            "name": "iPhone 15 Pro Max",
            "description": "Incredible Smartphone",
            "image_url": "https://ipoint.com.ar/26705-thickbox_default/iphone-15-pro-max-256gb.jpg",
            "cta_url": "https://apple.com.ar",
            "created_at": "2024-10-29T14:40:43.000000Z",
            "updated_at": "2024-10-29T14:40:43.000000Z"
        }
    }
    ```


## Endpoints Category

### Obtener todas las categorias

- **Ruta:** `GET /api/category`
- **Descripción:** Retorna una lista de todas las categorias
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Categorías mostradas con éxito.",
        "data": [
            {
                "id": 1,
                "name": "Electrónica",
                "description": "Productos electrónicos",
                "created_at": "2024-10-29T15:00:00.000000Z",
                "updated_at": "2024-10-29T15:00:00.000000Z"
            },
            {
                "id": 2,
                "name": "Moda",
                "description": "Ropa y accesorios",
                "created_at": "2024-10-29T15:00:00.000000Z",
                "updated_at": "2024-10-29T15:00:00.000000Z"
            }
        ]
    }

    ```

### Crear Categorias

- **Ruta:** `POST /api/category`
- **Descripción:** Crea categoria
- **Ejemplo de solicitud:**

    ```json
    {
        "name": "Hogar",
        "description": "Productos para el hogar"
    }

    ```
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Categoría creada con éxito.",
        "data": {
            "id": 3,
            "name": "Hogar",
            "description": "Productos para el hogar",
            "created_at": "2024-10-29T15:05:00.000000Z",
            "updated_at": "2024-10-29T15:05:00.000000Z"
        }
    }

    ```

### Editar categoria

- **Ruta:** `PUT /api/category/{id}`
- **Descripción:** Edita categoria especifica
- **Ejemplo de solicitud:**

    ```json
    {
        "description": "Electrodomésticos para el hogar"
    }
    ```
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Categoría actualizada con éxito.",
        "data": {
            "id": 3,
            "name": "Hogar",
            "description": "Electrodomésticos para el hogar",
            "created_at": "2024-10-29T15:05:00.000000Z",
            "updated_at": "2024-10-29T15:07:00.000000Z"
        }
    }

    ```

### Eliminar categoría

- **Ruta:** `DELETE /api/category/{id}`
- **Descripción:** Elimina producto especifico
- **Ejemplo de respuesta:**

    ```json
   {
        "success": true,
        "message": "Categoría eliminada con éxito.",
        "data": {
            "id": 2,
            "name": "Moda",
            "description": "Ropa y accesorios",
            "created_at": "2024-10-29T15:00:00.000000Z",
            "updated_at": "2024-10-29T15:00:00.000000Z"
        }
    }

    ```

## Endpoints Ally

### Obtener todas las aliados

- **Ruta:** `GET /api/ally`
- **Descripción:** Retorna una lista de todos los aliados
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Aliados mostrados con éxito.",
        "data": [
            {
                "id": 1,
                "name": "Distribuidor A",
                "email": "distribuidor@example.com",
                "created_at": "2024-10-29T15:10:00.000000Z",
                "updated_at": "2024-10-29T15:10:00.000000Z"
            }
        ]
    }
    ```

### Crear Aliados

- **Ruta:** `POST /api/ally`
- **Descripción:** Crea aliados
- **Ejemplo de solicitud:**

    ```json
    {
        "name": "Distribuidor B",
        "email": "distribuidorb@example.com",
        "category": [2,5], // Opcional
    }


    ```
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Aliado creado con éxito.",
        "data": {
            "id": 2,
            "name": "Distribuidor B",
            "email": "distribuidorb@example.com",
            "created_at": "2024-10-29T15:05:00.000000Z",
            "updated_at": "2024-10-29T15:05:00.000000Z"
        }
    }

    ```

### Editar aliado

- **Ruta:** `PUT /api/ally/{id}`
- **Descripción:** Edita aliado especifica
- **Ejemplo de solicitud:**

    ```json
    {
        "name": "Segundo distribuidor"
    }
    ```
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Aliado actualizado con éxito.",
        "data": {
            "id": 2,
            "name": "Segundo distribuidor",
            "email": "distribuidorb@example.com",
            "created_at": "2024-10-29T15:05:00.000000Z",
            "updated_at": "2024-10-29T15:05:00.000000Z"
        }
    }

    ```

### Eliminar categoría

- **Ruta:** `DELETE /api/ally/{id}`
- **Descripción:** Elimina aliados
- **Ejemplo de respuesta:**

    ```json
   {
        "success": true,
        "message": "Aliado eliminado con éxito.",
        "data": {
            "id": 2,
            "name": "Segundo distribuidor",
            "email": "distribuidorb@example.com",
            "created_at": "2024-10-29T15:05:00.000000Z",
            "updated_at": "2024-10-29T15:05:00.000000Z"
        }
    }

    ```


## Rutas adicionales

### Obtener productos por categoría

- **Ruta:** `GET /api/category/{category_id}/products`
- **Descripción:** Devuelve los productos disponibles en una categoría específica.
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Productos mostrados para la categoría seleccionada.",
        "data": [
            {
                "id": 5,
                "name": "Aspiradora Inteligente",
                "description": "Aspiradora con inteligencia artificial",
                "image_url": "https://example.com/aspiradora.jpg",
                "cta_url": "https://electro.com/product/aspiradora"
            }
        ]
    }
    ```

### Obtener productos segun aliado

- **Ruta:** `GET /api/ally/{ally_id}/products`
- **Descripción:** Devuelve los productos que el aliado tiene acceso a través de sus categorías.
- **Ejemplo de respuesta:**

    ```json
    {
        "success": true,
        "message": "Productos mostrados para el aliado seleccionado.",
        "data": [
            {
                "id": 7,
                "name": "Laptop Pro",
                "description": "Laptop de última generación",
                "image_url": "https://example.com/laptop.jpg",
                "cta_url": "https://electro.com/product/laptop"
            }
        ]
    }
    ```