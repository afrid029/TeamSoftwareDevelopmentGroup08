<!DOCTYPE html>
<html lang="en">
<head>

     <title>Admitted Patients</title>
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
.btn-outline-danger:hover{
     color: #31bc86;
     background-color:white;
     border-color:grey;
}
.btn-outline-danger{
     color: white;
    border-color:white;
    
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
 
  width:10%;
  flex-grow:2;
  display: block;
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
  max-height: 60vh;
  
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
                         <li style="margin-left:-120px"><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li style="margin-left:-50px"><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patient <br>Details</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patients</a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll">Available <br>Time</a></li>
                         <li><a href="{{route('docsymp',$c->Doc_id)}}" class="smoothScroll">Medical <br>Symptoms</a></li>
                         <li><a href="{{route('appointment',$c->Doc_id)}}" class="smoothScroll"><font color="red">Appointments</font></a></li>
                         
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a  href="/logout">Logout</a></li>
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
     @endif
     @endif

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="">
                         <div class="item item-first">
                              <div class="caption">
                                   <div style="height:78%; width:88%; margin: -12% 6% -10% 6%; background-color:rgba(255,255,255,0.5); border-radius:0.5%;" class="container">
                                        
                                        <br>
                                        <h2 style="color:#333333; width:96%; margin: 0 2%;text-align:center;">Your Appointments</h2>
                                       <div class="">
                                              
                                        <div style="float:left;">
                                        <p style="font-size:20px; text-transform:capitalize; color:white;float:left;">No. of appointments today:<span class="label label-default">{{$na}}</span><p>
                                        </div>
                                        <div style=" color:gray; float:right;">
                                        <input style="margin-left:-40%;float:left;" class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Date" title="Type ID">
                                        <a style="float:right; font-size:20px;  margin-bottom:3px; font-weight:bold;" data-target="#patients" data-toggle="modal" class = "btn btn-outline-danger fa fa-user">&nbsp;&nbsp; Patients</a>
                                        
                                        </div>
                                             
                                        <br><br>
                                            
                                              <div class="tableFixHead">
                                        <table class="table" id="myTable">
                                        
                                             <thead style="position: sticky;top: 0;">
                                                  <tr>
                                                       <th>Appointment ID</th>
                                                       <th>Patient Name</th>
                                                       <th>Date</th>
                                                       <th>Time</th>
                                                  </tr>
                                             </thead>
                                             @if($ad1=session()->get('ad1'))
                                             <?php $adp=$ad1; ?>
                                             @else
                                             <?php $adp=$ad; ?>
                                             @endif
                                             <tbody>
                                                  @if(count($adp)>0)
                                                  @foreach($adp as $a)
                                                  <tr>
                                                       <td style="text-transform:capitalize">{{$a->App_id}}</td>
                                                       <td style="text-transform:capitalize">{{$a->name}}</td>
                                                       <td>{{$a->availableDate}}</td>
                                                       <td>{{$a->availableTime}}</td>
                                                  </tr>
                                                  @endforeach
                                                  @else
                                                  <tr>
                                                       <td style="text-transform:capitalize" colspan="7"><h3 style=" color:black;text-align: center;">No appointments found</h3></td>
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
 <!--Patients modal-->
                              <div class="modal fade" id="patients" tabindex="-1" role="dialog" aria-labelledby="doctors" aria-hidden="true">
                                   <div class="modal-dialog" role="dialog">
                                        <div class="modal-content"  style="width:90%; margin-left:5%; margin-right:5%;">
                                             <div class="modal-header">
                                                  <h4 class="modal-title" id="exampleModalLabel">Patients Details</h4>
                                                 
                                             </div>
                                             <div  class="modal-body">
                                                     <table id="myTable" class="table table-bordered table-scroll" style="color:black; width:100%;" >
                                                            <thead>
                                                                 <tr>
                                                                      <th>Patient Name</th>
                                                                      <th>View</th>
                                                                      
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                            @if(count($pa))
                                                            
                                                            @foreach($pa as $d)
                                                                 <tr>
                                                                      <td style="text-transform:capitalize">{{$d->Pat_name}}</td>
                                                                      <td style="text-transform:capitalize"a href = "{{route('profview',['c'=>$d->Pat_id])}}" class = "btn btn-primary fa fa-eye">&nbsp;View</a></td>
                                                                      
                                                                 </tr>
                                                       
                                                            @endforeach
                                                            @else
                                                                 <tr>
                                                                      <td colspan="8"><h3 style=" color:black;text-align: center; font-size:20px;">There Are No Patients</h3></td>
                                                                 </tr>
                                                            @endif        
                                                            </tbody>
                                                       </table>             
                                             </div>
                                             <div class="modal-footer">
                                             <button style = "float:right; " type="button" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">Close</button>        
                                             </div>
                                        </div>
                                   </div>
                              </div>

                              <script>
    function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
               td = tr[i].getElementsByTagName("td")[2];
               if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    } else {
                    tr[i].style.display = "none";
                    }
               }       
          }
     }

     
     </script>                            

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