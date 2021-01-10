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
     <link rel="stylesheet" type="text/css" href="{{ asset('css/preview.css')}}">
     <script src="{{ asset('js/preview.js') }}"></script>
     <!-- For Table -->
     <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      For Table Style -->
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
 
  width:100%;
  flex-grow:2;
  display: fixed;
  
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
  max-height: 35vh;
  
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

<!-- MENU -->
<section style="background-color:white;  padding-bottom:4px;" class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>

               <!-- lOGO TEXT HERE -->
               <a style= "color:black;" href="/welcome" class="navbar-brand">Hospital</a>
          </div>

          <!-- MENU LINKS -->
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                    <li><a style= "color:black;" href="{{route('phahome',$c->Phar_id)}}" class="smoothScroll">Home</a></li>
                    <li><a style= "color:black;" href="{{route('medicalstock',$c->Phar_id)}}" class="smoothScroll"><font color="red">Maintain medical stock</font></a></li>
                    <li><a style= "color:black;" href="{{route('issueMedicine',$c->Phar_id)}}" class="smoothScroll">Issue medicine</a></li>
                    <li><a style= "color:black;" href="{{route('phaordermedicine',$c->Phar_id)}}" class="smoothScroll">Order medicine</a></li>
                         
               </ul>

               <ul class="nav navbar-nav navbar-right">
                    <li><a style="color:black;" href="/logout">Logout</a></li>
               </ul>
          </div>
     </div>
</section>
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
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
@if($msg = session()->get('msg1'))
<script>
     Swal.fire({
               position: 'top',
               icon: 'warning',
               title: '{{$msg}}',
               showConfirmButton: true,
               timer: 4000
            
          });
     </script>
@endif

@if($errors->any())

     <script>
          var k="";
          
     </script>
     @foreach($errors->all() as $er)
     
          <script>
               k = k + "*{{$er}}\n"; 
          
          </script>
     @endforeach

     <script>
     Swal.fire({
               position: 'top',
               icon: 'warning',
               title: k,
               showConfirmButton: true,
               timer:3500
               
            
          });
     </script>
