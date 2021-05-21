<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Appointment</title>

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
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
     
     <style>
   
   .table-scroll{
  /*width:100%; */
  display: block;
  empty-cells: show;
  
  /* Decoration */
  border-spacing: 0;
  border: 1px solid;
}
.table-scroll thead{
  background-color: #ADD8E6;  
  position:relative;
  display: block;
  width:100%;
  overflow-y: scroll;
}
.table-scroll tbody{
  /* Position */
  display: block; position:relative;
  width:100%; overflow-y:scroll;
  /* Decoration */
  border-top: 1px solid rgba(0,0,0,0.2);
}
.table-scroll tr{
  width: 100%;
  display:flex;
}
.table-scroll td,.table-scroll th{
  flex-basis:100%;
  flex-grow:2;
  display: block;
  overflow:hidden;
  word-wrap: break-word;
  padding: 1rem;
  text-align:left;
}
/* Other options */
.table-scroll.small-first-col td:first-child,
.table-scroll.small-first-col th:first-child{
  flex-basis:20%;
  flex-grow:1;
}
.table-scroll tbody tr:nth-child(2n){
  background-color: rgba(130,130,170,0.1);
}
.body-half-screen{
  max-height: 50vh;
}
.small-col{flex-basis:10%;}
   </style>
    
</head>
<body>


<!-- MENU -->
   <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>
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
                         <li><a href="{{route('order',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll">Order Medicines</a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll"><font color="red">Online Booking</font></a></li>
                         <li><a href="{{route('history',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll">Medical History</a></li>
                         
                    </ul>
                    <div style=" width:8%; margin-left:2%;" class="nav navbar-nav navbar-right">
                    <li><a style="text-transform:capitalize" href="/logout">Logout</a></li>
                    </div>

                    
               </div>

          </div>
     </section>


<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div>
               <div class="item item-first">


<script>
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

</script>
                    <div  style = "margin-top:50px; margin-bottom:0.01px;" class="modal  show"  tabindex="-1" id = "myModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Book A Doctor</h5>
                                   </div>
                                
                                   <div class ="modal-body">
                                        <div style= "width:100%;" class="form-group">

                                             <form action="/showAvail" method="get">
                                                  @csrf
                                                  <select  class="form-control" name = "dr" style = "width:30%; float:left;">
                                                       
                                                       <option value="none" selected disabled hidden> 
                                                            Select A Doctor
                                                       </option> 
                                                       @if($dr)
                                                       @foreach($dr as $a)
                                                            <optgroup style="font-size:12px;" label = "{{$a->Doc_name}}">
                                                                 <option style="font-size:10px;">{{$a->Doc_id}}</option>
                                                            </optgroup>
                                                       @endforeach
                                                       @endif
                                                  </select>
                                                  <input type = "hidden" name = "patid" value = "{{$c->Pat_id}}"/>
                                                  <button style="float : right; width:20%; margin-left:4%;margin-right:5%;" type = "submit" class = "btn btn-info" value = "Search">Search</button>
                                                  <div style = " float:right; width:30%;">
                                                       <input  class="form-control"  type ="date" name="date" value="{{$date ?? ''}}"/>
                                                  </div> 
                                                  
                                             </form>
                                        </div><br>
                                        <div class="p-3 mb-2 bg-info text-white">
                                             <table class="table table-bordered table-scroll" style="background-color:#ffffff; color:black">
                                                  <thead>
                                                       <tr>
                                                            <th>Doctor ID</th>
                                                            <th>Available Date</th>
                                                            <th>Available Time</th>
                                                            <th>Booking</th> 
                                                       </tr>
                                                  </thead>
                                                  <tbody class="body-half-screen">
                                                  @if(count($t) > 0)
                                                       @foreach($t as $time)
                                                            <tr>
                                                                 <td style = "text-transform:capitalize;">{{$time->Doc_id}}</td>
                                                                 <td>{{$time->availableDate}}</td>
                                                                 <td>{{$time->availableTime}}</td>
                                                                 <td>
                                                                      <form action = "/confirmAppoinment" method="post">
                                                                      @csrf
                                                                           <input  type = "hidden" name = "pid" value = "{{$c->Pat_id}}">
                                                                           <input type = "hidden" name = "did" value = "{{$time->Doc_id}}">
                                                                           <input type = "hidden" name = "tm" value = "{{$time->availableTime}}">
                                                                           <input type = "hidden" name = "dt" value = "{{$time->availableDate}}">
                                                                           <button type="submit" class="btn btn-success">Appoint</button>
                                                                      </form>   
                                                                 </td>
                                                            </tr>
                                                       @endforeach
                                                  @else
                                                  <tr>
                                                       <td colspan="4"><h3  style=" color:black;text-align: center; text-transform:capitalize">No Doctors Available. Search Another</h3></td>
                                                  </tr>
                                                  @endif                    
                                                  </tbody>
          
                                             </table>
                                        </div>

                                        <div style = "height:35px; padding-top:8px;"  class="modal-footer">
                                             <form action="{{route('book',$c->Pat_id)}}" method="get" >
                                                  <button type="submit" class="btn btn-secondary btn-danger bt-sm"   aria-label="Close">Close</button>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                        </div>
                    </div>
               </div>
          </div>
</section>


<!-- Modal-->


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