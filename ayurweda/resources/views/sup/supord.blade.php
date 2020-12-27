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
                         <li><a href="{{route('suphome',$c->Sup_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('issueing',$c->Sup_id)}}" class="smoothScroll"><font color="red">Issue Ingredients</font></a></li>
                         <li><a href="{{route('newing',$c->Sup_id)}}" class="smoothScroll">Ingredients</a></li>
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

                    <div class="">
                         <div class="item item-first">
                              <div class="caption">
                                  
                                   <div class="container">

                                        <div class="">
                                        <br></br>
                                        
                                        
                                         
                                             
                                   

                                             <div style="float:left;">
                                             <form action="/issusearch" method="post" style="margin:auto;width:700px">
                                             @csrf
                                                  <div style="float:left;"><input class="form-control" style="color:black" type="text" placeholder="Producer ID" name="pproid"></div>
                                                  <div style="float:left;"><input class="form-control" style="color:black" type="date" name="date"></div>
                                                  <input type="hidden" name="id" value = "{{$c->Sup_id}}"/>
                                                  <div style="float:left;"><button class="form-control" type="submit"><i style="color:black" class="fa fa-search"></i></button></div>
                                             </form>
                                             </div>
                                             

                                             <div class="tableFixHead">

                                             <br>
                                        <table class="table table-bordered" style="background-color:#ffffff">
                                        
                                             <thead>
                                                  <tr style="background-color:#800000; ">
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
                                                       @if($order->status=="Unrecieved")
                                                       <td><a href="{{route('supreorder',$order->id)}}" class="btn btn-primary btn-sm">Recieve</a></td>
                                                       @else
                                                       <td><p >{{$order->status}}</p></td>
                                                       @endif
                                                       
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