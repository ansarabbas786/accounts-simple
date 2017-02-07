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
            if ($action === 'save' && self::save($data)) {
                return true;
            } elseif ($action === 'update' && self::update($data)) {
                //todo return database errors
            } elseif ($action === 'delete' && self::delete($data)) {
                //TODO: delete logic
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid route']);
        }
    }

    public static function save($data)
    {

        self::$dbh->beginTransaction();
        try {

            self::$query = "INSERT INTO customer(user_id, name,  credit_limit, payment_due, payment_terms) 
VALUES (:user_id, :name, :credit_limit, :payment_due, :payment_terms)";

            self::$stmt = self::$dbh->prepare(self::$query);

            self::$query_data = [
                'user_id' => 1,
                'name' => $data->name,
                'credit_limit' => $data->credit_limit,
                'payment_due' => $data->payment_due,
                'payment_terms' => $data->payment_terms
            ];

            self::$stmt->execute(self::$query_data);

            $customer_id = self::$dbh->lastInsertId();


            self::$query = "INSERT INTO customer_address(customer_id, line1, line2, town, city, post_code, country, telephone, mobile, fax, email, website) 
VALUES (:customer_id, :line1, :line2, :town, :city, :post_code, :country, :telephone, :mobile, :fax, :email, :website)";

            self::$query_data = [
                'customer_id' => $customer_id,
                'line1' => $data->line1,
                'line2' => $data->line2,
                'town' => $data->town,
                'city' => $data->city,
                'post_code' => $data->post_code,
                'country' => $data->country,
                'telephone' => $data->telephone,
                'mobile' => $data->mobile,
                'fax' => $data->fax,
                'email' => $data->email,
                'website' => $data->website
            ];

            self::$stmt = self::$dbh->prepare(self::$query);
            self::$stmt->execute(self::$query_data);

            if (self::$stmt->rowCount() > 0) {
                echo json_encode(['success' => true, 'message' => 'Customer added successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Something went wrong! Please refresh your page.']);
            }

            self::$dbh->commit();

        } catch (\PDOException $exception) {
            self::$dbh->rollBack();
            echo json_encode(['success' => false, 'message' => 'Error: ' . self::$dbh->errorInfo()]);
        }
    }

    public static function update($data)
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

    public static function delete($data)
    {
        $user_id = 1;

        self::$query = "DELETE FROM customer WHERE customer.user_id = :user_id AND customer.customer_id = :customer_id";


        self::$query_data = [
            'user_id' => $user_id,
            'customer_id' => $data->id
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);


        if (self::$stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'message' => 'Customer deleted successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: Please refresh your page!']);
        }
    }

    static function openConnection()
    {
        self::$dbh = Database::dbh();
    }


}