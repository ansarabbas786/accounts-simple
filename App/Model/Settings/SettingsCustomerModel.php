<?php

namespace App\Model\Settings;

use App\Model\BaseModel;
use App\Model\Database;
use App\Validator\CompanyValidator;
use App\Validator\CustomerValidator;

class SettingsCustomerModel extends BaseModel
{
    static function processForm($data, $action)
    {
        //open a connection to the database
        self::openConnection();

        if (CustomerValidator::validate($data)) {
            if (self::save($data) && $action == 'save') {
                return true;
            } else {
                //todo return database errors
            }
        } else {
            //todo return validation errors
        }
    }

    public static function save($data)
    {
        self::$query = "INSERT INTO customer(user_id, name, acc_ref, credit_limit, payment_due, payment_terms) 
VALUES (:user_id, :name, :acc_ref, :credit_limit, :payment_due, :payment_terms)";

        self::$stmt = self::$dbh->prepare(self::$query);

        self::$query_data = [
            'user_id' => 1,
            'name' => $data->name,
            'acc_ref' => $data->acc_ref,
            'credit_limit' => $data->credit_limit,
            'payment_due' => $data->payment_due,
            'payment_terms' => $data->payment_terms
        ];

        self::$stmt->execute(self::$query_data);

        $customer_id = self::$dbh->lastInsertId();

        self::$query = "INSERT INTO customer_address(customer_id, line1, line2, town, city, country, tel, mobile, fax, email, website) 
VALUES (:customer_id, :line1, :line2, :town, :city, :country, :tel, :mobile, :fax, :email, :website)";

        self::$query_data = [
            'customer_id' => $customer_id,
            'line1' => $data->line1,
            'line2' => $data->line2,
            'town' => $data->town,
            'city' => $data->city,
            'country' => $data->country,
            'tel' => $data->telephone,
            'mobile' => $data->mobile,
            'fax' => $data->fax,
            'email' => $data->email,
            'website' => $data->website
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        var_dump(self::$stmt->errorInfo());
        echo 'saved!';
        exit();

    }

    public
    static function update($data)
    {

    }

    public
    static function findById($id)
    {

    }

    public
    static function findAll()
    {
        $user_id = 1;

        self::openConnection();
        self::$query = "SELECT * FROM customer JOIN customer_address WHERE customer.user_id = :user_id AND customer.customer_id = customer_address.customer_id";
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->bindParam('user_id', $user_id, Database::PARAM_INT);
        self::$stmt->execute();
        $customer = self::$stmt->fetchAll(Database::FETCH_OBJ);

        return $customer;
    }

    public
    static function delete($id)
    {

    }

    static function openConnection()
    {
        self::$dbh = Database::dbh();
    }


}