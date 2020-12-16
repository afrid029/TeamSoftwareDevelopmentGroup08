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

     <style>
      .tableFixHead {
        overflow-y: auto;
        height: 200px;
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      th {
        background: gray;
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
                    <a href="welcome" class="navbar-brand">Hospital </a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll"><font color="red">Prescriptions</font></a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patient <br>Details</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patients</a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll">Available <br>Time</a></li>
                         <li><a href="{{route('docsymp',$c->Doc_id)}}" class="smoothScroll">Medical <br>Symptomps</a></li>
                         <li><a href="{{route('appointment',$c->Doc_id)}}" class="smoothScroll">Appointments</a></li>
                         
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
               </div>

          </div>
     </section>
@if($msg=="Prescription added successfully")
<script>
Swal.fire({
  position: 'middle',
  icon: 'success',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 1500
});
</script>
@elseif($msg=="The patient doesn't exist.")
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

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add a prescription</h5>
          
          </div>
          <form method="post" action="/savepres" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
          <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
          <input class="form-control" type="text" name="patientid" placeholder="Patient ID"><br>
          <input class="form-control" type="text" name="disease" placeholder="Disease"><br>
          <textarea class="form-control" rows="3" cols="3"name="diagnosis" placeholder="Diagnosis"></textarea><br>
          <textarea class="form-control" rows="3" cols="3" name="medicine" placeholder="Medicine"></textarea><br>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               Prescript Medicine
          </button>
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
     </div>
     </div>
     </div>

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="owl-carousel owl-theme">
                    <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                                        
                                        <br></br>
                                   
                                        <div class="col-md-8 col-sm-12">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                       Add a prescription
                                        </button><br><br><br></br>
                                             
                                             
                                             <form action="/pressearch" method="post">
                                             {{csrf_field()}}
                                                  <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
                                                  <input style="color:black" type="text" placeholder="Patient ID" name="patid">
                                                  <input style="color:black" type="text" placeholder="Date" name="date">
                                                  <button type="submit"><i class="fa fa-search"></i></button>
                                             </form>
                                             
                                             <br><br>
                                             <div class="tableFixHead">
                                        <table class="table">
                                        
                                             <thead>
                                                  <tr>
                                                       <th>Meeting ID</th>
                                                       <th>Patient ID</th>
                                                       <th>Doctor ID</th>
                                                       <th>Date</th>
                                                       <th>Disease</th>
                                                       <th>Diagnosis</th>
                                                       <th>Medicine</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  @if(count($pres) > 0)
                                                  @foreach($pres as $pr)
                                                  <tr>
                                                       <td>{{$pr->Meeting_id}}</td>
                                                       <td>{{$pr->Pat_id}}</td>
                                                       <td>{{$pr->Doc_id}}</td>
                                                       <td>{{$pr->created_at}}</td>
                                                       <td>{{$pr->disease}}</td>
                                                       <td>{{$pr->diagnosis}}</td>
                                                       <td>{{$pr->medicine}}</td>
                                                  </tr>
                                                  @endforeach
                                                  @else
                                                  <tr>
                                                       <td colspan="7"><h3 style=" color:black;text-align: center;">No prescriptions found</h3></td>
                                                  </tr>
                                                  @endif
                                             </tbody>
                                        
                                        </table>
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