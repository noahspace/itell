<?php

namespace Itell\Helper;

/**
 * 渲染器
 */
class Renderer
{
    /**
     * 数据集
     */
    private $data = [];

    /**
     * 模版回调集
     */
    private $templateCallback = [];

    /**
     * 设置数据
     *
     * @param array $values 数据
     */
    public function setValue($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * 设置多项数据
     *
     * @param array $values 数据
     */
    public function setValues($values)
    {
        $this->data = array_merge($this->data, $values);
    }

    /**
     * 获取数据
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 设置模版
     */
    public function setTemplate($callback)
    {
        array_push($this->templateCallback, $callback);
    }

    public function render($data = null)
    {
        foreach ($this->templateCallback as $callback) {
            call_user_func($callback, $data ?: $this->data);
        }
    }
}
