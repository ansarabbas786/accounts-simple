<?php
require_once "../vendor/autoload.php";

use App\Model\Database;

$faker = Faker\Factory::create();


for ($i = 0; $i < 100; $i++) {

    try {
        $dbh = Database::dbh();
        $dbh->beginTransaction();

        $query = "INSERT INTO user(name, email, password) VALUES(:name , :email, :password)";
        $stmt = $dbh->prepare($query);
        $stmt->execute(['name' => $faker->name,
                        'email' => $faker->name,
                        'password' => $faker->password()]);

        $user_id = $dbh->lastInsertId();

        $query = "INSERT INTO company(user_id, name, email, tel, fax, website) VALUES(:user_id, :name, :email, :tel, :fax, :website)";
        $stmt = $dbh->prepare($query);
        $stmt->execute(['user_id' => $user_id,
                        'name' => $faker->company,
                        'email' => $faker->companyEmail,
                        'tel' => $faker->phoneNumber,
                        'fax' => $faker->phoneNumber,
                        'website' => $faker->url]);

        $company_id = $dbh->lastInsertId();

        $query = "INSERT INTO company_address(company_id, line1, line2, town, city, post_code, country, logo_path)
                    VALUES(:company_id, :line1, :line2, :town, :city, :post_code, :country, :logo_path)";

        $stmt = $dbh->prepare($query);

        $stmt->execute(['company_id' => $company_id,
                        'line1' => $faker->text(20),
                        'line2' => $faker->text(20),
                        'town' => $faker->city,
                        'city' => $faker->city,
                        'post_code' => $faker->postcode,
                        'country' => $faker->country,
                        'logo_path' => $faker->text(50)
        ]);

        $query = "INSERT INTO company_bank_detials(company_id, acc_name, acc_number, sort_code, bank_name) VALUES (
 :company_id, :acc_name, :acc_number, :sort_code, :bank_name
)";

        $stmt = $dbh->prepare($query);
        $stmt->execute(['company_id' => $company_id,
                        'acc_name' => $faker->text(10),
                        'acc_number' => $faker->bankAccountNumber,
                        'sort_code' => $faker->postcode,
                        'bank_name' => $faker->text(20)
        ]);

        $query = "INSERT INTO company_financial_year(company_id, start_date, end_date, registration_no, unique_tax_ref,
            vat_status, vat_reg_no, vat_scheme
) VALUES (:company_id, :start_date, :end_date, :registration_no, :unique_tax_ref,
            :vat_status, :vat_reg_no, :vat_scheme)";

        $stmt = $dbh->prepare($query);

        $stmt->execute(['company_id' => $company_id,
                        'start_date' => $faker->date('Y-m-d'),
                        'end_date' => $faker->date('Y-m-d'),
                        'registration_no' => $faker->bankAccountNumber,
                        'unique_tax_ref' => $faker->text(20),
                        'vat_status' => $faker->boolean,
                        'vat_reg_no' => $faker->bankAccountNumber,
                        'vat_scheme' => $faker->text(10)
        ]);

        $query = "INSERT INTO company_owner(company_id, name, dob, ni_number)
 VALUES (:company_id, :name, :dob, :ni_number)";
        $stmt = $dbh->prepare($query);
        $stmt->execute(['company_id' => $company_id,
                        'name' => $faker->name,
                        'dob' => $faker->date('Y-m-d'),
                        'ni_number' => $faker->bankAccountNumber
        ]);
        $dbh->commit();
    } catch (Exception $e) {
        $dbh->rollBack();
        echo 'something went wrong!';
    }
}
