<!DOCTYPE html>
<html lang="en">
<head>

     <title>Prescription</title>

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
                         <li><a href="{{route('pathome',$c->Pat_id)}}" class="smoothScroll">Home</a></li>
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll">State Medical Symptomps</a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll"><font color="red">Order Medicines</font></a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll">Online Booking</a></li>
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
          <form action="/patedit" method="post" >
          
          @method('patch')
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
                                    <br></br>
                                    <br></br>
                                    <br></br>
                                   <h2 style="color:#ffffff;">Order here</h2>
                                   <div class="col-xs-6">
                                             
                                              
                                           
                                                  
                                                  
                                                        <h3>Medicine Name</h3>
                                                        <input style="color:black" type="text" placeholder="Search" name="MedicineName">
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                       
                                                       <h3>Quantity</h3>
                                                       <textarea id="uservar" style="color:black;" ></textarea><br> 
                                                       <button type="button" class=" btn-uservar btn btn-primary" onclick="addtext()">
                                                            Add
                                                       </button>
                                                       <br></br>
                                                       <br></br>
                                                       <br></br>
                                                       <br></br>
                                                  
                                             
                                             <textarea style="color:black;" name="" id="textarea" cols="30" rows="10">dddffd</textarea>
                                             <script type="text/javascript">
                                                  function addtext()
                                                  {
                                                       var a = document.getElementById('uservar').value;
                                                       document.write(a);
                                                       var b = document.getElementById('textarea').value;

                                                       b.appendChild(a);
                                                       
                                                  }
                                             </script>
                                           
                                        <h2 style="color:#ffffff;">Unreceived orders</h2>
                                        <table class="table" style="height:200px;">
                                        
                                        
                                             
                                                  <tr>
                                                       <th>Date</th>
                                                       <th>Time</th>
                                                       <th>View</th>
                                                       
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>
                                                  <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>
                                                  <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                  </tr>
                                                  <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                  </tr>
                                    </table>
                                    </div>     
                                             
                                    <div class="col-xs-6">
                                             <br>
                                             <div style="position:relative;height:200px;overflow:auto;display:block;">
                                        
                                        <table class="table">
                                        
                                        
                                             
                                                  <tr>
                                                       <th>Medicine Name</th>
                                                       <th>Quantity</th>
                                                       
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>
                                                  <tr>
                                                        <td></td>
                                                        <td></td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                  </tr>
                                                  <tr>
                                                        <td></td>
                                                        <td></td>
                                                  </tr>
                                    </table>
                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Send</button>    

                                    </div>
                                    </div><br>
                                        
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