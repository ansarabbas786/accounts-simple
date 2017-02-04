<?php

namespace App\Model\Settings;

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
            if (self::save($data) && $action == 'save') {
                return true;
            } else {
                //todo return database errors
            }
        } else {
            //todo return validation errors
        }
    }


    public static function update($data)
    {
        // TODO: Implement update() method.
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
            'dob' => '1994-10-10',
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


        self::$query = "INSERT INTO employee_work_info(employee_id, ni_number, start_date, end_date, leaving_date, reference, notes) VALUES (
:employee_id, :ni_number, :start_date, :end_date, :leaving_date, :reference, :notes)";

        self::$query_data = [
            'employee_id' => $employee_id,
            'ni_number' => $data->ni_number,
            'start_date' => '1993-3-3',
            'end_date' => '1993-3-3',
            'leaving_date' => '1993-3-3',
            'reference' => $data->reference,
            'notes' => $data->notes
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);


        self::$query = "INSERT INTO employee_bank_details(employee_id, bank_name, acc_number, acc_name, sort_code) VALUES (
:employee_id, :bank_name, :acc_number, :acc_name, :sort_code
)";
        self::$query_data = [
            'employee_id'  => $employee_id,
            'bank_name' => $data->bank_name,
            'acc_number' => $data->acc_number,
            'acc_name' => $data->acc_name,
            'sort_code' => $data->sort_code
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        exit('saved!');
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public static function findById($id)
    {
        // TODO: Implement findById() method.
    }

}