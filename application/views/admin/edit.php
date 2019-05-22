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
                                       value="<?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?>" name="title">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <input class="form-control" type="text"
                                       value="<?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?>"
                                       name="description">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea class="form-control" rows="3"
                                          name="content"><?php echo htmlspecialchars($data['content'], ENT_QUOTES); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Изображение</label>
                                <input class="form-control" type="file" name="img">
                            </div>
                            <div class="form-group">
                                <label>Статус</label>
                                <p>
                                    <select name="status">
                                        <option value="close">Черновик</option>
                                        <option value="open">Опубликовать</option>
                                    </select>
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