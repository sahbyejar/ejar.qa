<?php

use Illuminate\Support\Facades\Route;
use App\Models\City;
use App\Models\Ville;
use Illuminate\Http\Request;
use App\Models\favorite;
use App\Models\Produit;
use App\Models\countries;


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

Route::middleware('auth:web')->get('/profile', function (Request $request) {
    $user = $request->user();
    $countries = DB::table('countries')->get();

    return view('profile.show',compact('user','countries')) ;
})->name('profile');


Route::post('updateprofile/{user}', 'App\Http\Controllers\UsersController@updateprofile')
         ->name('updateprofile');
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('/');

Route::get('/android', [App\Http\Controllers\FrontController::class, 'android'])->name('/android');
Route::get('/ios', [App\Http\Controllers\FrontController::class, 'ios'])->name('/ios');


Route::get('/listing-category/{categorie}', [App\Http\Controllers\FrontController::class, 'listingcategory'])->name('/listing-category');
Route::get('/Filter', [App\Http\Controllers\FrontController::class, 'Filter'])->name('Filter');

Route::get('/vendor/{vendor}', [App\Http\Controllers\FrontController::class, 'vendor'])->name('vendor');
Route::get('/listing/{produit}', [App\Http\Controllers\FrontController::class, 'listing'])->name('/listing');

Route::get('/contact', [App\Http\Controllers\FrontController::class, 'contact'])->name('/contact');
Route::get('/email', [App\Http\Controllers\FrontController::class, 'basic_email'])->name('email');

Route::get('/clientlogin', function (Request $request) {
   

    return view('auth.clientlogin') ;
})->name('clientlogin');


 Route::get('validation', 'App\Http\Controllers\AUTH\loginController@validateclient')->name('validation');

Auth::routes();
Route::get('set-locale/{locale}', function ($locale) {
   \App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
})->name('locale.setting');



