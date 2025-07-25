<?php 

namespace App\Controllers\Front;

use App\Core\BaseController;

class HomeController extends BaseController {
    public function index() 
    {

        // Veri Tabanı Bağlantısı Testi

        // try {
        //     $db = Database::getInstance()->getConnection();
        //     echo "Veri Tabanı Bağlantısı Başarılı.";
        // } catch (Exception $e) {
        //     echo "Veri tabanı bağlantısı başarısız: " . $e->getMessage();
        // }


        // Bu aşşağıda ki alana data'dan çektiğimiz değerler olarak görebiliriz bu değerleri de view's içerisine aşşağıdaki şekilde göndeririz.
        $title = "MVC Eğitimine Hoşgeldiniz";
        $content = "MVC Eğitimi Detayı";
        $this->render("front/example", ['title' => $title , 'content' => $content]);
    }
}

?>