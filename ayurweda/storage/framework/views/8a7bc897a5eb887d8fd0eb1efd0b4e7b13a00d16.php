<!DOCTYPE html>
<html lang="en">
<head>

     <title>Login</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">

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
                                             <h1>Login</h1><br><br>
                                             <div class="col-md-6 col-sm-6">
                                             <input class="form-control" type="text" name="username" placeholder="Username"><br>
                                             <input class="form-control" type="password" name="password" placeholder="Password"><br><br>
                                             <input class="section-btn btn btn-default smoothScroll" type="submit" value="Login" color="black">
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
     <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
     <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
     <script src="<?php echo e(asset('js/jquery.stellar.min.js')); ?>"></script>
     <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
     <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
     <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
     <script src="<?php echo e(asset('js/smoothscroll.js')); ?>"></script>
     <script src="<?php echo e(asset('js/custom.js')); ?>"></script>

</body>
</html><?php /**PATH C:\Users\AJANTHA\Desktop\ayurweda\resources\views/login.blade.php ENDPATH**/ ?>