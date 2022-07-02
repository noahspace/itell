<?php \Itell\Widget\Option::alloc()->to($option); ?>
<form action="<?= $option->siteUrl('action/theme-handler?config=custom') ?>" method="post">
    <div class="itell-option">
        <label class="itell-label" for="val1">主题参数一</label>
        <input class="itell-input" type="text" name="val1" value="<?= $data['val1'] ?>">
    </div>
    <div class="itell-option">
        <label class="itell-label" for="val2">主题参数二</label>
        <input class="itell-input" type="text" name="val2" value="<?= $data['val2'] ?>">
    </div>
    <button class="itell-btn" type="submit">保存设置</button>
</form>
