<?php

namespace App\Model\Settings;

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

    public static function processForm($data, $action)
    {
        if (CompanyValidator::validate($data)) {
            if (self::update($data) && $action == 'update') {
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
        //setting form data to the class data variable
        self::$data = $data;

        if (CompanyValidator::validate($data)) {

            //checking and assigning vat status
            self::$vat_status = $data->vat_status;

            //updating the vat variables based on the vat status (registered/Unregistered)
            if (self::$vat_status) {
                self::$vat_query = ", vat_reg_no = :vat_reg_no, vat_scheme = :vat_scheme";
                self::$vat_data_to_execute = ['vat_reg_no' => $data->vat_reg_no, 'vat_scheme' => $data->vat_scheme,];
                self::$vat_where = " AND company.company_id = company_vat.company_id";
            }

            $dbh = Database::dbh();

            self::$query = "UPDATE company JOIN company_address JOIN company_bank_details JOIN company_financial_year JOIN company_owner JOIN company_vat
            SET company.name = :name,
                company.email = :email,
                 company.tel = :telephone,
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

                " WHERE company.user_id = :user_id AND company.company_id = company_address.company_id AND company.company_id = company_bank_details.company_id AND company.company_id = company_financial_year.company_id AND company.company_id = company_owner.company_id " . self::$vat_where;


            self::$query_data = [
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
                'logo_path' => 'https://www.google.com',
                'country' => self::$data->country,
                'start_date' => '1994-10-10',
                'end_date' => '1994-10-10',
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


            //adding primary keys and foreign keys data for the updating of the query
            self::$query_data['user_id'] = 1;

            self::$stmt = $dbh->prepare(self::$query);

            echo self::$stmt->execute(self::$query_data);

          echo self::$stmt->rowCount();

          exit();

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
        // TODO: Implement findAll() method.
    }

    public static function findById($id)
    {
        // TODO: Implement findById() method.
    }
}


?>