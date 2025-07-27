<?php 


namespace App\Core;

use Carbon\Carbon;

class BaseController {

    public function render($view,$data = []) {

        Carbon::setLocale('tr');
        $data['Carbon'] = new Carbon();
        
        extract($data);

        require __DIR__ . "/../../Views/layouts/header.php";
        require __DIR__ . "/../../Views/$view.php";
        require __DIR__ . "/../../Views/layouts/footer.php"; 
    }
    
}


?>