<!DOCTYPE html>
<html lang="en">
<head>

     <title>Prescription</title>

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
      .tableFixHead {
        overflow-y: auto;
        height: 340px;
        
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      table {
    border-collapse: collapse;
    margin-bottom: 3em;
    width: 100%;
    background: #fff;
}
td, th {
    padding: 0.75em 1.5em;
    text-align: left;
}
	td {
		color: gray;
		line-height: 1;
	}
th {
    background-color: #31bc86;
    font-weight: bold;
    color: #fff;
    white-space: nowrap;
}
tbody th {
	background-color: #2ea879;
}
tbody tr:nth-child(2n-1) {
    background-color: #f5f5f5;
    transition: all .125s ease-in-out;
}
tbody tr:hover {
    background-color: rgba(129,208,177,.3);
}
.btn-outline-danger:hover{
     color: white;
     background-color:#4682B4;
     border-color:grey;
}
.btn-outline-danger{
     color: #4682B4;
    border-color:#4682B4;
    
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
  background-color: #2ea879;  
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
  max-height: 50vh;
  
}
.small-col{flex-basis:10%;}

    </style>
    <script>
    function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
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
     </script>
    
     
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
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/welcome" class="navbar-brand">Hospital </a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll"><font color="red">Prescriptions</font></a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patient <br>Details</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patients</a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll">Available <br>Time</a></li>
                         <li><a href="{{route('docsymp',$c->Doc_id)}}" class="smoothScroll">Medical <br>Symptomps</a></li>
                         <li><a href="{{route('appointment',$c->Doc_id)}}" class="smoothScroll">Appointments</a></li>
                         
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a  href="/logout">Logout</a></li>
                    </ul>
               </div>

          </div>
     </section>
@if($msg = session()->get('msg'))
@if($msg=="Prescription added successfully")
<script>
Swal.fire({
  position: 'middle',
  icon: 'success',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 1500
});
</script>
@elseif($msg=="The patient doesn't exist.")
<script>
Swal.fire({
  position: 'middle',
  icon: 'error',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 1500
});
</script>
@endif
@endif
@if($errors->any())
     <script> var a=""; </script>
     @foreach($errors->all() as $err)
  
     <script>
          a = a + "{{$err}}\n";
     </script>
    
     @endforeach

     <script>
     Swal.fire({
               position: 'top',
               icon: 'warning',
               title: a,
               showConfirmButton: false,
               timer: 2000
            
          });
     </script>
@endif


     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add a prescription</h5>
           
          </div>

          <div class="modal-body">
          <form id = "form" method="post" action="/savepres" onsubmit="submitting()" enctype="multipart/form-data">
          {{csrf_field()}}
          
          <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
          <input style = "width:30%; float:left;" class="form-control" type="text" name="patientid" placeholder="Patient ID"><br>
          <input style = "width:40%; float:right; margin-top:-4%;" class="form-control" type="text" name="disease" placeholder="Disease"><br>
          <textarea class="form-control" rows="3" cols="3"name="diagnosis" placeholder="Diagnosis"></textarea><br>
         

                    <h4>Medicine Name</h4>
                    @if(count($stocks) > 0)                          
                    
                    <?php $k = 0; ?>
                    <div class = "form-control"style="height:120px; border:1px solid; overflow-y:scroll;">
                    
                    @foreach($stocks as $stock)
                         
                         <input type="checkbox"  id = "med<?php echo $k; ?>" name = "med<?php echo $k; ?>" value = "{{$stock->Med_name}}" onclick="qtybox(<?php echo $k; ?>)"/>
                         <label>{{$stock->Med_name}}</label>
                         <button type="button" class="btn btn-info btn-sm fa fa-plus-circle " onclick="add(<?php echo $k; ?>)" id="btn<?php echo $k; ?>" style="display:none; float:right; padding:0.7%;"></button>
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
                    <div id = "myDiv" style="max-height:150px; overflow-y :scroll;">
                    
                    </div>
                    
                    <input type="hidden" name = "medic[]" id = "medic" >

          

          <button id="send" type = "submit" class="btn btn-primary btn-sm" style="display:none; overflow-y:fixed;">Prescript Medicine</button>
          </form>
   


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
          
          var submit = document.getElementById('send');
          window.setInterval( function(){
               var c = div.getElementsByTagName('input').length;
               var z = document.getElementById("send");
               var head = document.getElementById("head");
               

               if (c > 0){
                    z.style.display = "block";
                    head.style.display = "block";
                    div.style.display = "block";
                   

               }else{
                    z.style.display = "none";
                    head.style.display = "none";
                    div.style.display = "none";
                    
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
                    input1.setAttribute("style","margin-right:5px; width:30%; float:left; height:25px;");
                    
                    var input2 = document.createElement("input");
                    input2.setAttribute("type","number");
                    input2.setAttribute("name","qt"+id);
                    input2.setAttribute("id","qt"+id);
                    input2.setAttribute("value",qty);
                    input2.setAttribute("readonly",true);
                    input2.setAttribute("class","form-control");
                    input2.setAttribute("style","margin-right:5px; width:15%;height:25px;");

               
                    var br = document.createElement("br");

                    div.appendChild(input1);
                    
                    div.appendChild(input2);

                    var rem = document.createElement("button");
                    rem.setAttribute("class", "btn btn-danger fa fa-minus-circle ");
                    rem.setAttribute("type", "button");
                    rem.setAttribute("style","margin-right:5px; float:right; margin-top:-4.5%; margin-right:45%;padding:0.7%;");
                    rem.setAttribute("id", "del"+id);
                    rem.setAttribute("onclick", "remove("+id+")");
                    div.appendChild(rem);
                   div.appendChild(br);
                    form.appendChild(div);
                  
                    form.appendChild(submit);
               
               

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
               var pp = div.getElementsByTagName("input").length;
               var arr = Array();
               for(var i = 0 ; i < pp ; i++){
                    console.log(form.getElementsByTagName("input")[i].value);
                    arr[i] = div.getElementsByTagName("input")[i].value;
               }
               document.getElementById('medic').value = arr;
               console.log("okkkk");
          }
     </script>



 
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          
     </div>
     </div>
     </div>

     <!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class="owl-theme">
               <div class="item item-first">
                    <div class="caption">
                         <div style="height:70%; width:88%; margin: -12% 6% -10% 6%; background-color:rgba(255,255,255,0.5); border-radius:0.5%;" class="container">
                          <br>
                              <div style="float:left; width:40%;">
                                   <form action="/pressearch" method="post">
                                   {{csrf_field()}}
                                        <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
                                        <div style="float:left;"><input class="form-control" type="text" placeholder="Patient ID" name="patid"></div>
                                        <div style="float:left;"><input class="form-control" type="date" placeholder="Date" name="date"></div>
                                        <div style="float:left;"><button class="form-control" type="submit"><i class="fa fa-search"></i></button></div>
                                   </form>
                              </div>
                              <div style="float:right; margin-right:10%;">
                                   <button type="button" class="btn btn-primary" style="margin-right:0%;" data-toggle="modal" data-target="#exampleModal">
                                             Add a prescription
                                   </button>
                                   <a style="float:right; font-size:20px; margin-left:20px; margin-bottom:3px; font-weight:bold;" data-target="#patients" data-toggle="modal" class = "btn btn-outline-danger fa fa-user">&nbsp;&nbsp; Patients</a>
                              </div>
                              <br><br>
                              <div>
                                   <table class="table table-bordered table-scroll">
                                        <thead>
                                             <tr>
                                                  <th>Meeting ID</th>
                                                  <th>Patient ID</th>
                                                  <th>Doctor ID</th>
                                                  <th>Date</th>
                                                  <th>Disease</th>
                                                  <th>Diagnosis</th>
                                                  <th>Medicine</th>
                                             </tr>
                                        </thead>
                                        @if($pres1=session()->get('pres1'))
                                        <?php $press=$pres1; ?>
                                        @else
                                        <?php $press=$pres; ?>
                                        @endif
                                        <tbody class="body-half-screen">
                                             @if(count($press) > 0)
                                             <?php $no = 0; ?>
                                             @foreach($press as $pr)
                                             <tr>
                                                  <td>{{$pr->Meeting_id}}</td>
                                                  <td>{{$pr->Pat_id}}</td>
                                                  <td>{{$pr->Doc_id}}</td>
                                                  <td>{{$pr->created_at}}</td>
                                                  <td>{{$pr->disease}}</td>
                                                  <td>{{$pr->diagnosis}}</td>
                                                  <td>
                                                       <input type="hidden" id="m<?php echo $no; ?>" value="{{$pr->medicine}}">
                                                       <input type="hidden" id="bil<?php echo $no; ?>" value="{{$pr->bill}}">
                                                       <button type="submit" id = "button<?php echo $no; ?>" onclick="viewing(<?php echo $no; ?>)" class="btn btn-primary btn-sm" >View</button>
                                                       
                                                  </td>
                                             </tr>
                                             <?php $no++; ?>
                                             @endforeach
                                             @else
                                             <tr>
                                                  <td colspan="7"><h3 style=" color:black;text-align: center;">No prescriptions found</h3></td>
                                             </tr>
                                         @endif
                                        </tbody>
                                   </table>
                              </div><br>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>
     <!--Patients modal-->
                              <div style = "overflow:scroll;" class="modal fade" id="patients" tabindex="-1" role="dialog" aria-labelledby="doctors" aria-hidden="true">
                                   <div class="modal-dialog" role="dialog">
                                        <div class="modal-content"  style="width:90%; margin-left:5%; margin-right:5%;">
                                             <div class="modal-header">
                                                  <h4 class="modal-title" id="exampleModalLabel">Patients Details</h4>
                                                 
                                             </div>
                                             <div  class="modal-body">
                                                     <table id="myTable" class="table table-bordered table-scroll" style="color:black; width:100%;" >
                                                            <thead>
                                                                 <tr>
                                                                      <th>Patient Name</th>
                                                                      <th>View</th>
                                                                      
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                            @if(count($pa))
                                                            
                                                            @foreach($pa as $d)
                                                                 <tr>
                                                                      <td>{{$d->Pat_name}}</td>
                                                                      <td><a href = "{{route('profview',['c'=>$d->Pat_id])}}" class = "btn btn-primary fa fa-eye">&nbsp;View</a></td>
                                                                      
                                                                 </tr>
                                                       
                                                            @endforeach
                                                            @else
                                                                 <tr>
                                                                      <td colspan="8"><h3 style=" color:black;text-align: center; font-size:20px;">There Are No Patients</h3></td>
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
     <script>
                                             function viewing(id){
                                                  var a = document.getElementById('m'+id).value;
                                                  var z = "Bill : Rs " +document.getElementById('bil'+id).value;
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
                                                       text:z,
                                                       icon: 'info',
                                                       title: result,
                                                      
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