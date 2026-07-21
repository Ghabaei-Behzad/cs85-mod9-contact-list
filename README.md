Behzad Ghabaei <br>
CS 85 PHP programming  <br>
Module 9 Assignment 9A: Contact List App  <br>
Instructor Seno  <br>
7/21/2026  <br>

### Set Up Instructions:  <br>
1. Build a Laravel CRUD app, Connect Laravel to MySQL, Use MVC: Models, Views, Controllers, Handle form validation.
2.  Create an app that allows you to: Add a contact (Name, Email, Phone), View contact list, Edit contacts, Delete contacts.
3. Laravel Concepts, Routing: Connect URLs to controller logic, Controllers: Handle business logic, Models: Communicate with database, Migrations: Create/update database tables, Blade Views: Render HTML with PHP-like syntax, Validation: Prevent bad user input, CSRF Tokens: Protect forms from attacks
4. Tools, Laravel Herd, MySQL Community Edition. (MySQL 8.0 Command Line Client) MySQL server.

### Instructions:
1. When downloading MYSQL Community, set a root password.
2. Open Command Prompt > cd Herd
3. laravel new contact-list
   Would you like to update?No <br>
   Which starter kit?None <br>
   Which testing framework?Pest <br>
   Install Laravel Boost AI?No <br>
   Run npm install?No <br>
4. cd contact-list
5. Open MYSQL Command Line Client, enter root password, run commands "CREATE DATABASE contact_list;"
"EXIT;"

6. Open VS Code to configure .env file, in database section and add the same password:
7.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=contact_list
DB_USERNAME=root
DB_PASSWORD= give yours
```
9. Build the Model "php artisan make:model Contact -m"
10. Open database/migrations/xxxx_xx_xx_xxxxxx_create_contacts_table.php (x is the date), update the up() function
```
$table->id();
$table->string('name');
$table->string('email')->unique();
$table->string('phone');
$table->timestamps();
```
11. Open Models for mass-assignment at app/Models/Contact.php add the $fillable property
```
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone'];
}

```
12. Run the migration to make tables in MySQL "php artisan migrate"
13. Create a Controller, which has CRUD stubs "php artisan make:controller ContactController --resource"
14. Open routes/web.php to register the resource router
```
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::resource('contacts', ContactController::class);

```
15. Open app/Http/Controllers/ContactController.php, make a controller with index(), create(), store(), edit(), update(), destroy() functions.
16. Create Blade views by making a directory called "contacts" inside of resources/views containing: <br>
layout.blade.php – master layout <br>
index.blade.php – show contact list  <br>
create.blade.php – add contact form  <br>
edit.blade.php – edit contact form  <br>
17. Run the application "php artisan serve"
18. Navigate to http://127/0/0/1:8000/contacts
19. Run commands: "npm install" "npm run dev"
20. To see newly created databases open MYSQL Command Line Client, "enter same password"
21. "SHOW DATABASES;" "USE contact_list;" "SELECT * FROM contacts;" "INSERT INTO contacts (name, email, phone, created_at, updated_at) 
VALUES ('Behzad', 'Behzad@example.com', '123-4567', NOW(), NOW());"
22. After refreshing the browser the database will be updated.





   





<!-- 
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

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
-->
