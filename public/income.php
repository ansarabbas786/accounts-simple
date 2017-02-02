<?php
require_once "../vendor/autoload.php";
Helper::head();
Helper::css('css/income.css');
Helper::js('js/income.js');
Helper::endHead();


Helper::body();
Helper::header();
Helper::navigation();

?>


<!--website header ends here
==============================-->
<div class="hero container-fluid">
    <div class="row text-center">
        <h1>INCOME</h1>
    </div>
</div>

<!--website main content starts here
==============================-->
<main class="container">
    <div class="row btn_container">
        <div class="col-xs-12 col-sm-3 col-md-2">
            <button data-toggle="modal" data-target="#reports_modal" class="btn btn-primary"><b>REPORTS</b></button>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-2">
            <button data-toggle="modal" data-target="#create_modal" class="btn btn-primary"><b>CREATE +</b></button>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-2">
            <button data-toggle="modal" data-target="#enter_modal" class="btn btn-primary"><b>ENTER +</b></button>
        </div>
    </div>

    <div class="row highlights text-center">
        <p>SALES INVOICES &amp; CREDITS</p>
    </div>

    <!--income page table starts here
    ================================-->

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table">


                    <colgroup>
                        <col id="first">
                        <col id="second">
                        <col id="third">
                        <col id="fourth">
                        <col id="fifth">
                        <col id="sixth">
                        <col id="seventh">
                        <col id="eightth">
                        <col id="ninth">
                    </colgroup>

                    <thead>
                    <tr>
                        <th class="text-center">TYPE</th>
                        <th class="text-center">DATE</th>
                        <th class="text-center">CUSTOMER</th>
                        <th class="text-center">REFERENCE</th>
                        <th class="text-center">DETAILS</th>
                        <th class="text-center">NET</th>
                        <th class="text-center">VAT</th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>INV</td>
                        <td class="text-center">15/6/2016</td>
                        <td>ABC LTD.</td>
                        <td class="text-center">0001</td>
                        <td>SALES</td>
                        <td class="text-right">100</td>
                        <td class="text-right">20</td>
                        <td class="text-right">120</td>
                        <td class="">

                            <div class="css_table">
                                <div class="css_table_row">
                                    <div class="css_table_cell">
                                        <button data-toggle="modal" class="btn btn-primary btn-small edit_btn">EDIT
                                        </button>
                                    </div>
                                    <div class="css_table_cell">
                                        <ul class="dropdown_parent">
                                            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                                    data-toggle="dropdown">unpaid<span
                                                            class="glyphicon glyphicon-arrow-down"></span> </a>

                                                <ul class="dropdown-menu">
                                                    <li>paid</li>
                                                    <li>unpaid</li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <input type="text" class="custom_hidden" id="paid_dropdown"
                                               name="paid_dropdown">
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>CRD</td>
                        <td class="text-center">20/6/2016</td>
                        <td>XYZ LTD.</td>
                        <td class="text-center">0002</td>
                        <td>SALES</td>
                        <td class="text-right">-50</td>
                        <td class="text-right">-10</td>
                        <td class="text-right">-60</td>
                        <td>
                            <div class="css_table">
                                <div class="css_table_row">
                                    <div class="css_table_cell">
                                        <button data-toggle="modal" class="btn btn-primary btn-small edit_btn">EDIT
                                        </button>
                                    </div>
                                    <div class="css_table_cell">
                                        <ul class="dropdown_parent">
                                            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                                    data-toggle="dropdown">unpaid<span
                                                            class="glyphicon glyphicon-arrow-down"></span> </a>

                                                <ul class="dropdown-menu">
                                                    <li>paid</li>
                                                    <li>unpaid</li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <input type="text" class="custom_hidden" id="paid_dropdown"
                                               name="paid_dropdown">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="created">
                        <td>INV &nbsp; <a href="invoice.php" class="fa fa-file-o"></a></td>
                        <td class="text-center">20/6/2016</td>
                        <td>EFG LTD.</td>
                        <td class="text-center">0003</td>
                        <td>SALES</td>
                        <td class="text-right">200</td>
                        <td class="text-right">40</td>
                        <td class="text-right">240</td>
                        <td>
                            <div class="css_table">
                                <div class="css_table_row">
                                    <div class="css_table_cell">
                                        <a href="invoice.php" class="btn btn-primary btn-small ">EDIT</a>
                                    </div>
                                    <div class="css_table_cell">
                                        <ul class="dropdown_parent">
                                            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                                    data-toggle="dropdown">unpaid<span
                                                            class="glyphicon glyphicon-arrow-down"></span> </a>

                                                <ul class="dropdown-menu">
                                                    <li>paid</li>
                                                    <li>unpaid</li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <input type="text" class="custom_hidden" id="paid_dropdown"
                                               name="paid_dropdown">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>INV</td>
                        <td class="text-center">15/6/2016</td>
                        <td>ABC LTD.</td>
                        <td class="text-center">0001</td>
                        <td>SALES</td>
                        <td class="text-right">100</td>
                        <td class="text-right">20</td>
                        <td class="text-right">120</td>
                        <td>
                            <div class="css_table">
                                <div class="css_table_row">
                                    <div class="css_table_cell">
                                        <button data-toggle="modal" class="btn btn-primary btn-small edit_btn">EDIT
                                        </button>
                                    </div>
                                    <div class="css_table_cell">
                                        <ul class="dropdown_parent">
                                            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                                    data-toggle="dropdown">unpaid<span
                                                            class="glyphicon glyphicon-arrow-down"></span> </a>

                                                <ul class="dropdown-menu">
                                                    <li>paid</li>
                                                    <li>unpaid</li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <input type="text" class="custom_hidden" id="paid_dropdown"
                                               name="paid_dropdown">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>INV</td>
                        <td class="text-center">15/6/2016</td>
                        <td>ABC LTD.</td>
                        <td class="text-center">0001</td>
                        <td>SALES</td>
                        <td class="text-right">100</td>
                        <td class="text-right">20</td>
                        <td class="text-right">120</td>
                        <td>
                            <div class="css_table">
                                <div class="css_table_row">
                                    <div class="css_table_cell">
                                        <button data-toggle="modal" class="btn btn-primary btn-small edit_btn">EDIT
                                        </button>
                                    </div>
                                    <div class="css_table_cell">
                                        <ul class="dropdown_parent">
                                            <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                                    data-toggle="dropdown">unpaid<span
                                                            class="glyphicon glyphicon-arrow-down"></span> </a>

                                                <ul class="dropdown-menu">
                                                    <li>paid</li>
                                                    <li>unpaid</li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <input type="text" class="custom_hidden" id="paid_dropdown"
                                               name="paid_dropdown">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</main>


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
                                <label for="edit_type">TYPE</label>
                            </div>
                            <div class="col-xs-7">
                                <ul class="dropdown_parent">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                            data-toggle="dropdown"><span
                                                    class="glyphicon glyphicon-arrow-down"></span> </a>

                                        <ul class="dropdown-menu">
                                            <li>inv</li>
                                            <li>crd</li>
                                        </ul>
                                    </li>
                                </ul>

                                <input type="text" class="custom_hidden" id="edit_type" name="edit_type">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_date">DATE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control date_input" name="edit_date"
                                       placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_customer">CUSTOMER</label>
                            </div>
                            <div class="col-xs-7">

                                <ul class="dropdown_parent">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                            data-toggle="dropdown"><span
                                                    class="glyphicon glyphicon-arrow-down"></span> </a>

                                        <ul class="dropdown-menu">
                                            <li>customer 1</li>
                                            <li>customer 2</li>
                                            <li>customer 3</li>
                                        </ul>
                                    </li>
                                </ul>

                                <input type="text" class="custom_hidden" id="edit_customer" name="edit_customer">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_ref">REFERENCE</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" disabled class="form-control" id="edit_ref" name="edit_ref">
                            </div>
                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_details">DETAILS</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_details" name="edit_details">
                            </div>

                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_net">NET</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_net" name="edit_net">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="edit_vat">VAT</label>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" class="form-control" id="edit_vat" name="edit_vat">
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


                    <div class="form-group modal_buttons text-right">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <button data-toggle="modal" class="btn btn-danger delete_btn">DELETE</button>
                        <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--edit modal ends here
