<?php
require_once "../vendor/autoload.php";
LayoutHelper::head();
LayoutHelper::css('css/dashboard.css');
LayoutHelper::js('js/dashboard.js');
LayoutHelper::endHead();

LayoutHelper::body();
LayoutHelper::header();
LayoutHelper::navigation();

?>
        <!--website header ends here
        ==============================-->
        <div class="hero container-fluid">
        <div class="row text-center">
            <h1>DASHBOARD</h1>
            <p class="small_date hidden-sm hidden-md hidden-lg">Monday, 20th<br>September 2016</p>
            </div>
        </div>
        
        <!--website main content starts here
        ==============================-->
        <main class="container">
            <div class="row shortcuts">
              
               <div class="custom_container clearfix hidden-xs">
                   
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                       
                        <a href="invoice.php" class="text-center special"><div><i class="fa fa-file-text-o">    </i></div>NEW INVOICE</a>
                    </div>
                
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                        <a href="#new_expense_modal" data-toggle="modal" class="text-center special"><div><i class="fa fa-calculator"></i></div>NEW EXPENSE</a>
                    </div>
                
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                        <a href="#new_payment_modal" data-toggle="modal" class="text-center special"><div><i class="fa fa-credit-card-alt"></i></div>NEW PAYMENT</a>
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                        <a href="#new_receipt_modal" data-toggle="modal" class="text-center special"><div><i class="fa fa-university">    </i></div>NEW RECEIPT</a>
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                        <a href="#payroll_run_modal" data-toggle="modal" class="text-center special"><div><i class="fa fa-group"></i>
                        </div>PAYROLL RUN</a>
                    </div>
                
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                       <div class="date_container">
                        <p class="date">Monday, 20th<br>September 2016</p>
                        </div>
                    </div>
        
                
                </div>
                
                <ul class="nav nav-pills nav-justified hidden-sm hidden-md hidden-lg">
                    <li><a href="invoice.php"><span class="fa fa-file-text-o"></span>&nbsp;&nbsp;NEW INVOICE</a></li>
                    <li><a href="#new_expense_modal" data-toggle="modal"> <span class="fa fa-calculator"></span>&nbsp;&nbsp;NEW EXPENSE</a></li>
                    <li><a href="#new_payment_modal" data-toggle="modal"><span class="fa fa-credit-card-alt"></span>&nbsp;&nbsp;NEW PAYMENT</a></li>
                    <li><a href="#new_receipt_modal" data-toggle="modal"><span class="fa fa-university"></span>&nbsp;&nbsp;NEW RECEIPT</a></li>
                    <li><a href="#payroll_run_modal" data-toggle="modal"><span class="fa fa-usd"></span>&nbsp;&nbsp;PAYROLL RUN</a></li>
                </ul>
                
            </div>
            
            <div class="row text-center highlights">
                <p>FINANCIAL HIGHLIGHTS</p>
            </div>
            
        <!--Sales Table Starts here
        ========================-->

             <div class="row">
                 <div class="col-xs-12 col-sm-6">
                    <div class="table-responsive">
                        <table class="table">
                            <caption class="text-center"><span class="fa fa-database"></span>&nbsp;&nbsp;&nbsp;Sales</caption>
                             <thead>
                                 <tr>
                                     <th class="text-left">Period</th>
                                     <th class="text-right">Amount</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td class="text-left">This Week</td>
                                     <td class="text-right">&pound;5,000</td>
                                 </tr>

                                 <tr>
                                     <td class="text-left">This Month</td>
                                     <td class="text-right">&pound;20,000</td>    
                                 </tr>

                                 <tr>
                                     <td class="text-left">This Year</td>
                                     <td class="text-right">&pound;100,000</td>
                                 </tr>
                             </tbody>
                        </table>
                     </div>
                 </div>
                 
        <!--Expenses Table starst here
            ========================-->
            
                 <div class="col-xs-12 col-sm-6">
                     <div class="table-responsive">
                         <table class="table">
                             <caption class="text-center"><span class="fa fa-bar-chart"></span>&nbsp;Expenses</caption>
                             <thead>
                                 <tr>
                                     <th class="text-left">Period</th>
                                     <th class="text-right">Amount</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td class="text-left">This Week</td>
                                     <td class="text-right">&pound;5,000</td>
                                 </tr>

                                 <tr>
                                     <td class="text-left">This Month</td>
                                     <td class="text-right">&pound;20,000</td>    
                                 </tr>

                                 <tr>
                                     <td class="text-left">This Year</td>
                                     <td class="text-right">&pound;100,000</td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
                       
                       
            <!--bank table strats here
            =========================-->
                       
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="table-responsive">
                        <table class="table">
                            <caption class="text-center"><span class="fa fa-university"></span>&nbsp;&nbsp;&nbsp;Bank</caption>
                            <thead>
                                <tr>
                                    <th class="text-left">Period</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left">This Week</td>
                                    <td class="text-right">&pound;5,000</td>
                                </tr>

                                <tr>
                                    <td class="text-left">This Month</td>
                                    <td class="text-right">&pound;20,000</td>    
                                </tr>

                                <tr>
                                    <td class="text-left">This Year</td>
                                    <td class="text-right">&pound;100,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--Profit & Loss Table starst here
                    =============================-->

                <div class="col-xs-12 col-sm-6">
                    <div class="table-responsive">
                        <table class="table">
                            <caption class="text-center"><span class="fa fa-line-chart"></span>&nbsp;&nbsp;&nbsp;Profit &amp; Loss</caption>
                            <thead>
                                <tr>
                                    <th class="text-left">Period</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left">This Week</td>
                                    <td class="text-right">&pound;5,000</td>
                                </tr>

                                <tr>
                                    <td class="text-left">This Month</td>
                                    <td class="text-right">&pound;20,000</td>    
                                </tr>

                                <tr>
                                    <td class="text-left">This Year</td>
                                    <td class="text-right">&pound;100,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                        
        </main>
        <!--website main content ends here
        ==============================-->
        
        
        
        <!--new expense modal starts here
        ========================================-->

        <div class="modal fade" id="new_expense_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h3>NEW EXPENSE</h3>
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
                                        <col id="ninth">
                                    </colgroup>

                                    <thead>
                                        <tr>
                                            <th>TYPE</th>
                                            <th>BANK</th>
                                            <th>DATE</th>
                                            <th>REF</th>
                                            <th>PAID TO</th>
                                            <th>ANALYSIS</th>
                                            <th>NET</th>
                                            <th>VAT</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="type_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>Type 1</li>
                                                            <li>Type 2</li>
                                                            <li>Type 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="type_dropdown" name="type_dropdown">
                                            </td>



                                            <td class="bank_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>Bank 1</li>
                                                            <li>Bank 2</li>
                                                            <li>Bank 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="bank_dropdown" name="bank_dropdown">
                                            </td>



                                            <td class="date_value">

                                                <input type="text" class="form-control date_input"  name="enter_date" placeholder="dd/mm/yyyy">
                                            </td>



                                            <td class="ref_value">
                                                0001
                                            </td>



                                            <td class="paid_to_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>PaidTo 1</li>
                                                            <li>PaidTo 2</li>
                                                            <li>PaidTo 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="paid_to_dropdown" name="paid_to_dropdown">
                                            </td>



                                            <td class="analysis_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>Analysis 1</li>
                                                            <li>Analysis 2</li>
                                                            <li>Analysis 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="analysis_dropdown" name="analysis_dropdown">
                                            </td>



                                            <td class="net_value">
                                                <input type="text" class="form-control" id="net" name="net">
                                            </td>

                                            <td class="vat_value">
                                                <input type="text" class="form-control" id="vat" name="vat">
                                            </td>



                                            <td class="total_value">
                                                <input type="text" class="form-control" id="total" name="total">
                                            </td>



                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                            <div class="row">
                                <button class="btn btn-primary btn_round expense_add">+</button>
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

        <!--new expense modal ends here
        ========================================-->
        
        
        
        
        
        
        
        
        
        
        
        
        <!--new payment modal starts here
        ========================================-->

        <div class="modal fade" id="new_payment_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h3>NEW PAYMENT</h3>
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
                                        <col id="ninth">
                                        <col id="tenth">
                                    </colgroup>

                                    <thead>
                                        <tr>
                                            <th>TYPE</th>
                                            <th>BANK FROM</th>
                                            <th>DATE</th>
                                            <th>REF</th>
                                            <th>TO/FROM</th>
                                            <th>DETAILS</th>
                                            <th>ANALYSIS</th>
                                            <th>NET</th>
                                            <th>VAT</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="type_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>Type 1</li>
                                                            <li>Type 2</li>
                                                            <li>Type 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="type_dropdown" name="type_dropdown">
                                            </td>



                                            <td class="bank_from_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>Bank 1</li>
                                                            <li>Bank 2</li>
                                                            <li>Bank 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="bank_from_dropdown" name="bank_from_dropdown">
                                            </td>



                                            <td class="date_value">

                                                <input type="text" class="form-control date_input"  name="enter_date" placeholder="dd/mm/yyyy">
                                            </td>



                                            <td class="ref_value">
                                                0001
                                            </td>



                                            <td class="to_from_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>PaidTo 1</li>
                                                            <li>PaidTo 2</li>
                                                            <li>PaidTo 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="to_from_dropdown" name="to_from_dropdown">
                                            </td>


                                            <td class="details_value">
                                                <input type="text" class="form-control" id="details" name="details">
                                            </td>


                                            <td class="analysis_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>Analysis 1</li>
                                                            <li>Analysis 2</li>
                                                            <li>Analysis 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="analysis_dropdown" name="analysis_dropdown">
                                            </td>



                                            <td class="net_value">
                                                <input type="text" class="form-control" id="net" name="net">
                                            </td>

                                            <td class="vat_value">
                                                <input type="text" class="form-control" id="vat" name="vat">
                                            </td>



                                            <td class="total_value">
                                                <input type="text" class="form-control" id="total" name="total">
                                            </td>



                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                            <div class="row">
                                <button class="btn btn-primary btn_round payment_add">+</button>
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

        <!--new payment modal ends here
        ========================================-->
        
        
        
        
        
        
        
        
        <!--new receipt modal starts here
        ========================================-->

        <div class="modal fade" id="new_receipt_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h3>NEW RECEIPT</h3>
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
                                        <col id="ninth">
                                        <col id="tenth">
                                    </colgroup>

                                    <thead>
                                        <tr>
                                            <th>TYPE</th>
                                            <th>BANK FROM</th>
                                            <th>DATE</th>
                                            <th>REF</th>
                                            <th>TO/FROM</th>
                                            <th>DETAILS</th>
                                            <th>ANALYSIS</th>
                                            <th>NET</th>
                                            <th>VAT</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="type_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>Type 1</li>
                                                            <li>Type 2</li>
                                                            <li>Type 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="type_dropdown" name="type_dropdown">
                                            </td>



                                            <td class="bank_from_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>Bank 1</li>
                                                            <li>Bank 2</li>
                                                            <li>Bank 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="bank_from_dropdown" name="bank_from_dropdown">
                                            </td>



                                            <td class="date_value">

                                                <input type="text" class="form-control date_input"  name="enter_date" placeholder="dd/mm/yyyy">
                                            </td>



                                            <td class="ref_value">
                                                0001
                                            </td>



                                            <td class="to_from_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>PaidTo 1</li>
                                                            <li>PaidTo 2</li>
                                                            <li>PaidTo 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="to_from_dropdown" name="to_from_dropdown">
                                            </td>


                                            <td class="details_value">
                                                <input type="text" class="form-control" id="details" name="details">
                                            </td>


                                            <td class="analysis_value">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>Analysis 1</li>
                                                            <li>Analysis 2</li>
                                                            <li>Analysis 3</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <input type="text" class="form-control custom_hidden" id="analysis_dropdown" name="analysis_dropdown">
                                            </td>



                                            <td class="net_value">
                                                <input type="text" class="form-control" id="net" name="net">
                                            </td>

                                            <td class="vat_value">
                                                <input type="text" class="form-control" id="vat" name="vat">
                                            </td>



                                            <td class="total_value">
                                                <input type="text" class="form-control" id="total" name="total">
                                            </td>



                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                            <div class="row">
                                <button class="btn btn-primary btn_round receipt_add">+</button>
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

        <!--new receipt modal ends here
        ========================================-->
        
        
        
        
        
        
        
        
        <!--NEW PAYROLL + MODAL BOX STARTS HERE=======
        =========================================-->

        <div class="modal fade" id="payroll_run_modal">
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
                                        <input type="text" class="form-control date_input"  name="payment_date" placeholder="dd/mm/yyyy">
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
                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

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


                            <div class="clearfix"></div>
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
                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

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