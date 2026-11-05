# Kiosko de autoservicio — API

API REST en Laravel para una aplicación de autoservicio de pedidos de comida. Gestiona la autenticación de usuarios, el catálogo de productos por categoría y la creación y administración de pedidos.

Este repositorio contiene el **backend**. El frontend en React está en [kiosko-frontend](https://github.com/TU-USUARIO/kiosko-frontend).

## Tecnologías

- Laravel
- Laravel Sanctum
- MySQL

## Funciones

- **Autenticación con tokens:** registro, inicio y cierre de sesión con Laravel Sanctum.
- **Roles de usuario:** distingue entre clientes y administradores.
- **Catálogo:** categorías y productos disponibles para el frontend.
- **Pedidos:** creación de órdenes con sus productos y cantidades.
- **Administración de órdenes:** consulta de pedidos pendientes y cambio de su estado.
- **Validación de datos** con mensajes de error que el frontend muestra en los formularios.

## Base de datos

La estructura se crea con **migraciones** y los datos iniciales (categorías y productos) con **seeders**, así que no se necesita importar ningún archivo `.sql`.

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/TU-USUARIO/kiosko-api.git
   cd kiosko-api
   ```
2. Instala las dependencias:
   ```bash
   composer install
   ```
3. Copia `.env.example` a `.env` y configura tu base de datos:
   ```bash
   cp .env.example .env
   ```
4. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```
5. Crea las tablas y carga los datos iniciales:
   ```bash
   php artisan migrate --seed
   ```
6. Inicia el servidor:
   ```bash
   php artisan serve
   ```

La API queda disponible en `http://localhost:8000`.

## Autor

**Daniel Vazquez Zumaya** — Desarrollador Web Full Stack
[LinkedIn](https://www.linkedin.com/in/danielvazquezzumaya/) · [Portafolio](https://daniel.mictlancode.com)
