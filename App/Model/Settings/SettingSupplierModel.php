<?php
namespace App\Model\Settings;

use App\Helpers\Helper;
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
            if ($action === 'save' && self::save($data)) {
                return true;
            } elseif ($action === 'update' && self::update($data)) {
                //todo return database errors
            } elseif ($action === 'delete' && self::delete($data)) {
                //TODO: implement the delete logic here
            }
        } else {
            //todo return validation errors
        }
    }

    public static function update($data)
    {
        $user_id = 1;

        self::openConnection();

        $tables = ['supplier', 'supplier_address', 'supplier_bank_details'];

        $extra_data = [
            'user_id' => $user_id,
            'supplier_id' => (int)$data->supplier_id,
        ];

        self::$query_data = array_merge((array)$data, $extra_data);

        //exclude the customer_id from the query parameters
        unset($data->supplier_id);
        self::$query = Helper::build_update_query($tables, $data);

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        if (self::$stmt->rowCount() >= 0) {
            echo json_encode(['success' => true, 'message' => 'Customer updated successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Something went wrong please refresh your page']);
        }
    }

    public static function save($data)
    {
        self::openConnection();
        $user_id = 1;

        self::$query = "INSERT INTO supplier(user_id, company_name, credit_limit, payment_due) VALUES (:user_id, :company_name, :credit_limit, :payment_due)";

        self::$query_data = [
            'user_id' => $user_id,
            'company_name' => $data->company_name,
            'credit_limit' => $data->credit_limit,
            'payment_due' => $data->payment_due
        ];

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);


        $supplier_id = self::$dbh->lastInsertId();


        self::$query = "INSERT INTO supplier_address(supplier_id, line1, line2, town, city, post_code, contact_name, telephone, email) VALUES (:supplier_id, :line1, :line2, :town, :city, :post_code, :contact_name, :telephone, :email)";


        self::$query_data = [
            'supplier_id' => $supplier_id,
            'line1' => $data->line1,
            'line2' => $data->line2,
            'town' => $data->town,
            'city' => $data->city,
            'post_code' => $data->post_code,
            'contact_name' => $data->contact_name,
            'telephone' => $data->telephone,
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

        if (self::$stmt->rowCount() >= 0) {
            echo json_encode(['success' => true, 'message' => 'New supplier added']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Something went wrong please refresh you page!']);
        }

    }

    public static function delete($data)
    {
        self::openConnection();
        $user_id = 1;
        self::$query = "DELETE FROM supplier WHERE supplier.user_id = :user_id AND supplier.supplier_id = :supplier_id";
        self::$query_data = [
            'user_id' => $user_id,
            'supplier_id' => (int)trim($data->id)
        ];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        if (self::$stmt->rowCount() > 0) {
            echo json_encode(['success' => true, 'message' => 'Supplier deleted successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Something went wrong please refresh you page!']);
        }
    }

    public static function findAll()
    {
        self::openConnection();
        $user_id = 1;
        $tables = ['supplier', 'supplier_address', 'supplier_bank_details'];
        $where = Helper::build_where_clause_for_find($tables);
        $from = Helper::build_tables_list($tables);
        self::$query = "SELECT * FROM {$from} WHERE {$where}";
        self::$query_data = ['user_id' => $user_id];
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);
        $customers = self::$stmt->fetchAll(Database::FETCH_OBJ);
        return $customers;
    }

    public static function findById($id)
    {
        // TODO: Implement findById() method.
    }


}