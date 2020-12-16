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
     <style>
    
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


     <!-- MENU -->
     <section style="background-color:white; height:10%;" class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>

               <!-- lOGO TEXT HERE -->
               <a style= "color:black;" href="/welcome" class="navbar-brand">Hospital</a>
          </div>

          <!-- MENU LINKS -->
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                    <li><a style= "color:black;" href="{{route('phahome',$c->Phar_id)}}" class="smoothScroll">Home</a></li>
                    <li><a style= "color:black;" href="{{route('medicalstock',$c->Phar_id)}}" class="smoothScroll">Maintain medical stock</a></li>
                    <li><a style= "color:black;" href="{{route('issueMedicine',$c->Phar_id)}}" class="smoothScroll">Issue medicine</a></li>
                    <li><a style= "color:black;" href="{{route('phaordermedicine',$c->Phar_id)}}" class="smoothScroll"><font color="red">Order medicine</font></a></li>
                         
               </ul>

               <ul class="nav navbar-nav navbar-right">
                    <li><a style= "color:black;" href="/login">Logout</a></li>
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
                                                       <form>
                                                       <div class="col-sm-6"><h2>Order Medicine</h2></div>
                                                            <div class="table-title">
                                                            
                                                                 <!--<div class="row">-->
                                                                    <div class="col-sm-3">
                                                                    <input class="form-control" type="text" name="" placeholder="Producer ID"><br>
                                                                    </div>
                                                                      <div class="col-sm-3">
                                                                      <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add Medicine</button>
                                                                      </div>
                                                                 
                                                            </div>
                                                            <table class="table table-bordered">
                                                                 <thead>
                                                                      <tr>
                                                                      <th>Medicine Id</th>
                                                                      <th>Quantity</th>
                                                                      <th>Actions</th>
                                                                      </tr>
                                                                 </thead>
                                                                 <tbody>
                                                                      <tr>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                                           <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>
                                                                      <tr>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                                           <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>
                                                                      <tr>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                                           <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                                           <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                                      </td>
                                                                      </tr>      
                                                                 </tbody>
                                                            </table>
                                                            <input class="section-btn btn btn-default smoothScroll" type="submit" value="Send" color="black">
                                                       </div>

                                                       </form>
                                                  </div>
                                                <div style="position:relative;height:200px;overflow:auto;display:block;">
                                                <table class="table table-bordered" >
                                                  <thead>
                                                        <tr>
                                                            <th>Producer ID</th>
                                                            <th>Date</th>
                                                            <th><link>Action</link></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>id1</td>
                                                            <td></td>
                                                            <td>view</td>
                                                        </tr>
                                                        <tr>
                                                            <td>id2</td>
                                                            <td></td>
                                                            <td>view</td>
                                                        </tr>
                                                    </tbody>
                                                  </table>
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

     <!-- For Medicine order list -->
     <script>
     $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
          var actions = $("table td:last-child").html();
          // Append table with add row form on add new button click
     $(".add-new").click(function(){
               $(this).attr("disabled", "disabled");
               var index = $("table tbody tr:last-child").index();
          var row = '<tr>' +
               '<td><input type="string" class="form-control" name="Medicine ID" id="Med_id"></td>' +
               '<td><input type="string" class="form-control" name="Quantity" id="Med_qty"></td>' +
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


</body>
</html>