<?php require __DIR__ . '/common.php'; ?>
<?php require __DIR__ . '/header.php'; ?>
<?php require __DIR__ . '/navbar.php'; ?>
<?php \Itell\Widget\Plugin\Rows::alloc()->to($plugin); ?>
<div class="container">
    <h2 class="my-3">插件</h2>
    <div class="card">
        <div class="card-body">
            <?php if ($plugin->have()) : ?>
                <table class="table">
                    <colgroup>
                        <col width="20%">
                        <col width="60%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th scope="col">插件名称</th>
                            <th scope="col">详情</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($plugin->next()) : ?>
                            <tr class="<?= $plugin->is_activated ? ' active' : '' ?>">
                                <td><?= $plugin->name ?></td>
                                <td>
                                    <div class="text-truncate-2" data-bs-toggle="tooltip" data-bs-placement="auto" title="<?= $plugin->description ?>"><?= $plugin->description ?></div>
                                    <small class="text-muted">
                                        <span class="me-2">作者：<a href="<?= $plugin->author_url ?>"><?= $plugin->author ?></a></span>
                                        <span>版本：<?= $plugin->version ?></span>
                                    </small>
                                </td>
                                <td>
                                    <?php if ($plugin->is_complete) : ?>
                                        <?php if ($plugin->is_activated) : ?>
                                            <a class="text-decoration-none" href="<?= $option->siteUrl('action/plugin-handler?deactivate=' . $plugin->dir) ?>">禁用</a>
                                            <?php if ($plugin->is_config) : ?>
                                                <a class="text-decoration-none" href="<?= $option->adminUrl('plugin-config.php?config=' . $plugin->dir) ?>">设置</a>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <a class="text-decoration-none" href="<?= $option->siteUrl('action/plugin-handler?activate=' . $plugin->dir) ?>">启用</a>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <span>损坏</span>
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
