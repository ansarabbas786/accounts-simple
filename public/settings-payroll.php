<?php
use App\Helpers\Helper;
use App\Helpers\LayoutHelper;
use App\Model\Settings\SettingsPayrollModel;

require_once "../vendor/autoload.php";


LayoutHelper::head();
LayoutHelper::css('css/settings_payroll.css');
LayoutHelper::js('js/settings/settings-payroll.js');
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
        <h1>SETTINGS >
            <small>PAYROLL</small>
        </h1>
    </div>
</div>

<!--website main content starts here
==============================-->

<main class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-4">
            <button data-toggle="modal" data-target="#new_payroll_modal" id="new_btn" class="bttn btn btn-primary"><b>NEW
                    EMPLOYEE</b></button>
        </div>

    </div>

    <div class="row">

        <div class="col-xs-12">

            <div class="table-responsive">

                <table class="table">

                    <thead>

                    <tr>
                        <th class="text-center">REFERENCE</th>
                        <th class="text-center">NAME</th>
                        <th class="text-center">N.I.N.O</th>
                        <th class="text-center">START DATE</th>
                        <th class="text-center">LEAVING DATE</th>
                        <th class="text-center">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody id="employee_list_body">

                    <?php
                    $employees = SettingsPayrollModel::findAll();
                    foreach ($employees as $employee):
                        ?>
                        <tr>
                            <td class="forname text-center" hidden><?= $employee->forname ?></td>
                            <td class="dob text-center" hidden><?= $employee->dob ?></td>
                            <td class="gender text-center" hidden><?= $employee->gender ?></td>
                            <td class="line2 text-center" hidden><?= $employee->line1 ?></td>
                            <td class="line2 text-center" hidden><?= $employee->line2 ?></td>
                            <td class="town text-center" hidden><?= $employee->town ?></td>
                            <td class="city text-center" hidden><?= $employee->city ?></td>
                            <td class="post-code text-center" hidden><?= $employee->post_code ?></td>
                            <td class="telephone text-center" hidden><?= $employee->telephone ?></td>
                            <td class="email text-center" hidden><?= $employee->email ?></td>
                            <td class="notes text-center" hidden><?= $employee->notes ?></td>
                            <td class="bank-name text-center" hidden><?= $employee->bank_name ?></td>
                            <td class="acc-number text-center" hidden><?= $employee->acc_number ?></td>
                            <td class="sort-code text-center" hidden><?= $employee->sort_code ?></td>
                            <td class="acc_name text-center" hidden><?= $employee->acc_name ?></td>
                            <td class="employee-id text-center"><?= Helper::number_format($employee->employee_id, 5) ?></td>
                            <td class="surname text-left"><?= $employee->surname ?></td>
                            <td class="ni-number text-center"><?= $employee->ni_number ?></td>
                            <td class="start-date text-center"><?= $employee->start_date ?></td>
                            <td class="leaving-date text-center"><?= $employee->leaving_date ?></td>
                            <td class="text-center">
                                <button data-toggle="modal" data-employeeid="<?= $employee->employee_id ?>"
                                        class="btn btn-primary edit_btn">EDIT
                                </button>
                                <button data-toggle="modal" data-id="<?= $employee->employee_id ?>"
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


<!--new modal starts here
========================================-->

<div class="modal fade" id="new_payroll_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>NEW EMPLOYEE</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="routes.php?action=save" id="employee_new_form" method="post">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="surname">SURNAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" autofocus class="form-control" id="surname" name="surname">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="forname">FORNAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="forname" name="forname">
                            </div>
                        </div>
                    </div>
                    <!--first two fields ends here
