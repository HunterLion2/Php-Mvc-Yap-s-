<?php 

require __DIR__ . "/../vendor/autoload.php";

use App\Core\Route;

Route::add('/','Front\HomeController@index'); // Biz her yeni bir sayfa açtığımız zaman Buraya o route değerini ekleriz.
// Burada yukarıda kullandığımız @ işareti Controller içerisindeki function değeridir.


$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if($uri === '') {
    $uri = '/';
}

Route::dispatch($uri);

?>