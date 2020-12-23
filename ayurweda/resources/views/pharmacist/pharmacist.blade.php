<!DOCTYPE html>
<html lang="en">
<head>

     <title>Pharmacist</title>

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
     <link rel="stylesheet" href="{{ asset('css/pharmacist.CSS')}}">
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
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
@if($errors->any())
     <script> var a=""; </script>
     @foreach($errors->all() as $err)
  
     <script>
          a = a + "*{{$err}}\n";
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
@if($msg=session()->get('msg'))
 @if($msg == "Profile Successfully Updated")
     <script>
          Swal.fire({
               position: 'middle',
               icon: 'success',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 2300
          });
     </script>
     
     
@elseif($msg == "Old password is wrong")
     <script>
          Swal.fire({
               position: 'middle',
               icon: 'error',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 2000
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

     

     <!-- MENU -->
<section style="background-color:white; height:10%;" class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>

               <!-- lOGO TEXT HERE -->
               <a style= "color:black;" href="/welcome" class="navbar-brand">Hospital</a>
          </div>

          <!-- MENU LINKS -->
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                    <li><a style= "color:black;" href="{{route('phahome',$c->Phar_id)}}" class="smoothScroll"><font color="red">Home</font></a></li>
                    <li><a style= "color:black;" href="{{route('medicalstock',$c->Phar_id)}}" class="smoothScroll">Maintain medical stock</a></li>
                    <li><a style= "color:black;" href="{{route('issueMedicine',$c->Phar_id)}}" class="smoothScroll">Issue medicine</a></li>
                    <li><a style= "color:black;" href="{{route('phaordermedicine',$c->Phar_id)}}" class="smoothScroll">Order medicine</a></li>
                         
               </ul>

               <ul class="nav navbar-nav navbar-right">
                    <li><a style= "color:black;" href="/login">Logout</a></li>
               </ul>
          </div>
     </div>
</section>

     

<!-- Modal 1-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
               </div>
               <div class="modal-body">
                    <form method="post" action="/phaedit">
                         {{csrf_field()}}
                         <input type="text" name="name" class="form-control" placeholder="Name" value="{{$c->Phar_name}}"><br>
                         <input type="text" name="address" class="form-control" placeholder="Address" value="{{$c->Phar_addr}}"><br>
                         <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{$c->Phar_pNum}}"><br>
                         <input type="password" name="opassword" class="form-control" placeholder="Old Password"><br>
                         <input type="password" name="npassword" class="form-control" placeholder="New Password / Repeat Old Password"><br>
                         <input type="hidden" name="id" class="form-control" value="{{$c->Phar_id}}"><br>
                         <button type="submit" class="btn btn-primary">Update</button>
                    </form>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
          </div>
     </div>
</div>

<!-- Modal 2--> 
<div style ="width:40%; margin-left:30%; margin-right:30%; margin-top:5%;" class = "modal fade" id = "profile" role = "dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role = "dialog">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title">Upload Profile Picture</h5>
               </div>
                    <form action="{{ route ('pharprofilepic', ['c'=>$c->Phar_id]) }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('patch')
                         <div style ="margin:20px 40px 0 40px" class="custom-file-container" data-upload-id="myUniqueUploadId">
                              <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"> </a>
                              <label class="custom-file-container__custom-file">
                              <input  type="file" name = "profile" class="custom-file-container__custom-file__custom-file-input" accept="image/*"  aria-label="Choose File">
                                   <span  class="custom-file-container__custom-file__custom-file-control"></span>
                              </label>

                              <div style="width:50%; height:150px; margin-left:15%" class="custom-file-container__image-preview">
                              </div>
                         </div>
                              <script>
                                   var upload = new FileUploadWithPreview('myUniqueUploadId')
                              </script>
                         <button style ="margin-left:35%; margin-top:-30px" type="submit" class="btn btn-success"><b>UPLOAD</b></button>
                    </form>
                    <div  class="modal-footer">
                          <button style="margin-right:12%;" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>

          </div>
     </div>
</div>



     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">
               <div class=" owl-theme">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-8 col-sm-12">
                                   <br><br><br><br>
                                        <div class="col-md-6 col-sm-6">
                                        <div style="background-color:white; padding:1% 1% 1% 1%; border-radius:10px; height:235px; width:50%">
                                             
                                             @if($c->PImage)
                                                  <img class="img" src="{{asset('upload/profile')}}/{{$c->PImage}}" style="padding-left:1%;  border-radius:30px; width:99%; height:230px; ">
                                                  <button style="border-radius:20px;" href = "#profile" data-toggle = "modal" class = "btn btn-dark btn-sm fa fa-camera"><b> Change Profile</b></button>
                                             @else
                                                  <img class="img" src="{{ asset('images/pharmacistProfile.jpg')}}" style="width:98% ; height:230px; ">
                                                  <button style="border-radius:20px;" href = "#profile" data-toggle = "modal" class = "btn btn-dark btn-sm fa fa-camera"><b> Change Profile</b></button>
                                             @endif
                                        </div>
                                        <br><br>
                                        <div style="float:left; margin-right:15px">
                                             <img src="{{ asset('images/name_icon1.png') }}" style="width:34px ; height:34px; ">
                                        </div>
                                        <div>
                                             <h3>{{$c->Phar_name}}</h3>
                                             <p style="color:white; opacity:60%;"><strong>{{$c->Phar_id}}</strong></p>
                                        </div>
                                        <br><br>
                                        <button style="margin-top:-4%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                             Edit Profile
                                        </button>
                                   </div>
                                   <div class="col-md-6 col-sm-6">
                                        <h2 style="color:white"> Contact details </h2>
                                        <div style="float:left; margin-right:40px">
                                             <img src="{{ asset('images/phone.png') }}" style="width:25px ; height:25px;">
                                        </div>
                                        <h3>{{$c->Phar_pNum}}</h3>
                                        <br><br>
                                        <div style="float:left; margin-right:40px">
                                             <img src="{{ asset('images/address.png') }}" style="width:25px ; height:25px;">
                                        </div>
                                        <h3>{{$c->Phar_addr}}</h3>
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