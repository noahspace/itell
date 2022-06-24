<?php

namespace {
    // 定义类片段别名
    define('CLASS_FRAGMENT_ALIASES', [
        'Itell' => 'includes',
        'Content' => 'content',
        'Themes' => 'themes',
        'Plugins' => 'plugins',
    ]);

    // 自动加载
    spl_autoload_register(function ($className) {
        $classFragments = explode('\\', $className);

        array_walk($classFragments, function (&$fragment) {
            if (isset(CLASS_FRAGMENT_ALIASES[$fragment])) {
                $fragment = CLASS_FRAGMENT_ALIASES[$fragment];
            }
        });

        $filename = ITELL_ROOT_PATH . implode('/', $classFragments) . '.php';

        if (file_exists($filename)) {
            include $filename;
        }
    });
}

namespace Itell {
    /**
     * 公共用组件
     */
    class Common
    {
        /**
         * 程序初始化
         */
        public static function init()
        {
            // 非调试模式开启友好异常提示
            if (defined(DEBUG) || !DEBUG) {
                // 初始化异常处理
                set_exception_handler(function ($e) {
                    ob_end_clean();
                    ob_start(function ($buffer) {
                        return $buffer;
                    });

                    Common::error($e);
                    exit;
                });
            }

            // 获取选项对象
            $option = Widget\Option::alloc();

            // 初始化路由器
            Router::setRoutes($option->routingTable);
            // 初始化插件
            Plugin::init($option->plugins);
        }

        /**
         * 错误输出
         */
        public static function error($exception)
        {
            $code = $exception->getCode() ?? '500';
            $message = $exception->getMessage();

            if ($exception instanceof \Itell\Medoo\Exception) {
                $message = 'Database server error.';
            }

            include ITELL_ROOT_PATH . 'includes/Views/exception.php';
            exit;
        }
    }
}
