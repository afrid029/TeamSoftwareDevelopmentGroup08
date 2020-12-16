<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Say Your Symptomps Here</title>

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
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

     <style>
        #audio {
            
            height:25px;
            width: 70%;
        }
     </style>

    
</head>
<body>


<!-- MENU -->
<section style="padding-left:5%;" class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div style="width:100" class="container">

               <div style="margin-left:-8%; " class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="{{url('welcome')}}" class="navbar-brand">Hospital</a>
               </div>

               <!-- MENU LINKS -->
               <div style = "width:90%;" class="collapse navbar-collapse">
               <ul   class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('pathome',$c->Pat_id)}}" class="smoothScroll"><font color="red">Home</font></a></li>
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll">State Medical Symptoms</a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll">Order Medicines</a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll">Online Booking</a></li>
                         <li><a href="{{route('history',$c->Pat_id)}}" class="smoothScroll">Medical History</a></li>
                         
                    </ul>
                    <div style=" width:8%; margin-left:2%;" class="nav navbar-nav navbar-right">
                    <li><a href="/login">Logout</a></li>
                    </div>

                    
               </div>

          </div>
     </section>

<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div >
                         <div class="item item-first">


<script>
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

</script>
                    
                      <div style = "overflow:scroll;margin-top:5%;" class="modal  show"  tabindex="-1" id = "myModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="dialog">
                        <div class="modal-content" style="width:150%; margin-left:-25%; margin-right:-25%;">
                                <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">View Symptom</h4>
                                <h6 style="color:grey; float:right; margin-bottom:-2%; margin-top:-2%;">&nbsp; &nbsp; &nbsp; DATE: {{$e->date}}</h6>
                                <h6 style="color:grey; float:right; margin-bottom:-2%; margin-top:-2%; margin-right:20%;">Time: {{$e->time}}</h6>
                                
                                </div>
                                
                            <div class ="modal-body">
                                <h3 style="color:grey; float:left; ">To: <b>{{$e->Doc_id}}</b></h3>
                                
                                <br><p  style = "overflow:'visible';">{!! $e->text !!}</p>
                                @if($e->audio)
                                    <label >Audio:  </label>
                                <div>
                                <audio id="audio"  controls>
                                    <source style="height:10%" src="{{asset('upload/voicerecordings')}}/{{$e->audio}}">
                                    Browser doesn't support this audio file
                                </audio>
                                <br><br>
                                </div>
                                
                            @endif
                            @if($e->img)
                            <label >Image(s):  </label><br>
                                @foreach(json_decode($e->img,true) as $image)
                                    <img src = "{{asset('upload/images')}}/{{$image}}" style="width:100px; height:200px"/>

                                @endforeach
                            @endif
                            </div>

                            <div class="modal-footer">
                                <form action="{{route('symp',$c->Pat_id)}}" method="get" >
                                        <button type="submit" class="btn btn-danger bt-sm"   aria-label="Close">Close</button>
                                </form>
                            </div>
                                
                                
                                
                        </div>
                        </div>
                        </div>




                         </div>
                    </div>
          </div>
</section>


<!-- Modal-->


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