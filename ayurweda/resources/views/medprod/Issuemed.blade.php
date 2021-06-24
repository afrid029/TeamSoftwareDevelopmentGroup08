<!DOCTYPE html>
<html lang="en">
<head>

     <title>Issue Medicine</title>
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
     <link rel="stylesheet" href="{{ asset('css/producer.CSS')}}">
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
      .btn-outline-danger:hover{
     color: white;
     background-color:#191970;
     border-color:grey;
}
.btn-outline-danger{
     color: #191970;
    border-color:#191970;
    background-color:white;
    
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
                    <a href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa </a>
               </div>

               <!-- MENU LINKS -->
              <div style="background-color:#154360; margin-left:-25px; padding-right:25px; border-radius:10px;" class="collapse navbar-collapse">
               
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li style="margin-left:-100px"><a href="{{route('mphome',$c->Pro_id)}}" style="text-transform:capitalize" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('issuemedicine',$c->Pro_id)}}" style="text-transform:capitalize" class="smoothScroll"><font color="red">Issue <br>Medicines</font></a></li>
                         <li><a href="{{route('Ingstock',$c->Pro_id)}}" style="text-transform:capitalize" class="smoothScroll">Ingredients <br>Stock</a></li>
                         <li><a href="{{route('medstock',$c->Pro_id)}}" style="text-transform:capitalize" class="smoothScroll">Medicine <br>Stock</a></li>
                         <li><a href="{{route('ordering',$c->Pro_id)}}" style="text-transform:capitalize" class="smoothScroll">Order <br>Ingredients</a></li>
                         <li><a href="{{route('medicines',$c->Pro_id)}}" style="text-transform:capitalize" class="smoothScroll">Medicines</a></li>
                    </ul>
                     
                    <ul class="nav navbar-nav navbar-right">
                         <li><a  style="text-transform:capitalize" href="/logout">Logout</a></li>
                    </ul>
               </div>
          </div>
     </section>

     
@if($msg=session()->get('msg'))
 @if($msg == "Not Enough")
     <script>
          Swal.fire({
               position: 'middle',
               icon: 'warning',
               title: 'Store Is Not Enough',
               showConfirmButton: false,
               timer: 2500
          });
     </script>

