<!DOCTYPE html>
<html lang="en">
<head>

     <title>Pharmacist</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
     <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}">
     <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('css/login.css')}}">
     <link rel="stylesheet" href="{{ asset('css/pharmacist.CSS')}}">
     <!-- For Table -->
     <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      For Table Style -->
     <style>
     body {
     color: #404E67;
     background: #F5F7FA;
     font-family: 'Open Sans', sans-serif;
     }
     .table-wrapper {
     width: 700px;
     margin: 30px auto;
     background: #fff;
     padding: 20px;	
     box-shadow: 0 1px 1px rgba(0,0,0,.05);
     }
     .table-title {
     padding-bottom: 10px;
     margin: 0 0 10px;
     }
     .table-title h2 {
     margin: 6px 0 0;
     font-size: 22px;
     }
     .table-title .add-new {
     float: right;
     height: 30px;
     font-weight: bold;
     font-size: 12px;
     text-shadow: none;
     min-width: 100px;
     border-radius: 50px;
     line-height: 13px;
     }
     .table-title .add-new i {
     margin-right: 4px;
     }
     table.table {
     table-layout: fixed;
     }
     table.table tr th, table.table tr td {
     border-color: #e9e9e9;
     }
     table.table th i {
     font-size: 13px;
     margin: 0 5px;
     cursor: pointer;
     }
     table.table th:last-child {
     width: 100px;
     }
     table.table td a {
     cursor: pointer;
     display: inline-block;
     margin: 0 5px;
     min-width: 24px;
     }    
     table.table td a.add {
     color: #27C46B;
     }
     table.table td a.edit {
     color: #FFC107;
     }
     table.table td a.delete {
     color: #E34724;
     }
     table.table td i {
     font-size: 19px;
     }
     table.table td a.add i {
     font-size: 24px;
     margin-right: -1px;
     position: relative;
     top: 3px;
     }    
     table.table .form-control {
     height: 32px;
     line-height: 32px;
     box-shadow: none;
     border-radius: 2px;
     }
     table.table .form-control.error {
     border-color: #f50000;
     }
     table.table td .add {
     display: none;
     }
     
     /* for search box */
     #myInput {
     background-repeat: no-repeat;
     background-image: url(../images/searchicon.jpg);
     }
     </style>

