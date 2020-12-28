<!DOCTYPE html>
<html lang="en">
<head>

     <title>Admin</title>

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
     <link rel="stylesheet" href="{{ asset('css/doctor.CSS')}}">

     <style>
          .slider .item-first {
          background-image: url(../images/admin.jpg);
          }
          .table-scroll{
  width:100%; 
  display: block;
 
  empty-cells: show;

  border-radius:1.5%;
  margin-top:2%;
  
  /* Decoration */

  
}
.table-scroll thead{
  background-color: #191970;  
  position:relative;
  display: block;
  width:100%;
  color:white;
  
  overflow-y: scroll;
}
.table-scroll tbody{
     
  /* Position */
  display: block; position:relative;
  width:100%; overflow-y:scroll;
  /* Decoration */
  border-top: 4px solid rgba(128,128,128,0.3);
}
.table-scroll tr{
  width: 100%;
  display:flex;
  
}
.table-scroll td,.table-scroll th{
 
  width:10%;
  flex-grow:2;
  display: block;
  
  text-align:center;
}
/* Other options */
.table-scroll.small-first-col td:first-child,
.table-scroll.small-first-col th:first-child{
  flex-basis:100%;
  flex-grow:1;
}
.table-scroll tbody tr:nth-child(2n){
  background-color: rgba(255,240,245,0.4);
}
.body-half-screen{
  max-height: 35vh;
  
}
.small-col{flex-basis:10%;}
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

      
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">
 
               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    
                    <a href="welcome" class="navbar-brand">Hospital <span>.</span> Pharmacy</a>
               </div>

              
               <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="" class="smoothScroll">Home</a></li>
                         <li><a href="" class="smoothScroll"><font color="red">Registration</font></a></li>
                    </ul>
                     
                    <ul class="nav navbar-nav navbar-right">

                         <li><a href="/login">Logout</a></li>


                    </ul>
               </div>

          </div>
          
     </section>

     <br><br>

     
     <!-- for registration part -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class=" owl-theme">
               <div class="item item-first">
                    <div class="caption">
                         <br><br>
                         <div style="height:70%; width:95%; margin: -12% 5% 0 2%; background-color:white; border-radius:0.5%;" class="container">
                         
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:60%; margin-right: -20%; float:left; margin-left:2%;"></div>
                                                       <div class="table-title">
                                                            <div style="margin-top:2%; margin-right:2%;color:gray; width:20%; float:left;">
                                                                 <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Medicine By ID" title="Type ID">   
                                                            </div>
                                                            <input style="margin-top:2%; width: 20%; float:left;"  class="form-control" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search Medicine By Name" title="Type Name">
                                                            <div style="margin-top:2%; float:left; margin-left:4%;" class="col-sm-1">
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmedi"><i class="fa fa-plus"></i>New Register</button>
                                                            </div>
                                                       </div>
                                                       <table id="myTable" style="color:black; width:100%;" class="table table-bordered table-scroll">
                                                       
                                                            <thead>
                                                                 <tr>
                                                                      <th>User ID </th>
                                                                      <th>User Name</th>
                                                                      <th>Password</th>
                                                                      <th>Roll</th>
                                                                      <th>Action</th>
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">

                                                            

                                                                 <tr>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <button data-toggle="modal" onclick = "edit()" data-target="#edit" class = "btn btn-primary btn-sm fa fa-pencil"></button>&nbsp;
                                                                      </td>
                                                                 </tr>
                                                                 
                                                            </tbody>
                                                       </table>

                                                      
                                                  </div>
                                             </div>
                                        </div>                                
                                   </div>
                               </div>
                               
                         </div>
                         
                         
                    </div>
                </div>
          </div>
     </div>
</section>

<!-- Modal 1-->
<!--<div class="modal fade" id="addmedi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 style="float:left" class="modal-title" id="exampleModalLabel">Register Here</h3>
                    <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               <div class="modal-body">
                    
                         <form action="" method="post" onsubmit="" enctype="multipart/form-data">
                              
                              <div class="row">
                                   <input class="form-control" type="text" name="name" placeholder="User Name"><br>
                              </div>
                              <div class="row">
                                   <input class="form-control" type="text" name="password" placeholder="Password"><br>
                              </div>
                              <div class="row">
                                   <select style="width:40%; margin-right:10%; float:left;" class="form-control" >
                                        <option value="none" selected disabled hidden>Select a roll</option>
                                        <option>Doctor</option>
                                        <option>Pharmacist</option>
                                        <option>Medicine Producer</option>
                                        <option>Supplier</option>
                                   </select> 
                              </div>
                              <button type="submit" class="btn btn-success btn-sm">SAVE</button>
                              
                         </form>
                    
               </div>
              
          </div>
     </div>
</div>
<!-- Modal 2-->
<!--<div class="modal fade" id="addmedi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               <div class="modal-body">
                    
                         <form action="" method="post" onsubmit="" enctype="multipart/form-data">
                              <div class="row">
                                   <label  >User ID: </label>
                                   <input class="form-control" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6;" name = "id" id="" readonly/><br>
                              </div>
                              <div class="row">
                                   <label  >User Name: </label>
                                   <input class="form-control" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6;" name = "name" id="" readonly/><br>
                              </div>
                              <div class="row">
                                   <label  >Roll: </label>
                                   <input class="form-control" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6;" name = "roll" id="" readonly/><br>
                              </div>
                              <div class="row">
                                   <label  >Password: </label>
                                   <input class="form-control" type="text" name="password" placeholder="New Password"/><br>
                              </div>
                              
                              <button type="submit" class="btn btn-success btn-sm">Update</button>
                              
                         </form>
                    
               </div>
              
          </div>
     </div>
</div>

     <!-- SCRIPTS -->
     <script src="{{ asset('js/jquery.js')}}"></script>
     <script src="{{ asset('js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
     <script src="{{ asset('js/wow.min.js')}}"></script>
     <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
     <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
     <script src="{{ asset('js/smoothscroll.js')}}"></script>
     <script src="{{ asset('js/custom.js')}}"></script>

</body>
</html>