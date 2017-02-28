<?php
use App\Helpers\Helper;
use App\Helpers\LayoutHelper;
use App\Model\Settings\SettingsCompanyModel;
use App\Validator\CompanyValidator;

require_once "../vendor/autoload.php";


LayoutHelper::head();
LayoutHelper::css('css/settings-company.css');
LayoutHelper::js('js/settings/settings-company.js');
LayoutHelper::endHead();


LayoutHelper::body();
LayoutHelper::header();
LayoutHelper::navigation();
LayoutHelper::subNavigation();

?>

<!---------------------------------PHP CODE BLOCK END HERE-------------------------------------------->

<div class="hero container-fluid">
    <div class="row text-center">
        <h1>SETTINGS > <span class="h3">COMPANY</span></h1>
    </div>
</div>

<!--website main content starts here
==============================-->
<main class="container no_padding">
    <div class="row hdng">
        <div class="col-xs-12 text-center">
            <h3>BUSINESS DETAILS</h3>
        </div>
    </div>
    <?php
    $company = SettingsCompanyModel::findAll();
    ?>

    <form action="routes.php?action=update" enctype="multipart/form-data" id="company-update-form" method="post"
          class="form-horizontal company_form">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <label for="name" class="h3">NAME</label>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10 field_adjust">
                    <input type="text" value="<?= isset($company->name) ? $company->name : '' ?>" id="name" name="name"
                           class="form-control h3 ">
                </div>
            </div>


            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="email" class="h3">EMAIL</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" name="email" value="<?= isset($company->email) ? $company->email : '' ?>"
                           class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="telephone" class="h3">TELEPHONE</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" name="telephone"
                           value="<?= isset($company->telephone) ? $company->telephone : '' ?>" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="fax" class="h3">FAX</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" name="fax" value="<?= isset($company->fax) ? $company->fax : '' ?>"
                           class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="website" class="h3">WEBSITE</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="website" value="<?= isset($company->website) ? $company->website : '' ?>"
                           name="website"
                           class="form-control h3">
                </div>
            </div>


            <div class="row hdng">
                <div class="col-xs-12 text-center">
                    <h3>ADDRESS</h3>
                </div>
            </div>


            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="address_line1" class="h3">LINE 1</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="address_line1" value="<?= isset($company->line1) ? $company->line1 : '' ?>"
                           name="line1"
                           class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="address_line2" class="h3">LINE 2</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="address_line2" name="line2"
                           value="<?= isset($company->line2) ? $company->line2 : '' ?>"
                           class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="town" class="h3">TOWN</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="town" value="<?= isset($company->town) ? $company->town : '' ?>" name="town"
                           class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="city" class="h3">CITY</label>
                </div>
                <divj class="col-xs-12 col-sm-7">
                    <input type="text" id="city" name="city" value="<?= isset($company->city) ? $company->city : '' ?>"
                           class="form-control h3">
            </div>
        </div>


        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-5">
                <label for="postcode" class="h3">POSTCODE</label>
            </div>
            <div class="col-xs-12 col-sm-7">
                <input type="text" id="postcode" name="post_code"
                       value="<?= isset($company->post_code) ? $company->post_code : '' ?>"
                       class="form-control h3">
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-5">
                <label for="country" class="h3">COUNTRY</label>
            </div>
            <div class="col-xs-12 col-sm-7">
                <input type="text" id="country" name="country" class="form-control h3"
                       value="<?= isset($company->country) ? $company->country : '' ?>">
            </div>
        </div>

        <!--
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-sm-2 col-md-2">
                                <label for="address" class="h3">ADDRESS</label>
                            </div>
                            <div class="col-xs-12 col-sm-10 col-md-10">
                                <input type="text" class="form-control h3 field_adjust">
                            </div>
                        </div>
        -->


        <!--            =========-->
        <!--      IMAGE     -->
        <!--           =======-->
        <div class="col-xs-12 imgg">
            <img src="<?= isset($company->logo_path) ? $company->logo_path : 'images/user_img.jpg' ?>" alt=""
                 class="img-responsive business_logo">
        </div>
        <!--            IMAGE========
              ===========================
            ==============================-->
        <div class="col-xs-12">
            <div class="col-xs-12 col-sm-6 text-right">
                <label for="logo" class="h3">BUSINESS LOGO</label>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-6 text-left" id="file">
                    <input type="file" name="logo" class="form-control h3 business_upload_field">
                </div>
            </div>
        </div>
        </div>

        <div class="row hdng">
            <div class="col-xs-12 text-center">
                <h3>ACCOUNTING &amp; TAX DETAILS</h3>
            </div>
        </div>
        <div class="row year">
            <div class="col-xs-12">
                <h3>FINACIAL YEAR</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="start-date" class="h3">START DATE</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" class="form-control h3 date_input" name="start_date"
                           placeholder="dd/mm/yyyy"
                           value="<?= isset($company->start_date) ? date('d/m/Y', strtotime($company->start_date)) : '' ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="end-date" class="h3">END DATE</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" class="form-control h3 date_input" name="end_date"
                           placeholder="dd/mm/yyyy"
                           value="<?= isset($company->end_date) ? date('d/m/Y', strtotime($company->end_date)) : '' ?>">
                </div>
            </div>


            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="registration_number" class="h3">COMPANY REG. NO.</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" class="form-control h3"
                           value="<?= isset($company->registration_no) ? $company->registration_no : '' ?>"
                           name="registration_no">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="tax_ref" class="h3">UNIQUE TAX REF.</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" name="unique_tax_ref"
                           value="<?= isset($company->unique_tax_ref) ? $company->unique_tax_ref : '' ?>"
                           class="form-control h3">
                </div>
            </div>


            <div class="col-xs-12">
                <div class="col-xs-6 col-sm-3">
                    <label for="yes" class="h3">
                        VAT REGISTERED?
                    </label>
                </div>
                <div data-vatstatus="<?= $company->vat_status ?>" id="vat-db-status"></div>
                <div class="col-xs-6 col-sm-9 text-left">

                    <!--                   <div class="col-xs-12 col-sm-6">-->
                    <label for="yes" class="radio_label">YES
                        <input type="radio" class="" id="yes" value="1" name="vat_status">
                    </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!--                   </div>-->
                    <!--                   <div class="col-xs-12 col-sm-6">-->
                    <label for="no" class="radio_label">NO
                        <input type="radio" class="" id="no" value="0" name="vat_status">
                    </label>
                    <!--                   </div>-->

                </div>

            </div>

            <div class="vat_hidden">
                <div class="col-xs-12 col-sm-6">
                    <div class="col-xs-12 col-sm-5">
                        <label for="start-date" class="h3">VAT REG. NO.</label>
                    </div>
                    <div class="col-xs-12 col-sm-7">
                        <input type="text" class="form-control h3"
                               value="<?php echo isset($company->vat_reg_no) ? $company->vat_reg_no : ''; ?>"
                               name="vat_reg_no">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="col-xs-12 col-sm-5">
                        <label for="vat_scheme" class="h3">VAT SCHEME</label>
                    </div>
                    <div class="col-xs-12 col-sm-7">
                        <ul id="vat_scheme_dropdown" class="dropdown_parent">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="glyphicon glyphicon-arrow-down"></span> </a>
                                <ul class="dropdown-menu">
                                    <li>VAT Cash Accounting</li>
                                    <li>Standard VAT</li>
                                    <li>Flat Rate</li>
                                    <li>Other</li>
                                </ul>
                            </li>
                        </ul>
                        <input type="text" class="form-control custom_hidden" id="vat_scheme"
                               name="vat_scheme" value="<?= $company->vat_scheme ?>">
                    </div>
                </div>
            </div>

        </div>

        <div class="row hdng">
            <div class="col-xs-12 text-center">
                <h3>BANK DETAILS</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="col-xs-12 col-sm-4">
                    <label for="start-date" class="h3">ACCOUNT NAME</label>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" name="acc_name"
                           value="<?= isset($company->acc_name) ? $company->acc_name : '' ?>" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="col-xs-12 col-sm-4">
                    <label for="end-date" class="h3">ACCOUNT NUMBER</label>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" name="acc_number"
                           value="<?= isset($company->acc_number) ? $company->acc_number : '' ?>"
                           class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="col-xs-12 col-sm-4">
                    <label for="start-date" class="h3">SORT CODE</label>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" name="sort_code"
                           value="<?= isset($company->sort_code) ? $company->sort_code : '' ?>" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="col-xs-12 col-sm-4">
                    <label for="end-date" class="h3">BANK NAME</label>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" name="bank_name"
                           value="<?= isset($company->bank_name) ? $company->bank_name : '' ?>" class="form-control h3">
                </div>
            </div>
        </div>
        <div class="row hdng">
            <div class="col-xs-12 text-center">
                <h3>DIRECTOR/OWNER</h3>
            </div>
        </div>
        <div class="row">

            <?php
            $owners = SettingsCompanyModel::findAllOwners();


            foreach ($owners as $owner):
                ?>
                <div class="col-xs-12 col-md-4">
                    <div class="col-xs-12 col-md-5">
                        <label for="name" class="h3"> <?= $owner->company_owner_id ?>. &nbsp; NAME</label>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <input type="text" name="owner_name[]" value="<?= $owner->owner_name ?>"
                               class="form-control h3">
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="col-xs-12 col-md-4">
                        <label for="name" class="h3">D.O.B</label>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <input type="text" name="dob[]"
                               value="<?= !isset($owner->dob) ? date('d/m/Y', strtotime($owner->dob)) : '' ?>"
                               class="form-control h3 date_input"
                               placeholder="dd/mm/yyyy">
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="col-xs-12 col-md-4">
                        <label for="name" class="h3">N.I.N.O</label>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <input type="text" name="ni_number[]"
                               value="<?= $owner->ni_number ?>"
                               class="form-control h3">
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-info">Update <img src="images/spin.svg" class="hide_spinner"></button>
        </div>
    </form>
</main>
<!--website main content ends here
==============================-->


<!--website footer starts here
==============================-->
<footer class="container-fluid">
    <div class="row text-center">
        <small>COPYRIGHT SIMPLE ACCOUNTS &copy; ALL RIGHTS RESERVED.</small>
    </div>
</footer>
<!--website footer ends here
==============================-->
</body>

</html>