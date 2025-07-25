<?php 


namespace App\Core;


use PDO;
use PDOException; // Bu da hatalar için bir kütüphanedir.

class Database {

    private static $instance = null;
    private $connection;

    private function __construct(){
        $config = require __DIR__ . '/../config.php'; // Burada config dosyasını içeri dahil etmiş olduk.
        $db = $config['db']; // Burada da dahil ettiğimiz sınıf içerisinden değer çekmiş olduk.

        $dsn = "mysql:host={$db['host']};dbname={$dbname['dbname']};charset={$db['charset']}";

        try {

            $this->connection = new PDO($dsn, $db['user'], $db['password']); // Burada connection değerini bağlanmak istediğimiz değere , kullanıcı adına ve parolasına bağlarız.
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Burada setAttribute değeri PDO'nun bir hata oluştuğu PDOException değerine bunu fırlatmasını sağlar biz de burada neleri fırlatıcağını içine yazarız.
        } catch (PDOException $e) {
            die("Veritabanı bağlantı hatası: " . $e->getMessage()); // Burada eğer bi hata yakalanırsa ne yazıcağını ve hatayı nasıl göstericeğini gireriz.
        }
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() { // Bu function değeri ile veri tabanı bilgisi döner.
        return $this->connection;
    }

}


?>