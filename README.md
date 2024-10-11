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

## Files
1. Models are located at app/Models
2. Migrations are located at database/migrations
3. Seeders are located at database/seeders
4. Controllers are located at app/Http/Controllers
5. Routes are located at routes
6. /resources is where our frontend reside


## Important commands
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