@endif
<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class=" owl-theme">
               <div class="item item-first">
                    <div class="caption">
                         <br><br>
                         <div style="height:70%; width:95%; margin: -12% 5% 0 2%; background-color:white; border-radius:0.5%;" class="container">
                         
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:60%; margin-right: -20%; float:left; margin-left:2%;"><h2>Medical Stock Table</h2></div>
                                                       <div class="table-title">
                                                            <div style="margin-top:2%; margin-right:2%;color:gray; width:20%; float:left;">
                                                                 <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Medicine By ID" title="Type ID">   
                                                            </div>
                                                            <input style="margin-top:2%; width: 20%; float:left;"  class="form-control" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search Medicine By Name" title="Type Name">
                                                            <div style="margin-top:2%; float:left; margin-right:-14%;" class="col-sm-1">
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmedi"><i class="fa fa-plus"></i> Add New</button>
                                                            </div>
                                                       </div>
                                                       <table id="myTable" style="color:black; width:100%;" class="table table-bordered table-scroll">
                                                            <thead>
                                                                 <tr>
                                                                      <th>Medicine ID </th>
                                                                      <th>Medicine Name</th>
                                                                      <th>Description</th>
                                                                      <th>Manufacture Date</th>
                                                                      <th>Expiration Date</th>
                                                                      <th>Unit Price</th>
                                                                      <th>Stock Qty</th>
                                                                      <th>Ordered Qty</th>
                                                                      <th>Warning limit</th>
                                                                      <th>Actions</th>
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                            @if(count($med))
                                                            <?php $n = 0;?>
                                                            @foreach($med as $medi)
                                                                 <tr>
                                                                      <td><b>{{$medi->Med_id}}</b></td>
                                                                      <td><b>{{$medi->Med_name}}</b></td>
                                                                      <td>
                                                                           <input type="hidden" id = "id<?php echo $n; ?>" value="{{$medi->Med_id }}">
                                                                           <input type="hidden" id = "name<?php echo $n; ?>" value = "{{$medi->Med_name}}">
                                                                           <input type="hidden" id = "desc<?php echo $n; ?>" value = "{{$medi->description}}">
                                                                           <button class = "btn btn-success btn-sm " data-toggle = "modal" onclick = "viewdesc(<?php echo $n; ?>)" data-target="#viewdesc">View</button>
                                                                      </td>
                                                                      <td><b>{{$medi->manufactureDate}}</b></td>
                                                                      <td><b>{{$medi->expireDate}}</b></td>
                                                                      <td><b>{{$medi->unitprice}}</b></td>
                                                                      <td><b>{{$medi->stock_qty}}</b></td>
                                                                      <td><b>{{$medi->orders}}</b></td>
                                                                      <td><b>{{$medi->Wlimit}}</b></td>
                                                                      <td>
                                                                           <input type="hidden" id = "mdate<?php echo $n; ?>" value="{{$medi->manufactureDate}}">
                                                                           <input type="hidden" id = "edate<?php echo $n; ?>" value = "{{$medi->expireDate}}">
                                                                           <input type="hidden" id = "prc<?php echo $n; ?>" value = "{{$medi->unitprice}}">
                                                                           <input type="hidden" id = "stk<?php echo $n; ?>" value = "{{$medi->stock_qty}}">
                                                                           <input type="hidden" id = "war<?php echo $n; ?>" value = "{{$medi->Wlimit}}">
                                                                           <button data-toggle="modal" onclick = "edit(<?php echo $n; ?>)" data-target="#edit" class = "btn btn-primary btn-sm fa fa-pencil"></button>&nbsp;<button data-toggle="modal" data-target="#delete" onclick = "del(<?php echo $n; ?>)" class = "btn btn-danger btn-sm fa fa-trash-o"></button>
                                                                      </td>
                                                                 </tr>
                                                            <?php $n++; ?>
                                                            @endforeach
                                                            @else
                                                                 <tr>
                                                                      <td colspan="8"><h3 style=" color:black;text-align: center; font-size:20px;">There are no medicines in Pharmacy</h3></td>
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
                         <div style="background-color:white;border-radius:1%; width:93.2%;  max-height: 170px; margin:-12% 6% 0 3.9%;padding-bottom:1%; padding-left:1%;">
                              <h3 style="color:red;">Warnings:</h3>
                              
                              <div style="overflow-y:scroll; position:relative; display:block;  max-height:130px;">
                                   @if(count($warn)>0)
                                        <ul>
                                        @foreach($warn as $warning)
                                             <?php 
                                                  $dt = date('Y-m-d');
                                                
                                                  if($dt >="{$warning->expireDate}"){ ?>
                                                       <li><b style = "color:red">{{$warning->Med_name}}</b> is <b style = "color:red">EXPIRED</b></li>
                                                 <?php }else{?>
                                                       <li><b style = "color:red">{{$warning->Med_name}}</b>'s expire date is <b style = "color:red">{{$warning->expireDate}}</b></li>
                                                 <?php }
                                             ?>
                                                
                                        @endforeach
                                        </ul>
                                   @else
                                        <h3 style = "color: grey;">All medicines are upto date</h3>
                                   @endif

                                   @if(count($warn1)>0)
                                        <ul>
                                        @foreach($warn1 as $warning)
                                             @if($warning->stock_qty <= 0)
                                                  <li><b style = "color:red">{{$warning->Med_name}}</b> stock is <b style = "color:red">EMPTY</b></li>
                                             @else
                                             <li><b style = "color:red">{{$warning->Med_name}}</b>'s stock quantity is <b style = "color:red">{{$warning->stock_qty}}</b></li>
                                             @endif
                                        @endforeach
                                        </ul>
                                   @else
                                        <h3 style = "color: grey;">All medicine stocks are available</h3>
                                   @endif
                              </div>
                         </div>
                         
                    </div>
                </div>
          </div>
     </div>
