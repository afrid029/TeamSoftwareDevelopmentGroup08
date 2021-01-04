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
   a {
        font-weight: bold;
   }
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
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll">Online Booking</a></li>
                         <li><a href="{{route('history',$c->Pat_id)}}" class="smoothScroll"><font color="red">Medical History</font></a></li>
                         
                    </ul>
                    <div style=" width:8%; margin-left:2%;" class="nav navbar-nav navbar-right">
                    <li><a href="/login">Logout</a></li>
                    </div>

                    
               </div>

          </div>
     </section>
<!-- HOME -->
<section  id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="row">
        <div class="owl-theme">
            <div class="item item-first">
                <div class="caption">
                    <div style="width:60%; margin-left:20%: margin-right:20%; margin-top:-10%;" class="container">
                        <div >
                            <h2 style="text-align:center; color:#ffffff;">Your medical history</h2>
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" style="background-color:white;color:black; width:100;">
                                        
                                    <thead style="background-color:#800000; color:white; text-align:center;overflow:fixed;">
                                        <tr>
                                            <th style="text-align:center;"><b>Meeting ID</b></th>
                                            <th style="text-align:center;"><b>Date</b></th>
                                            <th style="text-align:center;"><b >View</b></th> 
                                        </tr>
                                    </thead>
                                    @if(count($hist) > 0)
                                        <tbody>
                                            <?php $n = 1; ?>
                                            @foreach($hist as $history)
                                                <tr>
                                                    <td><p>{{$history->Meeting_id}}</p></td>
                                                    <td><p>{{$history->created_at}}</p></td>
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
                                <div class="link" style="width:30%;border-radius:10%; margin-top:-12px; margin-bottom: 10px; font-size:12px;">
                                             <a> {{ $hist->links() }}</a>
                                        </div>   
                        </div>           
                    </div>
                </div>
            </div>
        </div>
    </div>
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