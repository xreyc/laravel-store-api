# CREATING A STORE API
---

## SETUP
1. Install dependencies
```bash
composer install
```

2. Generate application key
```bash
php artisan key:generate
```

3. Create a mysql database then add the credentials to .env
```.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

4. Run migrations
```bash
php artisan migrate
```

5. Run seeders
```bash
php artisan db:seed
```

6. Create laravel/passport client key
```bash
php artisan passport:client --personal
```

## FILES
1. Models are located at app/Models
2. Migrations are located at database/migrations
3. Seeders are located at database/seeders
4. Controllers are located at app/Http/Controllers
5. Routes are located at routes
6. /resources is where our frontend reside


## IMPORTANT COMMANDS
1. Creating a model
```bash
php artisan make:model Store
``` 

2. Creating a migration file
```bash
php artisan make:migration create_stores_table
```

3. Create a model and migration in one command
```bash
php artisan make:model ModelName -m
```

4. Creating a controller
```bash
php artisan make:controller StoreController
```

5. To migrate the tables
```bash
php artisan migrate
```

6. Create a route file example rotues/api.php
```bash
php artisan install:api
```

7. Get route list
```bash
php artisan route:list
```

8. Creating a seeder
```bash
php artisan make:seeder UserSeeder
```

9. Running seeder
Running the database seeder (all registered seeder)
```bash
php artisan db:seed
```

Running specific seeder
```bash
php artisan db:seed --class=UserSeeder
```

Reset and Ressed
```bash
php artisan migrate:refresh --seed
```

## GETTING DATA FROM REQUEST
Certainly! Here are separate examples for accessing different types of data from the `$request` object in Laravel without including the whole controller.

### 1. Accessing Route Parameters

```php
// Assuming the route is defined as: Route::get('/example/{id}', [ExampleController::class, 'handleRequest']);
$routeParam = $id; // Accessing the route parameter directly
```

### 2. Accessing Query Parameters

```php
// Example: /example?id=123&filter=active
$queryParamId = $request->query('id'); // Get 'id' from query string
$filter = $request->query('filter'); // Get 'filter' from query string
```

### 3. Accessing Request Body (Form Data)

```php
// Example: Form submission with fields 'name' and 'email'
$name = $request->input('name'); // Get 'name' from form data
$email = $request->input('email'); // Get 'email' from form data
```

### 4. Retrieving All Input Data

```php
$allData = $request->all(); // Get all data from both form and query
```

### 5. Accessing JSON Data

```php
// Assuming a JSON payload like: { "key": "value" }
$jsonValue = $request->json('key'); // Get a specific key from JSON
$allJsonData = $request->json()->all(); // Get all JSON data
```