<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Medical History</title>

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
 
  width:10%;
  flex-grow:2;
  display: block;
  
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
    
  max-height: 55vh;
  
}
.small-col{flex-basis:10%;}

 
   </style>
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
                         <li style="margin-left:-100px"><a href="{{route('pathome',$c->Pat_id)}}" class="smoothScroll">Home</a></li>
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll">State Medical Symptoms</a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll">Order Medicines</a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll">Online Booking</a></li>
                         <li><a href="{{route('history',$c->Pat_id)}}" class="smoothScroll"><font color="red">Medical History</font></a></li>
                         
                    </ul>
                    <div style=" width:8%; margin-left:2%;" class="nav navbar-nav navbar-right">
                    <li><a  href="/logout">Logout</a></li>
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
                         <div style="max-height:85%; width:66%; margin: 0% 17% 0 17%; background-color:white; border-radius:0.5%;" class="container">
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                   <div style="width:60%; float:left; margin-left:2%;"><h2>Your Medical Histories</h2></div>
                                                   <table id="myTable" style="color:black; width:100%;" class="table table-bordered table-scroll">
                                                        <thead>
                                                            <tr>
                                                                <th>Meeting ID </th>
                                                                <th>Date</th>
                                                                <th>View</th>
                                                                      
                                                            </tr>
                                                        </thead>
                                                        <tbody  class="body-half-screen">
                                                        @if(count($hist) > 0)
                                                        <?php $n = 1; ?>
                                                        @foreach($hist as $history)
                                                            <tr>
                                                                <td><p><b>{{$history->Meeting_id}}</b></p></td>
                                                                <td><p><b>{{$history->created_at}}</b></p></td>
                                                                <td>
                                                                    <input type="hidden" value="{{$history->Doc_id}}" id="did<?php echo $n; ?>">
                                                                    <input type="hidden" value="{{$history->disease}}" id="dis<?php echo $n; ?>">
                                                                    <input type="hidden" value="{{$history->diagnosis}}" id="diag<?php echo $n; ?>">
                                                                    <input type="hidden" value="{{$history->medicine}}" id="med<?php echo $n; ?>">
                                                                    <input type="hidden" value="{{$history->Meeting_id}}" id="mid<?php echo $n; ?>">
                                                                    <input type="hidden" value="{{$history->created_at}}" id="dt<?php echo $n; ?>">
                                                                    <button type="button" class="btn btn-primary btn-sm" onclick="VHistory(<?php echo $n; ?>)" data-toggle="modal" data-target="#viewhist">View </button>
                                                                </td>
                                                            </tr>
                                                            <?php $n++; ?>
                                                        @endforeach

                                                        @else
                                                            <tr>
                                                                <td colspan="3"><h3 style=" color:black;text-align: center;">At the moment you don't have any medical history</h3></td>
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
                    </div>
                <div>
            </section>


<!--Modal-->
<div class="modal fade" id="viewhist" tabindex="-1" role="dialog" aria-labelledby="symptomp" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Medical History View</h5>
                <button style = "float:right; margin-top:-4%;" type="submit" class="btn btn-warning" data-dismiss="modal"  aria-label="Close">Close</button>
            </div>
            <div style="margin-top:-2%;" class="modal-body">
            <p style = "font-weight:bold; color:SaddleBrown; opacity: 0.6; float:left; margin-right:30%;"id="dr"></p>
            <p style = "font-weight:bold; margin-left:30%; color:SaddleBrown; opacity: 0.6; "id="meet"></p>
            <p style = "font-weight:bold; float:right; margin-top:-6%; color:SaddleBrown; opacity: 0.6; "id="date"></p>

            <h5 style="float:left; margin-top:0.3%; margin-right:3%;">Disease: </h5>
            <p id="dis"></p>

            <h5 style="float:left; margin-top:0.3%; margin-right:3%; margin-bottom:-1%;">Diagnosis: </h5>
            <p id="diag"></p>

            <h5 style="float:left; margin-top:0.3%; margin-right:3%;margin-bottom:-1%;">Medicine: </h5>
            <p id="medi"></p>
                   
            </div>
            <div class="modal-footer">
               
            </div>
        </div>
    </div>
</div>

<script>
    function VHistory(id)
    {
        var dr = document.getElementById('did'+id).value;
        var dis = document.getElementById('dis'+id).value;
        var diag = document.getElementById('diag'+id).value;
        var medi = document.getElementById('med'+id).value;
        var meet = document.getElementById('mid'+id).value;
        var date = document.getElementById('dt'+id).value;
        
        medi = medi.substring(2,medi.length-2).split(',');
        var result="";

        for(var i = 0; i < medi.length ; i++){
            if(i%2 == 0){
                result = result + medi[i];
            }else{
                result = result + " - " + medi[i] + ", ";
            }
        }
        console.log(medi[0]);
        document.getElementById('dr').innerHTML = dr;
        document.getElementById('meet').innerHTML = meet;
        document.getElementById('date').innerHTML = date;
        document.getElementById('dis').innerHTML = dis;
        document.getElementById('diag').innerHTML = diag;
        document.getElementById('medi').innerHTML = result;
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