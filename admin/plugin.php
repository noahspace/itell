<?php require __DIR__ . '/common.php'; ?>
<?php require __DIR__ . '/header.php'; ?>
<?php require __DIR__ . '/navbar.php'; ?>
<div class="itell-main">
    <?php require __DIR__ . '/menu.php'; ?>
    <div class="itell-content-wrap">
        <h2 class="itell-page-title">插件</h2>
        <div class="plugin">
            <?php \Itell\Widget\Plugin\Rows::alloc()->to($plugins); ?>
            <?php if ($plugins->have()) : ?>
                <table class="itell-table">
                    <colgroup>
                        <col width="25%">
                        <col width="">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>名称</th>
                            <th>描述</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($plugins->next()) : ?>
                            <tr>
                                <td><?= $plugins->name ?></td>
                                <td>
                                    <div class="description"><?= $plugins->description ?></div>
                                    <div class="copyright">
                                        <span>版本：<strong><?= $plugins->version ?></strong></span>
                                        <span>作者：<a href="<?= $plugins->author_url ?>"><strong><?= $plugins->author ?></strong></a></span>
                                    </div>
                                </td>
                                <td class="action">
                                    <?php if ($plugins->is_complete) : ?>
                                        <?php if ($plugins->is_activated) : ?>
                                            <a href="<?= $option->siteUrl('action/plugin-handler?deactivate=' . $plugins->dir) ?>">禁用</a>
                                            <?php if ($plugins->is_config) : ?>
                                                <a href="<?= $option->adminUrl('plugin-config.php?config=' . $plugins->dir) ?>">设置</a>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <a href="<?= $option->siteUrl('action/plugin-handler?activate=' . $plugins->dir) ?>">启用</a>
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
