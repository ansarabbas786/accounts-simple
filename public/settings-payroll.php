<?php
use App\Model\Settings\SettingsPayrollModel;

require_once "../vendor/autoload.php";


if(isset($_POST['save'])){
    $data = (object) $_POST['formData'];

    SettingsPayrollModel::processForm($data, 'save');
}













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
        <h1>SETTINGS > <small>PAYROLL</small></h1>
    </div>
</div>

<!--website main content starts here
==============================-->

<main class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-4">
            <button data-toggle="modal" data-target="#new_payroll_modal" class="bttn btn btn-primary"><b>NEW EMPLOYEE</b></button>
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

                    <tbody>

                    <tr>
                        <td class="text-center">001</td>
                        <td class="text-left">ANDY KINGS</td>
                        <td class="text-center">AB 51 51 02 C</td>
                        <td class="text-center">02/05/2015</td>
                        <td class="text-center"></td>
                        <td class="text-center">

                            <button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button>
                            <button data-toggle="modal" class="btn btn-primary delete_btn">DELETE</button>
                        </td>

                    </tr>


                    <tr>
                        <td class="text-center">002</td>
                        <td class="text-left">KATE BROOKS</td>
                        <td class="text-center">BA 22 44 22 V</td>
                        <td class="text-center">10/09/2016</td>
                        <td class="text-center"></td>
                        <td class="text-center">

                            <button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button>
                            <button data-toggle="modal" class="btn btn-primary delete_btn">DELETE</button>
                        </td>

                    </tr>
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
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="surname">SURNAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="surname" name="formData[surname]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="forname">FORNAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="forname" name="formData[forname]">
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

                                <input type="text" class="form-control date_input" name="formData[dob]" placeholder="dd/mm/yyyy">
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
                                    <input type="radio" class="" value="m" id="mail" name="formData[gender]">
                                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <label for="femail" class="radio_label">FEMALE
                                    <input type="radio" class="" id="femail" value="f" name="formData[gender]">
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
                                <input type="text" class="form-control" id="line1" name="formData[line1]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="line2">LINE 2</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="line2" name="formData[line2]">
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
                    <!--4th row ends here-->



                    <!--5th row starts here-->

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="post_code">POSTCODE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="post_code" name="formData[post_code]">
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
                    <!--5th row ends here-->

                    <!--6th row starts here-->

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
                                <input type="text" class="form-control" id="ni_number" name="formData[ni_number]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="start_date">START DATE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="formData[start_date]" placeholder="dd/mm/yyyy">
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
                                <input type="text" class="form-control date_input" name="formData[leaving_date]" placeholder="dd/mm/yyyy">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="reference">REFERENCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="reference" name="formData[reference]">
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
                                <textarea name="formData[notes]" id="notes" class="form-control"></textarea>
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
                                <input type="text" class="form-control" id="bank_name" name="formData[bank_name]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_number">ACCOUNT NUMBER</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_number" name="formData[acc_number]">
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
                                <input type="text" class="form-control" id="sort_code" name="formData[sort_code]">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="account_name">ACCOUNT NAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="account_name" name="formData[acc_name]">
                            </div>
                        </div>
                    </div>
                    <!--11th row ends here-->
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
                <form action="">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="surname">SURNAME</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="surname" name="surname">
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

                                <input type="text" class="form-control date_input" name="date_of_birth" placeholder="dd/mm/yyyy">
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
                                    <input type="radio" class="" id="mail" name="vat_registered">
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
                                <input type="text" class="form-control date_input" name="start_date" placeholder="dd/mm/yyyy">
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
                                <input type="text" class="form-control date_input" name="leaving_date" placeholder="dd/mm/yyyy">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="reference">REFERENCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="reference" name="reference">
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
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--edit modal ends here
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

