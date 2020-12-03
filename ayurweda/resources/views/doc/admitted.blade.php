<!DOCTYPE html>
<html lang="en">
<head>

     <title>Admitted Patients</title>

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
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll"><font color="red">Admitted Patients</font></a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll">Available Time</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
               </div>

          </div>
     </section>
     @if($msg=="Inserted successfully.")
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

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="owl-carousel owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                                        <h3>Doctor ID <span class="label label-default">{{$c->Doc_id}}</span></h3>
                                        <ul class="nav navbar-nav navbar-right">
                                             <h3>Date<span class="label label-default">{{date("Y-m-d")}}</span></h3>
                                        </ul><br>
                                        <ul class="nav navbar-nav navbar-right">
                                             <h3>Time<span class="label label-default">{{date("h:i:sa")}}</span></h3>
                                        </ul>
                                        <br></br>
                                   
                                        <div class="col-md-8 col-sm-12">
                                             
                                             <form action="/saveadmit" method="post" class="wow fadeInUp">
                                             {{csrf_field()}} 
                                                  <div class="col-md-6 col-sm-6">
                                                  <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
                                                       <h3>Patient ID</h3>
                                                       <input class="form-control" type="text" name="patientid" ><br>
                                                       <h3>Medicine</h3>
                                                       <textarea class="form-control" rows="4" cols="3"name="medicine"></textarea><br>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6">
                                                       
                                                       <h3>Condition</h3>
                                                       
                                                       <textarea class="form-control" name="condition" rows="4" cols="3"></textarea>
                                                       <br></br>
                                                       <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Insert
                                                       </button>
                                                       <br></br>
                                                       <br></br>
                                                  </div>
                                             </form>
                                             <form action="/adsearch" method="post" style="margin:auto;width:700px">
                                             {{csrf_field()}}
                                                  <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
                                                  <input style="color:black" type="text" placeholder="Patient ID" name="patid">
                                                  <input style="color:black" type="text" placeholder="Date" name="date">
                                                  <button type="submit"><i class="fa fa-search"></i></button>
                                             </form>
                                             <br></br>

                                             <div style="position:relative;height:200px;overflow:auto;display:block;">
                                        <table class="table table-bordered" >
                                        
                                             <thead>
                                                  <tr>
                                                       <th>Patient ID</th>
                                                       <th>Doctor ID</th>
                                                       <th>Date</th>
                                                       <th>Medicine</th>
                                                       <th>Condition</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  @if($ad!="")
                                                  @foreach($ad as $a)
                                                  <tr>
                                                       <td>{{$a->Pat_id}}</td>
                                                       <td>{{$a->Doc_id}}</td>
                                                       <td>{{$a->created_at}}</td>
                                                       <td>{{$a->medicines}}</td>
                                                       <td>{{$a->condition}}</td>
                                                  </tr>
                                                  @endforeach
                                                  @endif
                                                  
                                             </tbody>
                                        
                                        </table>
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