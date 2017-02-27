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

        //TODO: Solve the problem of two account names in the form ?

        if (BankValidator::validate($data)) {
            if ($action === 'save' && self::save($data)) {
                return true;
            } elseif ($action === 'update' && self::update($data)) {
                //todo return database errors
            } elseif ($action === 'delete' && self::delete($data)) {
                return true;
            }
        } else {
            //todo return validation errors
        }
    }

    public static function update($data)
    {
        self::openConnection();
        $user_id = 1;

        $query_data = (array)$data;


        //get rid of submit button data
        array_pop($query_data);
        unset($query_data['bank_id']);
        unset($query_data['acc_name_final']);

        $query = '';

        foreach ($query_data as $key => $item) {
            if ($item === end($query_data)) {
                $query .= $key . ' = ' . ':' . $key;
            } else {
                $query .= $key . ' = ' . ':' . $key . ',';
            }
        }

        self::$query = "UPDATE bank JOIN
                                    bank_address AS ba JOIN
                                    bank_acc_details AS bad JOIN 
                                    bank_contact AS bc
                                      SET 
                                        {$query}
                                           WHERE bank.user_id = :user_id AND 
                                                 bank.bank_id = :bank_id AND 
                                                 bank.bank_id = bc.bank_id AND 
                                                 bank.bank_id = bad.bank_id AND 
                                                 bank.bank_id = ba.bank_id";


        $query_data['bank_id'] = (int)$data->bank_id;
        $query_data['user_id'] = $user_id;
        $query_data['start_balance'] = (int)$data->start_balance;

        self::$query_data = $query_data;


        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        $affected_rows = self::$stmt->rowCount();

        if ($affected_rows >= 0) {
            echo json_encode(['success' => true, 'message' => 'Bank updated successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'something went wrong. Please try again!']);
        }

    }

    public static function save($data)
    {
        $user_id = 1;
        self::openConnection();
        self::$dbh->beginTransaction();

        try {

            self::$query = "INSERT INTO bank (user_id, acc_name, bank_name, start_balance) VALUES (
:user_id, :acc_name, :bank_name, :start_balance)";


            self::$query_data = [
                'user_id' => $user_id,
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


            self::$query = "INSERT  INTO bank_contact(bank_id, contact_name, telephone, fax, email) VALUES (
:bank_id, :contact_name, :telephone, :fax, :email)";


            self::$query_data = [
                'bank_id' => $bank_id,
                'contact_name' => $data->contact_name,
                'telephone' => $data->telephone,
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
            self::$dbh->commit();

            $affected_rows = self::$stmt->rowCount();

            if ($affected_rows >= 0) {
                echo json_encode(['success' => true, 'message' => 'new bank saved successfully!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'something went wrong. Please try again!']);
            }


        } catch (\PDOException $exception) {
            self::$dbh->rollBack();
            echo json_encode(['success' => false, 'message' => 'Error:' . $exception->getMessage()]);
        }


    }

    public static function delete($data)
    {
        self::openConnection();

        $user_id = 1;
        self::$query = "DELETE FROM bank WHERE bank.user_id = :user_id AND bank.bank_id = :bank_id";
        self::$query_data = [
            'user_id' => $user_id,
            'bank_id' => (int)trim($data->id)
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);
    }

    public static function findAll()
    {
        self::openConnection();

        $user_id = 1;
        self::$query = "SELECT * FROM bank JOIN 
                                    bank_acc_details AS bad JOIN 
                                    bank_address AS ba JOIN 
                                    bank_contact AS bc 
                                    WHERE bank.user_id = :user_id AND 
                                          bank.bank_id = bad.bank_id AND
                                          bank.bank_id = ba.bank_id AND
                                          bank.bank_id = bc.bank_id";

        self::$query_data = [
            'user_id' => $user_id
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        $banks = self::$stmt->fetchAll(Database::FETCH_OBJ);

        return $banks;
    }

    public static function findById($id)
    {
        // TODO: Implement findById() method.
    }

}