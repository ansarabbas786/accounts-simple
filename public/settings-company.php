<?php
use App\Helpers\LayoutHelper;
use App\Model\Settings\SettingsCompanyModel;
use App\Validator\CompanyValidator;

require_once "../vendor/autoload.php";

if (isset($_POST['submit'])) {

    $data = (object) $_POST['formData'];

    if (SettingsCompanyModel::processForm($data, 'update')) {

        $errors = CompanyValidator::getErrors();

        if (CompanyValidator::has('name')) {
            echo $errors->name;
        }
        exit('good to go');
    }
}

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
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal company_form">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <label for="name" class="h3">NAME</label>
                </div>
                <div class="col-xs-12 col-sm-10 col-md-10">
                    <input type="text" id="name" name="formData[name]" class="form-control h3 field_adjust">
                </div>
            </div>


            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="email" class="h3">EMAIL</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" name="formData[email]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="telephone" class="h3">TELEPHONE</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" name="formData[telephone]" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="fax" class="h3">FAX</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" name="formData[fax]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="website" class="h3">WEBSITE</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="website" name="formData[website]" class="form-control h3">
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
                    <input type="text" id="address_line1" name="formData[line1]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="address_line2" class="h3">LINE 2</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="address_line2" name="formData[line2]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="town" class="h3">TOWN</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="town" name="formData[town]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="city" class="h3">CITY</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="city" name="formData[city]" class="form-control h3">
                </div>
            </div>


            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="postcode" class="h3">POSTCODE</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="postcode" name="formData[post_code]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="country" class="h3">COUNTRY</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" id="country" name="formData[country]" class="form-control h3">
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
                <img src="images/user_img.jpg" alt="" class="img-responsive business_logo">
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

                        <input type="file" name="formData[image]" class="form-control h3 business_upload_field">
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
                    <input type="text" class="form-control h3 date_input" name="formData[start_date]"
                           placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="end-date" class="h3">END DATE</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" class="form-control h3 date_input" name="formData[end_date]"
                           placeholder="dd/mm/yyyy">
                </div>
            </div>


            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="registration_number" class="h3">COMPANY REG. NO.</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" class="form-control h3" name="formData[registration_no]">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="col-xs-12 col-sm-5">
                    <label for="tax_ref" class="h3">UNIQUE TAX REF.</label>
                </div>
                <div class="col-xs-12 col-sm-7">
                    <input type="text" name="formData[unique_tax_ref]" class="form-control h3">
                </div>
            </div>


            <div class="col-xs-12">
                <div class="col-xs-6 col-sm-3">
                    <label for="yes" class="h3">
                        VAT REGISTERED?
                    </label>
                </div>
                <div class="col-xs-6 col-sm-9 text-left">

                    <!--                   <div class="col-xs-12 col-sm-6">-->
                    <label for="yes" class="radio_label">YES
                        <input type="radio" class="" id="yes" value="1" name="formData[vat_status]">
                    </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!--                   </div>-->
                    <!--                   <div class="col-xs-12 col-sm-6">-->
                    <label for="no" class="radio_label">NO
                        <input type="radio" class="" checked id="no" value="0" name="formData[vat_status]">
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
                        <input type="text" class="form-control h3" name="formData[vat_reg_no]">
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
                                    <li>vat scheme 1</li>
                                    <li>vat scheme 2</li>
                                    <li>vat scheme 3</li>
                                </ul>
                            </li>
                        </ul>
                        <input type="text" class="form-control custom_hidden" id="vat_scheme"
                               name="formData[vat_scheme]">
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
                    <input type="text" name="formData[acc_name]" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="col-xs-12 col-sm-4">
                    <label for="end-date" class="h3">ACCOUNT NUMBER</label>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" name="formData[acc_number]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="col-xs-12 col-sm-4">
                    <label for="start-date" class="h3">SORT CODE</label>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" name="formData[sort_code]" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="col-xs-12 col-sm-4">
                    <label for="end-date" class="h3">BANK NAME</label>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <input type="text" name="formData[bank_name]" class="form-control h3">
                </div>
            </div>
        </div>
        <div class="row hdng">
            <div class="col-xs-12 text-center">
                <h3>DIRECTOR/OWNER</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-5">
                    <label for="name" class="h3">1. &nbsp; NAME</label>
                </div>
                <div class="col-xs-12 col-md-7">
                    <input type="text" name="owner_name[]" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-4">
                    <label for="name" class="h3">D.O.B</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="owner_dob[]" class="form-control h3 date_input"
                           placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-4">
                    <label for="name" class="h3">N.I.N.O</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="owner_ni_no[]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-5">
                    <label for="name" class="h3">2. &nbsp; NAME</label>
                </div>
                <div class="col-xs-12 col-md-7">
                    <input type="text" name="owner_name" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-4">
                    <label for="name" class="h3">D.O.B</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="formData[][owner_dob]" class="form-control h3 date_input"
                           placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-4">
                    <label for="name" class="h3">N.I.N.O</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="formData[][owner_ni_no]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-5"><label for="name" class="h3">3. &nbsp; NAME</label>
                </div>
                <div class="col-xs-12 col-md-7"><input name="formData[][owner_name]" type="text"
                                                       class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-4">
                    <label for="name" class="h3">D.O.B</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="formData[][owner_dob]" class="form-control h3 date_input"
                           placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-4">
                    <label for="name" class="h3">N.I.N.O</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="formData[][owner_ni_no]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-5">
                    <label for="name" class="h3">4. &nbsp; NAME</label>
                </div>
                <div class="col-xs-12 col-md-7">
                    <input type="text" name="formData[][owner_name]" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-4">
                    <label for="name" class="h3">D.O.B</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="formData[][owner_dob]" class="form-control h3 date_input"
                           placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-4">
                    <label for="name" class="h3">N.I.N.O</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="formData[][owner_ni_no]" class="form-control h3">
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-5">
                    <label for="name" class="h3">5. &nbsp; NAME</label>
                </div>
                <div class="col-xs-12 col-md-7">
                    <input type="text" name="formData[][owner_name]" class="form-control h3">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-sx-12 col-md-4">
                    <label for="name" class="h3">D.O.B</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="formData[][owner_dob]" class="form-control h3 date_input"
                           placeholder="dd/mm/yyyy">
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="col-xs-12 col-md-4">
                    <label for="name" class="h3">N.I.N.O</label>
                </div>
                <div class="col-xs-12 col-md-8">
                    <input type="text" name="formData[][owner_ni_no]" class="form-control h3">
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" name="submit" class="btn btn-info">Update</button>
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