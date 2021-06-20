<!DOCTYPE html>
<html lang="en">
<head>

     <title>Register</title>
     <link rel="icon" href="{{asset('images/logo4.png')}}" type="image/x-icon">
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
                    <a href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#">Call Now! <i class="fa fa-phone"></i> 055 020 0340</a></li>
                    </ul>
               </div>

          </div>
     </section>
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
@if($msg = session()->get('msg'))
@if($msg=="Registered successfully.")
<script>
Swal.fire({
  position: 'middle',
  icon: 'success',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 1500
});
</script>
@elseif($msg=="Password Retype Is Wrong.")
<script>
Swal.fire({
  position: 'middle',
  icon: 'error',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 2500
});
</script>
@endif
@endif

@if($errors->any())
     <script> var a=""; </script>
     @foreach($errors->all() as $err)
  
     <script>
          a = a + "{{$err}}\n";
     </script>
    
     @endforeach

     <script>
     Swal.fire({
               position: 'top',
               icon: 'warning',
               title: a,
               showConfirmButton: false,
               timer: 4000
            
          });
     </script>
@endif

@if ($msg = session()->get('reg'))
     <script>
     Swal.fire({
               position: 'top',
               icon: 'error',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 3000
            
          });
     </script>
@endif


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
               <div class="row">

                    <div class="">
                         <div class="item item-third">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-8 col-sm-12">
                                             <form name="regform" action="/saveuser" method="post" class="wow fadeInUp">
                                             {{csrf_field()}} 
                                             <h1>Patient Register Here....</h1><br><br>
                                                  <div class="col-md-6 col-sm-6">
                                                  <h4>Your ID: {{$id}}</h4>
                                                       <input type="hidden" value = "{{$id}}" name = "id">
                                                       <input class="form-control" type="text" name="name" placeholder="Name"><br>
                                                       <input class="form-control" type="text" name="dob" onblur="(this.type='text')" onfocus="(this.type='date')"  placeholder="Date Of Birth"><br>

                                                       <select name="gender" class="form-control" placeholder="Select a gender">
                                                            <option value="none" selected disabled hidden> 
                                                                      Select A Gender
                                                            </option> 
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                       </select><br>
                                                       
                                                       <input class="form-control" type="text" name="address" placeholder="Address"><br>
                                                       <input class="form-control" type="text" name="phone" placeholder="Phone Number"><br>
                                                  </div>
                                                  
                                                  <div class="col-md-6 col-sm-6">
                                                       <input class="form-control" type="text" name="guardian" placeholder="Guardian"><br>
                                                       <input class="form-control" type="email" name="email" placeholder="Email"><br>
                                                       <input class="form-control" type="password" name="password" placeholder="Password"><br>
                                                       <input class="form-control" type="password" name="rpassword" placeholder="Confirm Password"><br>
                                                       
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