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
     <!-- For Table -->
     <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
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
  flex-basis:100%;
  flex-grow:2;
  display: block;
  padding: 1rem;
  text-align:center;
}
/* Other options */
.table-scroll.small-first-col td:first-child,
.table-scroll.small-first-col th:first-child{
  flex-basis:20%;
  flex-grow:1;
}
.table-scroll tbody tr:nth-child(2n){
  background-color: rgba(255,240,245,0.4);
}
.body-half-screen{
  max-height: 53vh;
  
}
.small-col{flex-basis:10%;}
 </style>

</head>
<body>
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

     <!-- PRE LOADER -->
     <section class="preloader">
        

          <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
          <span class="sr-only">Loading...</span>
               
     
     </section>
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>

     <!-- MENU -->
     <section style="background-color:white; height:10%;" class="navbar custom-navbar navbar-fixed-top" role="navigation">
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
                    <li><a style= "color:black;" href="{{route('medicalstock',$c->Phar_id)}}" class="smoothScroll">Maintain medical stock</a></li>
                    <li><a style= "color:black;" href="{{route('issueMedicine',$c->Phar_id)}}" class="smoothScroll"><font color="red">Issue medicine</font></a></li>
                    <li><a style= "color:black;" href="{{route('phaordermedicine',$c->Phar_id)}}" class="smoothScroll">Order medicine</a></li>
                         
               </ul>

               <ul class="nav navbar-nav navbar-right">
                    <li><a style= "color:black;" href="/login">Logout</a></li>
               </ul>
          </div>
     </div>
</section>

<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class=" owl-theme">
               <div class="item item-first">
                         <!--<div class="caption">-->
                    <br><br>
                    <br><br>
                    <br><br>
                    <!-----Table1----->
                    <div style="max-height:80%; width:45%; margin: 0% 2% 0 4%; float: left; background-color:white; border-radius:0.5%;"class="container">
                         <div class="col-md-16 col-sm-12">
                              <div class="container-lg">
                                   <div class="table-responsive">
                                        <div class="table-wrapper">
                                            <div class="table-title">
                                                  <div ><h2>Patient's Medicine Orders</h2></div>
                                                       <!--<div class="row">-->
                                                  </div>
                                                  <table  class="table table-bordered table-scroll">
                                                       <thead>
                                                            <tr>
                                                                 <th>Patient ID</th>
                                                                 <th>Date</th>
                                                                 <th>View</th>
                                                            </tr>
                                                       </thead>
                                                       
                                                       <tbody class="body-half-screen">
                                                       @if(count($pat) > 0)
                                                       <?php $q = 0; ?>
                                                       @foreach($pat as $patient)
                                                            <tr>
                                                                 <td>{{$patient->Pat_id}}</td>
                                                                 <td>{{$patient->PatMedOrder_date}}</td>
                                                                 <td>
                                                                      <input type="hidden" id = "pid<?php echo $q; ?>" value="{{$patient->Pat_id}}">
                                                                      <input type="hidden" id = "oid<?php echo $q; ?>" value="{{$patient->PatMedOrder_id}}">
                                                                      <input type="hidden" id = "pdt<?php echo $q; ?>" value="{{$patient->PatMedOrder_date}}">
                                                                      <input type="hidden" id = "medicine<?php echo $q; ?>" value="{{$patient->medicines}}">
                                                                      <button type="button" class ="btn btn-primary btn-sm" data-toggle="modal" onclick = "issuepat(<?php echo $q; ?>)" data-target="#issueorder">View</button>
                                                                 </td>
                                                            </tr>
                                                            <?php $q++; ?>
                                                       @endforeach
                                                       @else
                                                            <tr>
                                                                 <td colspan="3"><h3 style=" color:black;text-align: center; font-size:20px;">There Are No Unsent Orders From Patient</h3></td>
                                                            </tr>
                                                       @endif  
                                                                            
                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                   </div>                                
                                             <!--      -->
                              </div>
                                   
                         </div>
                                  
<!-- Patient Orders-->
<div class="modal fade" id="issueorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h3  style="float:left; color:black;  font-size:25px;" class="modal-title" id="exampleModalLabel">Issue Patient's Order</h3>
                    <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               <div class="modal-body">
                   <form id = "form" action="{{ route('issuepatorder') }}" method="post">
                   @csrf
                  
                   <label style=" font-size:10px; float:left; margin-top:1%;" for="">Order ID: </label>
                   <input class = "form-control"style=" font-size:10px;font-weight:bold; color:navy;  width:20%; height: 10%; float:left;  margin-left:2%; margin-right:2%;" type="text" name = "orid" id = "orid" readonly/>

                   <label style=" font-size:10px; float:left; margin-top:1%;" for="">Patient ID: </label>
                   <input class = "form-control" style="font-size:10px;font-weight:bold; color:navy;  width:15%; height: 10%; margin-left:2%; float:left; margin-right:2%;" type="text" name = "patid" id = "patid" readonly/>

                   <label style=" font-size:10px;  float:left; margin-right:1%; margin-top:1%;" for="">Order Date: </label>
                   <input class = "form-control" style="font-size:10px; font-weight:bold; color:navy; width: 22.5%; margin-left: 12%; height:30px;" type="date" name = "odate" id = "odate" readonly/>
                   <br><h3 style="float:left; color:gray;  font-size: 20">Medicine List</h3><br><br>

                   <div id = "myIn">
                   
                   </div>

                    
                   <button id="sub" type = "submit" class="btn btn-primary btn-sm">Issue Order</button>                   
                   </form>
               </div>
              
          </div>
     </div>
