<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>View Profile</title>

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
     <link rel="stylesheet" href="{{ asset('css/admin.css')}}">
>
    
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
            <a href="/welcome" class="navbar-brand">Hospital</a>
        </div>

               <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-nav-first">
                <li><a href="{{route('adminpage',$c->id)}}" class="smoothScroll">Home</a></li>
                <li><a href="{{route('regist',$c->id)}}" class="smoothScroll">Registration</a></li>
                <li><a href="{{route('profit',$c->id)}}" class="smoothScroll">Profit</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="login">Logout</a></li>
            </ul>
        </div>

    </div>
</section>
<br><br>
<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="row">
        <div class="owl-theme">
            <div class="item item-first">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12">
                            <br><br><br><br>
                            <div class="col-md-6 col-sm-6">
                                <h3>Role: {{$rl}}</h3>
                                <div style="background-color:white; padding:1% 1% 1% 1%; border-radius:10px; height:208px; width:60%">
                                
                                    @if($d->image)
                                    <img class="img" src="{{asset('upload/docprof')}}/{{$d->image}}" style="  border-radius:30px; height:200px; width:200px;">
                                   
                                    @else
                                    <img class="img" src="{{ asset('images/user.jpg')}}" style="  border-radius:30px;  height:200px;width:200px; ">
                                     
                                    @endif
                                </div>
                                <br><br>
                                <div style="float:left; margin-right:15px">
                                    <img src="{{ asset('images/name_icon1.png') }}" style="width:34px ; height:34px; ">
                                </div>
                                <h3>{{$d->name}}</h3>
                                <p style="color:white; opacity:60%;"><strong>{{$d->id}}</strong></p>
                                 <br><br>
                            </div>
                                        
                            <div class="col-md-6 col-sm-6">
                                <h2 style="color:white"> Contact details </h2>
                                <div style="float:left; margin-right:40px">
                                    <img src="{{ asset('images/phone.png') }}" style="width:25px ; height:25px;">
                                </div>
                                <h3>{{$d->phone}}</h3>

                                <br><br>
                                <div style="float:left; margin-right:40px">
                                    <img src="{{ asset('images/email.png') }}" style="width:25px ; height:25px;">
                                </div>
                                <h3>{{$d->email}}</h3>
                                <br><br>
                                <div style="float:left; margin-right:40px">
                                    <img src="{{ asset('images/address.png') }}" style="width:25px ; height:25px;">
                                </div>
                                <h3>{{$d->address}}</h3>
                                            
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