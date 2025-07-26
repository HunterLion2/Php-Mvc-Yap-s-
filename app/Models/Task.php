<?php 

namespace App\Models;

use App\Core\Database;
use PDO;

class Task {
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $query = $this->db->prepare("SELECT * FROM tasks");// Prepare SQL yazabilmemizi sağlar.
        $query->execute(); // execute değeri ile yazdığımız sorguyu SQL veritabanına gönderip çalıştırırız.
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title,$description) {
        $query = $this->db->prepare("INSERT INTO tasks SET title = :title, description = :description");
        $query->execute(
            [
                'title' => $title,
                'description' => $description
            ]
        );

        return $query->rowCount(); // rowCount fonksiyonu eğer yukarıda ki kayıt başarılı ise 1 değeri döndürür değilse 0 değerini döndürür.
    }

}



?>