</section>
<!-- Modal 1-->
<div class="modal fade" id="addmedi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 style="float:left" class="modal-title" id="exampleModalLabel">Add New Medicine</h3>
                    <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               <div class="modal-body">
                    <div style="margin-left:5%;" class="form-group">
                         <form action="/addmedicine" method = "post">
                              @csrf 
                              <input type="hidden" name="usid" value = "{{$c->Phar_id}}">
                              <div class="row">
                                   
                                   
                                   <div style="margin-top:2%; margin-right:2%;color:gray; width:60%; ">
                                        <input autocomplete="off" class="form-control" type="text" id="search"  onkeyup="medicine()"  placeholder="Search Medicine By Name" title="Type ID" style="float:left;"> 
                                   </div>&nbsp; <i style="margin-top:-0.2%;" id="show" onclick="showlist()" class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>


                                   <div id="list" style="z-index:10; position:absolute; width:90%; background-color:white; display:none;">
                                        <table class="table table-bordered table-scroll">
                                             <thead>
                                                  <tr>
                                                       <th>Id</th>
                                                       <th>Name</th>
                                                       <th>Add</th>
                                                  </tr>
                                             </thead>
                                             <tbody class="body-half-screen">
                                             <?php $a = 0; ?>
                                             @foreach($allmedi as $All)
                                                  <tr>
                                                       <input type="hidden" id="tid<?php echo $a; ?>" value="{{$All->Med_id}}">
                                                       <input type="hidden" id="dscr<?php echo $a; ?>" value="{{$All->description}}">
                                                       <input type="hidden" id="tname<?php echo $a; ?>" value="{{$All->Med_name}}">
                                                       <td>{{$All->Med_id}}</td>
                                                       <td>{{$All->Med_name}}</td>
                                                       <td><button type = "button" class = "btn btn-secondary fa fa-plus" onclick = "select(<?php echo $a; ?>)"></button></td>

                                                  </tr>
                                                  <?php $a++; ?>
                                             @endforeach
                                             </tbody>
                                        </table>
                                   
                                   </div>
                                   <br><br>
                                            
                                   <div style="width:40%; margin-right:10%; float:left;" class="column">
                                        <label>Medicine Id</label>
                                        <input type="text" id = "tbid" name = "medid"  readonly class="form-control">
                                   </div>
                                   <div style="width:40%; margin-right:10%; float:right;" class="column">
                                        <label>Medicine Name</label>
                                        <input type="text" id = "tbnm" name = "medname" readonly class="form-control">
                                   </div>
                              </div>
                              <br>
                              <div class="row">
                                   <div style="width:20%; margin-right:15%; float:left;" class="column">
                                        <label>Unit price</label>
                                        <input type="number" step="0.01" name = "uprice"  class="form-control">
                                   </div>
                                   <div style="width:20%; margin-right:15%; float:left;" class="column">
                                        <label>Quantity</label>
                                        <input type="number" name = "qty" class="form-control">
                                   </div>
                                   <div style="width:20%; float:left;" class="column">
                                        <label>Warning Limit</label>
                                        <input type="number" name = "warn" class="form-control">
                                   </div>
                                  
                              </div>
                              <br>
                              <div class="row">
                                   <div style="width:40%; margin-right:10%; float:left;" class="column">
                                        <label>Manufacture Date</label>
                                        <input type="date" name = "mfd" placeholder="Manufacture Date" class="form-control">
                                   </div>
                                   <div style="width:40%; margin-right:10%; float:right;" class="column">
                                        <label>Expiration date</label>
                                        <input type="date" name = "exp" placeholder="Expiration Date" class="form-control">
                                   </div>
                              </div>
                              <br>
                              <div class="row">
                                   <label> Description </label><br>
                                   <textarea style="width:80%; height:220px;" id="descrip" class="form-control" name="descr" readonly></textarea>
                              </div><br>
                              <button style="float:right;" class="btn btn-success">Add to Stock</button><br>
                         </form>
                    
                    </div>
               </div>
              
          </div>
     </div>
</div>


<!-- Modal 2-->
<div class="modal fade" id="viewdesc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 style="float:left" class="modal-title" id="exampleModalLabel">Medicine description</h3>
                    <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>

               <div style="margin-top:-2%;" class="modal-body">
                    <h6 style="float:left; margin-top:0.3%; margin-right:3%;">Medicine ID: </h6>
                    <p style = "font-weight:bold; color:SaddleBrown; opacity: 0.6; float:left; margin-right:30%;"id="meid"></p>
                    <h6 style="float:left; margin-top:0.3%; margin-right:3%;">Medicine Name: </h6>
                    <p style = "font-weight:bold; margin-left:30%; color:SaddleBrown; opacity: 0.6; "id="mename"></p>
                    

                    <h5 style="float:left; margin-top:0.3%; margin-right:3%;">Description: </h5>
                    <p id="disc"></p>


                   
               </div>
              
          </div>
     </div>
</div>
<script>
     function viewdesc(id)
     {
          var meid = document.getElementById('id'+id).value;
          var name =document.getElementById('name'+id).value;
          var disc =document.getElementById('desc'+id).value;

          document.getElementById('meid').innerHTML = meid;
          document.getElementById('mename').innerHTML = name;
          document.getElementById('disc').innerHTML = disc;
     }
</script>

