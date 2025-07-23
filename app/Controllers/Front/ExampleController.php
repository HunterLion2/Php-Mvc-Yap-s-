<?php 

namespace App\Controllers\Front;

use App\Core\BaseController;

class ExampleController extends BaseController {
    public function index() 
    {
        // Bu aşşağıda ki alana data'dan çektiğimiz değerler olarak görebiliriz bu değerleri de view's içerisine aşşağıdaki şekilde göndeririz.
        $title = "Örnek MVC Sayfası";
        $content = "Örnek MVC Sayfa Detayı...";
        $this->render("front/home", ['title' => $title , 'content' => $content]);
    }
}

?>