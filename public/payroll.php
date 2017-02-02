<?php
require_once "../vendor/autoload.php";
Helper::head();
Helper::css('css/payroll.css');
Helper::js('js/payroll.js');
Helper::endHead();


Helper::body();
Helper::header();
Helper::navigation();

?>

<!--website header ends here
==============================-->
<div class="hero container-fluid">
    <div class="row text-center">
        <h1>PAYROLL</h1>
    </div>
</div>

<!--website main content starts here
==============================-->
<main class="container">
    <div class="row custom_container">
        <div class="col-xs-12 col-sm-4 col-md-3 btn_container">
            <button data-toggle="modal" data-target="#reports_modal" class="btn btn-primary special">
                <b>REPORTS</b>
            </button>
        </div>


        <div class="col-xs-12 col-sm-4 col-md-3 btn_container">
            <button data-toggle="modal" class="btn btn-primary special text-center new_payroll_btn"><b>NEW PAYROLL +</b>
            </button>


        </div>

    </div>


    <div class="row highlights text-center">
        <h1>PAYROLL RUNS</h1>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">PAYMENT DATE</th>
                        <th class="text-center">BASIC PAY</th>
                        <th class="text-center">SSP,SMP,SPP</th>
                        <th class="text-center">HOLIDAY PAY</th>
                        <th class="text-center">OTHER</th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td class="text-center">26/06/2016</td>
                        <td class="text-right">2300</td>
                        <td class="text-right">150</td>
                        <td class="text-right">200</td>
                        <td class="text-right">100</td>
                        <td class="text-right">2750</td>
                        <td class="text-center">
                            <button data-toggle="modal" class="btn btn-primary full_edit_btn">EDIT</button>
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


<!--reports modal starts here
========================================-->

<div class="modal fade" id="reports_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>REPORT</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="date_from">DATE FROM</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="date_from"
                                       placeholder="dd/mm/yyyy">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="date_to">DATE TO</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="date_to"
                                       placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                    </div>
                    <!--first two fields ends here
===============================-->


                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary">GENERATE</button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--reports modal ends here
========================================-->


<!--NEW PAYROLL + MODAL BOX STARTS HERE=======
=========================================-->

<div class="modal fade" id="new_payment_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>NEW PAYROLL</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="payment_date">PAYMENT DATE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="payment_date"
                                       placeholder="dd/mm/yyyy">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="employee">EMPLOYEE</label>
                            </div>
                            <div class="col-xs-7">
                                <ul class="dropdown_parent">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                            data-toggle="dropdown"><span
                                                    class="glyphicon glyphicon-arrow-down"></span> </a>

                                        <ul class="dropdown-menu">
                                            <li>Employee 1</li>
                                            <li>Employee 2</li>
                                            <li>Employee 3</li>
                                        </ul>
                                    </li>
                                </ul>
                                <input type="text" class="form-control custom_hidden" id="employee" name="employee">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="basic_pay">BASIC PAY</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="number" class="form-control" id="basic_pay" name="basic_pay">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="ssp_smp_spp">SSP,SMP,SPP</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="text" class="form-control" id="ssp_smp_spp" name="ssp_smp_spp">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="holiday_pay">HOLIDAY PAY</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="number" class="form-control" id="holiday_pay" name="holiday_pay">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="others">OTHERS</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="text" class="form-control" id="others" name="others">
                            </div>

                        </div>
                    </div>


                    <div class="form-group modal_buttons text-right">
                        <button class="btn btn-primary">ADD</button>
                    </div>


                    <div class="table-responsive">
                        <table class="table-bordered">
                            <thead>
                            <tr>
                                <th>EMPLOYEE</th>
                                <th>BASIC PAY</th>
                                <th>SSP,SMP,SPP</th>
                                <th>HOLIDAY PAY</th>
                                <th>OTHER</th>
                                <th>TOTAL</th>
                                <th>OPTIONS</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--NEW PAYROLL + MODAL BOX ENDS HERE=======
=========================================-->


<!--full edit MODAL BOX STARTS HERE=======
=========================================-->

