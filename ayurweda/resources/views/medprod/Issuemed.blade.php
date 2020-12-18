<!DOCTYPE html>
<html lang="en">
<head>

     <title>Issue Medicine</title>

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
                         <li><a href="{{route('issuemedicine',$c->Pro_id)}}" class="smoothScroll"><font color="red">Issue Medicines</font></a></li>
                         <li><a href="{{route('Ingstock',$c->Pro_id)}}" class="smoothScroll">Ingredients Stock</a></li>
                         <li><a href="{{route('medstock',$c->Pro_id)}}" class="smoothScroll">Medicine Stock</a></li>
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

                    <div class="owl-carousel owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                                        <br></br>
                                        <br></br>

                                        <div class="col-md-8 col-sm-12">
                                             
                                             <form action="/adsearch" method="post" style="margin:auto;width:700px">
                                                  <input style="color:black" type="text" placeholder="Pharmacist ID" name="search">
                                                  <input style="color:black" type="date" name="date">
                                                  <button type="submit"><i style="color:black" class="fa fa-search"></i></button>
                                             </form>
                                             <br></br>
                                             <br></br>

                                             <div style="position:relative;height:200px;overflow:auto;display:block;">

                                             
                                        <table class="table table-bordered" style="background-color:#ffffff">
                                        
                                             <thead>
                                                  <tr style="background-color:#800000; ">
                                                       <th>Order ID</th>
                                                       <th>Medicine ID</th>
                                                       <th>Quantity</th>
                                                       <th>Pharmacist ID</th>
                                                       <th>Order Date</th>
                                                       <th></th>
                                                      
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td><input class="btn btn-primary" type="submit" value="Issue"></td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td><input class="btn btn-primary" type="submit" value="Issue"></td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td><input class="btn btn-primary" type="submit" value="Issue"></td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td><input class="btn btn-primary" type="submit" value="Issue"></td>
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