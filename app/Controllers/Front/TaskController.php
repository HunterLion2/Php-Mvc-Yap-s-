<?php

namespace App\Controllers\Front;

use App\Core\BaseController;
use App\Models\Task;

class TaskController extends BaseController
{
    private $taskModel;

    public function __construct() {

        $this->taskModel = new Task();

    }

    public function index() {

        $tasks = $this->taskModel->getAll();
        $this->render("front/task", ['tasks' => $tasks]);

    }

    public function create() {
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? null;
            $description = $_POST['description'] ?? null;

            if (empty($title) || empty($description)) { // Burada ki empty değerleri içine girilen değerlerin boş olup olmadığına bakar.
                return $this->render('front/create-task', ['error' => 'Başlık ve Açıklama alanları boş bırakılamaz.']);
            }

            try {
                $this->taskModel->create($title, $description);
                return $this->render('front/task', [
                    'success' => "Görev Başarıyla Oluşturuldu",
                    'tasks' => $this->taskModel->getAll()
                ]);
            } catch (\Exception $e) {
                return $this->render('front/create-task', ['error' => "Görev Oluşturulamadı"]);
            }
        } else {
            return $this->render('front/create-task');
        }

    }

    public function update($id) {
    
        $task = $this->taskModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? null;
            $description = $_POST['description'] ?? null;

            if (empty($title) || empty($description)) { // Burada ki empty değerleri içine girilen değerlerin boş olup olmadığına bakar.
                return $this->render('front/update-task', [
                    'error' => 'Başlık ve Açıklama alanları boş bırakılamaz.',
                    'task' => $task
                ]);
            }

            try {
                $this->taskModel->update($id ,$title, $description);
                $task = $this->taskModel->getById($id);
                return $this->render('front/update-task', [
                    'success' => "Görev Başarıyla Güncellendi.",
                    'task' => $task
                ]);
            } catch (\Exception $e) {
                return $this->render('front/update-task', [
                    'error' => "Görev Güncellemesi Başarısız.",
                    'task' => $task
                ]);
            }
        } else {

            if(!$task) {
                return $this->render('front/update-task', ['error' => 'Görev Bulunamadı']);
            }


            return $this->render('front/update-task' , [
                'task' => $task
            ]);
        }

    }

    public function delete($id) {
        $task = $this->taskModel->getById($id);

        if($this->taskModel->delete($id)) {
            return $this->render('front/task', [
                'success' => 'Görev Başarıyla Silindi',
                'tasks' => $this->taskModel->getAll()
            ]);
        } else {
            return $this->render('front/task', [
                'error' => 'Görev Silinemedi'
            ]);
        }
    }

}