Route::middleware('auth:web')->group(function () {
     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/cherche', 'App\Http\Controllers\ProduitsController@cherche')
         ->name('produits.produit.cherche');

 Route::get('/premium', 'App\Http\Controllers\ProduitsController@premium')
         ->name('produits.produit.premium');


 Route::get('/cherchenot', 'App\Http\Controllers\ProduitsController@cherchenot')
         ->name('produits.produit.cherchenot');
 Route::get('/chercheref', 'App\Http\Controllers\ProduitsController@chercheref')
         ->name('produits.produit.chercheref');

Route::post('addimage','App\Http\Controllers\ProduitsController@addimage')->name('addimage');
Route::post('addvedio','App\Http\Controllers\ProduitsController@addvedio')->name('addvedio');

Route::post('deleteimage','App\Http\Controllers\ProduitsController@deleteimage')->name('deleteimage');

Route::get('/gestion',[App\Http\Controllers\HomeController::class,'gestion'])->name('gestion');
Route::get('/history/{id}',[App\Http\Controllers\historyController::class,'index']);


Route::get('/OrderRents/{id}',[App\Http\Controllers\historyController::class,'OrderRents']);
Route::get('/OrderSeles/{id}',[App\Http\Controllers\historyController::class,'OrderSeles']);

Route::get('/addproduit', 'App\Http\Controllers\historyController@addproduit');
Route::get('/deleteproduit', 'App\Http\Controllers\historyController@deleteproduit');



Route::get('/addvip1', 'App\Http\Controllers\historyController@addvip1');
Route::get('/deletevip1', 'App\Http\Controllers\historyController@deletevip1');


Route::get('/addvip2', 'App\Http\Controllers\historyController@addvip2');
Route::get('/deletevip2', 'App\Http\Controllers\historyController@deletevip2');

Route::get('/historyproduit/{id}', 'App\Http\Controllers\historyController@historyproduit');



Route::get('/historyvip1/{id}', 'App\Http\Controllers\historyController@historyvip1');
Route::get('/historyvip2/{id}', 'App\Http\Controllers\historyController@historyvip2');

Route::namespace('App\Http\Controllers')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
Route::group([
    'prefix' => 'priorities',
], function () {
    Route::get('/', 'PrioritiesController@index')
         ->name('priorities.priority.index');
    Route::get('/create','PrioritiesController@create')
         ->name('priorities.priority.create');
    Route::get('/show/{priority}','PrioritiesController@show')
         ->name('priorities.priority.show')->where('id', '[0-9]+');
    Route::get('/{priority}/edit','PrioritiesController@edit')
         ->name('priorities.priority.edit')->where('id', '[0-9]+');
    Route::post('/', 'PrioritiesController@store')
         ->name('priorities.priority.store');
    Route::put('priority/{priority}', 'PrioritiesController@update')
         ->name('priorities.priority.update')->where('id', '[0-9]+');
    Route::delete('/priority/{priority}','PrioritiesController@destroy')
         ->name('priorities.priority.destroy')->where('id', '[0-9]+');
});
Route::get('notification/add', 'notificationController@add')
         ->name('notification.add');
Route::get('notification/send', 'notificationController@send')
         ->name('notification.send');
Route::get('notificationvu', 'notificationController@vu')
         ->name('notification.vu');

Route::get('notifications', 'notificationController@index')
         ->name('notifications.index');
Route::group([
    'prefix' => 'cities',
], function () {
    Route::get('/', 'CitiesController@index')
         ->name('cities.city.index');
    Route::get('/create','CitiesController@create')
         ->name('cities.city.create');
    Route::get('/show/{city}','CitiesController@show')
         ->name('cities.city.show')->where('id', '[0-9]+');
    Route::get('/{city}/edit','CitiesController@edit')
         ->name('cities.city.edit')->where('id', '[0-9]+');
    Route::post('/', 'CitiesController@store')
         ->name('cities.city.store');
    Route::put('city/{city}', 'CitiesController@update')
         ->name('cities.city.update')->where('id', '[0-9]+');
    Route::delete('/city/{city}','CitiesController@destroy')
         ->name('cities.city.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'villes',
], function () {
    Route::get('/', 'VillesController@index')
         ->name('villes.ville.index');
    Route::get('/create','VillesController@create')
         ->name('villes.ville.create');
    Route::get('/show/{ville}','VillesController@show')
         ->name('villes.ville.show')->where('id', '[0-9]+');
    Route::get('/{ville}/edit','VillesController@edit')
         ->name('villes.ville.edit')->where('id', '[0-9]+');
    Route::post('/', 'VillesController@store')
         ->name('villes.ville.store');
    Route::put('ville/{ville}', 'VillesController@update')
         ->name('villes.ville.update')->where('id', '[0-9]+');
    Route::delete('/ville/{ville}','VillesController@destroy')
         ->name('villes.ville.destroy')->where('id', '[0-9]+');
});




Route::group([
    'prefix' => 'sliders',
], function () {
    Route::get('/', 'SlidersController@index')
         ->name('sliders.slider.index');
    Route::get('/create','SlidersController@create')
         ->name('sliders.slider.create');
    Route::get('/show/{slider}','SlidersController@show')
         ->name('sliders.slider.show')->where('id', '[0-9]+');
    Route::get('/{slider}/edit','SlidersController@edit')
         ->name('sliders.slider.edit')->where('id', '[0-9]+');
    Route::post('/', 'SlidersController@store')
         ->name('sliders.slider.store');
    Route::put('slider/{slider}', 'SlidersController@update')
         ->name('sliders.slider.update')->where('id', '[0-9]+');
    Route::delete('/slider/{slider}','SlidersController@destroy')
         ->name('sliders.slider.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'categories',
], function () {
    Route::get('/', 'CategoriesController@index')
         ->name('categories.category.index');
    Route::get('/create','CategoriesController@create')
         ->name('categories.category.create');
    Route::get('/show/{category}','CategoriesController@show')
         ->name('categories.category.show')->where('id', '[0-9]+');
    Route::get('/{category}/edit','CategoriesController@edit')
         ->name('categories.category.edit')->where('id', '[0-9]+');
    Route::post('/', 'CategoriesController@store')
         ->name('categories.category.store');
    Route::put('category/{category}', 'CategoriesController@update')
         ->name('categories.category.update')->where('id', '[0-9]+');
    Route::delete('/category/{category}','CategoriesController@destroy')
         ->name('categories.category.destroy')->where('id', '[0-9]+');
});



Route::group([
    'prefix' => 'countries',
], function () {
    Route::get('/', 'CountriesController@index')
         ->name('countries.countries.index');
   
   
  
   
    Route::get('countriesup', 'CountriesController@update')
         ->name('countriesup');
   
});
Route::group([
    'prefix' => 'users',
], function () {
    Route::get('/', 'UsersController@index')
         ->name('users.user.index');
    Route::get('/create','UsersController@create')
         ->name('users.user.create');
    Route::get('/show/{user}','UsersController@show')
         ->name('users.user.show');
    Route::get('/{user}/edit','UsersController@edit')
         ->name('users.user.edit');
    Route::post('/', 'UsersController@store')
         ->name('users.user.store');
    Route::post('user/{user}', 'UsersController@update')
         ->name('users.user.update');

    Route::delete('/user/{user}','UsersController@destroy')
         ->name('users.user.destroy');





});

Route::group([
    'prefix' => 'seller',
], function () {
    Route::get('/', 'sellerController@index')
         ->name('seller.seller.index');
    Route::get('/create','sellerController@create')
         ->name('seller.seller.create');
    Route::get('/show/{seller}','sellerController@show')
         ->name('seller.seller.show');
    Route::get('/{seller}/edit','sellerController@edit')
         ->name('seller.seller.edit');
    Route::post('/', 'sellerController@store')
         ->name('seller.seller.store');
    Route::post('seller/{seller}', 'sellerController@update')
         ->name('seller.seller.update');

    Route::delete('/seller/{seller}','sellerController@destroy')
         ->name('seller.seller.destroy');





});


 Route::get('/vipcampany/{user}','Companycontroller@vup')
         ->name('campany.vup')->where('id', '[0-9]+');


Route::get('campany/{user}/edit','Companycontroller@editcampany')
         ->name('editcampany');
    Route::post('campany/{user}', 'Companycontroller@updatecampany')
         ->name('updatecampany');
     Route::delete('/campany/{user}','Companycontroller@destroycampany')
         ->name('destroycampany');
    Route::get('/campany/show/{user}','Companycontroller@showcampany')
         ->name('showcampany');

Route::get('/campanystore', 'Companycontroller@campanystore')
         ->name('campanystore');
Route::get('/storeadmin', 'UsersController@storeadmin')
         ->name('storeadmin');
Route::get('/editadmin', 'UsersController@editadmin')
         ->name('editadmin');

         
Route::get('/saveedituser', 'CountriesController@saveedituser')
         ->name('saveedituser');


Route::get('/campanyeditdate', 'Companycontroller@campanyeditdate')
         ->name('campanyeditdate');


Route::get('/campany', 'Companycontroller@campany')
         ->name('campany');

Route::group([
            'prefix' => 'order_rents',
        ], function () {
            Route::get('/', 'OrderRentsController@index')
                 ->name('order_rents.order_rent.index');
            Route::get('/create','OrderRentsController@create')
                 ->name('order_rents.order_rent.create');
            Route::get('/show/{orderRent}','OrderRentsController@show')
                 ->name('order_rents.order_rent.show')->where('id', '[0-9]+');
            Route::get('/{orderRent}/edit','OrderRentsController@edit')
                 ->name('order_rents.order_rent.edit')->where('id', '[0-9]+');
            Route::post('/', 'OrderRentsController@store')
                 ->name('order_rents.order_rent.store');
            Route::put('order_rent/{orderRent}', 'OrderRentsController@update')
                 ->name('order_rents.order_rent.update')->where('id', '[0-9]+');
            Route::delete('/order_rent/{orderRent}','OrderRentsController@destroy')
                 ->name('order_rents.order_rent.destroy')->where('id', '[0-9]+');
        });





Route::group([
    'prefix' => 'order_seles',
], function () {
    Route::get('/', 'OrderSelesController@index')
         ->name('order_seles.order_sele.index');
    Route::get('/create','OrderSelesController@create')
         ->name('order_seles.order_sele.create');
    Route::get('/show/{orderSele}','OrderSelesController@show')
         ->name('order_seles.order_sele.show')->where('id', '[0-9]+');
    Route::get('/{orderSele}/edit','OrderSelesController@edit')
         ->name('order_seles.order_sele.edit')->where('id', '[0-9]+');
    Route::post('/', 'OrderSelesController@store')
         ->name('order_seles.order_sele.store');
    Route::put('order_sele/{orderSele}', 'OrderSelesController@update')
         ->name('order_seles.order_sele.update')->where('id', '[0-9]+');
    Route::delete('/order_sele/{orderSele}','OrderSelesController@destroy')
         ->name('order_seles.order_sele.destroy')->where('id', '[0-9]+');
});



Route::group([
    'prefix' => 'produits',
], function () {


    Route::get('/', 'ProduitsController@index')
         ->name('produits.produit.index');
    Route::get('/create/{produit}','ProduitsController@create')
         ->name('produits.produit.create')->where('id', '[0-9]+');
    Route::get('/show/{produit}','ProduitsController@show')
         ->name('produits.produit.show')->where('id', '[0-9]+');
    Route::get('/{produit}/edit','ProduitsController@edit')
         ->name('produits.produit.edit')->where('id', '[0-9]+');
    Route::post('/', 'ProduitsController@store')
         ->name('produits.produit.store');
    Route::put('produit/{produit}', 'ProduitsController@update')
         ->name('produits.produit.update')->where('id', '[0-9]+');
    Route::delete('/produit/{produit}','ProduitsController@destroy')
         ->name('produits.produit.destroy')->where('id', '[0-9]+');

    Route::get('/accepted/{produit}','ProduitsController@accepted')
         ->name('produits.produit.accepted')->where('id', '[0-9]+');

         Route::get('/vip/{produit}','ProduitsController@vup')
         ->name('produits.produit.vup')->where('id', '[0-9]+');

 Route::get('/vip/{produit}','ProduitsController@vup')
         ->name('produits.produit.vup')->where('id', '[0-9]+');


    Route::get('/refused/{produit}','ProduitsController@refused')
         ->name('produits.produit.refused')->where('id', '[0-9]+');


    Route::get('/addphoto/{produit}','ProduitsController@addphoto')
         ->name('produits.produit.addphoto')->where('id', '[0-9]+');

});
 Route::get('/notconfermid', 'ProduitsController@notconfermid')
         ->name('produits.produit.notconfermid');
Route::get('/refused', 'ProduitsController@refusedlist')
         ->name('produits.produit.refusedlist');

 Route::get('/vip1', 'ProduitsController@produitsvip1')
         ->name('produits.produit.produitsvip1');
 Route::get('/vip2', 'ProduitsController@produitsvip2')
         ->name('produits.produit.produitsvip2');
Route::get('/vip3', 'ProduitsController@produitsvip3')
         ->name('produits.produit.produitsvip3');



Route::group([
    'prefix' => 'settings',
], function () {
    Route::get('/', 'SettingsController@index')
         ->name('settings.settings.index');
    Route::get('/create','SettingsController@create')
         ->name('settings.settings.create');
    Route::get('/show/{settings}','SettingsController@show')
         ->name('settings.settings.show')->where('id', '[0-9]+');
    Route::get('/{settings}/edit','SettingsController@edit')
         ->name('settings.settings.edit')->where('id', '[0-9]+');
    Route::post('/', 'SettingsController@store')
         ->name('settings.settings.store');
    Route::put('settings/{settings}', 'SettingsController@update')
         ->name('settings.settings.update')->where('id', '[0-9]+');
    Route::delete('/settings/{settings}','SettingsController@destroy')
         ->name('settings.settings.destroy')->where('id', '[0-9]+');
});





Route::get('vip', 'VipsController@store')
         ->name('vip.store');

Route::get('vip/deleted ', 'VipsController@delete')
         ->name('vip.deleted');




});



});







 




