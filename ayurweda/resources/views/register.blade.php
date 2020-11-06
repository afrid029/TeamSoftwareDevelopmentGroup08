<!DOCTYPE html>
<html lang="en">
<head>

     <title>Register</title>

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
     <link rel="stylesheet" href="{{ asset('css/register.css')}}">
     

</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


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
                    

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#">Call Now! <i class="fa fa-phone"></i> 010 020 0340</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
               <div class="row">

                    <div class="owl-carousel owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                            <form action="log" method="post" class="wow fadeInUp"> 
                                                  <form action="log" method="post" class="wow fadeInUp"> 
                                                       <h1>Register Here</h1><br><br>
                                                       <div class="col-md-6 col-sm-6">
                                                            <input class="section-btn btn btn-default smoothScroll" type="submit" value="Doctor" color="black"><br><br>
                                                            <input class="section-btn btn btn-default smoothScroll" type="submit" value="Patient" color="black"><br><br>
                                                            <input class="section-btn btn btn-default smoothScroll" type="submit" value="Pharmacist" color="black"><br><br>
                                                            <input class="section-btn btn btn-default smoothScroll" type="submit" value="Medicine Producer" color="black"><br><br>
                                                            <input class="section-btn btn btn-default smoothScroll" type="submit" value="Ingredients supplier" color="black"><br><br>                                                  
                                                       </div>
                                                  </form>
                                                  
                                             </form>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="item item-second">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <form action="log" method="post" class="wow fadeInUp"> 
                                             <h1>Doctor</h1><br><br>
                                                  <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" type="text" name="name" placeholder="Name"><br>
                                                       <input class="form-control" type="text" name="address" placeholder="Address"><br>
                                                       <input class="form-control" type="text" name="phone number" placeholder="Phone Number"><br>
                                                       <input class="form-control" type="text" email="email" placeholder="Email"><br>
                                                       <input class="form-control" type="text" name="password" placeholder="Password"><br>
                                                       <input class="form-control" type="text" name="confirm password" placeholder="Confirm Password"><br>
                                                       <input class="section-btn btn btn-default smoothScroll" type="submit" value="Register" color="black">
                                                  </div>
                                             </form>
                                             
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="item item-third">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <form action="log" method="post" class="wow fadeInUp"> 
                                             <h1>Patient</h1><br><br>
                                                  <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" type="text" name="name" placeholder="Name"><br>
                                                       <input class="form-control" type="text" name="age" placeholder="Age"><br>
                                                       <input class="form-control" type="text" name="gender" placeholder="Gender"><br>
                                                       <input class="form-control" type="text" name="address" placeholder="Address"><br>
                                                       <input class="form-control" type="text" name="phone number" placeholder="Phone Number"><br>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" type="text" name="guardian" placeholder="Guardian"><br>
                                                       <input class="form-control" type="text" email="email" placeholder="Email"><br>
                                                       <input class="form-control" type="text" name="diseas" placeholder="Disease"><br>
                                                       <input class="form-control" type="text" name="password" placeholder="Password"><br>
                                                       <input class="form-control" type="text" name="confirm password" placeholder="Confirm Password"><br>
                                                       <input class="section-btn btn btn-default smoothScroll" type="submit" value="Register" color="black">
                                                  </div>
                                             </form>
                                             
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="item item-fourth">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <form action="log" method="post" class="wow fadeInUp"> 
                                             <h1>Pharmacist</h1><br><br>
                                                  <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" type="text" name="name" placeholder="Name"><br>
                                                       <input class="form-control" type="text" name="address" placeholder="Address"><br>
                                                       <input class="form-control" type="text" name="phone number" placeholder="Phone Number"><br>
                                                       <input class="form-control" type="text" name="password" placeholder="Password"><br>
                                                       <input class="form-control" type="text" name="confirm password" placeholder="Confirm Password"><br>
                                                       <input class="section-btn btn btn-default smoothScroll" type="submit" value="Register" color="black">
                                                  </div>
                                             </form>
                                             
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="item item-fifth">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <form action="log" method="post" class="wow fadeInUp"> 
                                             <h1>Medicine Producer</h1><br><br>
                                                  <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" type="text" name="name" placeholder="Name"><br>
                                                       <input class="form-control" type="text" name="address" placeholder="Address"><br>
                                                       <input class="form-control" type="text" name="phone Number" placeholder="Phone Number"><br>
                                                       <input class="form-control" type="text" name="password" placeholder="Password"><br>
                                                       <input class="form-control" type="text" name="confirm password" placeholder="Confirm Password"><br>
                                                       <input class="section-btn btn btn-default smoothScroll" type="submit" value="Register" color="black">
                                                  </div>
                                             </form>
                                             
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="item item-sixth">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <form action="log" method="post" class="wow fadeInUp"> 
                                             <h1>Ingredients supplier</h1><br><br>
                                                  <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" type="text" name="name" placeholder="Name"><br>
                                                       <input class="form-control" type="text" name="address" placeholder="Address"><br>
                                                       <input class="form-control" type="text" name="phone Number" placeholder="Phone Number"><br>
                                                       <input class="form-control" type="text" name="password" placeholder="Password"><br>
                                                       <input class="form-control" type="text" name="confirm password" placeholder="Confirm Password"><br>
                                                       <input class="section-btn btn btn-default smoothScroll" type="submit" value="Register" color="black">
                                                  </div>
                                             </form>
                                             
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