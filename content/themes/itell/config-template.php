<?php \Itell\Widget\Option::alloc()->to($option); ?>
<form action="<?= $option->siteUrl('action/theme-handler?config=itell') ?>" method="post">
    <input type="text" name="val1" value="<?= $data['val1'] ?>">
    <input type="text" name="val2" value="<?= $data['val2'] ?>">
    <button type="submit">提交</button>
</form>