Route::get('villectiy', function(Request $request){
 $id = $request->option;

    $Ville = Ville::where('city_id', $id)->get();
   // dd($ctiy);
    return $Ville;
});

Route::get('getcountries', function(Request $request){

 $id = $request->option;
    $City = City::where('countre_id', $id)->get();
   // dd($ctiy);
    return $City;
});



Route::get('getproduit', function(Request $request){
    $id = $request->option;
   $produit = Produit::find($id);

       return $produit;
   });






 Route::get('/privacy/ar', [App\Http\Controllers\SettingsController::class, 'Terms_ar'])
         ->name('settings.settings.Terms_ar');
 Route::get('/privacy', [App\Http\Controllers\SettingsController::class, 'Terms_en'])
         ->name('settings.settings.Terms_en');

 Route::get('/favorites',  [App\Http\Controllers\FrontController::class, 'favorites'])
         ->name('favorites.favorite.store');

 Route::get('/download', [App\Http\Controllers\SettingsController::class, 'download'])
         ->name('settings.download');
Route::get('/dwnd', [App\Http\Controllers\SettingsController::class, 'downl'])
         ->name('settings.dwnd');


Route::get('notification/add', 'App\Http\Controllers\notificationController@add')
         ->name('notification.add');
Route::get('notification/send', 'App\Http\Controllers\notificationController@send')
         ->name('notification.send');
Route::get('notificationvu', 'App\Http\Controllers\notificationController@vu')
         ->name('notification.vu');

Route::get('notifications', 'App\Http\Controllers\notificationController@index')
         ->name('notifications.index');
 




