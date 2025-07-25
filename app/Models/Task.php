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
        $query->execute(); // execute değeri ile SQL'i çalıştırmış oluruz.
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}



?>