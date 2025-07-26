<div class="container">

    <h1>Görev Ekleme</h1>

    <form action="create/task" method="post"> <!-- action değeri içerisine gönderilecek olan bilgilerin route adresi girilir. -->
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" class="form-control" id="title" name="title"> <!-- Burada önemli olan şey name değeridir. -->
        </div>

        <div class="form-group">
            <label for="description">Açıklama</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Görev Oluştur</button>

        <?php if(isset($error)) : ?> <!-- isset değeri içerisine girilen değerin tanımlı olup olmadığına bakar. -->
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $error ?>
            </div>
        <?php endif; ?>

        <?php if(isset($success)) : ?>
            <?php echo $success; ?>
        <?php endif; ?>
    </form>

</div>