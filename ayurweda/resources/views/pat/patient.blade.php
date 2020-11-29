<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Patient</title>

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
                         <li><a href="{{route('pathome',$c->Pat_id)}}" class="smoothScroll">Home</a></li>
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll">State Medical Symptomps</a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll">Order Medicines</a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll">Online Booking</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="login">Logout</a></li>
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
          <form action="/patedit" method="post" >
          
          @method('PATCH')
          @csrf
               <div class="modal-body">    
               <input type="text" name="name" class="form-control" placeholder="Name" value="{{$c->Pat_name}}"><br>
               <input type="email" name="email" class="form-control" placeholder="Email" value="{{$c->Pat_email}}"><br>
               <input type="text" name="address" class="form-control" placeholder="Address" value="{{$c->Pat_addr}}"><br>
               <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{$c->Pat_pNum}}"><br>
               <input type="password" name="opassword" class="form-control" placeholder="Old Password"><br>
               <input type="password" name="npassword" class="form-control" placeholder="New Password"><br>
               <input type="hidden" name="id" class="form-control" value="{{$c->Pat_id}}"><br>
               <button type="submit" class="btn btn-primary">Update</button>
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
     </div>
     </div>
     </div>
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
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
               time: 100
            
          });
     </script>
@endif

 @if($msg == "Profile Successfully Updated")
     <script>
          Swal.fire({
               position: 'middle',
               icon: 'success',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 1500
          });
     </script>
     
     
@elseif($msg == "Password is wrong")
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
                                                       <img src="{{ asset('images/patient.png')}}" style="width:160px ; height:230px; ">
                                                       <br><br>
                                                       <div style="float:left; margin-right:15px">
                                                        <img src="{{ asset('images/name_icon1.png') }}" style="width:34px ; height:34px; ">
                                                       </div>
                                                       <div >
                                                       <h3>{{$c->Pat_name}}</h3>
                                                       <p style="color:white; opacity:60%;"><strong>{{$c->Pat_id}}</strong></p>
                                                       </div>
                                                      
                                                      
                                                       
                                                       <br><br>
                                                                                  
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                       Edit Profile
                                                  </button>
                                             </div>
                                        
                                             <div class="col-md-6 col-sm-6">

                                                
                                                  <br><br>
                                                  
                                                  <div style="float:left; margin-right:40px">
                                                       <img src="{{ asset('images/age.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->age}}</h3>
                                                  
                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/gender.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->gender}}</h3>

                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/guard.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->guardian}}</h3>

                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/phone.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->Pat_pNum}}</h3>

                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/email.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->Pat_email}}</h3>
                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/address.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->Pat_addr}}</h3>
                                            
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