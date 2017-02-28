<?php
use App\Helpers\Helper;
use App\Helpers\LayoutHelper;
use App\Model\Settings\SettingsBankModel;


require_once "../vendor/autoload.php";


LayoutHelper::head();
LayoutHelper::css('css/setting-bank.css');
LayoutHelper::js('js/settings/settings-bank.js');
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
        <h1>SETTINGS > <span class="h3">BANK</span></h1>
    </div>
</div>

<!--website main content starts here
==============================-->
<main class="container">
    <div class="row">
        <div class="col-xs-12 buton">
            <button data-toggle="modal" id="new_btn" data-target="#bank_new_modal" class="btn btn-primary"><b>NEW
                    +</b></button>
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
                        <th class="text-center">SORT CODE</th>
                        <th class="text-center">ACCOUNT NO.</th>
                        <th class="text-center">OPTIONS</th>
                    </tr>
                    </thead>
                    <tbody id="bank_list_body">
                    <?php
                    $banks = SettingsBankModel::findAll();

                    foreach ($banks as $bank):
                        ?>
                        <tr>
                            <td class="acc-name"><?= $bank->acc_name ?></td>
                            <td class="text-center bank_id"><?= Helper::number_format($bank->bank_id, 5) ?></td>
                            <td class="sort-code"><?= $bank->sort_code ?></td>
                            <td class="acc-no"><?= $bank->acc_no ?></td>
                            <td hidden class="bank-name"><?= $bank->bank_name ?></td>
                            <td hidden class="start-balance"><?= $bank->start_balance ?></td>
                            <td hidden class="line1"><?= $bank->line1 ?></td>
                            <td hidden class="line2"><?= $bank->line2 ?></td>
                            <td hidden class="town"><?= $bank->town ?></td>
                            <td hidden class="city"><?= $bank->city ?></td>
                            <td hidden class="country"><?= $bank->country ?></td>
                            <td hidden class="post-code"><?= $bank->post_code ?></td>
                            <td hidden class="contact-name"><?= $bank->contact_name ?></td>
                            <td hidden class="telephone "><?= $bank->telephone ?></td>
                            <td hidden class="fax"><?= $bank->fax ?></td>
                            <td hidden class="email"><?= $bank->email ?></td>
                            <td hidden class="notes"><?= $bank->notes ?></td>


                            <td class="text-center">
                                <button data-toggle="modal" data-bankid="<?= $bank->bank_id ?>"
                                        class="btn btn-primary edit_btn">EDIT
                                </button>
                                <button data-toggle="modal" data-bankid="<?= $bank->bank_id ?>"
                                        class="btn btn-primary delete_btn">DELETE
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


<!--bank  modal starts here
========================================-->

<div class="modal fade" id="bank_new_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>NEW BANK</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="routes.php?action=save" id="new_bank_form" method="post">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="ac_ref">A/C REF.</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" readonly class="form-control"  id="bank_id" name="bank_id">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_name">ACCOUNT NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" autofocus id="account_name" name="acc_name">
                            </div>
                        </div>
                    </div>
                    <!--first two fields ends here
                    ===============================-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="bank_name">BANK NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="bank_name" name="bank_name">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="start_balance">START BALANCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="start_balance"
                                       name="start_balance">
                            </div>
                        </div>
                    </div>
                    <!--second row ends here
                    ===============================-->

                    <div class="clearfix"></div>
                    <h2 class="modal_heading_header">ADDRESS</h2>


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

                    <div class="clearfix"></div>
                    <h2 class="modal_heading_header">CONTACT</h2>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="contact_name">CONTACT NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="contact_name" name="contact_name">
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


                    <div class="clearfix"></div>
                    <h2 class="modal_heading_header">ACCOUNT DETAILS</h2>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_name">ACCOUNT NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_name" name="acc_name_final">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="sort_code">SORT CODE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="sort_code" name="sort_code">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_no">ACCOUNT NO.</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_no" name="acc_no">
                            </div>

                        </div>
                    </div>

                    <br>
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-5 col-sm-2">
                                <label for="notes">NOTES</label>
                            </div>
                            <div class="col-xs-7 col-sm-10">
                                <textarea name="notes" id="notes" class="form-control"></textarea>
                            </div>

                        </div>
                    </div>


                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary" name="save">ADD <img src="images/spin.svg"
                                                                                           class="hide_spinner">
                        </button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--bank new modal ends here
========================================-->


<!--bank edit modal starts here
========================================-->

<div class="modal fade" id="bank_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>EDIT BANK</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="routes.php?action=update" id="update_bank_form" method="post">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="ac_ref">A/C REF.</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" readonly class="form-control"  id="ac_ref" name="bank_id">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_name">ACCOUNT NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" autofocus id="account_name" name="acc_name">
                            </div>
                        </div>
                    </div>
                    <!--first two fields ends here
                    ===============================-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="bank_name">BANK NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="bank_name" name="bank_name">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="start_balance">START BALANCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="start_balance"
                                       name="start_balance">
                            </div>
                        </div>
                    </div>
                    <!--second row ends here
                    ===============================-->

                    <div class="clearfix"></div>
                    <h2 class="modal_heading_header">ADDRESS</h2>


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

                    <div class="clearfix"></div>
                    <h2 class="modal_heading_header">CONTACT</h2>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="contact_name">CONTACT NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="contact_name" name="contact_name">
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


                    <div class="clearfix"></div>
                    <h2 class="modal_heading_header">ACCOUNT DETAILS</h2>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_name">ACCOUNT NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_name" name="acc_name_final">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="sort_code">SORT CODE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="sort_code" name="sort_code">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_no">ACCOUNT NO.</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_no" name="acc_no">
                            </div>

                        </div>
                    </div>

                    <br>
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <div class="col-xs-5 col-sm-2">
                                <label for="notes">NOTES</label>
                            </div>
                            <div class="col-xs-7 col-sm-10">
                                <textarea name="notes" id="notes" class="form-control"></textarea>
                            </div>

                        </div>
                    </div>


                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary" name="save">UPDATE <img src="images/spin.svg"
                                                                                           class="hide_spinner">
                        </button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--bank edit modal ends here
========================================-->


<!--confirm modal starts here
======================================-->




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
            