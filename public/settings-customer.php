<?php

use App\Helpers\Helper;
use App\Helpers\LayoutHelper;
use App\Model\Settings\SettingsCustomerModel;

require_once "../vendor/autoload.php";


LayoutHelper::head();
LayoutHelper::css('css/setting-customer.css');
LayoutHelper::js('js/settings/settings-customer.js');
LayoutHelper::endHead();


LayoutHelper::body();
LayoutHelper::header();
LayoutHelper::navigation();
LayoutHelper::subNavigation();

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
            <button data-toggle="modal" data-target="#customer_new_modal" class="btn btn-primary" id="new_btn"><b>NEW +</b></button>
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
                    <tbody id="customer_list_body">

                    <?php
                    $customers = SettingsCustomerModel::findAll();

                    foreach ($customers as $customer):
                        ?>

                            <!---------Hidden data for the form to display with the jquery edit!------------>
                        <tr>

                            <td hidden class="credit-limit"><?= $customer->credit_limit ?></td>
                            <td hidden class="payment-due"><?= $customer->payment_due ?></td>
                            <td hidden class="payment-terms"><?= $customer->payment_terms ?></td>
                            <td hidden class="line1"><?= $customer->line1 ?></td>
                            <td hidden class="line2"><?= $customer->line2 ?></td>
                            <td hidden class="town"><?= $customer->town ?></td>
                            <td hidden class="city"><?= $customer->city ?></td>
                            <td hidden class="post-code"><?= $customer->post_code ?></td>
                            <td hidden class="country"><?= $customer->country ?></td>
                            <td hidden class="fax"><?= $customer->fax ?></td>
                            <td hidden class="email"><?= $customer->email ?></td>
                            <td hidden class="website"><?= $customer->website ?></td>
                            <td class="name text-center"><?= $customer->name ?></td>
                            <td class="customer-id text-center"><?= Helper::number_format($customer->customer_id, 5) ?></td>
                            <td class="telephone text-center"><?= $customer->telephone ?></td>
                            <td class="mobile text-center"><?= $customer->mobile ?></td>
                            <td class="text-center">
                                <button data-customerid="<?= $customer->customer_id ?>" class="btn btn-primary edit_btn">EDIT
                                    </button>
                                <button class="btn btn-primary delete_btn" data-id="<?= $customer->customer_id ?>">DELETE</button>
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
                <form action="routes.php?action=save" id="new_customer_form" method="post">


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_ref">ACCOUNT REF.</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" readonly class="form-control" id="customer_id" name="customer_id">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="name">NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" autofocus id="name" name="name">
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
                                <input type="text" class="form-control" id="credit_limit" name="credit_limit">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="payment_due">PAYMENT DUE(DAYS)</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="payment_due" name="payment_due">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-5 col-sm-2">
                                <label for="payment_terms">PAYMENT TERMS</label>
                            </div>
                            <div class="col-xs-7 col-sm-10">
                                <textarea name="payment_terms" id="payment_terms"
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
                                <input type="text" class="form-control" id="address_line1" name="line1">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="address_line2">LINE 2</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="address_line2" name="line2">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="town">TOWN</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="town" name="town">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="city">CITY</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="postcode">POSTCODE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="postcode" name="post_code">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="country">COUNTRY</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="country" name="country">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="telephone">TELEPHONE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="telephone" name="telephone">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="mobile">MOBILE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="mobile" name="mobile">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="fax">FAX</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="fax" name="fax">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="email">EMAIL</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="website">WEBSITE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="website" name="website">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary" name="save">ADD<img src="images/spin.svg"  class="hide_spinner"></button>
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
                <form action="routes.php?action=update" id="update_customer_form" method="post">


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_ref">ACCOUNT REF.</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" readonly class="form-control" id="customer_id" name="customer_id">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="name">NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" autofocus id="name" name="name">
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
                                <input type="text" class="form-control" id="credit_limit" name="credit_limit">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="payment_due">PAYMENT DUE(DAYS)</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="payment_due" name="payment_due">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-5 col-sm-2">
                                <label for="payment_terms">PAYMENT TERMS</label>
                            </div>
                            <div class="col-xs-7 col-sm-10">
                                <textarea name="payment_terms" id="payment_terms"
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
                                <input type="text" class="form-control" id="address_line1" name="line1">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="address_line2">LINE 2</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="address_line2" name="line2">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="town">TOWN</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="town" name="town">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="city">CITY</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="postcode">POSTCODE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="postcode" name="post_code">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="country">COUNTRY</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="country" name="country">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="telephone">TELEPHONE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="telephone" name="telephone">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="mobile">MOBILE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="mobile" name="mobile">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="fax">FAX</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="fax" name="fax">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="email">EMAIL</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="website">WEBSITE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="website" name="website">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary" "update">UPDATE<img src="images/spin.svg"  class="hide_spinner"></button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--customer edit modal ends here
========================================-->



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
            