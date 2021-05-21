<!DOCTYPE html>
<html lang="en">
<head>

     <title>Doctor</title>
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
     <link rel="stylesheet" href="{{ asset('css/login.css')}}">
     <link rel="stylesheet" href="{{ asset('css/doctor.CSS')}}">
     <link rel="stylesheet" type="text/css" href="{{ asset('css/preview.css')}}">
     <script src="{{ asset('js/preview.js') }}"></script>

     <style>
.btn-dark{
     display:none;
    margin-top:2px;
    width:100%;
     background-color:Black;
     opacity:0.8;
}
.img:hover + .btn-dark, .btn-dark:hover{
     display:inline-block;
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
               <ul class="nav navbar-nav navbar-nav-first">
                         <li style="margin-left:-120px"><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll"><font color="red">Home</font></a></li>
                         <li style="margin-left:-50px"><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patient <br>Details</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patients</a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll">Available <br>Time</a></li>
                         <li><a href="{{route('docsymp',$c->Doc_id)}}" class="smoothScroll">Medical <br>Symptoms</a></li>
                         <li><a href="{{route('appointment',$c->Doc_id)}}" class="smoothScroll">Appointments</a></li>
                         
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a  href="/logout">Logout</a></li>
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
          </div>
          <form method="post" action="/docedit" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
               <input type="text" name="name" class="form-control" placeholder="Name" value="{{$c->Doc_name}}"><br>
               <input type="email" name="email" class="form-control" placeholder="Email" value="{{$c->Doc_email}}"><br>
               <input type="text" name="address" class="form-control" placeholder="Address" value="{{$c->Doc_addr}}"><br>
               <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{$c->Doc_pNum}}"><br>
               <input type="password" name="opassword" class="form-control" placeholder="Old Password"><br>
               <input type="password" name="npassword" class="form-control" placeholder="New Password / Repeat Old Password"><br>
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

     <!-- Modal 2 -->
<div style ="width:80%; margin-left:10%; margin-right:10%; margin-top:5%;" class = "modal fade" id = "profile" role = "dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role = "dialog">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title">Upload Profile Picture</h5>
               </div>
                    <form action="/docpic" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                         <div style ="width:80%; margin: 0 10%;" class="custom-file-container" data-upload-id="myUniqueUploadId">
                              <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"> </a>
                              <label style="width:100%;" class="custom-file-container__custom-file">
                              <input  type="hidden" name="id" class="form-control" value="{{$c->Doc_id}}"><br>
                              <input  type="file" name = "image" class="custom-file-container__custom-file__custom-file-input" accept="image/*"  aria-label="Choose File">
                                   <span  class="custom-file-container__custom-file__custom-file-control"></span>
                              </label>

                              <div style="width:80%; margin-left:10%; margin-right:10%; height:200px;" class="custom-file-container__image-preview">
                              </div>
                         </div>
                              <script>
                                   var upload = new FileUploadWithPreview('myUniqueUploadId')
                              </script>
                         <button style ="width : 30%; margin: 0 35%;" type="submit" class="btn btn-success"><b>UPLOAD</b></button>
                    </form>
                    <div  class="modal-footer">
                          <button style="margin-right:12%;" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>

          </div>
     </div>
</div>
@if($msg=session()->get('msg'))
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
     
     
@elseif($msg == "Old password is wrong")
     <script>
          Swal.fire({
               position: 'middle',
               icon: 'error',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 1500
          });
     </script>
@else
<script>
          Swal.fire({
               position: 'middle',
               icon: 'success',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 1500
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
               timer: 2000
            
          });
     </script>
@endif

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="">
                         <div class="item item-first">
                         <div class="caption">
                                   <div class="container">
                                   
                                        <div class="col-md-8 col-sm-12">
                                             
                                             <br><br>
                                             <br><br>
                                             <div class="col-md-6 col-sm-6">
                                              <div style="background-color:white; padding:1% 1% 1% 1%; border-radius:10px; height:208px; width:60%">
                                                      @if($c->Doc_im)
                                                       <img class="img" src="{{asset('upload/profile')}}/{{$c->Doc_im}}" style="  border-radius:30px; height:200px; width:100%;">
                                                       <button style="border-radius:30px;width:200px;" href = "#profile" data-toggle = "modal" class = "btn btn-dark btn-sm fa fa-camera"><b> Change Profile Pic</b></button>
                                                       @else
                                                       <img class="img" src="{{ asset('images/doctorimage.jpg')}}" style="  border-radius:30px; height:200px; width:100%; ">
                                                       <button style="border-radius:30px;width:200px;" href = "#profile" data-toggle = "modal" class = "btn btn-dark btn-sm fa fa-camera"><b> Change Profile Pic</b></button>
                                                       @endif
                                             </div>
                                                       <br><br>
                                                       <div style="float:left; margin-right:15px">
                                                            <img src="{{ asset('images/name_icon1.png') }}" style="width:34px ; height:34px; ">
                                                       </div>
                                                       <h3 style="text-transform:capitalize">{{$c->Doc_name}}</h3>
                                                       <p style="color:white; opacity:60%; text-transform:capitalize"><strong>{{$c->Doc_id}}</strong></p>
                                                       <br><br>
                                                                                  
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                       Edit Profile
                                                  </button>
                                             </div>
                                        
                                             <div class="col-md-6 col-sm-6">

                                                  <h2 style="color:white"> Contact Details </h2>
                                                 
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/phone.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3>{{$c->Doc_pNum}}</h3>

                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/email.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3 style="text-transform:lowercase">{{$c->Doc_email}}</h3>
                                                  <br><br>
                                                  <div style="float:left; margin-right:40px">
                                                        <img src="{{ asset('images/address.png') }}" style="width:25px ; height:25px;">
                                                  </div>
                                                  <h3 style="text-transform:capitalize">{{$c->Doc_addr}}</h3>
                                            
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