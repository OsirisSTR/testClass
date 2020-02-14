<form action="" method="POST">
    <div class="form-group mt-5">
        <label for="post_date">Дата публикации:
            <?= $post->datePublication ? date_format(new DateTime($post->datePublication),'d.m.Y'): date("d:m:Y") ?>
        </label>
    </div>
    <div class="form-group mt-5">
        <label for="title" class="mb-3">Название:</label>
        <input type="text" class="form-control" id="title"
               name="title" required disabled="disabled"
               value="<?=$post->title ?? ''?>">
    </div>
    <div class="form-group">
        <label for="description" class="mb-3">Введите текст:</label>
        <textarea class="form-control" id="description" disabled="disabled"
                  name="description" rows="10" cols="50" required>
            <?= $post->description ?? ''?>
            </textarea>
    </div>
    <img src="/../../uploads/<?= $post->photo ?> " width="200px">
    <button type="submit" name="btnDelPost" class="btn btn-primary">
        Удалить
    </button>
    <button type="submit" name="btnBack" class="btn btn-primary">
        Назад
    </button>
</form>