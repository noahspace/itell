<?php \Itell\Widget\Option::alloc()->to($option); ?>
<form action="<?= $option->siteUrl('action/plugin-handler?config=HelloWorld') ?>" method="post">
    <div class="itell-option">
        <label class="itell-label" for="value">内容</label>
        <input class="itell-input" type="text" name="value" value="<?= $data['value'] ?>">
        <div class="itell-description">右上侧显示内容</div>
    </div>
    <button class="itell-btn" type="submit">保存设置</button>
</form>
