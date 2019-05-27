<header class="masthead" style="background-image: url('/public/uploads/<?php echo $data['id']; ?>.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>
                        <?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?></h1>
                    <span class="subheading">
                    <?php echo htmlspecialchars($data['description'], ENT_QUOTES); ?></span>

                    <!--                    <h1>Пост</h1>-->
                    <!--                    <span class="subheading">Проверка поста</span>-->
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p><?php echo htmlspecialchars($data['content'], ENT_QUOTES); ?></p>
        </div>
    </div>
</div>
<hr>
<section class="container">
    <div class="row">
        <div class="col-md-9 m-auto">

            <div class="panel-body">
                <form id="add_comment" action="/comment/add" method="post">
                    <input type="hidden" name="posts_id" value="<?= $data['id']; ?>">
                    <input required class="form__comment form__comment--name form-control" type="text" name="name" placeholder="Имя">
                    <input required class="form__comment form__comment--email form-control" type="email" name="email" placeholder="Email">
                    <textarea required class="form__comment form__comment--text form-control" rows="2" name="comment" placeholder="Комментарий"></textarea>
                    <div class="mar-top clearfix">
                        <button class="btn btn-sm btn-primary pull-right" type="submit"><i
                                    class="fa fa-pencil fa-fw"></i> Добавить
                        </button>
                    </div>
                </form>
            </div>
            <hr>

            <div id="comment_block">
            </div>
        </div>
    </div>
</section>