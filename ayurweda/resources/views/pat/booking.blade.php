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
  background-color: #00BFFF;
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}



.link a:active {
 
  background-color: #00BFFF;
}
</style>
     
    
    
</head>
<body>


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
               <div >
               <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('pathome',$c->Pat_id)}}" class="smoothScroll">Home</a></li>
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll">State Medical Symptomps</a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll">Order Medicines</a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll"><font color="red">Online Booking</font></a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
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
                          
                          <div style="width:50%;" >
                              <br>
                             
                              
                         <div  style="width:100%; margin-left:40%; margin-right:20%;" >
                         <form action = "/appoint" method = "get">
                                   <input type = "hidden" value = "{{$c->Pat_id}}" name = "id">
                                   <button style="width:100%;" class = "btn btn-primary btn-lg" type="submit" >Get Appointment</button>
                         </form>
                         
                         <div >
                         
                         <h2 style="text-align:center; color:#ffffff;">Your appointment times</h2>
                         @if(count($t) > 0)
                         <table id="dtBasicExample" class="table table-striped table-bordered table-sm" style="background-color:white;color:black; width:100;">
                         <p style="color:#ffffff;"> 
                                        <thead style="overflow:fixed;">
                                             <tr>
                                             <th><b>Doctor</b></th>
                                             <th><b>Date</b></th>
                                             <th><b >Time</b></th> 
                                             <th><b>Cancel</b></th>
                                             </tr>
                                        </thead>
                                        <tbody  style="overflow:scrol;">
                                            
                                             @foreach($t as $apps)
                                             <tr>
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
                                                  <button style = "width:80%; margin:0 10% 0 10%" class="btn btn-danger btn-lg" disabled><b>You dont have Any future appoinments</b></button>
                                             @endif
                                            
                                        </tbody>
                                       
                         </div>          
                         </table>
                         <div class="link" style="width:30%;border-radius:10%; padding:5px; font-size:14px;">
                             <a> {{ $t->links() }}</a>
                         </div>
                        
                                   
                         </div>
                        
                         </div>
                        
                         <!--    -->
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
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


</body>
</html>