<!-- Modal 3-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div style = "height: 170px;; width:200%; margin-left:-50%; margin-right:-50%; margin-top:35%;" class="modal-content">

               <div style="margin-top:-2%;" class="modal-body">
                    <form action="/updatemedicine/{{$c->Phar_id}}" method="post">
                    @csrf
                         <div style="margin-bottom:3%;">
                              <div style= "float:left; margin-right:2%; width:10%:">
                                   <label  >Medicine ID: </label>
                                   <input class="form-control" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6;" name = "medid" id="mediid" readonly/>
                              </div>
                              
                              <div style= "float:left;margin-right:2%; width:10%:">
                                   <label >Medicine Name: </label>
                                   <input class="form-control" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6; " id="mediname" readonly/>
                              </div>

                              <div style= " float:left;margin-right:2%; width:10%:">
                                   <label >Manufacture Date: </label>
                                   <input class="form-control" type="date" style = "font-weight:bold; ; color:SaddleBrown; opacity: 0.6; " name = "mfd" id="medate" />
                              </div>
                         </div>
                         <div>
                              <div style= "float:left; margin-right:2%; width:10%:">
                                   <label>Expiration Date: </label>
                                   <input class="form-control" type="date" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6; " name="exp"id="exdate" />
                              </div>
                              <div style= "float:left; margin-right:2%; width:10%:">
                                   <label>Warning Limit: </label>
                                   <input class="form-control" type="number" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6; " name="warn"id="wa" />
                              </div>

                              <div style= "float:left;margin-right:2%; width:10%:">
                                   <label >Unit Price: </label>
                                   <input class="form-control" type="number" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6; " name ="uprice" id="price" />
                              </div>

                              <div style= "float:left;margin-right:2%; width:10%:">
                                   <label >Stock QTY: </label>
                                   <input class="form-control" type="number" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6; " name = "qty"id="quan" /> &nbsp;&nbsp;
                                   
                              </div><button style="margin-top:2%;"  class="btn btn-primary">Update</button>
                         </div>
                    </form>
                                       
               </div>
              
          </div>
     </div>
</div>
<script>
     function edit(id)
     {
          var meid = document.getElementById('id'+id).value;
          var name =document.getElementById('name'+id).value;
          var medate =document.getElementById('mdate'+id).value;
          var exdate =document.getElementById('edate'+id).value;
          var price =document.getElementById('prc'+id).value;
          var quan =document.getElementById('stk'+id).value;
          var war =document.getElementById('war'+id).value;
          
          

          document.getElementById('mediid').value = meid;
          document.getElementById('mediname').value = name;
          document.getElementById('medate').value = medate;
          document.getElementById('exdate').value = exdate;
          document.getElementById('wa').value = war;
          document.getElementById('price').value = price;
          document.getElementById('quan').value = quan;
         
         
     }
</script>
<!-- Modal 4-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
          

               <div style="margin-top:-2%;" class="modal-body">
                    <h3 style="text-align:center;">Are You Sure Want To Delete  <b style="color:red;" id="b"></b> From Your Medicine Table ?</h3>
                    <br><form action="/DelMedicine/{{$c->Phar_id}}" method = "post">
                    @csrf
                         <input type="hidden" id = 'a' name = "delid"/>
                         <button style="margin-left:19%;" class ="btn btn-danger"><b>Delete</b> (You cannot recover it)</button> 
                    </form>
                   
                   
                   <button style="float:right; margin-top:-6%; margin-right:25%;"  type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>


                   
               </div>
              
          </div>
     </div>
</div>
<script>
     function del(id)
     {
          var a = document.getElementById('id'+id).value;
          var b = document.getElementById('name'+id).value;
         
          document.getElementById('b').innerHTML = b;
          document.getElementById('a').value = a;
         
          
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


     <!-- For search box  -->
     <script>
    function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
               td = tr[i].getElementsByTagName("td")[0];
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

     function myFunction1() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput1");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
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
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          table = document.getElementById("list");
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

    

     function select(id){
          var ids = document.getElementById('tid'+id).value;
          var nms = document.getElementById('tname'+id).value;
          var dsc = document.getElementById('dscr'+id).value;

          document.getElementById('tbid').value = ids;
          document.getElementById('tbnm').value = nms;
          document.getElementById('descrip').value = dsc;

          showlist();
          
     }

     function showlist()
     {
          var cls = document.getElementById('show').className;
          console.log(cls);
          if(cls == "fa fa-plus-circle fa-2x"){
               document.getElementById('show').className = "fa fa-times-circle fa-2x";

               document.getElementById('list').style.display = "block";
          }else{
               document.getElementById('show').className = "fa fa-plus-circle fa-2x";
               document.getElementById('list').style.display = "none";
          }
     }

   
     
     </script>
</body>
</html>