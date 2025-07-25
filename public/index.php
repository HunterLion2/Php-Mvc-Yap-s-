<?php 

require __DIR__ . "/../vendor/autoload.php";

use App\Core\Route;

// Burada yukarıda kullandığımız @ işareti Controller içerisindeki function değeridir.
Route::add('/','Front\HomeController@index'); // Biz her yeni bir sayfa açtığımız zaman Buraya o route değerini ekleriz.
Route::add('example','Front\ExampleController@index');
Route::add('task','Front\TaskController@index');





// Route Oluşturma

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if($uri === '') {
    $uri = '/';
}

Route::dispatch($uri);

?>