<header class="masthead" style="background-image: url('/public/images/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Прототип Блога</h1>
                    <span class="subheading">Разработка тестового блога</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div id="pagination_data"></div>
<!--            --><?php //if (empty($list)): ?>
<!--                <p>Список постов пуст</p>-->
<!--            --><?php //else: ?>
<!--                --><?php //foreach ($list as $val): ?>
<!--                    <div class="post-preview">-->
<!--                        <a href="/post/--><?//= $val['id']; ?><!--">-->
<!--                            <h2 class="post-title">--><?//=htmlspecialchars($val['name'], ENT_QUOTES); ?><!--</h2>-->
<!--                            <h5 class="post-subtitle">--><?//= htmlspecialchars($val['description'], ENT_QUOTES); ?><!--</h5>-->
<!--                        </a>-->
<!--                        <p class="post-meta">Идентфикатор этого поста --><?//= $val['id']; ?><!--</p>-->
<!--                    </div>-->
<!--                    <hr>-->
<!--                --><?php //endforeach; ?>
<!--                <div class="clearfix">-->
<!--                    --><?//= $pagination; ?>
<!--                </div>-->
<!--            --><?php //endif; ?>
        </div>
    </div>
</div>