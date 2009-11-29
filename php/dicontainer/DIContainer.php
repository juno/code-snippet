<?php
// DIContainer.php

class DIContainer
{
    private $components = array();

    /**
     * 指定された名前でコンポーネントを登録します。
     *
     * @param string $name 登録する際の名前
     * @param mixed $value コンポーネントとして登録する値
     */
    public function add($name, $value)
    {
        $this->components[$name] = $value;
    }

    /**
     * 指定された名前で登録されたコンポーネントを返します。
     *
     * @param string $name 取得するコンポーネントの名前
     * @return mixed コンポーネントまたはNULL
     */
    public function get($name)
    {
        if (!array_key_exists($name, $this->components)) {
            return null;
        }

        $component = $this->components[$name];
        $this->injectDependency($component);

        return $component;
    }

    /**
     * 指定されたコンポーネントに、setterを利用して他コンポーネントの値を設定します。
     *
     * @param object $component コンポーネント
     */
    private function injectDependency($component)
    {
        foreach (get_class_methods(get_class($component)) as $method) {
            $property = self::extractPropertyName($method);
            if (is_null($property) || !array_key_exists($property, $this->components)) {
                continue;
            }

            call_user_func(array($component, 'set' . $property), $this->components[$property]);
        }
    }

    /**
     * 指定されたsetterメソッド名からプロパティ名を取得します。
     *
     * @param string $name メソッド名
     */
    private static function extractPropertyName($method_name)
    {
        return preg_match("/^set([A-Z][A-Za-z]+)$/", $method_name, $matches) ? strtolower($matches[1]) : null;
    }
}
