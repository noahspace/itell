<?php
require __DIR__ . '/common.php';
require __DIR__ . '/header.php';
?>
<div class="container">
    <h2 class="itell-title">插件管理</h2>
    <div class="plugin">
        <div class="itell-tabs">
            <a class="tab" href="<?= $option->adminUrl('plugin.php') ?>">全部插件</a>
            <a class="tab" href="<?= $option->adminUrl('plugin.php?status=activated') ?>">已启用</a>
        </div>
        <div class="itell-table">
            <?php \Itell\Widget\Plugin\Rows::alloc()->to($plugins); ?>
            <?php if ($plugins->have()) : ?>
                <table>
                    <colgroup>
                        <col width="25%">
                        <col width="30%">
                        <col width="15%">
                        <col width="15%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>名称</th>
                            <th>描述</th>
                            <th>版本</th>
                            <th>作者</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($plugins->next()) : ?>
                            <tr>
                                <td><?= $plugins->name ?></td>
                                <td><?= $plugins->description ?></td>
                                <td><?= $plugins->version ?></td>
                                <td><?= $plugins->author ?></td>
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
<?php require __DIR__ . '/footer.php'; ?>
