<!DOCTYPE html>
<html lang="en">
<head>

     <title>Order Ingredients</title>

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
        overflow-y: auto;
        height: 200px;
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
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
               <div style="background-color:#154360;" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('mphome',$c->Pro_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('issuemedicine',$c->Pro_id)}}" class="smoothScroll">Issue <br>Medicines</a></li>
                         <li><a href="{{route('Ingstock',$c->Pro_id)}}" class="smoothScroll">Ingredients <br>Stock</a></li>
                         <li><a href="{{route('medstock',$c->Pro_id)}}" class="smoothScroll">Medicine <br>Stock</a></li>
                         <li><a href="{{route('ordering',$c->Pro_id)}}" class="smoothScroll"><font color="red">Order <br>Ingredients</font></a></li>
                         <li><a href="{{route('medicines',$c->Pro_id)}}" class="smoothScroll">Medicines</a></li>
                    </ul>

                     
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
               </div>

          </div>
     </section>

     

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <form method="post" action="/docedit">
          
          <div class="modal-body">
               <input type="text" name="name" class="form-control" placeholder="Name" value=""><br>             
               <input type="text" name="address" class="form-control" placeholder="Address" value=""><br>
               <input type="text" name="phone" class="form-control" placeholder="Phone Number" value=""><br>
               <input type="password" name="opassword" class="form-control" placeholder="Old Password"><br>
               <input type="password" name="npassword" class="form-control" placeholder="New Password"><br>
               <button type="submit" class="btn btn-primary">Update</button>
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
     </div>
     </div>
     </div>

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="">
                         <div class="item item-first">
                              <div class="caption">
                                  
                                   <div class="container">

                                        <div class="col-md-8 col-sm-12">
                                        <br></br>
                                        <br></br>
                                        <br></br>
                                        
                                         
                                             <button style="width:60%; margin-left:42%; margin-right:30%; margin-top:-5%;" type="button" class="btn btn-primary btn-lg" data-target = "#ordermedicine" data-toggle = "modal">Order Ingredients</button>

                                             <h2 style="color:#ffffff; text-align:center; width:96%; margin-left:22%;">Your Orders</h2>
                                   

                                        <div style="width:90%; margin-left:26%; margin-right:22%;" class="col-lg-3">
                                             <form action="/ordersearch" method="post" style="margin:auto;width:700px">
                                             @csrf
                                                  <input style="color:black" type="text" placeholder="Supplier ID" name="supid">
                                                  <input style="color:black" type="date" name="date">
                                                  <input type="hidden" name="id" value = "{{$c->Pro_id}}"/>
                                                  <button type="submit"><i style="color:black" class="fa fa-search"></i></button>
                                             </form>
                                             <div class="tableFixHead">
                                             <table class="table table-bordered" style="background-color:#ffffff">
                                        
                                             <thead>
                                            
                                                  <tr style="background-color:#800000; ">
                                                       <th>Supplier ID</th>
                                                       <th>Order Date</th>
                                                       <th>Ingredients</th>
                                                       <th>Status</th>
                                                       
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
                                                       <td><p >{{$order->Sup_id}}</p></td>
                                                       <td><p >{{$order->IngOrder_date}}</p></td>
                                                       <td>
                                                            <input type="hidden" id="medi<?php echo $no; ?>" value="{{$order->Ingredients}}">
                                                            <button type="submit" id = "button<?php echo $no; ?>" onclick="viewing(<?php echo $no; ?>)" class="btn btn-primary btn-sm" >View</button>
                                                       </td>
                                                       <td><p >{{$order->status}}</p></td>
                                                      
                                                       
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
                                             </div>
                                             <br></br>
                                             
                                             <br></br>
                                        </div>
                                        
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
                    <h5 class="modal-title" id="exampleModalLabel">Order Ingredients Here</h5>
                    <button style = "float:right; margin-top:-4%;" type="submit" class="btn btn-warning" data-dismiss="modal"  aria-label="Close">Close</button>
               </div>
               <div style="margin-top:-2%;" class="modal-body">
                    <h4>Ingredient Name</h4>
                    @if(count($ingredients))
                    <input type="text" name = "ingname" id="ingname" class="form-control" list="ingredients">
                    <datalist id="ingredients">
                    @foreach($ingredients as $in)
                         <option value="{{$in->Ing_name}}">
                    @endforeach
                    </datalist>                            
                    
                    
                     <h5>Quantity</h5>
                    <input style="width:50%; " class="form-control" type="number" id="qty" style="color:black;"/>
                     <button  style="float:right; margin-top:-6%; margin-right:30%;" type="button" class=" btn-uservar btn btn-primary" onclick="addtext()"> Add</button><br> 
                    @else
                         <h3>Adding is unavailable</h3>
                    @endif

                     <form action="/proingorder" method = "post">
                     @csrf
                         <input type="hidden" name="id" value = "{{$c->Pro_id}}"/>
                         <textarea class="form-control" name="order" id="order" cols="10" rows="10"></textarea>
                         
                                   <script>
                                        function addtext(){
                                             var  old = document.getElementById('order').value;
                                        
                                             var med = document.getElementById('ingname').value;
                                             
                                             if(med){
                                                  var qty = document.getElementById('qty').value;
                                                  if(qty){
                                                       document.getElementById('order').value = old+"\n"+med+ "   " + qty;
                                                  }
                                            
                                             }
                                             document.getElementById('ingname').value = "";
                                             document.getElementById('qty').value = "";
                                            
                                        }

                                        function prepareDiv(){
                                             document.getElement('')
                                        }
                              </script>
                              <h5>Supplier ID</h5>
                              <input style="width:50%; " class="form-control" type="text" name="supid" style="color:black;"/>
                              <button style="margin-top:1.5%;" class="btn btn-success" type ="submit">Send Order</button>
                    </form>
                    
                                       
               </div>
               <div class="modal-footer">
               
               </div>
          </div>
     </div>
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