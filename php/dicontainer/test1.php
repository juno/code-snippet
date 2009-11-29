<?php
include_once dirname(__FILE__) . '/DIContainer1.php';

class MyComponentFactory extends ComponentFactory
{
    function buildConfig()
    {
        $config = new stdClass();
        $config->db = 'mysql';
        $config->dbname = 'scalr';
        $config->host = 'localhost';
        $config->user = 'juno';
        $config->password = '';
        return $config;
    }

    function buildPDO()
    {
        $config = $this->container->get('config');
        $dsn = "{$config->db}:dbname={$config->dbname};host={$config->host}";
        $pdo = new PDO($dsn, $config->user, $config->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}

$container = new DIContainer(new MyComponentFactory);

// オブジェクトをコンテナから取り出す
$pdo = $container->get('pdo');