===============================-->


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="date_of_birth">DATE OF BIRTH</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="text" class="form-control date_input" name="dob"
                                       placeholder="yyyy/mm/dd">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="gender">GENDER</label>
                            </div>
                            <div class="col-xs-7">


                                <label for="mail" class="radio_label">MALE
                                    <input type="radio" class="" checked value="m" id="mail" name="gender">
                                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <label for="femail" class="radio_label">FEMALE
                                    <input type="radio" class="" id="femail" value="f" name="gender">
                                </label>

                            </div>

                        </div>
                    </div>
                    <!--second row ends here-->
                    <div class="col-xs-12 text-center title">
                        <h3 class="text-center">ADDRESS &amp; CONTACT</h3>
                    </div>
                    <!--third row starts here-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="line1">LINE 1</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="line1" name="line1">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="line2">LINE 2</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="line2" name="line2">
                            </div>
                        </div>
                    </div>
                    <!--third row ends here-->


                    <!--4th row starts here-->

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
                    <!--4th row ends here-->


                    <!--5th row starts here-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="post_code">POSTCODE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="post_code" name="post_code">
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
                    <!--5th row ends here-->

                    <!--6th row starts here-->

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
                    <!--6th row ends here-->
                    <div class="col-xs-12 text-center title">
                        <h3 class="text-center">WORK</h3>
                    </div>

                    <!--7th row starts here-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="ni_number">NI NUMBER</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="ni_number" name="ni_number">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="start_date">START DATE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="start_date"
                                       placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>
                    <!--7th row ends here-->

                    <!--8th row starts here-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="leaving_date">LEAVING DATE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="leaving_date"
                                       placeholder="dd/mm/yyyy">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="reference">REFERENCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" readonly id="employee-id" name="employee_id">
                            </div>
                        </div>
                    </div>
                    <!--8th row ends here-->

                    <!--9th row starts here-->

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


                    <!--9th row ends here-->
                    <div class="col-xs-12 text-center title">
                        <h3 class="text-center">BANK DETAILS</h3>
                    </div>
                    <!--10th row starts here-->

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
                                <label for="account_number">ACCOUNT NUMBER</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_number" name="acc_number">
                            </div>
                        </div>
                    </div>
                    <!--10th row ends here-->


                    <!--11th row starts here-->

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
                                <label for="account_name">ACCOUNT NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_name" name="acc_name">
                            </div>
                        </div>
                    </div>
                    <!--11th row ends here-->
                    <div class="clearfix"></div>
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

<!--new modal ends here
========================================-->


<!--new modal starts here
========================================-->

<div class="modal fade" id="payroll_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>EDIT EMPLOYEE</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="routes.php?action=update" method="post" id="employee-update-form">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="surname">SURNAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" autofocus class="form-control" id="surname" name="surname">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="forname">FORNAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="forname" name="forname">
                            </div>
                        </div>
                    </div>
                    <!--first two fields ends here
===============================-->


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="date_of_birth">DATE OF BIRTH</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="text" class="form-control date_input" name="date_of_birth"
                                       placeholder="dd/mm/yyyy">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="gender">GENDER</label>
                            </div>
                            <div class="col-xs-7">

                                <label for="mail" class="radio_label">MALE
                                    <input type="radio" class="" checked id="mail" name="vat_registered">
                                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <label for="femail" class="radio_label">FEMALE
                                    <input type="radio" class="" id="femail" name="vat_registered">
                                </label>

                            </div>

                        </div>
                    </div>
                    <!--second row ends here-->
                    <div class="col-xs-12 text-center title">
                        <h3 class="text-center">ADDRESS &amp; CONTACT</h3>
                    </div>
                    <!--third row starts here-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="line1">LINE1</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="line1" name="line1">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="line2">LINE2</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="line2" name="line2">
                            </div>
                        </div>
                    </div>
                    <!--third row ends here-->


                    <!--4th row starts here-->

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
                    <!--4th row ends here-->


                    <!--5th row starts here-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="post_code">POSTCODE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="post_code" name="post_code">
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
                    <!--5th row ends here-->

                    <!--6th row starts here-->

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
                    <!--6th row ends here-->
                    <div class="col-xs-12 text-center title">
                        <h3 class="text-center">WORK</h3>
                    </div>

                    <!--7th row starts here-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="ni_number">NI NUMBER</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="ni_number" name="ni_number">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="start_date">START DATE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="start_date"
                                       placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                    </div>
                    <!--7th row ends here-->

                    <!--8th row starts here-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="leaving_date">LEAVING DATE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="leaving_date"
                                       placeholder="YYY/mm/dd">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="reference">REFERENCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" readonly id="employee-id" name="employee_id">
                            </div>
                        </div>
                    </div>
                    <!--8th row ends here-->

                    <!--9th row starts here-->

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


                    <!--9th row ends here-->
                    <div class="col-xs-12 text-center title">
                        <h3 class="text-center">BANK DETAILS</h3>
                    </div>
                    <!--10th row starts here-->

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
                                <label for="account_number">ACCOUNT NUMBER</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_number" name="account_number">
                            </div>
                        </div>
                    </div>
                    <!--10th row ends here-->


                    <!--11th row starts here-->

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
                                <label for="account_name">ACCOUNT NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_name" name="account_name">
                            </div>
                        </div>
                    </div>
                    <!--11th row ends here-->
                    <div class="clearfix"></div>
                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary">UPDATE <img src="images/spin.svg"
                                                                                  class="hide_spinner"></button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--edit modal ends here
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