</div>                           
                                  
<script>
     function issuepat(id){
          var div = document.getElementById('myIn');

          div.remove();

          var form = document.getElementById('form');
          var div = document.createElement('div');
          div.setAttribute("id","myIn");
        
          document.getElementById('orid').value = document.getElementById('oid'+id).value;
          document.getElementById('patid').value = document.getElementById('pid'+id).value;
          document.getElementById('odate').value = document.getElementById('pdt'+id).value;

          
         var sub = document.getElementById('sub');
          
          var br = document.createElement('br');
          

          var tmp = document.getElementById('medicine'+id).value;
          var arr = tmp.substring(2,tmp.length-2);
          arr = arr.split(',');
          var i = 0;
          for( i; i< arr.length; i++){
               if(i%2 == 0){
                    var in1 = document.createElement('input');
                    in1.setAttribute("type", "text");
                    in1.setAttribute("name", "medi"+i);
                    in1.setAttribute("class", "form-control");
                    in1.setAttribute("style", "width:30%; margin-left: 2%; margin-bottom:2%; margin-right: 2%; float:left;");
                    in1.setAttribute("readonly", true);
                    in1.setAttribute("value", arr[i]);
                    div.appendChild(in1);
                    
               }else{
                    var in2 = document.createElement('input');
                    in2.setAttribute("type", "number");
                    in2.setAttribute("name", "qt"+i);
                    in2.setAttribute("class", "form-control");
                    in2.setAttribute("readonly", true);
                    in2.setAttribute("style", "width:30%;  margin-left: 2%;  margin-bottom:2%;");
                    in2.setAttribute("value", arr[i]);
                    div.appendChild(in2);
                    div.appendChild(br);
                    div.appendChild(br);
                    

               }

               form.appendChild(div);
               
               
               var k = form.getElementsByTagName("input").length;
              

          }  
                    var in3 = document.createElement('input');
                    in3.setAttribute("type", "hidden");
                    in3.setAttribute("name", "count");
                    in3.setAttribute("style", "width:30%;  margin-left: 2%;  margin-bottom:2%;");
                    in3.setAttribute("value", i);
                    form.appendChild(in3);
                    form.appendChild(sub);
          console.log(i);
          
     }
</script>                               
                                  
                                  
                                  
                                  
                                  
                                  
                                  
<!--          Table2   -->




                    <div style="max-height:80%; width:40%; margin: 0% 2% 0 4%; float: left; background-color:white; border-radius:0.5%;"class="container">
                         <div class="col-md-16 col-sm-12">
                              <div class="container-lg">
                                   <div class="table-responsive">
                                        <div class="table-wrapper">
                                            <div class="table-title">
                                                  <div ><h2>Doctor's Prescription</h2></div>
                                                       <!--<div class="row">-->
                                                  </div>
                                                  <table  class="table table-bordered table-scroll">
                                                       <thead>
                                                            <tr>
                                                                      <th>Doctor ID</th>
                                                                      <th>Patient ID</th>
                                                                      <th>Date</th>
                                                                      <th>View</th>
                                                            </tr>
                                                       </thead>
                                                       
                                                       <tbody class="body-half-screen">
                                                       @if(count($doc) > 0)
                                                       <?php $q = 0; ?>
                                                       @foreach($doc as $doctor)
                                                            <tr>
                                                                 <td>{{$doctor->Doc_id}}</td>
                                                                 <td>{{$doctor->Pat_id}}</td>
                                                                 <td>{{$doctor->created_at}}</td>
                                                                 <td>
                                                                      <input type="hidden" id = "paid<?php echo $q; ?>" value="{{$doctor->Pat_id}}">
                                                                      <input type="hidden" id = "meid<?php echo $q; ?>" value="{{$doctor->Meeting_id}}">
                                                                      <input type="hidden" id = "dcrid<?php echo $q; ?>" value="{{$doctor->Doc_id}}">
                                                                      <input type="hidden" id = "drmedi<?php echo $q; ?>" value="{{$doctor->medicine}}">
                                                                      <button type="button" class ="btn btn-primary btn-sm" data-toggle="modal" onclick = "issuedoc(<?php echo $q; ?>)" data-target="#issuedocorder">View</button>
                                                                 </td>
                                                            </tr>
                                                            <?php $q++; ?>
                                                       @endforeach
                                                       @else
                                                            <tr>
                                                                 <td><h3 style=" color:black;text-align: center; font-size:20px;">There Are No Not Issued Orders From Doctor</h3></td>
                                                            </tr>
                                                       @endif  
                                                                            
                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                   </div>                                
                                             <!--      -->
                              </div>
                                   
                         </div>
                                  
