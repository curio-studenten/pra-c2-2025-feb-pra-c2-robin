<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
2017-10-30 setup for urls
Home:           /
Brand:          /52/AEG/
Type:           /52/AEG/53/Superdeluxe/
Manual:         /52/AEG/53/Superdeluxe/8023/manual/
                /52/AEG/456/Testhandle/8023/manual/

If we want to add product categories later:
Productcat:     /category/12/Computers/
*/
use Illuminate\Support\Collection;
use App\Models\Brand;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ContactFormulierController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LocaleController;



Route::get('/', [CategorieController::class, 'showCategories'])->name('categories.show');

Route::get('/pages.homepage/{category}', [CategorieController::class, 'home'])->name('home');


// Generate sitemaps
Route::get('/generateSitemap', [SitemapController::class, 'generate']);

Route::get('/manual/{id}/click', [ManualController::class, 'trackClick'])->name('manual.trackClick');

Route::get('/manual/{language}/{brand_slug}/', [RedirectController::class, 'brand']);
Route::get('/manual/{language}/{brand_slug}/brand.html', [RedirectController::class, 'brand']);

Route::get('/datafeeds/{brand_slug}.xml', [RedirectController::class, 'datafeed']);

// Locale routes
Route::get('/language/{language_slug}/', [LocaleController::class, 'changeLocale'])->name('change.language');

// Route for brands by letter
Route::get('/brands/{letter}', [BrandController::class, 'showByLetter'])->name('brands.showByLetter');

// List of manuals for a brand
Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);

// Detail page for a manual
Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show']);

Route::get('/contactformulier', [ContactFormulierController::class, 'contact'])->name('contact.form');