</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>

     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="welcome" class="navbar-brand">Hospital <span>.</span> Pharmacy</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('mphome',$c->Pat_id)}}" class="smoothScroll"><font color="red">Home</font></a></li>
                         <li><a href="{{route('issuemedicine',$c->Pat_id)}}" class="smoothScroll">Maintain Medical Stock</a></li>
                         <li><a href="{{route('Ingstock',$c->Pat_id)}}" class="smoothScroll">Issue Medicine</a></li>
                         <li><a href="{{route('medstock',$c->Pat_id)}}" class="smoothScroll">Order Medicine</a></li>
                    </ul>
                     
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="login">Logout</a></li>
                    </ul>
               </div>

          </div>
     </section>

     

     

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="owl-carousel owl-theme">
                         <div class="item item-first">
                         <!--<div class="caption">-->
                         <br><br>
                         <br><br>
                         <br><br>
                                   <div class="container">
                                   
                                   
                                        <div class="col-md-8 col-sm-12">
                                             
                                             
                                             <!--          Table   -->
                                             <div class="container-lg">
                                                  <div class="table-responsive">
                                                       <div class="table-wrapper">
                                                       <div class="col-sm-6"><h2>Medical Stock Table</h2></div>
                                                            <div class="table-title">
                                                            
                                                                 <!--<div class="row">-->
                                                                      <div class="col-sm-3">
                                                                      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Medicine.." title="Type in a name">
                                                                      </div>
                                                                      <div class="col-sm-3">
                                                                      <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                                                                      </div>
                                                                 
                                                            </div>
                                                            <table class="table table-bordered">
                                                                 <thead>
                                                                      <tr>
                                                                      <th>Medicine Name</th>
                                                                      <th>Medicine ID</th>
                                                                      <th>Description</th>
                                                                      <th>MFD</th>
                                                                      <th>EXP</th>
                                                                      <th>Unit Price</th>
                                                                      <th>Stock Qty</th>
                                                                      <th>Actions</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>
                                                                      <tr>
                                                                      <td>Name1</td>
                                                                      <td>A12</td>
                                                                      <td>Description</td>
                                                                      <td>MFD</td>
                                                                      <td>EXP</td>
                                                                      <td>Unit Price</td>
                                                                      <td>Stock Qty</td>
                                                                      <td>
                                                                           <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                                           <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>
                                                                      <tr>
                                                                      <td>Name2</td>
                                                                      <td>A13</td>
                                                                      <td>Description2</td>
                                                                      <td>MFD2</td>
                                                                      <td>EXP2</td>
                                                                      <td>Unit Price2</td>
                                                                      <td>Stock Qty2</td>
                                                                      <td>
                                                                           <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                                           <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>
                                                                      <tr>
                                                                      <td>Name3</td>
                                                                      <td>A13</td>
                                                                      <td>Description3</td>
                                                                      <td>MFD3</td>
                                                                      <td>EXP3</td>
                                                                      <td>Unit Price3</td>
                                                                      <td>Stock Qty3</td>
                                                                      <td>
                                                                           <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                                           <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>      
                                                                 </tbody>
                                                            </table>
                                                       </div>
                                                  </div>
                                             </div>                                
                                             <!--      -->
                                        </div>
                                   
                                   </div>
                         </div>    
                         <!--</div>-->
                    </div>
          </div>
     </section>


     <!-- SCRIPTS -->
     <script src="{{ asset('js/jquery.js')}}"></script>
     <script src="{{ asset('js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
     <script src="{{ asset('js/wow.min.js')}}"></script>
     <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
     <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
     <script src="{{ asset('js/smoothscroll.js')}}"></script>
     <script src="{{ asset('js/custom.js')}}"></script>

     <!-- For Table -->
     <script>
     $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
          var actions = $("table td:last-child").html();
          // Append table with add row form on add new button click
     $(".add-new").click(function(){
               $(this).attr("disabled", "disabled");
               var index = $("table tbody tr:last-child").index();
          var row = '<tr>' +
               '<td><input type="string" class="form-control" name="Medicine Name" id="Med_name"></td>' +
               '<td><input type="string" class="form-control" name="Medicine ID" id="Med_id"></td>' +
               '<td><input type="text" class="form-control" name="Description" id="descritopn"></td>' +
               '<td><input type="date" class="form-control" name="MFD" id="manufactureDate"></td>' +
               '<td><input type="date" class="form-control" name="EXP" id="expireDate"></td>' +
               '<td><input type="float" class="form-control" name="Unit Price" id="unitprice"></td>' +
               '<td><input type="integer" class="form-control" name="Stock Qty" id="stock_qty"></td>' +
                    '<td>' + actions + '</td>' +
          '</tr>';
          $("table").append(row);		
               $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
          $('[data-toggle="tooltip"]').tooltip();
     });
          // Add row on add button click
          $(document).on("click", ".add", function(){
               var empty = false;
               var input = $(this).parents("tr").find('input[type="text"]');
          input.each(function(){
                    if(!$(this).val()){
                         $(this).addClass("error");
                         empty = true;
                    } else{
                    $(this).removeClass("error");
               }
               });
               $(this).parents("tr").find(".error").first().focus();
               if(!empty){
                    input.each(function(){
                         $(this).parent("td").html($(this).val());
                    });			
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
               }		
     });
          // Edit row on edit button click
          $(document).on("click", ".edit", function(){		
          $(this).parents("tr").find("td:not(:last-child)").each(function(){
                    $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
               });		
               $(this).parents("tr").find(".add, .edit").toggle();
               $(".add-new").attr("disabled", "disabled");
     });
          // Delete row on delete button click
          $(document).on("click", ".delete", function(){
          $(this).parents("tr").remove();
               $(".add-new").removeAttr("disabled");
     });
     });
     </script>

     <!-- For search box  -->
     <script>
     function myFunction() {
     var input, filter, table, tr, td, i, txtValue;
     input = document.getElementById("myInput");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");
     for (i = 0; i < tr.length; i++) {
     td = tr[i].getElementsByTagName("td")[0];
     if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          } else {
          tr[i].style.display = "none";
          }
     }       
     }
     }
     </script>
</body>
</html>