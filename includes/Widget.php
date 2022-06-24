<?php

namespace Itell;

use Itell\Helper\EmptyClass;

abstract class Widget
{
    /**
     * widget 对象池
     */
    private static $widgetPool = [];

    /**
     * 参数
     */
    protected $params;

    /**
     * 数据堆栈
     */
    protected $stack = [];

    /**
     * 堆栈序列
     */
    protected $sequence = 0;

    /**
     * 堆栈一行数据
     */
    protected $row = [];

    /**
     * 构造函数
     *
     * @param object $request Request 对象
     * @param object $response Response 对象
     * @param object $params 参数
     */
    public function __construct($request, $response, $params)
    {
        $this->request = $request;
        $this->response = $response;
        $this->params = $params;

        // 执行组件初始化方法
        $this->init();
    }

    protected function init()
    {
    }

    public function execute()
    {
    }

    /**
     * 获取组件实例
     *
     * @param array $params 参数列表
     */
    public static function alloc($params = [])
    {
        return self::factory(static::class, $params);
    }

    /**
     * 获取别名组件实例
     */
    public static function allocWithAlias($alias, $params = [])
    {
        return self::factory(static::class . '@' . $alias, $params);
    }

    /**
     * 工厂方法
     *
     * @param mixed $className 组件类名
     * @param mixed $params 参数列表
     */
    public static function factory($alias, $params = null)
    {
        [$className] = explode('@', $alias);

        // 判断组件池是否存在
        if (!isset(self::$widgetPool[$alias])) {
            // 初始化 request
            $request = Request::getInstance();
            // 初始化 response
            $response = Response::getInstance();

            try {
                $widget = new $className($request, $response, $params);
                // 执行
                $widget->execute();
            } catch (\Throwable $th) {
                throw $th;
                $widget = $widget ?? null;
            }

            self::$widgetPool[$alias] = $widget;
        }

        return self::$widgetPool[$alias];
    }

    /**
     * 类赋值
     *
     * @param mixed $variable 变量
     * @param string $key 键值
     */
    public function to(&$variable)
    {
        return $variable = $this;
    }

    /**
     * 行动绑定
     */
    public function on($condition)
    {
        if ($condition) {
            return $this;
        } else {
            return EmptyClass::getInstance();
        }
    }

    /**
     * 返回堆栈一行，并移动堆栈序列
     */
    public function next()
    {
        $key = key($this->stack);

        if ($key !== null && isset($this->stack[$key])) {
            $this->row = current($this->stack);
            next($this->stack);
            $this->sequence++;
        } else {
            reset($this->stack);
            $this->sequence = 0;
            return false;
        }

        return $this->row;
    }

    /**
     * 将一行数据压入堆栈
     *
     * @param array $value 相应的值
     */
    public function push($value)
    {
        //将行数据按顺序置位
        $this->row = $value;

        $this->stack[] = $value;
        return $value;
    }

    /**
     * 返回堆栈是否为空
     */
    public function have()
    {
        return !empty($this->stack);
    }

    /**
     * 获取内部变量
     *
     * @param string $name 值对应的键值
     */
    public function __get($name)
    {
        // 堆栈列
        if (array_key_exists($name, $this->row)) {
            return $this->row[$name];
        }

        // 计算属性
        $method = '___' . $name;
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return null;
    }

    /**
     * 设置堆栈一行的值
     *
     * @param string $name 值对应的键值
     * @param mixed $value 相应的值
     */
    public function __set($name, $value)
    {
        $this->row[$name] = $value;
    }
}
