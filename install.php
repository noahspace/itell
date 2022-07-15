<?php
function get_default_routers()
{
    return [
        [
            'regx' => '\/^[\\\/]?$\/',
            'widget' => '\\Itell\\Widget\\Index',
            'action' => 'render',
        ],
        [
            'regx' => '\/^\\\/action\\\/([_0-9a-zA-Z-]+)[\\\/]?$\/',
            'widget' => '\\Itell\\Widget\\Action',
            'params' => ['action'],
        ],
    ];
}

function get_default_options()
{
    return [
        'rewrite' => '0',
    ];
}

function index()
{
    echo <<<HTML
<div>
    欢迎使用
    <a href="/install.php?action=config">确认</a>
</div>
HTML;
}

function config()
{
    echo <<<HTML
<form action="/install.php?action=install" method="post">
    <div>
        <label for="type">数据库类型</label>
        <input id="type" name="type" type="text" value="mysql">
    </div>
    <div>
        <label for="host">数据库服务器</label>
        <input id="host" name="host" type="text" value="localhost">
    </div>
    <div>
        <label for="database">数据库</label>
        <input id="database" name="database" type="text" value="itell">
    </div>
    <div>
        <label for="port">端口</label>
        <input id="port" name="port" type="text" value="3306">
    </div>
    <div>
        <label for="username">数据库用户名</label>
        <input id="username" name="username" type="text" value="root">
    </div>
    <div>
        <label for="password">数据库密码</label>
        <input id="password" name="password" type="text">
    </div>


    <div>
        <label for="prefix">数据库表前缀</label>
        <input id="prefix" name="prefix" type="text">
    </div>
    <div>
        <label for="charset">字符集</label>
        <input id="charset" name="charset" type="text" value="utf8mb4">
    </div>
    <div>
        <label for="collation">整理类型</label>
        <input id="collation" name="collation" type="text" value="utf8mb4_general_ci">
    </div>

    <button type="submit">登录</button>
</form>
HTML;
}

function install()
{
    $str = <<<CONFIG
<?php
// 根路径
define('ITELL_ROOT_PATH', __DIR__ . '/');

// 调试模式
define('DEBUG', true);

// 数据库配置
define('DB_CONFIG', [
    // [必填]
    'type' => '{$_POST['type']}',
    'host' => '{$_POST['host']}',
    'database' => '{$_POST['database']}',
    'username' => '{$_POST['username']}',
    'password' => '{$_POST['password']}',

    // [可选]
    'charset' => '{$_POST['charset']}',
    'collation' => '{$_POST['collation']}',
    'port' => '{$_POST['port']}',

    // [可选] 表前缀
    'prefix' => '{$_POST['prefix']}',
]);

// 加载公共类
require ITELL_ROOT_PATH . 'includes/Common.php';\n
CONFIG;
    file_put_contents(__DIR__ . '/config.php', $str);
}

function render()
{
    $action = $_GET['action'] ?? '';

    if (empty($action)) {
        index();
    } else if ($action === 'config') {
        config();
    } else if ($action === 'install') {
        install();
        header('Location: /');
    }
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>安装程序</title>
</head>

<body>
    <?= render(); ?>
</body>

</html>
