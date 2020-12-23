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
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll">State Medical Symptoms</a></li>
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
                                                  var k = a.substring(2, a.length-2)
                                                  var d = k.split(",");
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
                    @if(count($stocks) > 0)                          
                    
                    <?php $k = 0; ?>
                    <div class = "form-control"style="height:120px; border:1px solid; overflow-y:scroll;">
                    
                    @foreach($stocks as $stock)
                         
                         <input type="checkbox"  id = "med<?php echo $k; ?>" name = "med<?php echo $k; ?>" value = "{{$stock->Med_name}}" onclick="qtybox(<?php echo $k; ?>)"/>
                         <label>{{$stock->Med_name}}</label>
                         <button class="btn btn-info btn-sm fa fa-plus-circle " onclick="add(<?php echo $k; ?>)" id="btn<?php echo $k; ?>" style="display:none; float:right; padding:0.7%;"></button>
                         <input type="number" id="qnt<?php echo $k; ?>" name="qnt<?php echo $k; ?>" class="form-control" style="display:none; width : 20%; height:18px; float:right; margin-right:2%; margin-top:0.5%;">
                         <label style="display:none; margin-top:0.5%; float:right; font-size:10px; margin-right:12px; color:gray;"  id="qnty<?php echo $k; ?>">Quantity: </label>

                        
                         <br>
                         <?php $k++; ?>
                         
                    @endforeach
                    </div>
                    @else
                         <p><i>No Medicines in Stock</i></p>
                    @endif
                    
                    
                    <h3 id="head" style="display:none;">Medicine Order Details</h3>
                    <div id = "div" style="max-height:300px; overflow-y:scroll;">
                    
                    <form id="form" action="{{ route ('ordermedicine',$c->Pat_id) }}" method = "post" onsubmit="submitting()">
                    @csrf
                    
                         <input type="hidden" name = "orders[]" id = "ord" >
                         <div id = "myDiv" style="max-height:150px; overflow-y :scroll;">
                    
                         </div>
                         
                    
                    
                         <button id="sub" type = "submit" class="btn btn-primary btn-sm" style="display:none; overflow-y:fixed;">Send</button>
                    </form>
                    </div>
                   
                    <script>
                         function qtybox(id){
                              var chk = document.getElementById("med"+id);
                              var qty = document.getElementById("qnt"+id);
                              var qtyL = document.getElementById("qnty"+id);
                              var btn = document.getElementById("btn"+id);

                              if(chk.checked == true){
                                   qty.style.display = "block";
                                   qtyL.style.display = "block";
                                   btn.style.display = "block";
                              }else{
                                   qty.style.display = "none";
                                   qtyL.style.display = "none";
                                   btn.style.display = "none";
                              }
                         }
                         var form = document.getElementById("form");
                         var div = document.getElementById("myDiv");

                         window.setInterval( function(){
                              var c = div.getElementsByTagName("input").length;
                              var z = document.getElementById("sub");
                              var head = document.getElementById("head");
                              var div1 = document.getElementById("div");

                              if (c > 0){
                                   div1.style.display = "block";
                                   z.style.display = "block";
                                   head.style.display = "block";
                                   

                              }else{
                                   div1.style.display = "none";
                                   z.style.display = "none";
                                   head.style.display = "none";
                                   
                              }
                              },10)
                         
                         function add(id){

                              var med = document.getElementById("med"+id).value;
                              var qty = document.getElementById("qnt"+id).value;
                             
                             

                              if(qty>0){
                                   

                                   var input1 = document.createElement("input");
                                   input1.setAttribute("type","text");
                                   input1.setAttribute("name","medi"+id);
                                   input1.setAttribute("id","medic"+id);
                                   input1.setAttribute("value",med);
                                   input1.setAttribute("readonly",true);
                                   input1.setAttribute("class","form-control");
                                   input1.setAttribute("style","margin-right:5px; width:20%; float:left;");
                                   
                                   var input2 = document.createElement("input");
                                   input2.setAttribute("type","number");
                                   input2.setAttribute("name","qt"+id);
                                   input2.setAttribute("id","qt"+id);
                                   input2.setAttribute("value",qty);
                                   input2.setAttribute("readonly",true);
                                   input2.setAttribute("class","form-control");
                                   input2.setAttribute("style","margin-right:5px; width:20%;");

                                 
                                    var br = document.createElement("br");

                                   div.appendChild(input1);
                                   
                                   div.appendChild(input2);

                                   var rem = document.createElement("button");
                                   rem.setAttribute("class", "btn btn-danger fa fa-minus-circle ");
                                   rem.setAttribute("type", "button");
                                   rem.setAttribute("style","margin-right:5px; float:right; margin-top:-6%; margin-right:45%;");
                                   rem.setAttribute("id", "del"+id);
                                   rem.setAttribute("onclick", "remove("+id+")");
                                   div.appendChild(rem);
                                   div.appendChild(br);
                                   form.appendChild(div);
                                   
                                   

                                   form.appendChild(document.getElementById("sub"));
                                  
                                  

                                   document.getElementById("btn"+id).style.display="none";
                                   document.getElementById("qnt"+id).style.display="none";
                                   document.getElementById("qnty"+id).style.display="none";
                                   
                              }
                              
                         }

                         function remove(id){
                              var a = document.getElementById("medic"+id);
                              var b = document.getElementById("qt"+id);
                              var c = document.getElementById("del"+id);

                              a.remove();
                              b.remove();
                              c.remove();
                         }

                         function submitting(){
                              var x = div.getElementsByTagName("input").length;
                              var arr = Array();
                              for(var i = 0 ; i < x ; i++){
                                   console.log(div.getElementsByTagName("input")[i].value);
                                   arr[i] = div.getElementsByTagName("input")[i].value;
                              }
                              document.getElementById('ord').value = arr;
                             
                              console.log(arr);
                         }
                    
                    </script>

                   
                    
                                       
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