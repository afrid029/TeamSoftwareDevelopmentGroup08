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
                         <li><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll"><font color="red">Home</font></a></li>
                         <li><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted Patients</a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll">Available Time</a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">AddPat Details</a></li>
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
          {{csrf_field()}}
          <div class="modal-body">
               <input type="text" name="name" class="form-control" placeholder="Name" value="{{$c->Doc_name}}"><br>
               <input type="email" name="email" class="form-control" placeholder="Email" value="{{$c->Doc_email}}"><br>
               <input type="text" name="address" class="form-control" placeholder="Address" value="{{$c->Doc_addr}}"><br>
               <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{$c->Doc_pNum}}"><br>
               <input type="password" name="opassword" class="form-control" placeholder="Old Password"><br>
               <input type="password" name="npassword" class="form-control" placeholder="New Password"><br>
               <input type="hidden" name="id" class="form-control" value="{{$c->Doc_id}}"><br>
               <button type="submit" class="btn btn-primary">Update</button>
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
     </div>
     </div>
     </div>

@if($msg=="Updated successfully.")
<script>
Swal.fire({
  position: 'middle',
  icon: 'success',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 1500
});
</script>
@elseif($msg=="Old password is wrong.")
<script>
Swal.fire({
  position: 'middle',
  icon: 'error',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 1500
});
</script>
@endif

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
                                                       <h3>{{$c->Doc_name}}</h3>
                                                       <p style="color:white; opacity:60%;"><strong>{{$c->Doc_id}}</strong></p>
                                                       <br><br>
                                                                                  
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                       Edit Profile
                                                  </button>
                                             </div>
                                        
                                             <div class="col-md-6 col-sm-6">

                                                  <h2 style="color:white"> Contact details </h2>
                                                 
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/phone.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->Doc_pNum}}</h3>

                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/email.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->Doc_email}}</h3>
                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/address.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->Doc_addr}}</h3>
                                            
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