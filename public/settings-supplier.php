<?php
require_once "../vendor/autoload.php";
Helper::head();
Helper::css('css/setting-supplier.css');
Helper::js('js/settings/settings-supplier.js');
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
            <h1>SETTINGS > <span class="h3">SUPPLIERS</span></h1>
        </div>
        </div>
        
        <!--website main content starts here
        ==============================-->
        <main class="container">
            <div class="row">
                <div class="col-xs-12 buton">
                    <button data-toggle="modal" data-target="#supplier_new_modal" class="btn btn-primary"><b>NEW +</b></button>
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
                                <tr>
                                    <td>SANCHEZ CO</td>
                                    <td class="text-center">001</td>
                                    <td>GARY</td>
                                    <td>0900-78601</td>
                                    <td class="text-center">
                                        <button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button>
                                        <button data-toggle="modal" class="btn btn-primary delete_btn">DELETE</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ZANG CO</td>
                                    <td class="text-center">002</td>
                                    <td>JAMES</td>
                                    <td>0900-78601</td>
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
        
        
        <!--supplier new modal starts here
        ========================================-->

        <div class="modal fade" id="supplier_new_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h3>NEW SUPPLIER</h3>
                    </div>

                    <div class="modal-body clearfix">
                        <form action="">

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="account_ref">ACCOUNT REF.</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="account_ref" name="account_ref">
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="company_name">COMPANY NAME</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="company_name" name="company_name">
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
                            <!--second row ends here
                            ===============================-->
                            
                            <div class="clearfix"></div>
                            <h2 class="modal_heading_header">ADDRESS &amp; CONTACT</h2>


                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="address_line1">LINE 1</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="address_line1" name="address_line1">
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="address_line2">LINE 2</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="address_line2" name="address_line2">
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
                                        <input type="text" class="form-control" id="postcode" name="postcode">
                                    </div>

                                </div>
                            </div>

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
                                        <label for="email">EMAIL</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <h2 class="modal_heading_header">BANK DETAILS</h2>
                            

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

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="sort_code">SORT CODE</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="number" class="form-control" id="sort_code" name="sort_code">
                                    </div>
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="account_no">ACCOUNT NO.</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="account_no" name="account_no">
                                    </div>

                                </div>
                            </div>

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



                            





                            <div class="form-group modal_buttons text-right">
                                <button type="submit" class="btn btn-primary">ADD</button>
                                <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--supplier new modal ends here
        ========================================-->
        
        
        
        
        
        
        <!--supplier edit modal starts here
        ========================================-->

        <div class="modal fade" id="supplier_edit_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h3>EDIT SUPPLIER</h3>
                    </div>

                    <div class="modal-body clearfix">
                        <form action="">

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="account_ref">ACCOUNT REF.</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="account_ref" name="account_ref">
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="company_name">COMPANY NAME</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="company_name" name="company_name">
                                    </div>
                                </div>
                            </div>
                         
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
                         
                            <div class="clearfix"></div>
                            <h2 class="modal_heading_header">ADDRESS &amp; CONTACT</h2>


                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="address_line1">LINE 1</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="address_line1" name="address_line1">
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="address_line2">LINE 2</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="address_line2" name="address_line2">
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
                                        <input type="text" class="form-control" id="postcode" name="postcode">
                                    </div>

                                </div>
                            </div>

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
                                        <label for="email">EMAIL</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <h2 class="modal_heading_header">BANK DETAILS</h2>


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

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="sort_code">SORT CODE</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="number" class="form-control" id="sort_code" name="sort_code">
                                    </div>
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="account_no">ACCOUNT NO.</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="account_no" name="account_no">
                                    </div>

                                </div>
                            </div>

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









                            <div class="form-group modal_buttons text-right">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--supplier edit modal ends here
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
                        <p class="lead text-center"><b>ARE YOU SURE YOU WANT TO DELETE THIS SUPPLIER ?</b></p>


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
            