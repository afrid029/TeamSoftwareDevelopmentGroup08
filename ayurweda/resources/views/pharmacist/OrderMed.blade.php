<!DOCTYPE html>
<html lang="en">
<head>

     <title>Pharmacist</title>

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
     <link rel="stylesheet" href="{{ asset('css/pharmacist.CSS')}}">
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
  overflow:hidden;
  word-wrap: break-word;
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

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section style="background-color:white;  padding-bottom:4px;height:100px;" class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>

               <!-- lOGO TEXT HERE -->
               <a style= "color:black;" href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa</a>
          </div>

          <!-- MENU LINKS -->
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                    <li style="margin-left:-100px"><a style= "color:black;text-transform:capitalize;" href="{{route('phahome',$c->Phar_id)}}" class="smoothScroll">Home</a></li>
                    <li><a style= "color:black;text-transform:capitalize;" href="{{route('medicalstock',$c->Phar_id)}}" class="smoothScroll">Maintain medical stock</a></li>
                    <li><a style= "color:black;text-transform:capitalize;" href="{{route('issueMedicine',$c->Phar_id)}}" class="smoothScroll">Issue medicine</a></li>
                    <li><a style= "color:black;text-transform:capitalize;" href="{{route('phaordermedicine',$c->Phar_id)}}" class="smoothScroll"><font color="red">Order medicine</font></a></li>
                         
               </ul>

               <ul class="nav navbar-nav navbar-right">
                    <li><a style="color:black;text-transform:capitalize;" href="/logout">Logout</a></li>
               </ul>
          </div>
     </div>
</section>
     

    

    <!-- HOME -->

<section id="home"  class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class="owl-theme">
               <div  class="item item-first">
                    <div class="caption">
                         <div style="max-height:85%; width:66%; margin: 0% 17% 0 17%; background-color:white; border-radius:0.5%;" class="container">
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:35%; float:left; margin-left:2%;"><h2>Medicine Orders</h2></div>
                                                       <div class="table-title">
                                                            <div style=" float:right; margin-right:3%; margin-top:3%;" >
                                                                 <a style="font-size:20px; float:left; font-weight:bold; margin-left:-8%;" data-target="#producers" data-toggle="modal" class = "btn btn-outline-danger fa fa-industry">&nbsp;&nbsp; Producers</a>
                                                                 <button style="float:right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addord"><i class="fa fa-plus"></i>&nbsp;&nbsp;Place A New Order</button>
                                                                 
                                                            </div>
                                                       </div>
                                                       <table id="myTable" style="color:black; width:100%;" class="table table-bordered table-scroll">
                                                            <thead>
                                                                 <tr>
                                                                      <th>Date </th>
                                                                      <th>Producer ID </th>
                                                                      <th>View</th>
                                                                      <th>Order Status</th>
                                                                      
                                                                 </tr>
                                                            </thead>
                                                            @if(count($orders) > 0)
                                                            <tbody class="body-half-screen">
                                                                 <?php $no = 1;?>
                                                                 @foreach($orders as $order)
                                                                 <tr>
                                                                      <td><p><b>{{$order->MedOrder_date}}</b></p></td>
                                                                      <td><p><b>{{$order->Pro_id}}</b></p></td>
                                                                      <td>
                                                                           <input type="hidden" id="medi<?php echo $no; ?>" value="{{$order->medicines}}">
                                                                           <button type="submit" id = "button<?php echo $no; ?>" onclick="viewing(<?php echo $no; ?>)" class="btn btn-primary btn-sm" >View</button>
                                                                                                                                  
                                                                      </td>
                                                                      <td><p><b>{{$order->status}}</b></p></td>
                                                                 
                                                                      
                                                                 </tr>
                                                                 <?php $no++; ?>
                                                                 @endforeach 
                                                                 @else
                                                                      <tr>
                                                                           <td colspan="4"><h3 style=" text-transform:capitalize; color:black;text-align: center; font-size:20px;">You Have not placed any orders</h3></td>
                                                                      </tr>
                                                                      
                                                                 @endif
                                                            </tbody>
                                        
                                             
                                                  </table> 
                                             </div>
                                        </div>
                                   </div>                                
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     <div>
 </section>
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
<!--Producers modal--> 
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
                                   <td colspan="8"><h3 style="text-transform:capitalize; color:black;text-align: center; font-size:20px;">There Are No Pharmacists In Hospital</h3></td>
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

