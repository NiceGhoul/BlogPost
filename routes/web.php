<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthorController;
use Barryvdh\Debugbar\Twig\Extension\Dump;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;

// Route::get('/', function () {
//     return view('home', ['title' => 'Home Page']);
// });

// Route::get('/about', function () {
//     return view('about', ['title' => "About", 'name' => 'Wilson']);
// });

// Route::get('/posts', function () {
//     // $posts = Post::with(['author', 'category'])->latest()->get();

//     return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);
// });

// Route::get('/posts/{post:slug}', function(Post $post){
//     // $post = Post::find($slug);
//     return view('post', ['title' => 'Single Post', 'post' => $post]);
// });

// Route::get('/edit', function () {
//     return view('edit', ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString()]);
// });

// Route::get('/authors/{user:username}', function(User $user){
//     // $post = $user->posts->load('category', 'author');
//     return view('posts', ['title' => count($user->posts) . ' Articles by '. $user->name, 'posts' => $user->posts]);
// });

// Route::get('/categories/{category:slug}', function(Category $category){
//     // $post = $category->posts->load('category', 'author');
//     return view('posts', ['title' => count($category->posts) . ' with Category '. $category->name, 'posts' => $category->posts]);
// });

Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/edit', [AuthorController::class, 'edit'])->middleware('auth');

Route::get('/authors/{user:username}', [AuthorController::class, 'show']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
