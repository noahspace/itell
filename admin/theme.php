<?php require __DIR__ . '/common.php';
require __DIR__ . '/header.php'; ?>
<div class="container">
    <h2 class="itell-title">主题管理</h2>
    <div class="theme">
        <div class="itell-tabs">
            <a class="tab" href="<?= $option->adminUrl('theme.php') ?>">全部主题</a>
        </div>
        <div class="itell-table">
            <?php \Itell\Widget\Theme\Rows::alloc()->to($themes); ?>
            <?php if ($themes->have()) : ?>
                <table>
                    <colgroup>
                        <col width="30%">
                        <col width="70%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>截图</th>
                            <th>详情</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($themes->next()) : ?>
                            <tr class="<?= $themes->is_activated ? 'active' : '' ?>">
                                <td>
                                    <img class="preview" src="" alt="">
                                </td>
                                <td>
                                    <?php if ($themes->is_complete) : ?>
                                        <h3 class="theme-name"><?= $themes->name ?></h3>
                                        <div class="theme-info">
                                            <div>
                                                <span>作者：</span>
                                                <a href="<?= $themes->author_url ?>"><?= $themes->author ?></a>
                                            </div>
                                            <div>版本：<?= $themes->version ?></div>
                                        </div>
                                        <p class="theme-description"><?= $themes->description ?></p>
                                        <div class="action">
                                            <?php if (!$themes->is_activated) : ?>
                                                <a href="<?= $option->siteUrl('action/theme-handler?activate=' . $themes->dir) ?>">启用</a>
                                            <?php elseif ($themes->is_config) : ?>
                                                <a href="<?= $option->adminUrl('theme-config.php?config=' . $themes->dir) ?>">设置</a>
                                            <?php endif; ?>
                                        </div>
                                    <?php else : ?>
                                        已损坏
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
