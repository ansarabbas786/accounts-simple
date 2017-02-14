<?php

namespace App\Model\Settings;

use App\Helpers\Helper;
use App\Model\BaseModel;
use App\Model\Database;
use App\Validator\PayrollValidator;

class SettingsPayrollModel extends BaseModel
{

    public static function openConnection()
    {
        self::$dbh = Database::dbh();
    }

    public static function processForm($data, $action)
    {
        //open a connection to the database
        self::openConnection();

        if (PayrollValidator::validate($data)) {
            if ($action === 'save' && self::save($data)) {
                return true;
            } elseif ($action === 'update' && self::update($data)) {
                //todo return database errors
            } elseif ($action === 'delete' && self::delete($data)) {

            }
        } else {
            //todo return validation errors
        }
    }


    public static function update($data)
    {
        exit('you are here lol!');
    }

    public static function save($data)
    {
        $user_id = 1;

        self::$query = "INSERT INTO employee( user_id, surname, forname, dob, gender) VALUES (
    :user_id, :surname, :forname, :dob, :gender)";

        self::$query_data = [
            'user_id' => $user_id,
            'surname' => $data->surname,
            'forname' => $data->forname,
            'dob' => Helper::to_mysql_date($data->dob),
            'gender' => $data->gender
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);
        $employee_id = self::$dbh->lastInsertId();

        self::$query = "INSERT INTO employee_address(employee_id, line1, line2, town, city, post_code, telephone, email) VALUES (
:employee_id, :line1, :line2, :town, :city, :post_code, :telephone, :email)";
        self::$query_data = [
            'employee_id' => $employee_id,
            'line1' => $data->line1,
            'line2' => $data->line2,
            'town' => $data->town,
            'city' => $data->city,
            'post_code' => $data->post_code,
            'telephone' => $data->telephone,
            'email' => $data->email
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);


        self::$query = "INSERT INTO employee_work_info(employee_id, ni_number, start_date, leaving_date, notes) VALUES (
:employee_id, :ni_number, :start_date, :leaving_date, :notes)";

        self::$query_data = [
            'employee_id' => $employee_id,
            'ni_number' => $data->ni_number,
            'start_date' => Helper::to_mysql_date($data->start_date),
            'leaving_date' => Helper::to_mysql_date($data->leaving_date),
            'notes' => $data->notes
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);


        self::$query = "INSERT INTO employee_bank_details(employee_id, bank_name, acc_number, acc_name, sort_code) VALUES (
:employee_id, :bank_name, :acc_number, :acc_name, :sort_code
)";
        self::$query_data = [
            'employee_id' => $employee_id,
            'bank_name' => $data->bank_name,
            'acc_number' => $data->acc_number,
            'acc_name' => $data->acc_name,
            'sort_code' => $data->sort_code
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        if (self::$stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'message' => 'New employee added successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Something went wrong please refresh your page']);
        }
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function findAll()
    {
        self::openConnection();
        $user_id = 1;
        $tables = ['employee', 'employee_address', 'employee_bank_details', 'employee_work_info'];
        $from = Helper::build_tables_list($tables);
        $where = Helper::build_where_clause_for_find($tables);
        self::$query = "SELECT * FROM {$from} WHERE {$where}";

        self::$query_data = [
            'user_id' => $user_id,
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        $employees = self::$stmt->fetchAll(Database::FETCH_OBJ);
        return $employees;
    }

    public static function findById($id)
    {
        // TODO: Implement findById() method.
    }

}