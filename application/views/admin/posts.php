<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Посты</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (empty($list)): ?>
                            <p>Список постов пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>Дата публикации</th>
                                    <th>Статус</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Редактировать</th>
                                    <th>Удалить</th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars(date("H:i d-m-Y", $val['publication_date']), ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['status'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['description'], ENT_QUOTES); ?></td>
                                        <td><a href="/admin/edit/<?php echo $val['id']; ?>" class="btn btn-primary">Редактировать</a></td>
                                        <td><a href="/admin/delete/<?php echo $val['id']; ?>" class="btn btn-danger">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
<!--                            --><?php //echo $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>