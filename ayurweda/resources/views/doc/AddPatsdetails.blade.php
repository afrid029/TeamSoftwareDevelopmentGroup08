<!DOCTYPE html>
<html lang="en">
<head>

     <title>Admitted Patients Details</title>
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

     <style>
      .tableFixHead {
        overflow-y: auto;
        height:340px;
        
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
.table-scroll{
  width:100%; 
  display: block;
 
  empty-cells: show;

  border-radius:1.5%;
  margin-top:2%;
  
  /* Decoration */

  
}
.table-scroll thead{
  background-color: #2ea879;  
  position:relative;
  display: block;
  width:100%;
  color:white;
  
  overflow-y: scroll;
}
.table-scroll tbody{
     
  /* Position */
  display: block; position:relative;
  width:100%; overflow-y:scroll;
  /* Decoration */
  border-top: 4px solid rgba(128,128,128,0.3);
}
.table-scroll tr{
  width: 100%;
  display:flex;
  
}
.table-scroll td,.table-scroll th{
 
  width:100%;
  flex-grow:2;
  display: fixed;
  overflow:hidden;
  word-wrap: break-word;
  text-align:center;
}
/* Other options */
.table-scroll.small-first-col td:first-child,
.table-scroll.small-first-col th:first-child{
  flex-basis:100%;
  flex-grow:1;
}
.table-scroll tbody tr:nth-child(2n){
  background-color: rgba(255,240,245,0.4);
}
.body-half-screen{
  max-height: 50vh;
  
}
.small-col{flex-basis:10%;}
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
                    <a href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-nav-first">
                         <li style="margin-left:-120px"><a style = "text-transform:capitalize;" href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li style="margin-left:-50px"><a style = "text-transform:capitalize;" href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a style = "text-transform:capitalize;" href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll"><font color="red">Admitted <br>Patient <br>Details</font></a></li>
                         <li><a style = "text-transform:capitalize;" href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patients</a></li>
                         <li><a style = "text-transform:capitalize;" href="{{route('available',$c->Doc_id)}}" class="smoothScroll">Available <br>Time</a></li>
                         <li><a style = "text-transform:capitalize;" href="{{route('docsymp',$c->Doc_id)}}" class="smoothScroll">Medical <br>Symptoms</a></li>
                         <li><a style = "text-transform:capitalize;" href="{{route('appointment',$c->Doc_id)}}" class="smoothScroll">Appointments</a></li>
                         
                        </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a style = "text-transform:capitalize;" href="/logout">Logout</a></li>
                    </ul>
               </div>

          </div>
     </section>
@if($msg=session()->get('msg'))
@if($msg=="Patient Admitted Successfully." || $msg=="Patient Was Discharged")
<script>
Swal.fire({
  position: 'middle',
  icon: 'success',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 2500
});
</script>
@elseif($msg=="The Patient Doesn't Exist.")
<script>
Swal.fire({
  position: 'middle',
  icon: 'error',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 2500
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
               timer: 4000
            
          });
     </script>
@endif
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Admit A Patient</h5>
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

                    <div class="owl-theme">
                    <div class="item item-first">
                              <div class="caption">
                                   <div style="height:78%; width:88%; margin: -12% 6% -10% 6%; background-color:rgba(255,255,255,0.5); border-radius:0.5%;" class="container">
                                   <br>
                                   <h2 style="color:#333333; width:96%; margin: 0 2%;text-align:center;">Admit New Patients</h2>
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
                                                            Admit a Patient
                                             </button>
                                             </div>
                                            <br><br>
                                            <div class="tableFixHead">
                                        <table>
                                        
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
                                                       <td style="text-transform:capitalize">{{$a->Pat_id}}</td>
                                                       <td style="text-transform:capitalize">{{$a->Doc_id}}</td>
                                                       <td>{{$a->ad_date}}</td>
                                                       <td style="text-transform:capitalize">{{$a->disease}}</td>
                                                       <td style="text-transform:capitalize">{{$a->bedno}}</td>
                                                       @if($a->status=="Admitted")
                                                       <td style="text-transform:capitalize"><a href="{{route('discharge',['c'=>$a->id,'d'=>$c->Doc_id])}}" class = "btn btn-danger btn-sm">Discharge</a></td>
                                                       @else
                                                       <td style="text-transform:capitalize">{{$a->status}}</td>
                                                       @endif
                                                       <td >{{$a->disch_date}}</td>
                                                  </tr>
                                                  @endforeach
                                                  @else
                                                  <tr>
                                                       <td style="text-transform:capitalize" colspan="7"><h3 style="text-transform:capitalize; color:black;text-align: center;">No Patients Found</h3></td>
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