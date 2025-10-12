# Laravel E-Book Project – All Artisan & Tinker Commands Used  
> Controllers, Models, Migrations, Seeders, Factories, Policies, etc.

--------------------------------------------------
1. Project Bootstrap
--------------------------------------------------
laravel new ebook-laravel
cd ebook-laravel
php artisan serve

--------------------------------------------------
2. Database
--------------------------------------------------
# create & configure .env (DB_DATABASE=ebook_laravel)
php artisan migrate:fresh --force

--------------------------------------------------
3. Models & Migrations
--------------------------------------------------
php artisan make:model Book -m
php artisan make:model Author -m
php artisan make:model Category -m
php artisan make:model Review -m
php artisan make:model User --no-interaction   # already exists

--------------------------------------------------
4. Controllers (API + Web)
--------------------------------------------------
php artisan make:controller BookController --api
php artisan make:controller AuthorController --api
php artisan make:controller CategoryController --api
php artisan make:controller ReviewController --api

php artisan make:controller Web/BookController
php artisan make:controller Web/AuthorController
php artisan make:controller Web/CategoryController
php artisan make:controller Web/ReviewController

--------------------------------------------------
5. Requests & Resources
--------------------------------------------------
php artisan make:request StoreBookRequest
php artisan make:request UpdateBookRequest
php artisan make:request StoreAuthorRequest
php artisan make:request StoreReviewRequest

php artisan make:resource BookResource
php artisan make:resource AuthorResource
php artisan make:resource CategoryResource
php artisan make:resource ReviewResource

--------------------------------------------------
6. Seeders & Factories
--------------------------------------------------
php artisan make:seeder AuthorSeeder
php artisan make:seeder CategorySeeder
php artisan make:seeder BookSeeder

php artisan make:factory BookFactory
php artisan make:factory AuthorFactory
php artisan make:factory CategoryFactory
php artisan make:factory ReviewFactory

# run seeders
php artisan db:seed

--------------------------------------------------
7. Policies
--------------------------------------------------
php artisan make:policy BookPolicy --model=Book
php artisan make:policy ReviewPolicy --model=Review

--------------------------------------------------
8. Routes
--------------------------------------------------
# routes/api.php
Route::apiResource('books', BookController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('reviews', ReviewController::class);

# routes/web.php
Route::resource('books', \App\Http\Controllers\Web\BookController::class);
Route::resource('authors', \App\Http\Controllers\Web\AuthorController::class);

--------------------------------------------------
9. Cache & Optimization
--------------------------------------------------
php artisan config:cache
php artisan route:cache
php artisan view:cache

--------------------------------------------------
10. Tinker Examples
--------------------------------------------------
# create dummy data
php artisan tinker
>>> App\Models\Author::factory()->count(10)->create();
>>> App\Models\Category::factory()->count(5)->create();
>>> App\Models\Book::factory()->count(50)->create();
>>> App\Models\Review::factory()->count(100)->create();

# quick checks
>>> App\Models\Book::with('author','category','reviews')->first();
>>> App\Models\Author::has('books')->count();

--------------------------------------------------
11. Testing
--------------------------------------------------
php artisan make:test BookApiTest
php artisan make:test AuthorApiTest
php artisan test

--------------------------------------------------
12. Git
--------------------------------------------------
git init
git add .
git commit -m "feat: scaffold ebook-laravel api + web layers"
