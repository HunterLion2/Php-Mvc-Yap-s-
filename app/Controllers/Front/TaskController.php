<?php

namespace App\Controllers\Front;

use App\Core\BaseController;
use App\Models\Task;

class TaskController extends BaseController
{
    private $taskModel;

    public function __construct()
    {
        $this->taskModel = new Task();
    }

    public function index()
    {
        $tasks = $this->taskModel->getAll();
        $this->render("front/task", ['tasks' => $tasks]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? null;
            $description = $_POST['description'] ?? null;

            if (empty($title) || empty($description)) { // Burada ki empty değerleri içine girilen değerlerin boş olup olmadığına bakar.
                $this->render('front/create-task', ['error' => 'Başlık ve Açıklama alanları boş bırakılamaz.']);
            }

            if ($this->taskModel->create($title, $description)) {
                $this->render('front/create-task', ['success' => 'Görev başarıyla oluşturuldu']);
            } else {
                $this->render('front/create-task', ['error' => 'Görev oluşturulurken bir hata oluştu.']);
            }
        } else {
            $this->render('front/create-task');
        }
    }
}
