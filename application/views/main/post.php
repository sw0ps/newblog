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