<?php require __DIR__ . '/common.php'; ?>
<?php require __DIR__ . '/header.php'; ?>
<?php require __DIR__ . '/navbar.php'; ?>
<?php \Itell\Widget\Theme\Rows::alloc()->to($theme); ?>
<div class="container">
    <h2 class="my-3">主题</h2>
    <div class="card">
        <div class="card-body">
            <?php if ($theme->have()) : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">主题名称</th>
                            <th scope="col">详情</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($theme->next()) : ?>
                            <tr class="<?= $theme->is_activated ? ' active' : '' ?>">
                                <td><?= $theme->name ?></td>
                                <td>
                                    <div><?= $theme->description ?></div>
                                    <div class="small">
                                        <span class="me-2">版本：<strong><?= $theme->version ?></strong></span>
                                        <span>作者：<a class="text-decoration-none" href="<?= $theme->author_url ?>"><strong><?= $theme->author ?></strong></a></span>
                                    </div>
                                </td>
                                <td>
                                    <?php if ($theme->is_activated) : ?>
                                        <a class="text-decoration-none" style="--bs-btn-padding-y: 0; --bs-btn-padding-x: 0;" href="<?= $option->adminUrl('theme-config.php?config=' . $theme->dir) ?>">设置</a>
                                    <?php else : ?>
                                        <?php if ($theme->is_complete) : ?>
                                            <a class="text-decoration-none" style="--bs-btn-padding-y: 0; --bs-btn-padding-x: 0;" href="<?= $option->siteUrl('action/theme-handler?activate=' . $theme->dir) ?>">启用</a>
                                        <?php else : ?>
                                            <span>已损坏</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <strong>暂无数据</strong>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require __DIR__ . '/common-js.php'; ?>
<?php require __DIR__ . '/footer.php'; ?>
