<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Say Your Symptomps Here</title>
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
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    
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
                <ul class="nav navbar-nav navbar-nav-first">
                         <li style="margin-left:-120px"><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li style="margin-left:-50px"><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patient <br>Details</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patients</a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll">Available <br>Time</a></li>
                         <li><a href="{{route('docsymp',$c->Doc_id)}}" class="smoothScroll">Medical <br>Symptomps</a></li>
                         <li><a href="{{route('appointment',$c->Doc_id)}}" class="smoothScroll">Appointments</a></li>
                         
                </ul>
                   
                    <ul class="nav navbar-nav navbar-right">
                         <li><a  href="/logout">Logout</a></li>
                    </ul>
               </div>

          </div>
</section>
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

                    <div >
                         <div class="item item-first">


<script>
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

</script>
                        <div style = "overflow:scroll;margin-top:70px;" class="modal  show"  tabindex="-1" id = "myModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Symptomp</h5>
                                <h5 class="modal-title">Patient ID: {{$e->Pat_id}}</h5>
                                </div>
                                
                            <div class ="modal-body">
                                <p  style = "overflow:'visible';">{!! $e->text !!}</p>
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
                                @foreach(json_decode($e->img,true) as $image)
                                    <img src = "{{asset('upload/images')}}/{{$image}}" style="width:100px; height:200px"/>

                                @endforeach
                            @endif
                            </div>
                            <form action="/docreply" method="post" >
                            {{csrf_field()}}
                                        <input class="form-control" type="hidden" name="id" value="{{$e->id}}">
                                        <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}"><br>
                                        <div class ="modal-body">
                                        <textarea class="form-control" rows="4" cols="3"name="reply" placeholder="Reply....">{{$e->reply}}</textarea><br>
                                        <button type="submit" class="btn btn-danger bt-sm"   aria-label="Close">Reply</button><br><br>
                                        </div>
                                        
                            </form>
                            <div class="modal-footer">
                                <form action="{{route('docsymp',$c->Doc_id)}}" method="get" >
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