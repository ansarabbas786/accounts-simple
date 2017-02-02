<?php
namespace App\Model;
class Database extends \PDO
{
    private static $dsn = 'mysql:dbhost=localhost;dbname=accounts_simple';
    private static $db_user = 'root';
    private static $db_password = '4307764';

    public static function dbh()
    {
        $dbh = new \PDO(self::$dsn, self::$db_user, self::$db_password);
        $dbh->query("SET NAMES 'utf8'");
        return $dbh;
    }
}
?>


