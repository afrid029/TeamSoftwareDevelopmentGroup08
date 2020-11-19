<!DOCTYPE html>
<html lang="en">
<head>

     <title>Doctor</title>

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
                         <li class="active"><a href="#">Home</a></li>
                         <li><a href="#about" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="#team" class="smoothScroll">Admitted Patients</a></li>
                         <li><a href="#menu" class="smoothScroll">Available Time</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="login">(Log out)</a></li>
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
               <input type="email" name="name" class="form-control" placeholder="Email" value=""><br>
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
                                   
                                        <div class="col-md-8 col-sm-12">
                                             
                                             <br><br>
                                             <br><br>
                                             <div class="col-md-6 col-sm-6">
                                                       <img src="{{ asset('images/doctorimage.jpg')}}" style="width:300px ;">
                                                       <br><br>
                                                       <h3>Doctor Name</h3>
                                                       <h3>Doctor ID</h3>
                                                       <br><br>
                                                                                  
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                       Edit Profile
                                                  </button>
                                             </div>
                                        
                                             <div class="col-md-6 col-sm-6">

                                                  <br><br>
                                                  <h3>Phone Number</h3>
                                                  <br><br>
                                                  <h3>Email</h3>
                                                  <br><br>
                                                  <h3>Address</h3>
                                            
                                             </div>
                                        </div>

                                        
                                   </div>

                                   
                              </div>
                         </div>

                         <div class="item item-second">
                              <div class="caption">
                                   <div class="container">
                                        <h3>Doctor ID <span class="label label-default">Doc123@</span></h3>
                                        <ul class="nav navbar-nav navbar-right">
                                             <h3>Date<span class="label label-default">2020/11/22</span></h3>
                                        </ul><br>
                                        <ul class="nav navbar-nav navbar-right">
                                             <h3>Time<span class="label label-default">11:15 AM</span></h3>
                                        </ul>
                                        <br></br>
                                   
                                        <div class="col-md-8 col-sm-12">
                                             
                                             <form action="/saveuser" method="post" class="wow fadeInUp">
                                             {{csrf_field()}} 
                                                  <div class="col-md-6 col-sm-6">
                                              
                                                       <h3>Patient ID</h3>
                                                       <input class="form-control" type="text" name="patientid" ><br>
                                                       <h3>Diagnosis</h3>
                                                       <input class="form-control input-lg" type="text" name="diagnosis" ><br>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6">

                                                       <h3>Disease</h3>
                                                       <input class="form-control" type="text" name="disease" ><br>
                                                       <h3>Medicine</h3>
                                                       <input class="form-control input-lg" type="text" name="medicine" ><br> 
                                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Prescript Medicine
                                                       </button>
                                                       <br></br>
                                                       <br></br>
                                                  </div>
                                             </form>
                                             <div class="col-xs-5">
                                                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                                  <br>
                                             </div>
                                        </div>
                                        
                                        <table class="table table-bordered" >
                                        
                                             <thead>
                                                  <tr>
                                                       <th>Patient ID</th>
                                                       <th>Doctor ID</th>
                                                       <th>Date</th>
                                                       <th>Disease</th>
                                                       <th>Diagnosis</th>
                                                       <th>Medicine</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>
                                             </tbody>
                                        
                                        </table>
                                   </div>
                             </div>
                         </div>

                         <div class="item item-third">
                              <div class="caption">
                                   <div class="container">
                                        <h3>Doctor ID <span class="label label-default">Doc123@</span></h3>
                                        <ul class="nav navbar-nav navbar-right">
                                             <h3>Date<span class="label label-default">2020/11/22</span></h3>
                                        </ul><br>
                                        <ul class="nav navbar-nav navbar-right">
                                             <h3>Time<span class="label label-default">11:15 AM</span></h3>
                                        </ul>
                                        <br></br>
                                   
                                        <div class="col-md-8 col-sm-12">
                                             
                                             <form action="/saveuser" method="post" class="wow fadeInUp">
                                             {{csrf_field()}} 
                                                  <div class="col-md-6 col-sm-6">
                                                       <h3>Patient ID</h3>
                                                       <input class="form-control" type="text" name="patientid" ><br>
                                                       <h3>Medicine</h3>
                                                       <input class="form-control input-lg" type="text" name="medicine" ><br>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6">
                                                       
                                                       <h3>Condition</h3>
                                                       <input class="form-control input-lg" type="text" name="condition" ><br>
                                                       <br></br>
                                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Insert
                                                       </button>
                                                       <br></br>
                                                       <br></br>
                                                  </div>
                                                  
                                             </form>
                                             
                                             <div class="col-xs-5">     
                                                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                                  <br>
                                             </div>
                                        </div>
                                        
                                        <table class="table table-bordered" >
                                        
                                             <thead>
                                                  <tr>
                                                       <th>Patient ID</th>
                                                       <th>Doctor ID</th>
                                                       <th>Medicine</th>
                                                       <th>Condition</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                       
                                                  </tr>
                                             </tbody>
                                        
                                        </table>
                                   </div>
                              </div>
                         </div>
                    
                         <div class="item item-fourth">
                              <div class="caption">
                                   <div class="container">
                                        <h3>Doctor ID <span class="label label-default">Doc123@</span></h3>
                                        <div class="col-md-8 col-sm-12">
                                             
                                             <br><br>
                                             <br><br>
                                             <form action="/saveuser" method="post" class="wow fadeInUp">
                                             {{csrf_field()}} 
                                                  <div class="col-xs-3">
                                              
                                                       <label for="ex1">Date</label>
                                                       <input class="form-control" type="date" name="date" ><br>
                                                       
                                                  </div>
                                                  <div class="col-xs-2">
                                                       <label for="ex1">Time</label>
                                                       <input class="form-control" type="time" name="time" ><br>
                                                  </div>
                                                  <div class="col-xs-2">
                                                       <br></br>     
                                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Insert
                                                       </button>
                                                       <br></br>
                                                       <br></br>
                                                  </div>
                                                  
                                             </form>
                                        </div>
                                        <table class="table table-hover" >
                                             <thead>
                                                  <tr>
                                                       <th>Available Date</th>
                                                       <th>Available Time</th>
                                                       <th></th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                        
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