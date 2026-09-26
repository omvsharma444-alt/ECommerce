# NovaCart E-Commerce Website

NovaCart is a responsive PHP 8 + MySQL shopping website with a Bootstrap 5 storefront, user accounts, a session cart, checkout, order tracking, and an admin dashboard.

## XAMPP setup

1. Copy this folder to `C:\xampp\htdocs\Ecommerce` (or update `BASE_URL` in `config.php` to match your folder name).
2. Start **Apache** and **MySQL** from the XAMPP Control Panel.
3. Open phpMyAdmin, select **Import**, and choose [database.sql](database/database.sql).
4. Browse to `http://localhost/Ecommerce/`.

The database credentials default to `root` with an empty password. Change them in `config.php` if needed.

## Admin access

Open `http://localhost/Ecommerce/admin/` and sign in using `admin@gmail.com` / `admin123`. The seed password is automatically replaced with a secure PHP password hash after the first successful login.

## Architecture / ER overview

`users → orders → order_items`, `orders → payments`, and `categories → products`. Products are seeded with local SVG artwork under `images/products/`.

## Key security measures

Prepared PDO queries, output escaping, CSRF tokens on state-changing forms, session guards, PHP password hashing, server-side validation, and controlled product-image file names.
