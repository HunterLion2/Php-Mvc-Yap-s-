<?php 

namespace App\Controllers\Front;

use App\Core\BaseController;

class HomeController extends BaseController {
    public function index() 
    {
        // Bu aşşağıda ki alana data'dan çektiğimiz değerler olarak görebiliriz bu değerleri de view's içerisine aşşağıdaki şekilde göndeririz.
        $title = "MVC Eğitimine Hoşgeldiniz";
        $content = "MVC Eğitimi Detayı";
        $this->render("front/home", ['title' => $title , 'content' => $content]);
    }
}

?>