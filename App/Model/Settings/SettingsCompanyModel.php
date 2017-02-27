<?php

namespace App\Model\Settings;

use App\Helpers\Helper;
use App\Model\BaseModel;
use App\Model\Database;
use App\Validator\CompanyValidator;
use App\ModelDatabase;

class SettingsCompanyModel extends BaseModel
{
    protected static $vat_status = 0;
    protected static $vat_query = '';
    protected static $vat_where = '';
    protected static $vat_data_to_execute = '';

    protected static function openConnection()
    {
        self::$dbh = Database::dbh();
    }

    public static function processForm($data, $action)
    {
        if (CompanyValidator::validate($data)) {
            if ($action === 'update' && self::update($data)) {
                return true;
            } elseif ($action === 'save' && self::save($data)) {
                //todo return database errors
            }
        } else {
            //todo return validation errors
        }
    }

    public static function update($data)
    {

        $user_id = 1;

        self::openConnection();

        //send image info as object to the process image function which returns false or path info
        //then unset the logo so that it does't break the update logic
        $logo_info = (object)$data->logo;


        $image_path = Helper::process_image($logo_info);
        unset($data->logo);

        //setting form data to the class data variable
        self::$data = $data;

        //checking and assigning vat status
        self::$vat_status = $data->vat_status;

        //updating the vat variables based on the vat status (registered/Unregistered)
        if (self::$vat_status) {
            self::$vat_query = ", vat_reg_no = :vat_reg_no, vat_scheme = :vat_scheme";
            self::$vat_data_to_execute = ['vat_reg_no' => $data->vat_reg_no, 'vat_scheme' => $data->vat_scheme,];
            self::$vat_where = " AND company.company_id = company_vat.company_id";
        }

        $tables = ['company', 'company_address', 'company_bank_details', 'company_financial_year', 'company_vat'];
        $tables_list = Helper::build_tables_list($tables);

        self::$query = "UPDATE {$tables_list} 
            SET company.name = :name,
                company.email = :email,
                 company.telephone = :telephone,
                 company.fax = :fax,
                 company.website = :website,
                 line1 = :line1,
                 line2 = :line2,
                 town = :town,
                 city = :city,
                 post_code = :post_code,
                 country = :country,
                 logo_path = :logo_path,
                 start_date = :start_date,
                 end_date = :end_date,
                 registration_no = :registration_no,
                 unique_tax_ref = :unique_tax_ref,
                 vat_status = :vat_status,
                  acc_name = :acc_name,
                  acc_number = :acc_number,
                  sort_code = :sort_code,
                  bank_name = :bank_name "
            . self::$vat_query .

            " WHERE company.user_id = :user_id AND company.company_id = company_address.company_id AND company.company_id = company_bank_details.company_id AND company.company_id = company_financial_year.company_id " . self::$vat_where;


        self::$query_data = [
            'user_id' => $user_id,
            'name' => self::$data->name,
            'email' => self::$data->email,
            'telephone' => self::$data->telephone,
            'fax' => self::$data->fax,
            'website' => self::$data->website,
            'line1' => self::$data->line1,
            'line2' => self::$data->line2,
            'town' => self::$data->town,
            'city' => self::$data->city,
            'post_code' => self::$data->post_code,
            'logo_path' => ($image_path) ? $image_path : 'images/user_img.jpg',
            'country' => self::$data->country,
            'start_date' => Helper::to_mysql_date($data->start_date),
            'end_date' => Helper::to_mysql_date($data->end_date),
            'registration_no' => self::$data->registration_no,
            'unique_tax_ref' => self::$data->unique_tax_ref,
            'vat_status' => self::$vat_status,
            'acc_name' => self::$data->acc_name,
            'acc_number' => self::$data->acc_number,
            'sort_code' => self::$data->sort_code,
            'bank_name' => self::$data->bank_name
        ];

        //adding the vat data to the query for the execution if company is vat registered
        (self::$vat_status) ? self::$query_data = array_merge(self::$query_data, self::$vat_data_to_execute) : '';


        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->execute(self::$query_data);

        $tables = ['company_owner'];
        $where = Helper::build_where_clause($tables);


        foreach ($data->owner_name as $key => $owner_name) {
            self::$query = "UPDATE company_owner SET owner_name = :owner_name, dob = :dob, ni_number = :ni_number WHERE {$where}";
            self::$query_data = [
                'user_id' => $user_id,
                'owner_name' => $owner_name,
                'dob' => Helper::to_mysql_date($data->dob[$key]),
                'ni_number' => $data->ni_number[$key],
                'company_owner_id' => $key + 1
            ];

            self::$stmt = self::$dbh->prepare(self::$query);
            self::$stmt->execute(self::$query_data);

            $affected_rows = self::$stmt->rowCount();

        }
        if ($affected_rows >= 0) {
            echo json_encode(['success' => true, 'message' => 'Bank updated successfully!']) . PHP_EOL;
        } else {
            echo json_encode(['success' => false, 'message' => 'something went wrong. Please try again!']);
        }
    }

    public static function save($data)
    {

        return true;
        //todo implement the save login here
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function findAll()
    {
        $user_id = 1;

        //TODO: company owner needs to be added here!
        $tables = ['company', 'company_address', 'company_bank_details', 'company_financial_year', 'company_vat'];
        $tables_list = Helper::build_tables_list($tables);
        $where = Helper::build_where_clause_for_find($tables);

        self::openConnection();

        self::$query = "SELECT * FROM {$tables_list} WHERE {$where}";
        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->bindParam('user_id', $user_id, Database::PARAM_INT);
        self::$stmt->execute();
        $company = self::$stmt->fetch(Database::FETCH_OBJ);

        return $company;
    }

    public static function findAllOwners()
    {
        $user_id = 1;

        self::$query = "SELECT * from company_owner WHERE user_id = :user_id";

        self::openConnection();

        self::$stmt = self::$dbh->prepare(self::$query);
        self::$stmt->bindParam('user_id', $user_id, Database::PARAM_INT);
        self::$stmt->execute();
        $owners = self::$stmt->fetchALL(Database::FETCH_OBJ);

        return $owners;
    }

    public static function findById($id)
    {
        // TODO: Implement findById() method.
    }
}


?>