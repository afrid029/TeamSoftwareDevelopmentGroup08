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
@if($msg=session()->get('msg'))

@if($msg=="Profile Successfully Updated")
<script>

Swal.fire({
  position: 'middle',
  icon: 'success',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 2500
});
</script>
@elseif($msg=="Old Password Is Wrong")
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


      
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">
 
               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    
                    <a href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa</a>
               </div>

              
               <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('adminpage',$c->id)}}" style="text-transform:capitalize" class="smoothScroll"><font color="red">Home</font></a></li>
                         <li><a href="{{route('regist',$c->id)}}" style="text-transform:capitalize" class="smoothScroll">Registration</a></li>
                         <li><a href="{{route('profit',$c->id)}}" style="text-transform:capitalize" class="smoothScroll">Report</a></li>
                    </ul>
                     
                    <ul class="nav navbar-nav navbar-right">

                         <li><a  style="text-transform:capitalize" href="/logout">Logout</a></li>


                    </ul>
               </div>

          </div>
          
     </section>

     

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
          <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Edit Profile</h3>
          
          </div>
          <form method="post" action="/admedit">
         {{csrf_field()}}  
          <div class="modal-body">
               <input type="text" name="id" class="form-control"  value="{{$c->id}}" readonly><br>             
               <input type="text" name="name" class="form-control" placeholder="Name"  value="{{$c->username}}"><br>
               <input type="text" name="phone" class="form-control"  placeholder="Phone Number" value="{{$c->phone}}"><br>
               <input type="email" name="email" class="form-control"  placeholder="Email"  value="{{$c->email}}"><br>
               <input type="password" name="opassword" class="form-control" placeholder="Old Password"><br>
               <input type="password" name="npassword" class="form-control" placeholder="New Password / Repeat Old Password"><br>
              
               <button type="submit" class="btn btn-primary">Update</button>
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          </form>
     </div>
     </div>
     </div>


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

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="">
                         <div class="item item-first">
                         <div class="caption">
                                   <div  class="container">
                                   
                                        <div class="col-md-8 col-sm-12">
                                             
                                             <br><br>
                                             <br><br>
                                             <div class="col-md-6 col-sm-6">
                                                       <img src="{{ asset('images/adminprof.jpg')}}" style="width:70% ; height:230px;">
                                                       <br><br>
                                                       <div style="float:left; margin-right:15px">
                                                            <img src="{{ asset('images/name_icon1.png') }}" style="width:34px ; height:34px; ">
                                                       </div>
                                                       <h3 style="text-transform:capitalize">{{$c->username}}</h3>
                                                       <h4 style="opacity:0.6;">{{$c->id}}</h4>
                                                       
                                                       
                                                       
                                                       <br><br>
                                                                                  
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                       Edit Profile
                                                  </button>
                                             </div>
                                        
                                             <div class="col-md-6 col-sm-6">

                                                  <h2 style="color:white"> Contact Details </h2>
                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/phone.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->phone}}</h3>

                                                  <br><br>
                                                  
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/email.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3 style="text-transform:lowercase">{{$c->email}}</h3>
                                            
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