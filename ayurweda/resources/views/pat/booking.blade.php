<!DOCTYPE html>
<html lang="en">
<head>
   
    
    <title>Online Booking</title>

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
   
.table-scroll{
  width:100%; 
  display: block;
 
  empty-cells: show;

  border-radius:1.5%;
  margin-top:2%;
  
  /* Decoration */

  
}
.table-scroll thead{
  background-color: darkred;  
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
  max-height: 48vh;
  
}
.small-col{flex-basis:10%;}
.btn-outline-danger:hover{
     color: white;
     background-color:darkred;
     border-color:grey;
}
.btn-outline-danger{
     color: darkred;
    border-color:darkred;
    
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
               <a href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa</a>
          </div>
           
          <!-- MENU LINKS -->
          <div style = "width:90%;" class="collapse navbar-collapse">
               <ul   class="nav navbar-nav navbar-nav-first">
                    <li style="margin-left:-120px"><a href="{{route('pathome',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll">Home</a></li>
                    <li style="margin-left:-50px"><a href="{{route('symp',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll">State Medical Symptoms</a></li>
                    <li><a href="{{route('order',$c->Pat_id)}}"  style="text-transform:capitalize" class="smoothScroll">Order Medicines</a></li>
                    <li><a href="{{route('book',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll"> <font color="red">Online Booking</font></a></li>
                    <li><a href="{{route('history',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll">Medical History</a></li>
               </ul>
               <div style=" width:8%; margin-left:2%;" class="nav navbar-nav navbar-right">
                    <li><a style="text-transform:capitalize" href="/logout">Logout</a></li>
               </div>
           </div>
     </div>
</section>

     


<!-- HOME -->
<section id="home"  class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class="owl-theme">
               <div  class="item item-first">
                    <div class="caption">
                         <div style="max-height:85%; width:80%; margin: 0% 10%; background-color:white; border-radius:0.5%;" class="container">
                              <div class="col-md-16">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:60%; float:left; margin-left:2%;"><h2>Your Appointment Times</h2></div>
                                                  <div class="table-title">
                                                       <div style="margin-top:2%; float:right; margin-right:2%;" >
                                                            <form action = "/appoint" method = "get">
                                                                 <input type = "hidden" value = "{{$c->Pat_id}}" name = "id">
                                                                 <button  class = "btn btn-primary btn-lg" type="submit" ><i class="fa fa-plus"></i>&nbsp;&nbsp;Get Appointment</button>
                                                            </form>
                                                       </div>
                                                  </div>
                                                  <table id="myTable" style="color:black; width:100%;" class="table table-bordered table-scroll">
                                                       <thead>
                                                            <tr>
                                                                 <th>Appointment ID </th>
                                                                 <th>Doctor</th>
                                                                 <th>Date</th>
                                                                 <th>Time</th>
                                                                 <th>Cancel</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody  class="body-half-screen">
                                                       @if(count($t) > 0)
                                                     
                                                       @foreach($t as $apps)
                                                            <tr >
                                                                 <td ><p><b>{{$apps->App_id}}</b></p></td>
                                                                 <td><p><b>{{$apps->Doc_name}}</b></p></td>
                                                                 <td><p><b>{{$apps->availableDate}}</b></p></td>
                                                                 <td><p><b>{{$apps->availableTime}}</b></p></td>
                                                                 <td>
                                                                      <form action="/deleteAppoint" method="get">
                                                                           @csrf
                                                                           <input type="hidden" name ="appid" value="{{$apps->App_id}}"/>
                                                                           <input type="hidden" name ="ptid" value="{{$c->Pat_id}}"/>
                                                                           <button class ="btn btn-primary btn-danger">Delete</button>
                                                                      </form>
                                                                 </td>
                                                            </tr>
                                                       @endforeach

                                                       @else
                                                            <tr>
                                                                 <td colspan="5"><h3 style=" color:black;text-align: center; text-transform:capitalize">At The Moment You Don't Have Any Appointment</h3></td>
                                                            </tr>
                                                       @endif
                                                       
                                                       </tbody>
                                             
                                                  </table>
                                                  <a style="flolat:right; font-size:20px; margin-top:-2%; margin-bottom:3px; font-weight:bold;" data-target="#doctors" data-toggle="modal" class = "btn btn-outline-danger fa fa-user-md ">&nbsp;&nbsp; Doctors</a>  
                                                  
                                             </div>
                                        </div>                                
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          <div>
     </div>
</section>
 <!--doctors modal-->
<div style = "overflow:scroll;margin-top:5%;" class="modal fade" id="doctors" tabindex="-1" role="dialog" aria-labelledby="doctors" aria-hidden="true">
     <div class="modal-dialog" role="dialog">
          <div class="modal-content"  style="width:90%; margin-left:5%; margin-right:5%;">
               <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Doctors Details</h4>
               </div>
               <div  class="modal-body">
                    <table id="myTable" class="table table-bordered table-scroll" style="color:black; width:100%;" >
                         <thead>
                              <tr>
                                   <th> Doctor Name</th>
                                   <th>View</th>
                              </tr>
                         </thead>

                         <tbody class="body-half-screen">
                         @if(count($dr))                                
                         @foreach($dr as $d)
                              <tr>
                                   <td>{{$d->Doc_name}}</td>
                                   <td><a href = "{{route('profview',['c'=>$d->Doc_id])}}" class = "btn btn-primary fa fa-eye">&nbsp;View</a></td>
                              </tr>
                         @endforeach
                         @else
                              <tr>
                                   <td colspan="8"><h3 style=" color:black;text-align: center; font-size:20px;">There Are No Doctors In Hospital</h3></td>
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


<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
     

@if($msg=session()->get('msg'))
@if($msg == "Appoinment is cancelled")
<script>
          Swal.fire({
               position: 'middle',
               icon: 'error',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 1500
          });
     </script>
@else
<script>
          Swal.fire({
               position: 'middle',
               icon: 'success',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 3000
          });
     </script>
@endif
@endif

    
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