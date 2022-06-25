<?php \Itell\Widget\Option::alloc()->to($option); ?>
<form action="<?= $option->siteUrl('action/plugin-handler?config=HelloWorld') ?>" method="post">
    <div class="itell-option">
        <label class="itell-label" for="value">主题设置</label>
        <input class="itell-input" type="text" name="value" value="<?= $data['value'] ?>">
        <div class="itell-description">
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
            <div>这是主题设置的一部分</div>
        </div>
    </div>
    <button class="itell-btn" type="submit">保存设置</button>
</form>
