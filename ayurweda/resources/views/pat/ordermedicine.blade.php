<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Online Medicine Ordering</title>

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
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
@if($errors->any())
@foreach($errors->all() as $err)
<script>
     Swal.fire({
               position: 'top',
               icon: 'error',
               title: '{{$err}}',
               showConfirmButton: false,
               timer: 2000
            
          });
     </script>
@endforeach
@endif

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
                    <a href="{{url('welcome')}}" class="navbar-brand">Hospital</a>
               </div>

               <!-- MENU LINKS -->
               <div style = "width:90%;" class="collapse navbar-collapse">
               <ul   class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('pathome',$c->Pat_id)}}" class="smoothScroll">Home</a></li>
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll">State Medical Symptomps</a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll"><font color="red">Order Medicines</font></a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll">Online Booking</a></li>
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
                                   
                                   <button style="width:40%; margin-left:30%; margin-right:30%; margin-top:-5%;" type="button" class="btn btn-primary btn-lg" data-target = "#ordermedicine" data-toggle = "modal">Order Medicine</button>
                                   <div style="width:60%; margin-left:20%; margin-right:20%;" class="col-lg-3">
                                        <h2 style="color:#ffffff; text-align:center; width:96%; margin: 0 2%;">Unrecieved Orders</h2>
                              
                                        <table style="background-color:white;border:5px; " class="table table-bordered" >
                                        
                                             <thead>
                                            
                                                  <tr style="background-color:#800000; ">
                                                       <th style=" color:#FFFFFF;text-align:center"><b>Date</b></th>
                                                       <th style=" color:#FFFFFF;text-align:center"><b>View</b></th>
                                                       <th style=" color:#FFFFFF;text-align:center"><b>Order Status</b></th> 
                                                       
                                                  </tr>
                                             </thead> 
                                             @if(count($orders) > 0)
                                             <tbody>
                                                  <?php $no = 1;?>
                                                  @foreach($orders as $order)
                                                  <tr>
                                                       <td><p >{{$order->PatMedOrder_date}}</p></td>
                                                       <td>
                                                            <input type="hidden" id="medi<?php echo $no; ?>" value="{{$order->medicines}}">
                                                            <button type="submit" id = "button<?php echo $no; ?>" onclick="viewing(<?php echo $no; ?>)" class="btn btn-primary btn-sm" >View</button>
                                                       </td>
                                                       <td><p>{{$order->status}}</p></td>
                                                      
                                                       
                                                  </tr>
                                                  <?php $no++; ?>
                                                  @endforeach 
                                                  @else
                                                       <tr>
                                                            <td colspan="3"><h3 style=" color:black;text-align: center;">You Don't Have Any Orders</h3></td>
                                                       </tr>
                                                       
                                                  @endif
                                             </tbody>
                                                 
                                              
                                                  
                                                   
                                                  
                                              
                                             
                                          
                                        </table>
                                       
                                        <div class="link" style="width:30%;border-radius:10%; margin-top:-12px; margin-bottom: 10px; font-size:12px;">
                                             <a> {{ $orders->links() }}</a>
                                        </div>
                                        <script>
                                             function viewing(id){
                                                  var a = document.getElementById('medi'+id).value;
                                                  Swal.fire({
                                                       position: 'top',
                                                       width:400,
                                                       text:"Order details",
                                                       icon: 'info',
                                                       title: a,
                                                      
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

<!--Modal-->
<div class="modal fade" id="ordermedicine" tabindex="-1" role="dialog" aria-labelledby="symptomp" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Medicine Here</h5>
                    <button style = "float:right; margin-top:-4%;" type="submit" class="btn btn-warning" data-dismiss="modal"  aria-label="Close">Close</button>
               </div>
               <div style="margin-top:-2%;" class="modal-body">
                    <h4>Medicine Name</h4>
                                                
                    <select size="5" class="form-control" id="mname" aria-label="multiple select example">
                         <option   disabled hidden> 
                              Select Medicine
                         </option> 
                    
                    @foreach($stocks as $stock)
                         <option >{{$stock->Med_name}}</option>
                    @endforeach
                    </select>
                    
                     <h5>Quantity</h5>
                    <input style="width:50%; " class="form-control" type="number" id="qty" style="color:black;"/>
                     <button  style="float:right; margin-top:-6%; margin-right:30%;" type="button" class=" btn-uservar btn btn-primary" onclick="addtext()"> Add</button><br> 

                     <form action="{{ route('ordermedicine') }}" method = "post">
                     @csrf
                         <input type="hidden" name="pid" value = "{{$c->Pat_id}}"/>
                         <textarea class="form-control" name="order" id="order" cols="10" rows="10"></textarea>
                         
                                   <script>
                                        function addtext(){
                                             var  old = document.getElementById('order').value;
                                        
                                             var med = document.getElementById('mname').value;
                                             
                                             if(med){
                                                  var qty = document.getElementById('qty').value;
                                                  if(qty){
                                                       document.getElementById('order').value = old+"\n"+med+ "   " + qty;
                                                  }
                                            
                                             }
                                             document.getElementById('mname').value = " ";
                                             document.getElementById('qty').value = "  ";
                                            
                                        }

                                        function prepareDiv(){
                                             document.getElement('')
                                        }
                              </script>
                              <button style="margin-top:1.5%;" class="btn btn-success" type ="submit">Send Order</button>
                    </form>
                    
                                       
               </div>
               <div class="modal-footer">
               
               </div>
          </div>
     </div>
</div>


     <!-- SCRIPTS -->
     <script src="{{ asset('js/jquery.js')}}"></script>
     <script src="{{ asset('js/bootstrap.min.js')}}"></script>
     <script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
     <script src="{{ asset('js/wow.min.js')}}"></script>
     <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
     <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
     <script src="{{ asset('js/smoothscroll.js')}}"></script>
     <script src="{{ asset('js/custom.js')}}"></script>

     


     
@if($msg = session()->get('msg'))
<script>
     Swal.fire({
               position: 'top',
               icon: 'success',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 2000
            
          });
     </script>
@endif


</body>
</html>