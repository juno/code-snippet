<?php
require_once 'DIContainer.php';

/**
 * PDOクラスをDIコンテナに登録するためのラッパクラス。
 */
class PDOComponent
{
    private $delegate;

    /**
     * メソッド呼び出しをPDOオブジェクトに転送します。
     *
     * @param string $name メソッド名
     * @param array $arguments 引数
     */
    public function __call($name, $arguments)
    {
        $callback = array($this->delegate, $name);
        if (!is_callable($callback)) {
            throw new Exception("Call to undefined method " . __CLASS__ . "::" . $name . "()");
        }
        return call_user_func_array($callback, $arguments);
    }

    /**
     * データベース接続設定を設定し、新しいPDOオブジェクトを生成します。
     *
     * @param array $config データベース接続設定
     */
    public function setConfig($config)
    {
        $dsn = $config['db'] . ':dbname=' . $config['dbname'] . ';host=' . $config['host'];
        $this->delegate = new PDO($dsn, $config['user'], $config['password']);
        $this->delegate->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

// テスト時のデータベース接続設定
$test_config = new ArrayObject(array(
                                   'db' => 'mysql',
                                   'dbname' => 'hoge_test',
                                   'host' => 'localhost',
                                   'user' => 'dbusername',
                                   'password' => 'dbpassword',
                                   ));

// 本番稼働時のデータベース接続設定
$prod_config = new ArrayObject(array(
                                   'db' => 'mysql',
                                   'dbname' => 'hoge_prod',
                                   'host' => 'localhost',
                                   'user' => 'dbusername',
                                   'password' => 'dbpassword',
                                   ));

$container = new DIContainer;
$container->add('config', getenv('TEST') ? $test_config : $prod_config);
$container->add('pdo', new PDOComponent);

// オブジェクトをコンテナから取り出す
$pdo = $container->get('pdo');
