<?php
require_once "../vendor/autoload.php";
Helper::head();
Helper::css('css/setting-analysis.css');
Helper::js('js/settings/settings-analysis.js');
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
            <h1>SETTINGS > <span class="h3">ANALYSIS LIST</span></h1>
        </div>
        </div>
        
        <!--website main content starts here
        ==============================-->
        <main class="container">
            <div class="row">
                <div class="col-xs-12 buton">
                    <button data-toggle="modal" data-target="#new_analysis_modal" class="btn btn-primary"><b>NEW +</b></button>
                </div>
            </div>            

            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">REFERENCE</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">001</td>
                                    <td>ACCOUNTANCY</td>
                                    <td class="text-center">
                                        <button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button>
                                        <button data-toggle="modal" class="btn btn-primary delete_btn">DELETE</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">002</td>
                                    <td>ADVERTISING</td>
                                    <td class="text-center">
                                        <button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button>
                                        <button data-toggle="modal" class="btn btn-primary delete_btn">DELETE</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">003</td>
                                    <td>MOTER EXPENCE</td>
                                    <td class="text-center">
                                        <button data-toggle="modal" class="btn btn-primary edit_btn">EDIT</button>
                                        <button data-toggle="modal" class="btn btn-primary delete_btn">DELETE</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">004</td>
                                    <td>STATIONARY</td>
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
            
               
               
        <!--new modal starts here
========================================-->

        <div class="modal fade" id="new_analysis_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h3>NEW ANALYSIS</h3>
                    </div>

                    <div class="modal-body clearfix">
                        <form action="">

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="reference">REFERANCE</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="name">NAME</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                            </div>
                            <!--first two fields ends here
===============================-->

                            <div class="form-group modal_buttons text-right">
                                <button type="submit" class="btn btn-primary">ADD</button>
                                <button data-dismiss="modal" class="btn btn-primary">CLOSE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--new modal ends here
========================================-->





        <!--edit modal starts here
========================================-->

        <div class="modal fade" id="analysis_edit_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h3>EDIT ANALYSIS</h3>
                    </div>

                    <div class="modal-body clearfix">
                        <form action="">

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="reference">REFERANCE</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="reference" name="reference">
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label for="name">NAME</label>
                                    </div>
                                    <div class="col-xs-7">
                                        <input type="text" class="form-control" id="name" name="name">
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