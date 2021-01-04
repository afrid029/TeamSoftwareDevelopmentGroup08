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
   
.link a:link{
  background-color: #00BFFF;
  
  text-align: center;
  text-decoration: none;
  display: inline-block;
  padding:8px;
  border-radius: 5px;
}
.link a:visited {
  background-color: #8B0000;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}



.link a:active {
 
  background-color: #8B0000;
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
               <a href="/welcome" class="navbar-brand">Hospital</a>
          </div>
           
          <!-- MENU LINKS -->
          <div style = "width:90%;" class="collapse navbar-collapse">
               <ul   class="nav navbar-nav navbar-nav-first">
                    <li><a href="{{route('pathome',$c->Pat_id)}}" class="smoothScroll">Home</a></li>
                    <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll">State Medical Symptoms</a></li>
                    <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll">Order Medicines</a></li>
                    <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll"> <font color="red">Online Booking</font></a></li>
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
          <div class="owl-theme">
               <div class="item item-first">
                    <div class="caption">
                         <div class="container">
                              <div  style="width:60%; margin-left:20%; margin-right:20%; margin-top:-5%;" >
                                        <form action = "/appoint" method = "get">
                                                  <input type = "hidden" value = "{{$c->Pat_id}}" name = "id">
                                                  <button style="width:76%; margin-left:12%; margin-right:12%;" class = "btn btn-primary btn-lg" type="submit" >Get Appointment</button>
                                        </form>
                              
                                   <div>
                                        <h2 style="text-align:center; color:#ffffff;">Your appointment times</h2>
                                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" style="background-color:white;color:black; width:100;">
                                        
                                             <thead style="background-color:#800000; color:white; text-align:center;overflow:fixed;">
                                                  <tr>
                                                       <th style="text-align:center;"><b>Appointment ID</b></th>
                                                       <th style="text-align:center;"><b>Doctor</b></th>
                                                       <th style="text-align:center;"><b>Date</b></th>
                                                       <th style="text-align:center;"><b >Time</b></th> 
                                                       <th style="text-align:center;"><b>Cancel</b></th>
                                                  </tr>
                                             </thead>
                                                  @if(count($t) > 0)
                                                       <tbody>
                                                            @foreach($t as $apps)
                                                                 <tr >
                                                                      <td  ><p style = "font-weight: bold;">{{$apps->App_id}}</p></td>
                                                                      <td><p>{{$apps->Doc_name}}</p></td>
                                                                      <td><p>{{$apps->availableDate}}</p></td>
                                                                      <td><p>{{$apps->availableTime}}</p></td>
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
                                                                 <td colspan="5"><h3 style=" color:black;text-align: center;">At the moment you don't have any appointment</h3></td>
                                                            </tr>
                                                  @endif
                                                       </tbody>

                                        </table>       
                                   </div>          
                                        
                                   <div class="link" style="width:30%;border-radius:10%; padding:5px; font-size:14px;">
                                        <a> {{ $t->links() }}</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>
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