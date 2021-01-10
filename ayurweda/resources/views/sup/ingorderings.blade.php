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
.btn-outline-danger:hover{
     color: white;
     background-color:#191970;
     border-color:grey;
}
.btn-outline-danger{
     color: #191970;
    border-color:#191970;
    
}
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
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/welcome" class="navbar-brand">Hospital</a>
               </div>

               <!-- MENU LINKS -->
               <div style="background-color:#154360; margin-left:-25px; padding-right:25px; border-radius:10px;" class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('suphome',$c->Sup_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('issueing',$c->Sup_id)}}" class="smoothScroll"><font color="red">Ingredients Orderings</font></a></li>
                         <li><a href="{{route('newing',$c->Sup_id)}}" class="smoothScroll">Ingridients</a></li>
                         
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a  href="/logout">Logout</a></li>
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
                         <div style="height:85%; width:88%; margin: -6% 6% 0 6%; background-color:white; border-radius:0.5%;" class="container">
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
                                                            <a style="flolat:right; font-size:20px; margin-top:2%; margin-left: 2%; font-weight:bold;" data-target="#producers" data-toggle="modal" class = "btn btn-outline-danger fa fa-industry">&nbsp;&nbsp; Producers</a>  
                                            
                                                       </div>
                                                       </form>
                                                       <div class="tableFixHead">
                                                       <table id="myTable" style="color:black;" class="table table-bordered table-scroll">
                                                            <thead>
                                                                 <tr>
                                                                 <th>Ingredient Orders</th>
                                                                 <th>Producer Name</th>
                                                                 <th>Order Date</th>
                                                                 <th>Order status</th>

                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
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
                                                       <td><p >{{$order->name}}</p></td>
                                                       <td><p >{{$order->IngOrder_date}}</p></td>
                                                       @if($order->status=="Not Issued")
                                                       <td><a href="{{route('supreorder',['c'=>$order->id,'d'=>$c->Sup_id])}}" class="btn btn-primary btn-sm">Issue</a></td>
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
<div style = "overflow:scroll;margin-top:5%;" class="modal fade" id="producers" tabindex="-1" role="dialog" aria-labelledby="doctors" aria-hidden="true">
     <div class="modal-dialog" role="dialog">
          <div class="modal-content"  style="width:90%; margin-left:5%; margin-right:5%;">
               <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Producers Details</h4>
               </div>
               <div  class="modal-body">
                    <table id="myTable" class="table table-bordered table-scroll" style="color:black; width:100%;" >
                         <thead>
                              <tr>
                                   <th> Producer Name</th>
                                   <th>View</th>
                              </tr>
                         </thead>
                         <tbody class="body-half-screen">
                          @if(count($prod))
                          @foreach($prod as $d)
                              <tr>
                                   <td>{{$d->Pro_name}}</td>
                                   <td><a href = "{{route('profview',['c'=>$d->Pro_id])}}" class = "btn btn-primary fa fa-eye">&nbsp;View</a></td>
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