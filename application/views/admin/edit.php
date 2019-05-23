<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?= $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/edit/<?php echo $data['id']; ?>" method="post">
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text"
                                       value="<?= htmlspecialchars($data['title'], ENT_QUOTES); ?>" name="title">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <input class="form-control" type="text"
                                       value="<?= htmlspecialchars($data['description'], ENT_QUOTES); ?>"
                                       name="description">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea class="form-control" rows="3"
                                          name="content"><?= htmlspecialchars($data['content'], ENT_QUOTES); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <?php if (file_exists("public/uploads/" . $data['id'] . ".jpg")) : ?>
                                    <p>
                                        <img src="/public/uploads/<?= $data['id']; ?>.jpg" width="500"
                                             alt="<?= htmlspecialchars($data['title'], ENT_QUOTES); ?>">
                                    </p>
                                    <p>
                                        Заменить изображение:
                                    </p>
                                <?php endif; ?>
                                <input class="form-control" type="file" name="img">
                            </div>
                            <div class="form-group">
                                <label>Статус</label>
                                <p>
                                    <?php if ($data['status'] == "open") { ?>
                                        <select name="status">
                                            <option value="open">Опубликовно</option>
                                            <option value="close">Черновик</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="status">
                                            <option value="close">Черновик</option>
                                            <option value="open">Опубликовно</option>
                                        </select>
                                    <?php } ?>
                                </p>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>