@elseif ($msg = "Order Is Issued")
     <script>
          Swal.fire({
               position: 'middle',
               icon: 'success',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 2500
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
                                   <div style="height:70%; width:88%; margin: -12% 6% -10% 6%; background-color:rgba(255,255,255,0.5); border-radius:0.5%;" class="container">

                                        
                                             <h2 style="color:#333333">Pharmacist's Medicine Orders</h2>
                                             <a style="flolat:right; font-size:20px;  margin-bottom:3px; font-weight:bold;" data-target="#pharmacists" data-toggle="modal" class = "btn btn-outline-danger fa fa-medkit">&nbsp;&nbsp; Pharmacists</a>  
                                             <div style="float:left;">
                                             <form action="/issusearch" method="post" style="margin:auto;width:700px">
                                             @csrf
                                                  <div style="float:left;"><input class="form-control" style="color:black" type="text" placeholder="Pharmacist ID" name="pharid"></div>
                                                  <div style="float:left;"><input class="form-control" style="color:black" type="date" name="date"></div>
                                                  <input type="hidden" name="id" value = "{{$c->Pro_id}}"/>
                                                  <div style="float:left;"><button class="form-control" type="submit"><i style="color:black" class="fa fa-search"></i></button></div>
                                             </form>
                                             </div>
                                             

                                             <div class="tableFixHead">

                                             <br>
                                        <table class="table table-bordered" style="background-color:#ffffff">
                                        
                                             <thead>
                                                  <tr style="background-color:#800000; ">
                                                       <th>Order ID</th>
                                                       <th>Medicines</th>
                                                       <th>Pharmacist ID</th>
                                                       <th>Order Date</th>
                                                       <th>Order status</th>

                                                      
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             @if($p1=session()->get('p1'))
                                             <?php $orders=$p1; ?>
                                             @else
                                             <?php $orders=$p; ?>
                                             @endif
                                             
                                             @if(count($orders) > 0)
                                             
                                                  <?php $no = 1;?>
                                                  @foreach($orders as $order)
                                                  <tr>
                                                       <td><p >{{$order->MedOrder_id}}</p></td>
                                                       <td>
                                                            <input type="hidden" id="medi<?php echo $no; ?>" value="{{$order->medicines}}">
                                                            <button type="submit" id = "button<?php echo $no; ?>" onclick="viewing(<?php echo $no; ?>)" class="btn btn-primary btn-sm" >View</button>
                                                                                                                       
                                                       </td>
                                                       <td><p >{{$order->Phar_id}}</p></td>
                                                       <td><p >{{$order->MedOrder_date}}</p></td>
                                                       @if($order->status=="Not Issued")
                                                       <td><a href="{{route('reorder',['c'=>$order->MedOrder_id,'d'=>$c->Pro_id])}}" class="btn btn-primary btn-sm">Issue Order</a></td>
                                                       @else
                                                       <td><p >Issued</p></td>
                                                       @endif
                                                       
                                                  </tr>
                                                  <?php $no++; ?>
                                                  @endforeach 
                                                  @else
                                                       <tr>
                                                            <td colspan="5"><h3 style="text-transform:capitalize; color:black;text-align: center;">You Don't Have Any Orders</h3></td>
                                                       </tr>
                                                       
                                                  @endif
                                                  
                                                  
                                             </tbody>
                                        
                                        </table>
                                        <!--Pharmacist modal-->
                              <div style = "overflow:scroll;margin-top:5%;" class="modal fade" id="pharmacists" tabindex="-1" role="dialog" aria-labelledby="doctors" aria-hidden="true">
                                   <div class="modal-dialog" role="dialog">
                                        <div class="modal-content"  style="width:90%; margin-left:5%; margin-right:5%;">
                                             <div class="modal-header">
                                                  <h4 class="modal-title" id="exampleModalLabel" style="color:black;">Pharmacists Details</h4>
                                                 
                                             </div>
                                             <div  class="modal-body">
                                                     <table id="myTable" class="table table-bordered table-scroll" style="color:black; width:100%;" >
                                                            <thead>
                                                                 <tr>
                                                                      <th>ID</th>
                                                                      <th> Pharmacist Name</th>
                                                                      <th>View</th>
                                                                      
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                            @if(count($phr))
                                                            
                                                            @foreach($phr as $d)
                                                                 <tr>
                                                                      <td>{{$d->Phar_id}}</td>
                                                                      <td>{{$d->Phar_name}}</td>
                                                                      <td><a href = "{{route('profview',['c'=>$d->Phar_id])}}" class = "btn btn-primary fa fa-eye">&nbsp;View</a></td>
                                                                      
                                                                 </tr>
                                                       
                                                            @endforeach
                                                            @else
                                                                 <tr>
                                                                      <td colspan="8"><h3 style=" color:black;text-align: center; font-size:20px;">There Are No Pharmacists In Hospital</h3></td>
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
                                             function viewing(id){
                                                  var a = document.getElementById('medi'+id).value;
                                                  var k = a.substring(2, a.length-2)
                                                  var d = k.split(",");
                                                  console.log(k);
                                                  console.log(d);
                                                  var result = "";
                                                  for(var i = 0; i < d.length ; i++){
                                                       if(i%2 == 0){
                                                            result = result + d[i]; 
                                                       }else{
                                                            result = result + " "+d[i]+"\n";
                                                       }
                                                  }
                                                
                                                  console.log(d.length);
                                                  Swal.fire({
                                                       position: 'top',
                                                       width:400,
                                                       text:"Order details",
                                                       icon: 'info',
                                                       title: result,
                                                      
                                                       showConfirmButton: true,
                                                      
                                                  
                                                  });
                                             }
                                                 
                                        </script>
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