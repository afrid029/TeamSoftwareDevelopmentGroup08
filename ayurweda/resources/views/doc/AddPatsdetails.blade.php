<!DOCTYPE html>
<html lang="en">
<head>

     <title>Admitted Patients Details</title>

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
        height: 340px;
        
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      table {
    border-collapse: collapse;
    margin-bottom: 3em;
    width: 100%;
    background: #fff;
}
td, th {
    padding: 0.75em 1.5em;
    text-align: left;
}
	td {
		color: gray;
		line-height: 1;
	}
th {
    background-color: #31bc86;
    font-weight: bold;
    color: #fff;
    white-space: nowrap;
}
tbody th {
	background-color: #2ea879;
}
tbody tr:nth-child(2n-1) {
    background-color: #f5f5f5;
    transition: all .125s ease-in-out;
}
tbody tr:hover {
    background-color: rgba(129,208,177,.3);
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
                    <a href="welcome" class="navbar-brand">Hospital</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll"><font color="red">Admitted <br>Patient <br>Details</font></a></li>
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
@if($msg=session()->get('msg'))
@if($msg=="Patient admitted successfully." || $msg=="Patient was discharged")
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
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Admit a patient</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <form method="post" action="/patadmit" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
               <input type="text" name="patid" class="form-control" placeholder="Patient ID" value=""><br>
               <input type="text" name="disease" class="form-control" placeholder="Disease" value=""><br>
               <input type="text" name="bedno" class="form-control" placeholder="Bed No" value=""><br>
               <input type="hidden" name="docid" class="form-control" value="{{$c->Doc_id}}"><br>
               <button type="submit" class="btn btn-primary">Insert</button>
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

                    <div class="">
                    <div class="item item-first">
                              <div class="caption">
                                   <div style="height:70%; width:88%; margin: -12% 6% -10% 6%; background-color:rgba(255,255,255,0.5); border-radius:0.5%;" class="container">
                                   <br>
                                        <div class="">
                                             <div style="float:left;">
                                            <form action="/admitsearch" method="post" style="margin:auto;width:700px">
                                            {{csrf_field()}}
                                                  <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
                                                  <div style="float:left;"><input class="form-control" type="text" placeholder="Patient ID" name="patid"></div>
                                                  <div style="float:left;"><input class="form-control" type="date" placeholder="Date" name="date"></div>
                                                  <div style="float:left;"><button class="form-control" type="submit"><i class="fa fa-search"></i></button></div>
                                            </form>
                                            </div>
                                            <div style="float:right;">
                                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Admit a patient
                                             </button>
                                             </div>
                                            <br></br>
                                            <div class="tableFixHead">

                                        <table class="table">
                                        
                                             <thead>
                                                  <tr>
                                                       <th>Patient ID</th>
                                                       <th>Doctor ID</th>
                                                       <th>Admitted Date</th>
                                                       <th>Disease</th>
                                                       <th>Bed Number</th>
                                                       <th>Status</th>
                                                       <th>Discharge Date</th>
                                                       
                                                  </tr>
                                             </thead>
                                             @if($ad1=session()->get('ad1'))
                                             <?php $adp=$ad1; ?>
                                             @else
                                             <?php $adp=$ad; ?>
                                             @endif
                                             <tbody>
                                                  @if(count($adp) > 0)
                                                  @foreach($adp as $a)
                                                  <tr>
                                                       <td>{{$a->Pat_id}}</td>
                                                       <td>{{$a->Doc_id}}</td>
                                                       <td>{{$a->ad_date}}</td>
                                                       <td>{{$a->disease}}</td>
                                                       <td>{{$a->bedno}}</td>
                                                       @if($a->status=="Admitted")
                                                       <td><a href="{{route('discharge',$a->id)}}" class = "btn btn-danger btn-sm">Discharge</a></td>
                                                       @else
                                                       <td>{{$a->status}}</td>
                                                       @endif
                                                       <td>{{$a->disch_date}}</td>
                                                  </tr>
                                                  @endforeach
                                                  @else
                                                  <tr>
                                                       <td colspan="6"><h3 style=" color:black;text-align: center;">No patients found</h3></td>
                                                  </tr>
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