========================================-->


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


                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="customer">CUSTOMER</label>
                            </div>
                            <div class="col-xs-7">

                                <ul class="dropdown_parent">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                            data-toggle="dropdown"><span
                                                    class="glyphicon glyphicon-arrow-down"></span> </a>

                                        <ul class="dropdown-menu">
                                            <li>customer 1</li>
                                            <li>customer 2</li>
                                            <li>customer 3</li>
                                        </ul>
                                    </li>
                                </ul>

                                <input type="text" class="custom_hidden" id="customer" name="customer">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="status">STATUS</label>
                            </div>
                            <div class="col-xs-7">
                                <ul class="dropdown_parent">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                            data-toggle="dropdown"><span
                                                    class="glyphicon glyphicon-arrow-down"></span> </a>

                                        <ul class="dropdown-menu">
                                            <li>Status 1</li>
                                            <li>Status 2</li>
                                            <li>Status 3</li>
                                        </ul>
                                    </li>
                                </ul>


                                <input type="text" class="custom_hidden" id="status" name="status">
                            </div>

                        </div>
                    </div>


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


<!--create modal starts here
========================================-->

<div class="modal fade" id="create_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">CREATE</h3>
            </div>
            <div class="modal-body clearfix">
                <a href="invoice.php" class="btn btn-primary inv">INVOICE</a>
                <a href="credit-note.php" class="btn btn-primary">CREDIT NOTE</a>
            </div>


        </div>
    </div>
