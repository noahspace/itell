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
         * 生成随机字符串
         *
         * @param integer $length 字符串长度
         * @param boolean $mixedCase 混合大小写
         * @param boolean $specialChars 是否有特殊字符
         */
        public static function randString($length, $mixedCase = false, $specialChars = false)
        {
            $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';

            if ($mixedCase) {
                $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }

            if ($specialChars) {
                $chars .= '.!@#$%^&*()';
            }

            $result = '';
            $max = strlen($chars) - 1;
            for ($i = 0; $i < $length; $i++) {
                $result .= $chars[rand(0, $max)];
            }
            return $result;
        }

        /**
         * 对字符串进行 hash 加密
         *
         * @param string $string 目标字符串
         * @param string|null $salt 扰码
         */
        public static function hash($string, $salt = null)
        {
            $salt = empty($salt) ? self::randString(32) : $salt;
            $hash = '';
            $pos = 0;
            $saltPos = 0;

            while ($pos < strlen($string)) {
                if ($saltPos === strlen($salt)) {
                    $saltPos = 0;
                }

                $hash .= chr(ord($string[$pos]) + ord($salt[$saltPos]));

                $pos++;
                $saltPos++;
            }

            return $salt . md5($hash);
        }

        /**
         * 验证 hash
         *
         * @param string $from 源字符串
         * @param string $to 目标字符串
         */
        public static function hashValidate($from, $to)
        {
            return self::hash($from, substr($to, 0, 32)) === $to;
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

            echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$code}</title>
    <style>
        html {
            padding: 8%;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #666;
            background: #F6F6F3;
            word-break: break-all;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            max-width: 560px;
            padding: 1.6rem 2rem;
            margin: 0 auto;
            background: #FFF;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">{$message}</div>
</body>
</html>\n
HTML;
            exit;
        }
    }
}
