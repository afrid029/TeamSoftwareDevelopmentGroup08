<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profit</title>
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
          .slider .item-first {
          background-image: url(../images/admin.jpg);
         
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
  background-color: #191970;  
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
  flex-basis:100%;
  flex-grow:2;
  display: block;
  padding: 1rem;
  text-align:center;
}
/* Other options */
.table-scroll.small-first-col td:first-child,
.table-scroll.small-first-col th:first-child{
  flex-basis:20%;
  flex-grow:1;
}
.table-scroll tbody tr:nth-child(2n){
  background-color: rgba(255,240,245,0.4);
}
.body-half-screen{
  max-height: 53vh;
  
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
@if($errors->any())
<script>var e = "";</script>
@foreach($errors->all() as $er)
     <script>
          e = e + "{{$er}}" + "\n";
     </script>

@endforeach
<script>
console.log(e);
     Swal.fire({
     position: 'top',
     icon: 'error',
     title: e,
     showConfirmButton: false,
     timer: 2500
     });
</script>
@endif

      
     <section class="navbar custom-navbar navbar-fixed-top"  role="navigation">
          <div class="container">
 
               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    
                    <a href="/welcome" class="navbar-brand">Hospital </a>
               </div>

              
               <div class="collapse navbar-collapse">

                   <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('adminpage',$c->id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('regist',$c->id)}}" class="smoothScroll">Registration</a></li>
                          <li><a href="{{route('profit',$c->id)}}" class="smoothScroll"><font color="red">Profit</font></a></li>
                    </ul>
                     
                    <ul class="nav navbar-nav navbar-right">

                         <li><a href="/login">Logout</a></li>


                    </ul>
               </div>

          </div>
          
     </section>

<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="row">
        <div class="owl-theme">
            <div class="item item-first">
                 <br><br>
                    <br><br>
                    <br><br>
                
                                    <!-----Table1----->
                        <div style="max-height:80%; width:44%; margin: 0% 3% 0 3%; float: left; background-color:white; border-radius:0.5%;"class="container">
                            <div class="col-md-16 col-sm-12">
                                <div class="container-lg">
                                   <div class="table-responsive">
                                        <div class="table-wrapper">
                                            <div class="table-title">
                                            
                                                  <div ><h2 style="font-size:25px;">Profit From Patient's Medicine Orders</h2>
                                                       <form action="/patbill" method = "post">
                                                            @csrf
                                                                 <input type="hidden" name = "aid" value="{{$c->id}}">
                                                                 <input placeholder="From" class="form-control" style = "width: 25%; float:left;" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name = "from"/>
                                                                 
                                                                 <input placeholder="To" class="form-control" style = "width: 25%; float:left; margin-left:12px; margin-right:4px;" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name = "to"/>
                                                                
                                                                 <button style="margin-top:2px; padding:0.1px; " type="submit"  aria-hidden="true"><i class="fa fa-filter btn btn-primary" ></i></button> 
                                                           </form>  
                                                  </div>
                                                       <!--<div class="row">-->
                                                       
                                                       
                                                  </div>
                                                  <table   class="table table-bordered table-scroll">
                                                       <thead>
                                                            <tr>
                                                                 <th>Order ID</th>
                                                                 <th>Date</th>
                                                                 <th>Profit</th>
                                                            </tr>
                                                       </thead>
                                                       
                                                       <tbody class="body-half-screen">
                                                 
                                                     @if(count($patbill) > 0)
                                                     @foreach($patbill as $pbill)
                                                       
                                                            <tr>
                                                                 <td>{{$pbill->	PatMedOrder_id}}</td>
                                                                 <td>{{$pbill->PatMedOrder_date}}</td>
                                                                 <td>{{$pbill->bill}}</td>
                                                            </tr>
                                                    @endforeach
                                                               
                                                    @else
                                                            <tr>
                                                                 <td colspan="3"><h3 style=" color:black;text-align: center; font-size:20px;">There Are No Profits By Issuing Medicine Order</h3></td>
                                                            </tr>
                                                    @endif
                                                    </tbody>
                                                  </table>
                                                  <h3   style="color:gray; text-align:center; margin-bottom:12px;">Total Profit: <span style="color : red;"> Rs {{$patsum}} </span></h3>
                                                 
                                             </div>
                                        </div>
                                   </div>                                
                                             <!--      -->
                              </div>
                                   
                         </div>
                                  
    
                              
<!--          Table2   -->




                    <div style="max-height:80%; width:44%; margin: 0% 3% 0 3%; float: left; background-color:white; border-radius:0.5%;"class="container">
                         <div class="col-md-16 col-sm-12">
                              <div class="container-lg">
                                   <div class="table-responsive">
                                        <div class="table-wrapper">
                                            <div class="table-title">
                                                  <div ><h2 style="font-size:25px;">Profit From Doctor's Consultation</h2>
                                                       <form action="/docbill" method ="post">
                                                            @csrf
                                                                 <input type="hidden" name = "aid" value="{{$c->id}}">
                                                                 <input placeholder="From" class="form-control" style = "width: 25%; float:left;" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" name = "from"/>
                                                                 
                                                                 <input placeholder="To" class="form-control" style = "width: 25%; float:left; margin-left:12px; margin-right:4px;" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name = "to"/>
                                                                
                                                                 <button style="margin-top:2px; padding:0.1px; " type="submit"  aria-hidden="true"><i class="fa fa-filter btn btn-primary" ></i></button> 
                                                           </form>  
                                                  </div>
                                                       <!--<div class="row">-->
                                                  </div>
                                                  <table  class="table table-bordered table-scroll">
                                                       <thead>
                                                            <tr>
                                                                      <th>Meeting ID</th>
                                                                      <th>Date</th>
                                                                      <th>Profit</th>
                                                            </tr>
                                                       </thead>
                                                       
                                                       <tbody class="body-half-screen">
                                                   
                                                       @if(count($drbill) > 0)
                                                        @foreach($drbill as $dbill)
                                                      
                                                            <tr>
                                                                 <td>{{$dbill->Meeting_id}}</td>
                                                                 <td>{{$dbill->date}}</td>
                                                                 <td>{{$dbill->bill}}</td>
                                                          
                                                            </tr>
                                                          @endforeach
                                                       
                                                                
                                                                
                                                        
                                                        @else
                                                     
                                                            <tr>
                                                                 <td colspan="4"><h3 style=" color:black;text-align: center; font-size:20px;">There Are No Profits By Issuing Doctor Prescription</h3></td>
                                                            </tr>
                                                        @endif
                                                      
                                                       
                                                                            
                                                       </tbody>
                                                       
                                                  </table>
                                                       <h3  style="color:gray; text-align:center; margin-bottom:12px;">Total Profit: <span style="color : red;"> Rs {{$drsum}} </span></h3>
                                                  
                                             </div>
                                        </div>
                                   </div>                                
                                             <!--      -->
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