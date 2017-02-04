<?php
namespace App\Model\Settings;

use App\Model\BaseModel;
use App\Model\Database;
use App\Validator\AnalysisValidator;

class SettingsAnalysisModel extends BaseModel
{

    public static function processForm($data, $action)
    {
        if (AnalysisValidator::validate($data)) {
            if (self::save($data) && $action == 'save') {
                return true;
            } else {
                //todo return database errors
            }
        } else {
            //todo return validation errors
        }
    }

    public static function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public static function findAll()
    {
        $user_id = 1;
        self::openConnection();
        self::$query = "SELECT * FROM analysis WHERE user_id = :user_id";
        self::$query_data = [
            'user_id' => $user_id
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        $analysis_list = self::$stmt->fetchAll(Database::FETCH_OBJ);

        return $analysis_list;
    }

    public static function save($data)
    {
        self::openConnection();
        $user_id = 1;

        self::$query = "INSERT INTO analysis(user_id, reference, name) VALUES (:user_id, :reference, :name)";
        self::$stmt = Database::dbh()->prepare(self::$query);
        self::$query_data = [
            'user_id' => $user_id,
            'reference' => $data->reference,
            'name' => $data->name
        ];

        self::$stmt->execute(self::$query_data);
    }

    public static function update($data)
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function openConnection()
    {
        self::$dbh = Database::dbh();
    }
}


?>