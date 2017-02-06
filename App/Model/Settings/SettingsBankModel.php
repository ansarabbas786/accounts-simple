<?php

namespace App\Model\Settings;

use App\Model\BaseModel;
use App\Model\Database;
use App\Validator\BankValidator;

class SettingsBankModel extends BaseModel
{

    public static function openConnection()
    {
        self::$dbh = Database::dbh();
    }

    public static function processForm($data, $action)
    {
        if (BankValidator::validate($data)) {
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
        self::openConnection();

        self::$query = "INSERT INTO bank (user_id, acc_ref, acc_name, bank_name, start_balance) VALUES (
:user_id, :acc_ref, :acc_name, :bank_name, :start_balance)";


        self::$query_data = [
            'user_id' => $user_id,
            'acc_ref' => $data->acc_ref,
            'acc_name' => $data->acc_name,
            'bank_name' => $data->bank_name,
            'start_balance' => $data->start_balance
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        $bank_id = self::$dbh->lastInsertId();

        self::$query = "INSERT INTO bank_address(bank_id, line1, line2, town, city, country, post_code) VALUES (
:bank_id, :line1, :line2, :town, :city, :country, :post_code)";

        self::$query_data = [
            'bank_id' => $bank_id,
            'line1' => $data->line1,
            'line2' => $data->line2,
            'town' => $data->town,
            'city' => $data->city,
            'country' => $data->country,
            'post_code' => $data->post_code
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);


        self::$query = "INSERT  INTO bank_contact(bank_id, contact_name, contact_tel, fax, email) VALUES (
:bank_id, :contact_name, :contact_tel, :fax, :email)";

        self::$query_data = [
            'bank_id' => $bank_id,
            'contact_name' => $data->contact_name,
            'contact_tel' => $data->telephone,
            'fax' => $data->fax,
            'email' => $data->email
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);


        self::$query = "INSERT  INTO bank_acc_details(bank_id, sort_code, acc_no, notes) VALUES (
:bank_id, :sort_code, :acc_no, :notes)";

        self::$query_data = [
            'bank_id' => $bank_id,
            'sort_code' => $data->sort_code,
            'acc_no' => $data->acc_no,
            'notes' => $data->notes
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function findAll()
    {
      self::$query = "SELECT * FROM bank JOIN 
                                    bank_acc_details AS bac JOIN 
                                    bank_address ba JOIN 
                                    bank_contact bc WHERE 
                                    
                                    "
    }

    public static function findById($id)
    {
        // TODO: Implement findById() method.
    }

}