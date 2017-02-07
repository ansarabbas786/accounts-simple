<?php
use App\Helpers\LayoutHelper;

require_once "../vendor/autoload.php";
LayoutHelper::head();
LayoutHelper::css('css/expense.css');
LayoutHelper::js('js/expense.js');
LayoutHelper::endHead();

LayoutHelper::body();
LayoutHelper::header();
LayoutHelper::navigation();

?>
        <!--website header ends here
        ==============================-->
        <div class="hero container-fluid">
        <div class="row text-center">
            <h1>EXPENSES</h1>
        </div>
        </div>
        
        <!--website main content starts here
        ==============================-->
        <main class="container">
          <div class="row buttons">
             <div class="col-xs-12 btn_container">
                 <div class="col-xs-12 col-sm-3 col-md-2 text-center">
                 
                     <button data-toggle="modal" data-target="#reports_modal" class="btn btn-primary"><b>REPORTS</b></button>
                 </div>
                 
                 <div class="col-xs-12 col-sm-3 col-md-2 text-center">
                     <button data-toggle="modal" data-target="#enter_modal" class="btn btn-primary"><b>ENTER <span>+</span></b></button>
                  
                 </div>
                  
             </div>
          </div>
           <div class="row text-center highlights">
                <p>EXPENSES &amp; SUPPLIER INVOICES</p>
            </div>
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">TYPE</th>
                                <th class="text-center">BANK</th>
                                <th class="text-center">DATE</th>
                                <th class="text-center">REFERENCE</th>
                                <th class="text-center">PAID TO</th>
                                <th class="text-center">ANALYSIS</th>
                                <th class="text-center">NET</th>
                                <th class="text-center">VAT</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>EXPENSE</td>
                                <td>CURRENT ACCOUNT</td>
                                <td>15/06/2016</td>
                                <td class="text-center">001</td>
                                <td>EAST END</td>
                                <td>PURCHASE</td>
                                <td class="text-right">100</td>
                                <td class="text-right">20</td>
                                <td class="text-right">120</td>
                                <td><button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button></td>
                            </tr>
                            
                            
                            <tr>
                                <td>EXPENSE</td>
                                <td>CASH</td>
                                <td>16/06/2016</td>
                                <td class="text-center">002</td>
                                <td>ZAPH LTD</td>
                                <td>MOTOR</td>
                                <td class="text-right">50</td>
                                <td class="text-right">10</td>
                                <td class="text-right">60</td>
                                <td><button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button></td>
                            </tr>
                            
                            <tr>
                                <td>SUPPLIER INVOICE</td>
                                <td>ON CREDIT</td>
                                <td>17/06/2016</td>
                                <td class="text-center">003</td>
                                <td>SANCHEZ CO</td>
                                <td>STATIONARY</td>
                                <td class="text-right">100</td>
                                <td class="text-right">20</td>
                                <td class="text-right">120</td>
                                <td>
                                    <div class="css_table">
                                        <div class="css_table_row">
                                            <div class="css_table_cell">
                                                <button data-toggle="modal" class="btn btn-primary btn-small edit_btn">EDIT</button>
                                            </div>
                                            <div class="css_table_cell">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">unpaid<span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>paid</li>
                                                            <li>unpaid</li>
                                                        </ul>
                                                    </li>
                                                </ul>

                                                <input type="text" class="custom_hidden" id="paid_dropdown" name="paid_dropdown">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            
                             <tr>
                                <td>SUPPLIER CREDIT</td>
                                <td>ON CREDIT</td>
                                <td>18/06/2016</td>
                                <td class="text-center">004</td>
                                <td>ZANG CO</td>
                                <td>POSTAGE</td>
                                <td class="text-right">-20</td>
                                <td class="text-right">-4</td>
                                <td class="text-right">-24</td>
                                <td>
                                    <div class="css_table">
                                        <div class="css_table_row">
                                            <div class="css_table_cell">
                                                <button data-toggle="modal" class="btn btn-primary btn-small edit_btn">EDIT</button>
                                            </div>
                                            <div class="css_table_cell">
                                                <ul class="dropdown_parent">
                                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">unpaid<span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                        <ul class="dropdown-menu">
                                                            <li>paid</li>
                                                            <li>unpaid</li>
                                                        </ul>
                                                    </li>
                                                </ul>

                                                <input type="text" class="custom_hidden" id="paid_dropdown" name="paid_dropdown">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
            
                
                    
            -
           
           
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
                                            <label for="transaction_type">TRANSACTION TYPE</label>
                                        </div>
                                        <div class="col-xs-7">
                                           
                                            <ul class="dropdown_parent">
                                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                    <ul class="dropdown-menu">
                                                        <li>transaction 1</li>
                                                        <li>transaction 2</li>
                                                        <li>transaction 3</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <input type="text" class="form-control custom_hidden" id="transaction_type" name="transaction_type">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="col-xs-5">
                                            <label for="analysis">ANALYSIS</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <ul class="dropdown_parent">
                                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                    <ul class="dropdown-menu">
                                                        <li>analysis 1</li>
                                                        <li>analysis 2</li>
                                                        <li>analysis 3</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <input type="text" class="form-control custom_hidden" id="analysis_dropdown" name="analysis_dropdown">
                                        </div>
                                    </div>
                                </div>
                                        <div class="clearfix"></div>
                                <!--first two fields ends here
                                ===============================-->



                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="col-xs-5">
                                            <label for="date_from">DATE FROM</label>
                                        </div>
                                        <div class="col-xs-7">

                                            <input type="text" class="form-control date_input"  name="date_from" placeholder="dd/mm/yyyy">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">

                                    <div class="form-group">
                                        <div class="col-xs-5">
                                            <label for="date_to">DATE TO</label>
                                        </div>
                                        <div class="col-xs-7">
                                            <input type="text" class="form-control date_input" name="date_to" placeholder="dd/mm/yyyy">
                                        </div>

                                    </div>
                                </div>
                                
                                <!--second row ends here
                                =====================================-->
                                
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="col-xs-5">
                                            <label for="supplier">SUPPLIER</label>
                                        </div>
                                        <div class="col-xs-7">

                                            <ul class="dropdown_parent">
                                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                    <ul class="dropdown-menu">
                                                        <li>transaction 1</li>
                                                        <li>transaction 2</li>
                                                        <li>transaction 3</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                           
                                            <input type="text" class="form-control custom_hidden" id="supplier" name="supplier">
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
                                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                    <ul class="dropdown-menu">
                                                        <li>transaction 1</li>
                                                        <li>transaction 2</li>
                                                        <li>transaction 3</li>
                                                    </ul>
                                                </li>
                                            </ul>
                                           
                                           
                                            <input type="text" class="form-control custom_hidden" id="status" name="status">
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
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
                                                    
                                                    <input type="text" class="form-control date_input" name="enter_date" placeholder="dd/mm/yyyy">
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

