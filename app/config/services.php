<?php
use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
$di = new FactoryDefault();
/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di['db'] = function (){

    $config = $this->getConfig();
    // $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    // $params = [
    //     'host'     => $config->database->host,
    //     'username' => $config->database->username,
    //     'password' => $config->database->password,
    //     'dbname'   => $config->database->dbname
    // ];
    // if ($config->database->adapter == 'Postgresql') {
    //     unset($params['charset']);
    // }

    // return new $class($params);
    try {
        $connection = new DbAdapter(array(
            "host" => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname" => $config->database->dbname,
            "charset" => $config->database->charset,
            "persistent" => true,
            "options"    => [\PDO::ATTR_PERSISTENT => 1]
        ));

        $connection->connect();
        return $connection;
    } catch (\PDOException $e) {
        throw $e;
    }
    return $connection;
};
