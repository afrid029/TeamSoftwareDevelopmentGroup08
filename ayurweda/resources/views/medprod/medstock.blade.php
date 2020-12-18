<!DOCTYPE html>
<html lang="en">
<head>

     <title>Medicine Stock</title>

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
     <link rel="stylesheet" href="{{ asset('css/producer.CSS')}}">

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
               <div style="background-color:#154360 " class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('mphome',$c->Pro_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('issuemedicine',$c->Pro_id)}}" class="smoothScroll">Issue Medicines</a></li>
                         <li><a href="{{route('Ingstock',$c->Pro_id)}}" class="smoothScroll">Ingredients Stock</a></li>
                         <li><a href="{{route('medstock',$c->Pro_id)}}" class="smoothScroll"><font color="red">Medicine Stock</font></a></li>
                         <li><a href="{{route('ordering',$c->Pro_id)}}" class="smoothScroll">Order Ingredients</a></li>
                    </ul>
                     
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
               </div>
          </div>
     </section>

     

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <form method="post" action="/docedit">
          
          <div class="modal-body">
               <input type="text" name="name" class="form-control" placeholder="Name" value=""><br>             
               <input type="text" name="address" class="form-control" placeholder="Address" value=""><br>
               <input type="text" name="phone" class="form-control" placeholder="Phone Number" value=""><br>
               <input type="password" name="opassword" class="form-control" placeholder="Old Password"><br>
               <input type="password" name="npassword" class="form-control" placeholder="New Password"><br>
               <button type="submit" class="btn btn-primary">Update</button>
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
     </div>
     </div>
     </div>

<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class="">
               <div class="item item-first">
                    <div class="caption">
                         <br><br>
                         <div style="height:70%; width:88%; margin: -12% 6% 0 6%; background-color:white; border-radius:0.5%;" class="container">
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:50%; margin-right: -20%; float:left; margin-left:2%;"><h2>Medicines Stock</h2></div>
                                                       <div class="table-title">
                                                            <div style="margin-top:2%; margin-right:2%;color:gray; width:20%; float:left;">
                                                                 <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Medicine By ID" title="Type ID">   
                                                            </div>
                                                            <input style="margin-top:2%; width: 20%; float:left;"  class="form-control" type="text" id="myInput1" onkeyup="myFunction()" placeholder="Search Medicine By Name" title="Type Name">
                                                            <div style="margin-top:2%; float:left; margin-left:4%;" class="col-sm-1">
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmedi"><i class="fa fa-plus"></i> Add New</button>
                                                            </div>
                                                       </div>
                                                       <table id="myTable" style="color:black;" class="table table-bordered table-scroll">
                                                            <thead>
                                                                 <tr>
                                                                      <th>Medicine ID </th>
                                                                      <th>Medicine Name</th>
                                                                      <th>Stock Qty</th>
                                                                      <th></th>
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                            
                                                                 <tr>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td></td>
                                                                      <td>
                                                                           <button data-toggle="modal"  data-target="#edit" class = "btn btn-primary btn-sm">Edit</button>&nbsp;<button data-toggle="modal" data-target="#delete" onclick = "del()" class = "btn btn-danger btn-sm">Delete</button>
                                                                      </td>
                                                                 </tr>
                                                            
                                                                 <tr>
                                                                      <td colspan="8"><h3 style=" color:black;text-align: center; font-size:20px;">There are no medicines</h3></td>
                                                                 </tr>
                                                                 
                                                            </tbody>
                                                       </table>

                                                      
                                                  </div>
                                             </div>
                                        </div>                                
                                   </div>
                               </div>
                               
                         </div>
                         <div style="background-color:white;border-radius:8%; width:86.4%; margin:-12% 7% 0 7.8%; padding-left:1%;">
                              <h3 style="color:red;">Warnings:</h3>
                              
                              <div style="overflow-y:scroll; position:relative; display:block; height:150px;">
                                   
                                        
                                        <h3 style = "color: grey;">All medicines are upto date</h3>
                                  

                                   
                                        <h3 style = "color: grey;">All medicine stocks are available</h3>
                                   
                              </div>
                         </div>
                         
                    </div>
                </div>
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

</body>
</html>