<!--                                <div class="row">-->
                                    <button class="btn btn-primary btn_round">+</button>
<!--                                </div>-->
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
           
            
        </main>
        <!--website main content ends here
        ==============================-->
        
        
        
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
                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

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
                                        <label for="edit_bank">BANK</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <ul class="dropdown_parent">
                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                <ul class="dropdown-menu">
                                                    <li>inv</li>
                                                    <li>crd</li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <input type="text" class="custom_hidden" id="edit_bank" name="edit_bank">
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="edit_date">DATE</label>
                                    </div>
                                    <div class="col-xs-7">

                                        <input type="text" class="form-control date_input" name="edit_date" placeholder="dd/mm/yyyy">
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
                                        <label for="edit_paid_to">PAID TO</label>
                                    </div>
                                    <div class="col-xs-7">
                                       
                                        <ul class="dropdown_parent">
                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                <ul class="dropdown-menu">
                                                    <li>inv</li>
                                                    <li>crd</li>
                                                </ul>
                                            </li>
                                        </ul>
                                       
                                        <input type="text" class="custom_hidden" id="edit_paid_to" name="edit_paid_to">
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="edit_analysis">ANALYSIS</label>
                                    </div>
                                    <div class="col-xs-7">
                                       
                                        <ul class="dropdown_parent">
                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                                                <ul class="dropdown-menu">
                                                    <li>inv</li>
                                                    <li>crd</li>
                                                </ul>
                                            </li>
                                        </ul>
                                       
                                        <input type="text" class="custom_hidden" id="edit_analysis" name="edit_analysis">
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


                            <div class="clearfix"></div>
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
                        <p class="lead text-center"><b>ARE YOU SURE YOU WANT TO DELETE THIS RECORD ?</b></p>


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