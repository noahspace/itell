<?php require __DIR__ . '/common.php'; ?>
<?php require __DIR__ . '/header.php'; ?>
<?php require __DIR__ . '/navbar.php'; ?>
<?php \Itell\Widget\Theme\Rows::alloc()->to($theme); ?>
<div class="container">
    <h2 class="my-3">主题</h2>
    <?php if ($theme->have()) : ?>
        <div class="theme row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
            <?php while ($theme->next()) : ?>
                <div class="col">
                    <div class="card shadow-sm<?= $theme->is_activated ? ' active' : '' ?>">
                        <img class="theme-preview card-img-top" src="/content/themes/<?= $theme->dir ?>/screenshot.png"></img>
                        <div class="card-body">
                            <p class="card-text text-truncate-2" data-bs-toggle="tooltip" data-bs-placement="auto" title="<?= $theme->description ?>"><?= $theme->description ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <span class="me-2">作者：<a href="<?= $theme->author_url ?>"><?= $theme->author ?></a></span>
                                    <span>版本：<?= $theme->version ?></span>
                                </small>
                                <div class="btn-group">
                                    <?php if ($theme->is_activated) : ?>
                                        <a class="btn btn-sm btn-primary" href="<?= $option->adminUrl('theme-config.php?config=' . $theme->dir) ?>">设置</a>
                                    <?php else : ?>
                                        <?php if ($theme->is_complete) : ?>
                                            <a class="btn btn-sm btn-primary" href="<?= $option->siteUrl('action/theme-handler?activate=' . $theme->dir) ?>">启用</a>
                                        <?php else : ?>
                                            <span>已损坏</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <strong>暂无数据</strong>
    <?php endif; ?>
</div>
<?php require __DIR__ . '/common-js.php'; ?>
<?php require __DIR__ . '/footer.php'; ?>