<div class="modal fade" id="full_edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>EDIT PAYROLL</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="payment_date">PAYMENT DATE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="payment_date"
                                       placeholder="dd/mm/yyyy">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="employee">EMPLOYEE</label>
                            </div>
                            <div class="col-xs-7">
                                <ul class="dropdown_parent">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                            data-toggle="dropdown"><span
                                                    class="glyphicon glyphicon-arrow-down"></span> </a>

                                        <ul class="dropdown-menu">
                                            <li>Employee 1</li>
                                            <li>Employee 2</li>
                                            <li>Employee 3</li>
                                        </ul>
                                    </li>
                                </ul>
                                <input type="text" class="form-control custom_hidden" id="employee" name="employee">
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="basic_pay">BASIC PAY</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="number" class="form-control" id="basic_pay" name="basic_pay">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="ssp_smp_spp">SSP,SMP,SPP</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="text" class="form-control" id="ssp_smp_spp" name="ssp_smp_spp">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="holiday_pay">HOLIDAY PAY</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="number" class="form-control" id="holiday_pay" name="holiday_pay">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="others">OTHERS</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="text" class="form-control" id="others" name="others">
                            </div>

                        </div>
                    </div>


                    <div class="form-group modal_buttons text-right">
                        <button class="btn btn-primary">ADD</button>
                    </div>


                    <div class="table-responsive">
                        <table class="table-bordered">
                            <thead>
                            <tr>
                                <th>EMPLOYEE</th>
                                <th>BASIC PAY</th>
                                <th>SSP,SMP,SPP</th>
                                <th>HOLIDAY PAY</th>
                                <th>OTHER</th>
                                <th>TOTAL</th>
                                <th>OPTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-left">ANDY KING</td>
                                <td class="text-right">1000</td>
                                <td class="text-right"></td>
                                <td class="text-right">200</td>
                                <td class="text-right"></td>
                                <td class="text-right">1200</td>
                                <td class="text-center">
                                    <button data-toggle="modal" class="btn btn-primary btn-xs edit_btn">EDIT</button>
                                    <button data-toggle="modal" class="btn btn-primary btn-xs delete_btn">DELETE
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-left">KATE BROOKS</td>
                                <td class="text-right">500</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right">100</td>
                                <td class="text-right">600</td>
                                <td class="text-center">
                                    <button data-toggle="modal" class="btn btn-primary btn-xs edit_btn">EDIT</button>
                                    <button data-toggle="modal" class="btn btn-primary btn-xs delete_btn">DELETE
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-left">SUE MARTIN</td>
                                <td class="text-right">800</td>
                                <td class="text-right">150</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right">950</td>
                                <td class="text-center">
                                    <button data-toggle="modal" class="btn btn-primary btn-xs edit_btn">EDIT</button>
                                    <button data-toggle="modal" class="btn btn-primary btn-xs delete_btn">DELETE
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--full edit MODAL BOX ENDS HERE=======
=========================================-->


<!--edit modal starts here
========================================-->

<div class="modal fade" id="edit_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>EDIT</h3>
            </div>

            <div class="modal-body clearfix">
                <form action="">

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_employee">EMPLOYEE</label>
                            </div>
                            <div class="col-xs-7">
                                <ul class="dropdown_parent">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                            data-toggle="dropdown"><span
                                                    class="glyphicon glyphicon-arrow-down"></span> </a>

                                        <ul class="dropdown-menu">
                                            <li>Employee 1</li>
                                            <li>Employee 2</li>
                                        </ul>
                                    </li>
                                </ul>

                                <input type="text" class="custom_hidden" id="edit_employee" name="edit_employee">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_basic_pay">BASIC PAY</label>
                            </div>
                            <div class="col-xs-7">

                                <input type="text" class="form-control" id="edit_basic_pay" name="edit_basic_pay">
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_ssp">SSP,SMP,SPP</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_ssp" name="edit_ssp">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_holiday_pay">HOLIDAY PAY</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_holiday_pay" name="edit_holiday_pay">
                            </div>
                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_other">OTHER</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_other" name="edit_other">
                            </div>

                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_total">TOTAL</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_total" name="edit_total">
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
                <p class="lead"><b>ARE YOU SURE YOU WANT TO DELETE THIS RECORD ?</b></p>


                <div class="modal_buttons text-right">
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