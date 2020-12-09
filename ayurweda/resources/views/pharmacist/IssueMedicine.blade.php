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
     <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
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
                                   <!--          Table1   -->
                                   <div class="container">
                                   
                                        <div class="col-md-8 col-sm-12">
                                             <div class="container-lg">
                                                  <div class="table-responsive">
                                                       <div class="table-wrapper">
                                                       
                                                            <div class="table-title">
                                                            <div class="col-sm-8"><h2>Patient's Medicine Orders</h2></div>
                                                                 <!--<div class="row">-->
                                                                      
                                                                 
                                                            </div>
                                                            <table class="table table-bordered">
                                                                 <thead>
                                                                      <tr>
                                                                      <th>Patient ID</th>
                                                                      <th>Date</th>
                                                                      <th>Time</th>
                                                                      <th>View</th>
                                                                      <th>Action</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>
                                                                      <tr>
                                                                      <td>Patient ID1</td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>
                                                                      <tr>
                                                                      <td>Patient ID2</td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>
                                                                      <tr>
                                                                      <td>Patient ID3</td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
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
                                   <!--          Table2   -->
                                   <div class="container">
                                   
                                        <div class="col-md-8 col-sm-12">
                                             
                                             <div class="container-lg">
                                                  <div class="table-responsive">
                                                       <div class="table-wrapper">
                                                       
                                                            <div class="table-title">
                                                            <div class="col-sm-8"><h2>Doctor's Prescription</h2></div>
                                                                 <!--<div class="row">-->
                                                                      
                                                                 
                                                            </div>
                                                            <table class="table table-bordered">
                                                                 <thead>
                                                                      <tr>
                                                                      <th>Doctor ID</th>
                                                                      <th>Patient ID</th>
                                                                      <th>Date</th>
                                                                      <th>Time</th>
                                                                      <th>View</th>
                                                                      <th>Action</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>
                                                                      <tr>
                                                                      <td>Doctor ID1</td>
                                                                      <td>Patient ID1</td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>
                                                                      <tr>
                                                                      <td>Doctor ID2</td>
                                                                      <td>Patient ID2</td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>
                                                                      <tr>
                                                                      <td>Doctor ID3</td>
                                                                      <td>Patient ID3</td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>
                                                                            
                                                                 </tbody>
                                                            </table>
                                                       </div>
                                                  </div>
                                             </div>     
                                        </div>
                                   
                                   </div>
                                   <!--    -->
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

          // Delete row on delete button click
          $(document).on("click", ".delete", function(){
          $(this).parents("tr").remove();
               $(".add-new").removeAttr("disabled");
          });
     });
     </script>

     
</body>
</html>