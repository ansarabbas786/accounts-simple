<?php
namespace App\Model\Settings;

use App\Model\BaseModel;
use App\Model\Database;
use App\Validator\AnalysisValidator;

class SettingsAnalysisModel extends BaseModel
{
    public static function processForm($data, $action)
    {
        self::openConnection();

        if (AnalysisValidator::validate($data)) {

            if ($action === 'save' && $last_insert_id = self::save($data)) {
                return $last_insert_id;
            } elseif ($action === 'update' && self::update($data)) {
                exit('updated!');
            } elseif ($action === 'delete' && self::delete($data)) {
                exit('deleted!');
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

        self::$query = "INSERT INTO analysis(user_id,  name) VALUES (:user_id, :name)";
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$query_data = [
            'user_id' => $user_id,
            'name' => $data->name
        ];

        self::$stmt->execute(self::$query_data);

        return self::$dbh->lastInsertId();
    }

    public static function update($data)
    {
        $user_id = 1;

        self::$query = "UPDATE analysis SET name  = :name WHERE analysis_id = :analysis_id AND user_id = :user_id";

        self::$query_data = [
            'name' => $data->name,
            'analysis_id' => $data->analysis_id,
            'user_id' => $user_id
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);
    }

    public static function delete($data)
    {
        self::openConnection();
        $user_id = 1;
        self::$query = "DELETE FROM analysis WHERE analysis_id = :id AND user_id = :user_id";


        self::$query_data = [
            'id' => (int)trim($data->id),
            'user_id' => $user_id
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);
    }

    public static function openConnection()
    {
        self::$dbh = Database::dbh();
    }
}


?>