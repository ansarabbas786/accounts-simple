<?php

use App\Model\Settings\SettingsCustomerModel;

require_once "../vendor/autoload.php";

$customers = SettingsCustomerModel::findAll();


if (isset($_POST['save'])) {

    $data = (object)$_POST['formData'];

    if (SettingsCustomerModel::processForm($data, 'save')) {

        echo 'saved!';
    }
    exit();
}


Helper::head();
Helper::css('css/setting-customer.css');
Helper::js('js/settings/settings-customer.js');
Helper::endHead();


Helper::body();
Helper::header();
Helper::navigation();
Helper::subNavigation();

?>

<!--website header ends here
==============================-->
<div class="hero container-fluid">
    <div class="row text-center">
        <h1>SETTINGS > <span class="h3">CUSTOMERS</span></h1>
    </div>
</div>

<!--website main content starts here
==============================-->
<main class="container">
    <div class="row">
        <div class="col-xs-12 buton">
            <button data-toggle="modal" data-target="#customer_new_modal" class="btn btn-primary"><b>NEW +</b></button>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center name">NAME</th>
                        <th class="text-center">REFERENCE</th>
                        <th class="text-center">CONTACT</th>
                        <th class="text-center">TELEPHONE</th>
                        <th class="text-center">OPTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $customers = SettingsCustomerModel::findAll();

                    foreach ($customers as $customer):
                        ?>

                        <tr id="customer_data">
                            <!---------Hidden data for the form to display with the jquery edit!------------>
                            <td hidden class="line1"><?= $customer->line1 ?></td>
                            <td hidden class="line2"><?= $customer->line2 ?></td>
                            <td hidden class="town"><?= $customer->town ?></td>
                            <td hidden class="city"><?= $customer->city ?></td>
                            <td hidden class="post_code"><?= $customer->post_code ?></td>
                            <td hidden class="country"><?= $customer->country ?></td>
                            <td hidden class="tel"><?= $customer->tel ?></td>
                            <td hidden class="mobile"><?= $customer->mobile ?></td>
                            <td hidden class="fax"><?= $customer->fax ?></td>
                            <td hidden class="email"><?= $customer->email ?></td>
                            <td hidden class="website"><?= $customer->website ?></td>
                            <td><?= $customer->name ?></td>
                            <td class="text-center">1</td>
                            <td><?= $customer->user_id ?></td>
                            <td><?= $customer->tel ?></td>
                            <td class="text-center">
                                <button data-customerid="<?= $customer->customer_id ?>"
                                        data-userid="<?= $customer->user_id ?>"
                                        class="btn btn-primary edit_btn">EDIT
                                </button>
                                <button class="btn btn-primary delete_btn"
                                        data-customerid="<?= $customer->customer_id ?>"
                                        data-userid="<?= $customer->user_id ?>">DELETE
                                </button>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
<!--website main content ends here
==============================-->


<!--customer new modal starts here
========================================-->

<div class="modal fade" id="customer_new_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>NEW CUSTOMER</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="name">NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="name" name="formData[name]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_ref">ACCOUNT REF.</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_ref" name="formData[acc_ref]">
                            </div>
                        </div>
                    </div>
                    <!--first two fields ends here
                    ===============================-->


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="credit_limit">CREDIT LIMIT</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="credit_limit" name="formData[credit_limit]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="payment_due">PAYMENT DUE(DAYS)</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="payment_due" name="formData[payment_due]">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-5 col-sm-2">
                                <label for="payment_terms">PAYMENT TERMS</label>
                            </div>
                            <div class="col-xs-7 col-sm-10">
                                <textarea name="formData[payment_terms]" id="payment_terms"
                                          class="form-control"></textarea>
                            </div>

                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <h2 class="modal_heading_header">ADDRESS &amp; OTHER</h2>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="address_line1">LINE 1</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="address_line1" name="formData[line1]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="address_line2">LINE 2</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="address_line2" name="formData[line2]">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="town">TOWN</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="town" name="formData[town]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="city">CITY</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="city" name="formData[city]">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="postcode">POSTCODE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="postcode" name="formData[post_code]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="country">COUNTRY</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="country" name="formData[country]">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="telephone">TELEPHONE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="telephone" name="formData[telephone]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="mobile">MOBILE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="mobile" name="formData[mobile]">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="fax">FAX</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="fax" name="formData[fax]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="email">EMAIL</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="email" class="form-control" id="email" name="formData[email]">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="website">WEBSITE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="website" name="formData[website]">
                            </div>

                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary" name="save">ADD</button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--customer new modal ends here
========================================-->


<!--customer edit modal starts here
========================================-->

<div class="modal fade" id="customer_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>EDIT CUSTOMER</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_name">NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_name" name="edit_name">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_account_ref">ACCOUNT REF.</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_account_ref" name="edit_account_ref">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_credit_limit">CREDIT LIMIT</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_credit_limit" name="edit_credit_limit">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_payment_due">PAYMENT DUE(DAYS)</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_payment_due" name="edit_payment_due">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-5 col-sm-2">
                                <label for="edit_payment_terms">PAYMENT TERMS</label>
                            </div>
                            <div class="col-xs-7 col-sm-10">
                                <textarea name="edit_payment_terms" id="edit_payment_terms"
                                          class="form-control"></textarea>
                            </div>

                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <h2 class="modal_heading_header">ADDRESS &amp; OTHER</h2>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_address_line1">LINE 1</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_address_line1"
                                       name="edit_address_line1">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_address_line2">LINE 2</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_address_line2"
                                       name="edit_address_line2">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_town">TOWN</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_town" name="edit_town">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_city">CITY</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_city" name="edit_city">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_postcode">POSTCODE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_postcode" name="edit_postcode">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_country">COUNTRY</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_country" name="edit_country">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_telephone">TELEPHONE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_telephone" name="edit_telephone">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_mobile">MOBILE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_mobile" name="edit_mobile">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_fax">FAX</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_fax" name="edit_fax">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_email">EMAIL</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="email" class="form-control" id="edit_email" name="edit_email">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_website">WEBSITE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_website" name="edit_website">
                            </div>

                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--customer edit modal ends here
========================================-->


<!--confirm modal starts here
======================================-->

<div class="modal fade" id="confirm_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header danger">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>CONFIRM</h3>
            </div>
            <div class="modal-body">
                <br><br>
                <p class="lead text-center"><b>ARE YOU SURE YOU WANT TO DELETE THIS CUSTOMER ?</b></p>


                <div class="form-group modal_buttons text-right">
                    <button class="btn btn-danger">YES</button>
                    <button data-dismiss="modal" class="btn btn-primary">NO</button>
                </div>

            </div>
        </div>
    </div>
</div>


<!--confirm modal ends here
======================================-->


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
            