<?php
require_once "../vendor/autoload.php";
LayoutHelper::head();
LayoutHelper::css('css/bank.css');
LayoutHelper::js('js/bank.js');
LayoutHelper::endHead();


LayoutHelper::body();
LayoutHelper::header();
LayoutHelper::navigation();

?>
        <!--website header ends here
        ==============================-->
        <div class="hero container-fluid">
        <div class="row text-center">
            <h1>BANK</h1>
        </div>
        </div>
        
        <!--website main content starts here
        ==============================-->
        <main class="container buttons">
          <div class="row btn_container">
             <div class="col-xs-12">
                <div class="col-xs-12 col-sm-3 col-md-2 text-center">
                    <button data-toggle="modal" data-target="#reports_modal" class="btn btn-primary"><b>REPORTS</b></button>
                 </div>
                <div class="col-xs-12 col-sm-3 col-md-2 text-center">
                    <button data-toggle="modal" data-target="#enter_modal" class="btn btn-primary"><b>ENTER <span>+</span></b></button>
                </div>
             </div>
          </div>
           <div class="row text-center highlights">
                <p>BANK &nbsp;TRANSACTIONS</p>
            </div>
            <div class="row select_bank">
                <div class="col-xs-12 col-sm-4">
                   
                   
                   <div class="col-xs-6">
                        <label class="special_label h3">SELECT BANK</label>
                   </div>
                   <div class="col-xs-6">
                       
                       <ul class="dropdown_parent" id="select_bank_dropdown">
                           <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>

                               <ul class="dropdown-menu">
                                   <li>Bank 1</li>
                                   <li>Bank 2</li>
                                   <li>Bank 3</li>
                               </ul>
                           </li>
                       </ul>
                       <input type="text" class="form-control custom_hidden" id="select_bank" name="select_bank">
                       
                   </div>
                </div>
                
                
                    
<!--                </div>-->
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4">
                   <div class="form-group">
                    <div class="col-xs-6">
                        
                        <label class="top_offset">START BALANCE</label>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" disabled>
                    </div>
                    </div>
                    
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="col-xs-6">
                        <label class="top_offset">CURRENT BALANCE</label>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="col-xs-6">
                        <label>RECONCILED BALANCE</label>
                    </div>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">TYPE</th>
                                <th class="text-center">BANK FROM</th>
                                <th class="text-center">DATE</th>
                                <th class="text-center">REF</th>
                                <th class="text-center">TO/FROM</th>
                                <th class="text-center">DETAILS</th>
                                <th class="text-center">ANALYSIS</th>
                                <th class="text-center">NET</th>
                                <th class="text-center">VAT</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CUSTOMER RECEIPT</td>
                                <td>CURRENT ACCOUNT</td>
                                <td>26/06/2016</td>
                                <td class="text-center">001</td>
                                <td>ABC LTD.</td>
                                <td></td>
                                <td disabled></td>
                                <td disabled></td>
                                <td disabled></td>
                                <td class="text-right">120</td>
                                <td class="text-center">
                                    <button class="btn btn-warning">RECONCILE</button>
                                    <button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>SUPPLIER PAYMENT</td>
                                <td>CURRENT ACCOUNT</td>
                                <td>16/06/2016</td>
                                <td class="text-center">002</td>
                                <td>ZZA LTD></td>
                                <td></td>
                                <td disabled></td>
                                <td disabled></td>
                                <td disabled></td>
                                <td class="text-right">-200</td>
                                <td class="text-center">
                                    <button class="btn btn-warning">RECONCILE</button>
                                    <button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>EXPENSE PAYMENT</td>
                                <td>CURRENT ACCOUNT</td>
                                <td>20/06/2016</td>
                                <td class="text-center">003</td>
                                <td>RANDOM</td>
                                <td>MOBILE BILL</td>
                                <td>TELEPHONE</td>
                                <td class="text-right">40</td>
                                <td class="text-right">8</td>
                                <td class="text-right">-48</td>
                                <td class="text-center">
                                    <button class="btn btn-primary">DE-RECONCILE</button>
                                    <button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>    
        </main>
        
        
        
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
                                                    <li>transaction 1</li>
                                                    <li>transaction 2</li>
                                                    <li>transaction 3</li>
                                                </ul>
                                            </li>
                                        </ul>
                                       
                                       
                                        <input type="text" class="form-control custom_hidden" id="analysis" name="analysis">
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

                                        <input type="text" class="form-control date_input" name="date_from" placeholder="dd/mm/yyyy">
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
                                        <label for="supplier">BANK</label>
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

                                        <input type="text" class="form-control custom_hidden" id="bank" name="bank">
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">

                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="status">TO/FROM</label>
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


                                        <input type="text" class="form-control custom_hidden" id="to_from" name="to_from">
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

                                                <input type="text" class="form-control date_input" name="enter_date" placeholder="dd/mm/yyyy">
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
                                        <label for="edit_bank_from">BANK FROM</label>
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

                                        <input type="text" class="custom_hidden" id="edit_bank_from" name="edit_bank_from">
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
                                        <label for="edit_to_from">TO/FROM</label>
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

                                        <input type="text" class="custom_hidden" id="edit_to_from" name="edit_to_from">
                                    </div>

                                </div>
                            </div>
                            
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
                            
                            <div class="clearfix"></div>
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
                            
                            <div class="clearfix"></div>
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