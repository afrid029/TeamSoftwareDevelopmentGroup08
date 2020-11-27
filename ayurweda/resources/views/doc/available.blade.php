<!DOCTYPE html>
<html lang="en">
<head>

     <title>Available Times</title>

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
                         <li><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted Patients</a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll"><font color="red">Available Time</font></a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
               </div>

          </div>
     </section>
@if($msg=="Wrong password or username")
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
                                        <h3>Doctor ID <span class="label label-default">Doc123@</span></h3>
                                        <div class="col-md-8 col-sm-12">
                                             
                                             <br><br>
                                             <br><br>
                                             <form action="/saveuser" method="post" class="wow fadeInUp">
                                             {{csrf_field()}} 
                                                  <div class="col-xs-3">
                                              
                                                       <label for="ex1">Date</label>
                                                       <input class="form-control" type="date" name="date" ><br>
                                                       
                                                  </div>
                                                  <div class="col-xs-2">
                                                       <label for="ex1">Time</label>
                                                       <input class="form-control" type="time" name="time" ><br>
                                                  </div>
                                                  <div class="col-xs-2">
                                                       <br></br>     
                                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Insert
                                                       </button>
                                                       <br></br>
                                                       <br></br>
                                                  </div>
                                                  
                                             </form>
                                        </div>
                                        <table class="table table-hover" >
                                             <thead>
                                                  <tr>
                                                       <th>Available Date</th>
                                                       <th>Available Time</th>
                                                       <th></th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td></td>
                                                       <td></td>
                                                       <td>
                                                       <button type="button" class="btn btn-link">Edit</button>
                                                       <button type="button" class="btn btn-link">Delete</button>
                                                       </td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                        
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