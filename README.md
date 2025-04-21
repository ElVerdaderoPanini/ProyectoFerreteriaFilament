<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Proyecto FC - Sistema de Gestion con Panel Administrativo

Este proyecto es un sistema de gestion desarrollado con Laravel y Filament que permite la administracion de materiales, pedidos, usuarios y detalles de pedidos desde un panel administrativo intuitivo.

## Tecnologias utilizadas

- PHP 8 con Laravel
- Filament (panel administrativo)
- MySQL
- Composer
- Vite y Tailwind CSS

## Instalacion

1. Clona el repositorio:
   git clone https://github.com/tu_usuario/proyecto-fc.git
   cd proyecto-fc

2. Copia el archivo .env y configura tus variables de entorno:
   cp .env.example .env

3. Instala dependencias:
   composer install
   npm install
   npm run dev

4. Genera la clave de la aplicacion y ejecuta las migraciones:
   php artisan key:generate
   php artisan migrate

5. Accede al sistema en:
   http://localhost/admin

## Uso

- Ingresa al panel de administracion para gestionar materiales, usuarios y pedidos.
- Puedes crear, editar y eliminar registros segun el recurso.

## Documentacion Tecnica

Esta documentacion describe las principales funcionalidades desarrolladas manualmente en el proyecto final, incluyendo recursos Filament, modelos, rutas y vistas CRUD.

Recursos de Filament

Los siguientes recursos permiten realizar operaciones CRUD a traves del panel administrativo de Filament:

DetallePedidos
- Ubicacion: app/Filament/Resources/DetallePedidosResource.php
- Descripcion: Gestiona los detalles de cada pedido.

Material
- Ubicacion: app/Filament/Resources/MaterialResource.php
- Descripcion: Gestiona los materiales disponibles.

Pedidos
- Ubicacion: app/Filament/Resources/PedidosResource.php
- Descripcion: Gestiona los pedidos realizados por los usuarios.

User
- Ubicacion: app/Filament/Resources/UserResource.php
- Descripcion: Administra los usuarios del sistema.

Paginas CRUD

Cada recurso incluye las paginas para listar, crear y editar registros:

DetallePedidos
- ListDetallePedidos.php
- CreateDetallePedidos.php
- EditDetallePedidos.php
Ubicacion: app/Filament/Resources/DetallePedidosResource/Pages/

Material
- ListMaterials.php
- CreateMaterial.php
- EditMaterial.php
Ubicacion: app/Filament/Resources/MaterialResource/Pages/

Pedidos
- ListPedidos.php
- CreatePedidos.php
- EditPedidos.php
Ubicacion: app/Filament/Resources/PedidosResource/Pages/

User
- ListUsers.php
- CreateUser.php
- EditUser.php
Ubicacion: app/Filament/Resources/UserResource/Pages/

Modelos de Datos

Modelos personalizados utilizados en el proyecto:

Modelo DetallePedidos
- Ubicacion: app/Models/DetallePedidos.php
- Representa los items individuales de un pedido.

Modelo Material
- Ubicacion: app/Models/Material.php
- Contiene la informacion de cada material disponible.

Modelo Pedidos
- Ubicacion: app/Models/Pedidos.php
- Modelo principal para representar pedidos.

Modelo User
- Ubicacion: app/Models/User.php
- Modelo de usuario para autenticacion y administracion.

Rutas del Panel Administrativo

Las rutas son generadas automaticamente por Filament con base en los recursos definidos. Por ejemplo:

- /admin/materials
- /admin/pedidos
- /admin/detalle-pedidos
- /admin/users

Estas rutas permiten acceder a las vistas de gestion de cada entidad.

Licencia

Este proyecto utiliza la licencia MIT. Puedes usarlo, modificarlo o compartirlo libremente.
