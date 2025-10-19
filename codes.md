# Laravel E-Book Project – All Artisan & Tinker Commands Used  

php artisan serve --host=192.168.1.6 --port=8080

# run seeders
php artisan db:seed

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
php artisan make:model Ebook -m
php artisan make:model EbookFile -m
php artisan make:model Author -m
php artisan make:model Category -m
php artisan make:model SubCategory -m
php artisan make:model AdsSetting -m


--------------------------------------------------
4. Controllers (API + Web)
--------------------------------------------------
php artisan make:controller Admin/EbookController
php artisan make:controller Admin/EbookFilesController
php artisan make:controller Admin/AuthorController 
php artisan make:controller Admin/CategoryController
php artisan make:controller Admin/SubCategoryController
php artisan make:controller Admin/AdsSettingController
php artisan make:controller Admin/AdminAuthController
php artisan make:controller Admin/AdminDashboardController
php artisan make:controller Admin/AdminProfileController

php artisan make:controller Frontend/FrontendController

php artisan make:controller User/UserAuthController

php artisan make:controller Api/CategoryApiController
php artisan make:controller Api/EbookApiController
php artisan make:controller Api/SliderApiController
php artisan make:controller Api/SubCategoryApiController
php artisan make:controller Api/AuthorApiController
php artisan make:controller Api/AdApiController

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
