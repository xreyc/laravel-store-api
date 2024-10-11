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
Here's a comprehensive example of how to retrieve different types of data from the `$request` object in a Laravel controller, including route parameters, request body (form data), query parameters, and JSON data.

### Example Controller Method

```php
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function handleRequest(Request $request, $id)
    {
        // 1. **Route Parameters**: Accessing route parameters
        // Assuming the route is defined as: Route::get('/example/{id}', [ExampleController::class, 'handleRequest']);
        $routeParam = $id; // Accessing the route parameter directly

        // 2. **Query Parameters**: Accessing query parameters from the URL
        // Example: /example?id=123&filter=active
        $queryParamId = $request->query('id'); // Get 'id' from query string
        $filter = $request->query('filter'); // Get 'filter' from query string

        // 3. **Request Body (Form Data)**: Accessing form data sent in the request body
        // Example: Form submission with fields 'name' and 'email'
        $name = $request->input('name'); // Get 'name' from form data
        $email = $request->input('email'); // Get 'email' from form data

        // 4. **Retrieving All Input Data**: Getting all input data
        $allData = $request->all(); // Get all data from both form and query

        // 5. **Retrieving JSON Data**: Accessing JSON data if the request is JSON
        // Assuming a JSON payload like: { "key": "value" }
        $jsonValue = $request->json('key'); // Get a specific key from JSON
        $allJsonData = $request->json()->all(); // Get all JSON data

        // Example response
        return response()->json([
            'route_param' => $routeParam,
            'query_param_id' => $queryParamId,
            'filter' => $filter,
            'name' => $name,
            'email' => $email,
            'all_data' => $allData,
            'json_value' => $jsonValue,
            'all_json_data' => $allJsonData,
        ]);
    }
}
```

### Explanation

1. **Route Parameters**:
   - You can access route parameters directly as method arguments, like `$id` in the example.

2. **Query Parameters**:
   - Use the `query()` method to get query parameters from the URL. For instance, `?id=123&filter=active` can be accessed using `$request->query('id')` and `$request->query('filter')`.

3. **Request Body (Form Data)**:
   - To access data sent in the body of a form submission (like `name` and `email`), use the `input()` method. This retrieves values from both form data and query string.

4. **Retrieving All Input Data**:
   - The `all()` method retrieves all input data from the request, including both form data and query parameters.

5. **Retrieving JSON Data**:
   - For requests containing JSON payloads, use the `json()` method. This allows you to retrieve specific keys or all data from the JSON body.