<!-- Doctor prescription Orders-->
<div class="modal fade" id="issuedocorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h3  style="float:left; color:black;  font-size:22px;" class="modal-title" id="exampleModalLabel">Issue Doctor's Prescription</h3>
                    <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               <div class="modal-body">
                   <form id = "formdr" action="{{ route('issuedocorder') }}" method="post">
                   @csrf
                  
                   <label style=" font-size:10px; float:left; margin-top:1%;" for="">Meeting ID: </label>
                   <input class = "form-control"style=" font-size:10px;font-weight:bold; color:navy;  width:20%; height: 10%; float:left;  margin-left:2%; margin-right:2%;" type="text" name = "drmid" id = "drmid" readonly/>

                   <label style=" font-size:10px; float:left; margin-top:1%;" for="">Patient ID: </label>
                   <input class = "form-control" style="font-size:10px;font-weight:bold; color:navy;  width:15%; height: 10%; margin-left:2%; float:left; margin-right:2%;" type="text" name = "drpatid" id = "drpatid" readonly/>

                   <label style=" font-size:10px;  float:left; margin-right:1%; margin-top:1%;" for="">Doctor ID: </label>
                   <input class = "form-control" style="font-size:10px; font-weight:bold; color:navy; width: 22.5%; margin-left: 12%; height:30px;" type="text" name = "dcid" id = "dcid" readonly/>
                   <br><h3 style="float:left; color:gray;  font-size: 20">Medicine List</h3><br><br>

                   <div id = "myIndr">
                   
                   </div>

                    
                   <button id="subdr" type = "submit" class="btn btn-primary btn-sm">Issue Order</button>                   
                   </form>
               </div>
              
          </div>
     </div>
</div>                           
                                  
<script>
     function issuedoc(id){
          var div = document.getElementById('myIndr');

          div.remove();

          var formdr = document.getElementById('formdr');
          var divdr = document.createElement('div');
          divdr.setAttribute("id","myIndr");
        
          document.getElementById('drmid').value = document.getElementById('meid'+id).value;
          document.getElementById('drpatid').value = document.getElementById('paid'+id).value;
          document.getElementById('dcid').value = document.getElementById('dcrid'+id).value;

          
         var subdr = document.getElementById('subdr');
          
          var brk = document.createElement('br');
          

          var temp = document.getElementById('drmedi'+id).value;
          var arr2 = temp.substring(2,temp.length-2);
          arr2 = arr2.split(',');
          var j = 0;
          for( j; j< arr2.length; j++){
               if(j%2 == 0){
                    var inp1 = document.createElement('input');
                    inp1.setAttribute("type", "text");
                    inp1.setAttribute("name", "drmedic"+j);
                    inp1.setAttribute("class", "form-control");
                    inp1.setAttribute("style", "width:30%; margin-left: 2%; margin-bottom:2%; margin-right: 2%; float:left;");
                    inp1.setAttribute("readonly", true);
                    inp1.setAttribute("value", arr2[j]);
                    divdr.appendChild(inp1);
                    
               }else{
                    var inp2 = document.createElement('input');
                    inp2.setAttribute("type", "number");
                    inp2.setAttribute("name", "drqt"+j);
                    inp2.setAttribute("class", "form-control");
                    inp2.setAttribute("readonly", true);
                    inp2.setAttribute("style", "width:30%;  margin-left: 2%;  margin-bottom:2%;");
                    inp2.setAttribute("value", arr2[j]);
                    divdr.appendChild(inp2);
                    divdr.appendChild(brk);
                    divdr.appendChild(brk);
                    

               }

               formdr.appendChild(divdr);
               
               
               var w = formdr.getElementsByTagName("input").length;
              

          }  
                    var inp3 = document.createElement('input');
                    inp3.setAttribute("type", "hidden");
                    inp3.setAttribute("name", "countdr");
                    inp3.setAttribute("style", "width:30%;  margin-left: 2%;  margin-bottom:2%;");
                    inp3.setAttribute("value", j);
                    formdr.appendChild(inp3);
                    formdr.appendChild(subdr);
                    console.log(j);
          
     }
</script>



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

     <!-- For Table -->
     <script>
     $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
          var actions = $("table td:last-child").html();

          // Delete row on delete button click
          $(document).on("click", ".delete", function(){
          $(this).parents("tr").remove();
               $(".add-new").removeAttr("disabled");
          });
     });
     </script>

     
</body>
</html>