<!--Modal-->
<div class="modal fade" id="addord" tabindex="-1" role="dialog" aria-labelledby="symptomp" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Medicine Here</h5>
                    <button style = "float:right; margin-top:-4%;" type="submit" class="btn btn-warning" data-dismiss="modal"  aria-label="Close">Close</button>
               </div>
               <div style="margin-top:-2%;" class="modal-body">
                    <!------------------- Selecting Producer------------------->
                    <div style="margin-top:2%; margin-right:2%;color:gray; width:60%; ">
                         <input autocomplete="off" class="form-control" type="text" id="prsearch"  onkeyup="producer()"  placeholder="Select A Producer" title="Type ID" style="float:left;"> 
                    </div>&nbsp; <i style="margin-top:-1%;" id="show" onclick="showlist()" class="btn btn-outline fa fa-plus-circle fa-2x" aria-hidden="true"></i> 

                    <div id="prlist" style="z-index:10; position:absolute; width:90%; background-color:white; display:none;">
                         <table class="table table-bordered table-scroll">
                              <thead>
                                   <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Add</th>
                                   </tr>
                              </thead>
                              <tbody class="body-half-screen">
                              <?php $b = 0; ?>
                                   @foreach($prod as $pr)
                                        <tr>
                                             <input type="hidden" id="tid<?php echo $b; ?>" value="{{$pr->Pro_id}}"/>
                                            
                                             <input type="hidden" id="tnam<?php echo $b; ?>" value="{{$pr->Pro_name}}"/>
                                             <td>{{$pr->Pro_id}}</td>
                                             <td>{{$pr->Pro_name}}</td>
                                             <td><button type = "button" class = "btn btn-secondary fa fa-plus" onclick = "select(<?php echo $b; ?>)"></button></td>

                                        </tr>
                                   <?php $b++; ?>
                                   @endforeach
                              </tbody>
                         </table>
                    </div>



          <!-----------------------Selecting medicine----------------------->

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
                                        <p><i style = "text-transform:capitalize;">No Medicines In Stock</i></p>
                                   @endif
                         
                         </table>
   
                    </div>
                    <script>
                        
                    </script>
                    

                    
                    <h3 id="head" style="display:block;">Medicine Order Details</h3>
                    <div id = "div" style="max-height:300px; overflow-y:scroll;">
                    
                    <form id="form" action="{{ route ('oredertopro',$c->Phar_id) }}" method = "post" onsubmit="submitting()">
                    @csrf
                         <div id = "prdet">
                              
                         </div>
                    
                         <input type="hidden" name = "orders[]" id = "ord" >
                         <div id = "myDiv" style="max-height:150px; overflow-y :scroll;">
                    
                         </div>
                         
                    
                         <button id="sub" type = "submit" class="btn btn-primary btn-sm" style="display:none; overflow-y:fixed;">Send</button>
                    </form>
                    </div>
                   
                    <script>
                              
                             
                         function showlist(){
                             var cls = document.getElementById('show').className;
                             console.log(cls);
                             if(cls == "btn btn-outline fa fa-plus-circle fa-2x"){
                                  document.getElementById('show').className = "btn btn-outline fa fa-times-circle fa-2x";

                                  document.getElementById('prlist').style.display = "block";
                             }else{
                                   document.getElementById('show').className = "btn btn-outline fa fa-plus-circle fa-2x";
                                   document.getElementById('prlist').style.display = "none";
                             }
                              
                         }
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
                         var form = document.getElementById("form");
                         function select(id){

                              var m = document.getElementById('prdet');
                              m.remove();
                              m = document.createElement('div');
                              m.setAttribute('id','prdet');
                              var nm =  document.getElementById('tnam'+id).value;
                              var id =  document.getElementById('tid'+id).value;
                              
                              

                              var input1 = document.createElement("input");
                                   input1.setAttribute("type","text");
                                   input1.setAttribute("name","ptid");
                                   
                                   input1.setAttribute("value",id);
                                   input1.setAttribute("readonly",true);
                                   input1.setAttribute("class","form-control");
                                   input1.setAttribute("style","margin-right:5px; width:20%; float:left;");

                              var input2 = document.createElement("input");
                                   input2.setAttribute("type","text");
                                   input2.setAttribute("name","ptnm");
                                   
                                   input2.setAttribute("value",nm);
                                   input2.setAttribute("readonly",true);
                                   input2.setAttribute("class","form-control");
                                   input2.setAttribute("style","margin-right:5px; width:60%;");
                                   brk = document.createElement('br');

                              m.appendChild(input1);
                              m.appendChild(input2);
                              m.appendChild(brk);
                              form.prepend(m);
                              
                              showlist();
                         }
                         function producer() {
                              var input, filter, table, tr, td, i, txtValue;
                              input = document.getElementById("prsearch");
                              filter = input.value.toUpperCase();
                              table = document.getElementById("prlist");
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
                                   chk.className = "fa fa-check-circle"
                                  
                              }else{
                                   qty.style.display = "none";
                                   chk.className = "fa fa-check-circle-o"
                                  
                              }
                         }
                         
                         var div = document.getElementById("myDiv");
                         window.setInterval( function(){
                                   var c = div.getElementsByTagName("input").length;
                                   var z = document.getElementById("sub");
                                   var y = document.getElementById('prdet').getElementsByTagName("input").length;
                                  
                              
                                   if (c > 0 && y > 0){
                                        
                                        z.style.display = "block";
                                       
                                        

                                   }else{
                                        
                                        z.style.display = "none";
                                        
                                        
                                   }
                              },10)
                         
                         
                         function add(id){

                              var med = document.getElementById("med"+id).value;
                              var qty = document.getElementById("qnt"+id).value;
                              var sub = document.getElementById('sub');
                             
                             

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
                                   input2.setAttribute("style","margin-right:5px; width:20%;");

                                 
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
                                   form.appendChild(sub);
                                   
                              
                                   
                              }
                              document.getElementById('qti'+id).style.display = "none"
                              
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

     

<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
     
@if($msg = session()->get('msg'))
<script>
     Swal.fire({
               position: 'top',
               icon: 'success',
               title: '{{$msg}}',
               showConfirmButton: false,
               timer: 2500
            
          });
     </script>
@endif



</body>
</html>