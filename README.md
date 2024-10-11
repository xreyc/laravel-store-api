# CREATING A STORE API

## Setup
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

## Important commands
1. Creating a model
```bash
php artisan make:model Store
``` 

2. Creating a migration file
```bash
php artisan make:migration create_stores_table
```

3. To migrate the tables
```bash
php artisan migrate
```

4. Creating a controller
```bash
php artisan make:controller StoreController
```

5. Create a route file example rotues/api.php
```bash
php artisan install:api
```

6. Get route lsit
```bash
php artisan route:list
```