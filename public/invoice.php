<!DOCTYPE html>

<html lang="en">
	<head>
       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	   
       <link rel="stylesheet" href="css/normalize.css" type="text/css">
       <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
       <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/jquery-ui.structure.min.css" type="text/css">
        <link rel="stylesheet" href="css/jquery-ui.theme.min.css" type="text/css">
        <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
       <link rel="stylesheet" href="css/invoice.css" type="text/css">
        <!--Scripts to support Internet Explorer below version 9-->
        
        <!--[if lt IE 9]>
            <script type="text/javascript" src="js/html5shiv.min.js"></script>
            <script type="text/javascript" src="js/respond.min.js"></script>
        <![end if]-->
        <noscript>
            <meta http-equiv="refresh" content="0; url=no_js.html">
        </noscript>        
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <script>
            
            $(function(){
               
                
                $('.date_input').datepicker({
                    dateFormat: 'dd/mm/yy'
                });
                
                
                var tr =    '<tr>'+
                        '<td class="description_value">'+
                            '<input type="text" class="form-control" id="description" name="description">'+
                        '</td>'+

                        '<td class="quantity_value">'+
                            '<input type="number" class="form-control" id="quantity" name="quantity">'+
                        '</td>'+

                        '<td class="net_value">'+
                            '<input type="number" class="form-control" id="net" name="net">'+
                        '</td>'+

                        '<td class="vat_value">'+
                            '<input type="number" class="form-control" id="vat" name="vat">'+
                        '</td>'+

                        '<td class="total_value">'+
                            '<input type="number" class="form-control" id="total" name="total">'+
                        '</td>'+

                    '</tr>';
                
                $('.btn_round').on("click" , function(evt){
                    evt.preventDefault();
                    $('.product_table').append(tr);
                });
                
            });
            
        </script>
        
        
	</head>
    <body>
        <div class="container-fluid">
           
            <div class="row">
                <div class="col-xs-12 col-md-6 ">
                    <img src="images/logo.svg" alt="" class="img-responsive logo">
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="col-xs-12 col-md-7 col-md-offset-5">
                        <h3>
                            ACCOUNT SIMPLE LTD <br>
                            ITS A DUMMY ADDRESS <br>
                            WITH STREET <br>
                            AND CITY <br>
                            AND COUNTRY
                        </h3>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <h1 class="col-xs-12  h1 text-center">
                    INVOICE
                </h1>
            </div>
            <form action="" class="form-horizontal">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                   <div class="col-xs-12 col-sm-4">
                        <label for="date" class="h3">DATE</label>
                   </div>
                   <div class="col-xs-12 col-sm-8">
                       <input type="text" class="form-control h3 date_input" id="date" placeholder="dd/mm/yyyy">
                   </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="col-xs-12 col-sm-5">
                        <label for="credit-num" class="h3">
                            INVOICE NUMBER
                        </label>
                    </div>
                    <div class="col-xs-12 col-sm-7">
                        <input type="text" class="form-control h3" id="credit-num">
                    </div>
                </div>
            </div>
            
                <div class="col-xs-12 col-sm-6">
                   <div class="col-xs-12 col-sm-4">
                        <label for="cus" class="h3">CUSTOMER</label>
                   </div>
                   <div class="col-xs-12 col-sm-8">
                        <input type="text" class="form-control h3" id="cus">
                   </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="col-xs-12 col-sm-5">
                        <label for="cus-ref" class="h3">
                            CUSTOMER REFERENCE
                        </label>
                    </div>
                    <div class="col-xs-12 col-sm-7">
                        <input type="text" class="form-control h3" id="cus-ref">
                    </div>
                </div>
                
                
                <div class="col-xs-12 col-sm-6">
                    <div class="col-xs-12 col-sm-4">
                        <label for="" class="h3">
                            ADDRESS
                        </label>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <textarea name="" id="" class="form-control"></textarea>
                    </div>
                </div>
                
                
                <div class="col-xs-12 col-sm-6">
                    <div class="col-xs-12 col-sm-5">
                        <label for="cus-ref" class="h3">
                            CREDIT TERMS
                        </label>
                    </div>
                    <div class="col-xs-12 col-sm-7">
                        <textarea name="" id="" class="form-control"></textarea>
                    </div>
                </div>
                
            </form>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg">
                        COPY PREVIOUS INVOICE?
                    </button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 h1 text-center">
                    PRODUCTS/SERVICES SOLD
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered product_table">
                            <thead>
                                <tr>
                                    <th class="text-center">DESCRIPTION</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th class="text-center">NET</th>
                                    <th class="text-center">VAT</th>
                                    <th class="text-center">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
            <div class="row text-center">
                    <button class="btn btn-primary btn_round">+</button>
            </div>
            
<!--            table end-->
           <div class="row">
               <div class="col-xs-12 col-md-4 col-md-offset-8">
                       <table class="table-two">
                           <tbody>
                               <tr>
                                   <td>TOTAL NET AMOUNT</td>
                                   <td class="text-right">
                                       <span>&pound; &nbsp;&nbsp;&nbsp;6,192.00</span>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td>TOTAL VAT AMOUNT</td>
                                   <td class="text-right">
                                       <span>&pound; &nbsp;&nbsp;&nbsp;0.00</span>
                                   </td>
                               </tr>
                               
                               <tr>
                                   <td>INVOICE TOTAL</td>
                                   <td class="text-right">
                                       <span>&pound; &nbsp;&nbsp;&nbsp;6,192.00</span>
                                   </td>
                               </tr>
                           </tbody>
                       </table>
               </div>
           </div>
           <div class="row">
              <form action="" class="form-horizontal">
               <div class="col-xs-12">
                   <label for="" class="h3">OPTIONAL TEXT</label>
               </div>
               <div class="col-xs-12">
                   <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
               </div>
               </form>
               <div class="col-xs-12 tel">
                   <div class="col-xs-12 col-sm-6">
                       <h4>TEL:0300-78601</h4>
                   </div>
                   <div class="col-xs-12 col-sm-6">
                       <h4>EMAIL:example @example.com</h4>
                   </div>
               </div>
           </div>
           <div class="row bank">
               <div class="col-xs-12">
                   <div class="form-group">
                       <div class="col-xs-6">
                           <span class="h4">
                               PRINT BANK DETAILS ON INVOICE? 
                           </span>
                       </div>

                       <div class="col-xs-6">
                           <span>
                               <input type="checkbox" class="check">
                           </span>
                       </div>
                   </div>
               </div>
               
               
               <div class="col-xs-12">
                 <div class="form-group">
                  <div class="col-xs-6">
                   <span class="h4">
                       PRINT CREDIT TERMS ON INVOICE? 
                   </span>
                   </div>
                   
                   <div class="col-xs-6">
                   <span>
                       <input type="checkbox" class="check">
                   </span>
                   </div>
               </div>
               
               </div>
               
               
               
               <div class="col-xs-12">
                   <div class="form-group">
                       <div class="col-xs-6">
                           <span class="h4">
                               PRINT ON LETTER HEAD? 
                           </span>
                       </div>

                       <div class="col-xs-6">
                           <span>
                               <input type="checkbox" class="check">
                           </span>
                       </div>
                   </div>
               
               
           </div>
           <div class="row bttn">
               <div class="col-xs-12">
                   <button class="btn btn-primary">SAVE</button>
                   <button class="btn btn-primary">PREVIEW</button>
                   <button class="btn btn-primary">PRINT</button>
                   <button class="btn btn-primary">SAVE AS PDF</button>
                   <button class="btn btn-primary">EMAIL</button>
               </div>
           </div>
        </div>
    </body>