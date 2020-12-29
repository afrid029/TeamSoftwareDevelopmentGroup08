<!DOCTYPE html>
<html lang="en">
<head>

     <title>Ingredients Supplier</title>

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
     <link rel="stylesheet" href="{{ asset('css/supplier.css')}}">
     <link rel="stylesheet" type="text/css" href="{{ asset('css/preview.css')}}">
     <script src="{{ asset('js/preview.js') }}"></script>
     
<style>
.btn-dark{
     display:none;
    margin-top:2px;
    width:100%;
     background-color:Black;
     opacity:0.8;
}
.img:hover + .btn-dark, .btn-dark:hover{
     display:inline-block;
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
                    <a href="welcome" class="navbar-brand">Hospital</a>
               </div>

               <!-- MENU LINKS -->
               <div style="background-color:#154360 " class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('suphome',$c->Sup_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('issueing',$c->Sup_id)}}" class="smoothScroll"><font color="red">Ingredients Orderings</font></a></li>
                         <li><a href="{{route('newing',$c->Sup_id)}}" class="smoothScroll">Ingridients</a></li>
                         
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
               </div>

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

     
<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class="">
               <div class="item item-first">
                    <div class="caption">
                         <br><br>
                         <br><br>
                         <br><br>
                         <div style="height:70%; width:88%; margin: -12% 6% 0 6%; background-color:white; border-radius:0.5%;" class="container">
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:50%; margin-right: -20%; float:left; margin-left:2%;"><h2>Orders</h2></div>
                                                       <form action="/issuingsearch" method="post">
                                                       {{csrf_field()}}
                                                       <div class="table-title">
                                                            <div style="margin-top:2%; margin-right:2%;color:gray; width:20%; float:left;">
                                                                 <input class="form-control" name="proid" type="text" placeholder="Search Order By Producer ID">   
                                                            </div>
                                                            <div style="margin-top:2%; margin-right:2%;color:gray; width:20%; float:left;">
                                                            <input  class="form-control" name="date" type="Date">
                                                            </div>
                                                            <input type="hidden" name="id" value = "{{$c->Sup_id}}"/>
                                                            <button style="margin-top:2%; width: 5%; float:left;" class="form-control" type="submit"><i style="color:black" class="fa fa-search"></i></button>
                                                       </div>
                                                       </form>
                                                       <div class="tableFixHead">
                                                       <table id="myTable" style="color:black;" class="table table-bordered table-scroll">
                                                            <thead>
                                                                 <tr>
                                                                 <th>Ingredient</th>
                                                                 <th>Producer ID</th>
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
                                                       <td>
                                                            <input type="hidden" id="medi<?php echo $no; ?>" value="{{$order->Ingredients}}">
                                                            <button type="submit" id = "button<?php echo $no; ?>" onclick="viewing(<?php echo $no; ?>)" class="btn btn-primary btn-sm" >View</button>
                                                                                                                       
                                                       </td>
                                                       <td><p >{{$order->Pro_id}}</p></td>
                                                       <td><p >{{$order->IngOrder_date}}</p></td>
                                                       @if($order->status=="Not Issued")
                                                       <td><a href="{{route('supreorder',$order->id)}}" class="btn btn-primary btn-sm">Issue</a></td>
                                                       @else
                                                       <td><p >{{$order->status}}</p></td>
                                                       @endif
                                                       
                                                  </tr>
                                                  <?php $no++; ?>
                                                  @endforeach 
                                                  @else
                                                       <tr>
                                                            <td colspan="4"><h3 style=" color:black;text-align: center; font-size:20px;">You Don't Have Any Orders</h3></td>
                                                       </tr>
                                                       
                                                  @endif
                                                  
                                                  
                                             </tbody>
                                                       </table>

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