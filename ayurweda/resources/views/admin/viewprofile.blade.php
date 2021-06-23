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
    
</head>
<body>
    <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>
      
<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">


    <div class="row">
        <div class="owl-theme">
            <div class="item item-first">
           
                <div class="caption"> 
                
                    <div class="container">
                       <div class="col-md-8 col-sm-12"> 
                         <a style="margin-left:3%; font-size:20px;" href = "{{ URL::previous() }}" class= "btn btn-primary fa fa-arrow-circle-left">&nbsp;&nbsp;Back</a><br><br>
                   
                            
                            <div class="col-md-6 col-sm-6">
                           
                                <h3 style="text-transform:capitalize">Role: {{$rl}}</h3>
                                <div style="background-color:white; padding:1% 1% 1% 1%; border-radius:10px; height:208px; width:50%">
                                
                                    @if($d->image)
                                    <img class="img" src="{{asset('upload/profile')}}/{{$d->image}}" style="  border-radius:30px; height:200px; width:100%;">
                                   
                                    @else
                                    <img class="img" src="{{ asset('images/user.jpg')}}" style="  border-radius:30px;  height:200px;width:100%; ">
                                     
                                    @endif
                                </div>
                                <br><br>
                                <div style="float:left; margin-right:15px">
                                    <img src="{{ asset('images/name_icon1.png') }}" style="width:34px ; height:34px; ">
                                </div>
                                <h3 style="text-transform:capitalize">{{$d->name}}</h3>
                                <p style="color:white; opacity:60%;"><strong>{{$d->id}}</strong></p>
                                 <br><br>
                            </div>
                                        
                            <div class="col-md-6 col-sm-6">
                                <h2 style="color:white"> Contact Details </h2>
                                 @if($age)
                                    <div style="float:left; margin-right:40px">
                                             <img src="{{ asset('images/age.png') }}" style="width:25px ; height:25px;">
                                        </div>
                                        <h3>{{$age}} </h3>
                                       
                                        <br><br>
                                @endif
                                <div style="float:left; margin-right:40px">
                                    <img src="{{ asset('images/phone.png') }}" style="width:25px ; height:25px;">
                                </div>
                               
                                <h3>{{$d->phone}}</h3>

                                <br><br>
                                <div style="float:left; margin-right:40px">
                                    <img src="{{ asset('images/email.png') }}" style="width:25px ; height:25px;">
                                </div>
                                <h3 style="text-transform:lowercase">{{$d->email}}</h3>
                                <br><br>
                                <div style="float:left; margin-right:40px">
                                    <img src="{{ asset('images/address.png') }}" style="width:25px ; height:25px;">
                                </div>
                                <h3 style="text-transform:capitalize">{{$d->address}}</h3>
                                            
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