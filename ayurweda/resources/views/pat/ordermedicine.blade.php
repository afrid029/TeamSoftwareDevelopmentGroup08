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
     background-color: #8B0000;
     color:white;
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
               <!-------------------------------------------------------------------------------------------------->
               <div style="margin-top:2%; margin-right:2%;color:gray; width:60%; ">
                         <input autocomplete="off" class="form-control" type="text" id="medsearch"  onkeyup="medicine()"  placeholder="Select Medicines" title="Type ID" style="float:left;"> 
               </div>&nbsp; <i style="margin-top:-1%;" id="medshow" onclick="medshowlist()" class="btn btn-outline fa fa-plus-circle fa-2x" aria-hidden="true"></i> 

               <div id="medlist" style="z-index:10; position:absolute; width:80%; background-color:white; display:none;">

                    <table class="table table-bordered table-scroll">
                              <thead style="width:100%;">
                                   <tr>
                                        <th style="width:15%;"><i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i></th>
                                        <th style="width:45%;">Name</th>
                                        <th style="width:40%;">Quantity</th>
                                   </tr>
                              </thead>
                              <tbody style="width:100%;" class = "body-half-screen">
                              @if(count($stocks) > 0)                          

                              <?php $a = 0; ?>
                                   @foreach($stocks as $st)
                                        <tr>
                                             
                                             <td style="width:15%;"><input type="checkbox"  class="fa fa-check-circle-o"  id = "med<?php echo $a; ?>" name = "med<?php echo $a; ?>" value = "{{$st->Med_name}}" onclick="qtybox(<?php echo $a; ?>)" /></td>
                                        
                                             <td style="width:45%;">{{$st->Med_name}}</td>
                                             <td style="width:40%;">
                                                  <div id = "qti<?php echo $a; ?>" style="display:none;">
                                                       <input type="number" class="form-control" style="width:50%; float:left; height: 30px;" id="qnt<?php echo $a; ?>">
                                                       <button type = "button" class = "btn btn-primary fa fa-plus" onclick = "add(<?php echo $a; ?>)"></button>
                                                  </div>
                                                  

                                             </td>

                                        </tr>
                                   <?php $a++; ?>
                                   @endforeach
                              </tbody>
                              @else
                                   <p><i>No Medicines in Stock</i></p>
                              @endif

                    </table>

               </div>

               <!------------------------------------------------------------------------------------------------->
                    <h4>Medicine Name</h4>
                    
                    
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
                     function medshowlist(){
                             var cls = document.getElementById('medshow').className;
                             console.log(cls);
                             if(cls == "btn btn-outline fa fa-plus-circle fa-2x"){
                                  document.getElementById('medshow').className = "btn btn-outline fa fa-times-circle fa-2x";

                                  document.getElementById('medlist').style.display = "block";
                             }else{
                                   document.getElementById('medshow').className = "btn btn-outline fa fa-plus-circle fa-2x";
                                   document.getElementById('medlist').style.display = "none";
                             }
                              
                         }
                         function medicine() {
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementById("medsearch");
                              filter = input.value.toUpperCase();
                              table = document.getElementById("medlist");
                              tr = table.getElementsByTagName("tr");
                              for (i = 0; i < tr.length; i++) {
                                   td = tr[i].getElementsByTagName("td")[1];
                                   if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                        } else {
                                        tr[i].style.display = "none";
                                        }
                                   }       
                              }
                         }
                         function qtybox(id){
                              var chk = document.getElementById("med"+id);
                              var qty = document.getElementById("qti"+id);
                              

                              if(chk.checked == true){
                                   qty.style.display = "block";
                                   chk.className = "fa fa-check-circle";
                                   
                              }else{
                                   qty.style.display = "none";
                                   chk.className = "fa fa-check-circle-o";
                                   
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
                                   input1.setAttribute("style","margin-right:5px; width:40%; float:left;");
                                   
                                   var input2 = document.createElement("input");
                                   input2.setAttribute("type","number");
                                   input2.setAttribute("name","qt"+id);
                                   input2.setAttribute("id","qt"+id);
                                   input2.setAttribute("value",qty);
                                   input2.setAttribute("readonly",true);
                                   input2.setAttribute("class","form-control");
                                   input2.setAttribute("style","margin-right:5px; width:15%;");

                                 
                                    var br = document.createElement("br");

                                   div.appendChild(input1);
                                   
                                   div.appendChild(input2);

                                   var rem = document.createElement("button");
                                   rem.setAttribute("class", "btn btn-danger fa fa-minus-circle ");
                                   rem.setAttribute("type", "button");
                                   rem.setAttribute("style"," float:right; margin-top:-6%; margin-right:25%;");
                                   rem.setAttribute("id", "del"+id);
                                   rem.setAttribute("onclick", "remove("+id+")");
                                   div.appendChild(rem);
                                   div.appendChild(br);
                                   form.appendChild(div);
                                   
                                   

                                   form.appendChild(document.getElementById("sub"));
                                  
                                  

                                   document.getElementById("qti"+id).style.display="none";
                                  
                                   
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