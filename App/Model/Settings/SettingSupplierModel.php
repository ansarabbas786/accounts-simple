<?php
namespace App\Model\Settings;

use App\Model\BaseModel;
use App\Model\Database;
use App\Validator\SupplierValidator;

class SettingSupplierModel extends BaseModel
{

    public static function openConnection()
    {
        self::$dbh = Database::dbh();
    }

    public static function processForm($data, $action)
    {
        //open a connection to the database
        self::openConnection();

        if (SupplierValidator::validate($data)) {
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
        self::openConnection();

        self::$query = "INSERT INTO supplier(acc_ref, company_name, credeit_limit, payment_dues) VALUES (:acc_ref, :company_name, :credit_limit, :payment_dues)";

        self::$query_data = [
            'acc_ref' => $data->acc_ref,
            'company_name' => $data->company_name,
            'credit_limit' => $data->credit_limit,
            'payment_dues' => $data->payment_due
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);


       $supplier_id = self::$dbh->lastInsertId();


        self::$query = "INSERT INTO supplier_address(supplier_id, line1, line2, town, city, post_code, contact_name, tel, email) VALUES (:supplier_id, :line1, :line2, :town, :city, :post_code, :contact_name, :tel, :email)";


        self::$query_data = [
            'supplier_id' => $supplier_id,
            'line1' => $data->line1,
            'line2' => $data->line2,
            'town' => $data->town,
            'city' => $data->city,
            'post_code' => $data->post_code,
            'contact_name' => $data->contact_name,
            'tel' => $data->telephone,
            'email' => $data->email
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        self::$query = "INSERT INTO supplier_bank_details(supplier_id, acc_name, sort_code, acc_no, bank_name) VALUES (
:supplier_id, :acc_name, :sort_code, :acc_no, :bank_name
)";
        self::$query_data = [
            'supplier_id' => $supplier_id,
            'acc_name' => $data->acc_name,
            'sort_code' => $data->sort_code,
            'acc_no' => $data->acc_no,
            'bank_name' => $data->bank_name
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        exit('done');

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