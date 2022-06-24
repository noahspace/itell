<?php \Itell\Widget\Option::alloc()->to($option); ?>
<form action="<?= $option->siteUrl('action/plugin-handler?config=HelloWorld') ?>" method="post">
    <input type="text" name="value" value="<?= $data['value'] ?>">
    <button type="submit">提交</button>
</form>
