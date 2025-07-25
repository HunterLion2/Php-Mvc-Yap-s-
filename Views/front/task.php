<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Görevler</h1>
        <a href="/create/ask" class="btn btn-primary">Görev Ekle</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Başlık</th>
                <th scope="col">İçerik</th>
                <th scope="col">işlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $task) : ?>
                <tr>
                    <th scope="row"><?php echo $task['id']; ?></th>
                    <td scope="row"><?php echo $task['title']; ?></td>
                    <td scope="row"><?php echo $task['description']; ?></td>
                    <td>
                        <a href="/edit/task?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-warning">Düzenle</a>
                        <a href="/delete/task?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-danger">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>