</div>

<!--create modal ends here
========================================-->


<!--enter modal starts here
========================================-->

<div class="modal fade" id="enter_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h3>ENTER</h3>
            </div>

            <div class="modal-body clearfix">


                <form action="">

                    <div class="table-responsive">
                        <table class="table table-bordered">


                            <colgroup>
                                <col id="first">
                                <col id="second">
                                <col id="third">
                                <col id="fourth">
                                <col id="fifth">
                                <col id="sixth">
                                <col id="seventh">
                                <col id="eightth">
                            </colgroup>

                            <thead>
                            <tr>
                                <th>TYPE</th>
                                <th>DATE</th>
                                <th>CUSTOMER</th>
                                <th>REF</th>
                                <th>DETAILS</th>
                                <th>NET</th>
                                <th>VAT</th>
                                <th>TOTAL</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td class="type_value">
                                    <ul class="dropdown_parent">
                                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                                        class="glyphicon glyphicon-arrow-down"></span> </a>

                                            <ul class="dropdown-menu">
                                                <li>Bank 1</li>
                                                <li>Bank 2</li>
                                                <li>Bank 3</li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <input type="text" class="form-control custom_hidden" id="type_dropdown"
                                           name="type_dropdown">
                                </td>


                                <td class="date_value">
                                    <input type="text" class="form-control date_input" name="form_date"
                                           placeholder="dd/mm/yyyy">
                                </td>


                                <td class="customer_value">
                                    <ul class="dropdown_parent">
                                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                                        class="glyphicon glyphicon-arrow-down"></span> </a>

                                            <ul class="dropdown-menu">
                                                <li>Customer 1</li>
                                                <li>Customer 2</li>
                                                <li>Customer 3</li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <input type="text" class="form-control custom_hidden" id="customer_dropdown"
                                           name="customer_dropdown">
                                </td>


                                <td class="ref_value">
                                    0001
                                </td>


                                <td class="details_value">
                                    <input type="text" class="form-control" name="details" id="details">
                                </td>


                                <td class="net_value">
                                    <input type="number" class="form-control" id="net" name="net">
                                </td>


                                <td class="vat_value">
                                    <input type="number" class="form-control" id="vat" name="vat">
                                </td>


                                <td class="total_value">
                                    <input type="number" class="form-control" id="total" name="total">
                                </td>


                            </tr>
                            </tbody>

                        </table>
                    </div>

                    <div class="row">
                        <button class="btn btn-primary btn_round">+</button>
                    </div>
                    <div class="btn_container text-right">
                        <button type="submit" class="btn btn-primary">ADD</button>
                        <button class="btn btn-primary" data-dismiss="modal">CLOSE</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>

<!--enter modal ends here
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