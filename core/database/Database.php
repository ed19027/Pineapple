<?php
namespace app\core\database;

use app\core\Application;

class Database
{
    /**
     * @var PDO  The PHP Data Object class variable.
     */
    public static \PDO $PDO;

    /**
     * Create a new database instance.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        self::$PDO = new \PDO($dsn, $user, $password);
        self::$PDO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Execute migration tables and their content in database.
     * Can be called from command prompt by running 'php migration.php'.
     */
    public function migrate()
    {
        $sql = file_get_contents(Application::$ROOT_DIR.'\pineapple.sql');
        self::$PDO->exec($sql);
        echo 'Tables and their contents have been successfully migrated';
    }

    /**
     * Helper method for DatabaseModel.
     *
     * @param string $sql
     * @return app\core\Database 
     */
    public static function prepare($sql)
    {
        return self::$PDO->prepare($sql);
    }
}