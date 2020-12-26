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

     <style>
      .tableFixHead {
          width:100%;
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
                    <a href="welcome" class="navbar-brand">Hospital</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patient <br>Details</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patients</a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll"><font color="red">Available <br>Time</font></a></li>
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
@elseif($msg=="The perticular time is already exist.")
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

@if($ro!="")
@php
$date=$ro->availableDate;
$time=$ro->availableTime;
@endphp
@else
@php
$date="";
$time="";
@endphp
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
                                             <form action="/saveavailable" method="post" class="wow fadeInUp">
                                             {{csrf_field()}} 
                                             <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
                                                  <div class="col-xs-3">

                                                       <label for="ex1">Date</label>
                                                       
                                                       <input class="form-control" type="date" name="date" value="{{$date}}"><br>
                                                       
                                                  </div>
                                                  <div class="col-xs-2">
                                                       <label for="ex1">Time</label>
                                                       <input class="form-control" type="time" name="time" value="{{$time}}"><br>
                                                  </div>
                                                  <div class="col-xs-2">
                                                       <br></br>     
                                                       <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Insert
                                                       </button>
                                                       <br></br>
                                                       <br></br>
                                                  </div>
                                                  
                                             </form>
                                             <br><br><br><br><br>
                                             
                                             <div class="tableFixHead">
                                        <table class="table table-hover" >
                                             <thead>
                                                  <tr>
                                                       <th>Available Date</th>
                                                       <th>Available Time</th>
                                                       <th></th>
                                                       <th></th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  @if(count($av)>0)
                                                  @foreach($av as $a)
                                                  <tr>
                                                       <td>{{$a->availableDate}}</td>
                                                       <td>{{$a->availableTime}}</td>
                                                       <td><a href="{{route('avedit',['id'=>$a->id,'docid'=>$c->Doc_id])}}" class="smoothScroll">Edit</a></td>
                                                       <td><a href="{{route('avdelete',['id'=>$a->id,'docid'=>$c->Doc_id])}}" class="smoothScroll">Delete</a></td>
                                                  </tr>
                                                  @endforeach
                                                  @else
                                                  <tr>
                                                       <td colspan="4"><h3 style=" color:black;text-align: center;">No available times found</h3></td>
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