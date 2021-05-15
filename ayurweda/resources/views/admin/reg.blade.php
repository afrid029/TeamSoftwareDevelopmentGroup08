<!DOCTYPE html>
<html lang="en">
<head>

     <title>Registration</title>

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
          .slider .item-first {
          background-image: url(../images/admin.jpg);
          margin: -38px;
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
  max-height: 60vh;
  
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

      
     <section class="navbar custom-navbar navbar-fixed-top"  role="navigation">
          <div class="container">
 
               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    
                    <a href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa</a>
               </div>

              
               <div class="collapse navbar-collapse">

                   <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('adminpage',$c->id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('regist',$c->id)}}" class="smoothScroll"><font color="red">Registration</font></a></li>
                          <li><a href="{{route('profit',$c->id)}}" class="smoothScroll">Report</a></li>
                    </ul>
                     
                    <ul class="nav navbar-nav navbar-right">

                         <li><a  href="/logout">Logout</a></li>


                    </ul>
               </div>

          </div>
          
     </section>

     <br><br>
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
@if($msg=session()->get('msg'))


<script>

Swal.fire({
  position: 'middle',
  icon: 'success',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 2000
});
</script>
@endif
     
     <!-- for registration part -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class=" owl-theme">
               <div class="item item-first">
                    <div class="caption">
                         <br><br>
                         <div style="height:95%; width:70%; margin: -2% 10% 0 15%; background-color:white; border-radius:0.5%;" class="container">
                         
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:90%; float:left; margin-left:2%;">
                                                       <div class="table-title">
                                                       </div><h2 style="float:left;">All Users</h2>
                                                            <div style="float:right; margin-top:2%;">
                                                                 <div style="margin-top:2%;margin-left:-20%; margin-right:4%;color:gray; width:60%; float:left;">
                                                                      <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search User name" title="Type ID">   
                                                                 </div>
                                             
                                                                 <div style="margin-top:2%; float:left; margin-right:-14%;" class="col-sm-1">
                                                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus"></i> &nbsp;New Register</button>
                                                                 </div>
                                                            </div>
                                                            
                                                            
                                                       </div>
                                                       <table id="myTable" style="color:black; width:100%;" class="table table-bordered table-scroll">
                                                       
                                                            <thead>
                                                                 <tr>
                                                                     
                                                                      <th>User Name</th>
                                                                      <th>Roll</th>
                                                                      <th>View Profile</th>
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                           
                                                            @foreach($users as $user)
                                                                 <tr>
                                                                      <td>{{$user->id}}</td>
                                                                      <td>{{$user->roll}}</td>
                                                                      <td> <a href = "{{route('profview',['c'=>$user->id])}}" class = "btn btn-primary fa fa-eye">&nbsp;View</a></td>
                                                                      
                                                                 </tr>
                                                            @endforeach
                                                          
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
          </div>
     </div>
</section>
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
     </script>

<!-- Modal 1-->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h3 style="float:left" class="modal-title" id="exampleModalLabel">Register Here</h3>
                    <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               <div style="width:90%; margin-left:5%; margin-right:5%;" class="modal-body">
                    <div >
                         <form action="/addnew" method="post" >
                         @csrf
                         <input type="hidden" name = "usid" value="{{$c->id}}">
                              <div style="width:50%; float:left;" >
                                   <select id = "roll" name ="roll" class="form-control" onchange="selectroll()" >
                                        <option value="none" selected disabled hidden>Select a roll</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="Pharmacist">Pharmacist</option>
                                        <option value="Medicine Producer">Medicine Producer</option>
                                        <option value="Supplier">Supplier</option>
                                   </select> 
                              </div>
                              <div style="width:45%; float:right;" >
                                   <input type="hidden" id="dr" value="{{$doct}}">
                                   <input type="hidden" id="ph" value="{{$phar}}">
                                   <input type="hidden" id="pro" value="{{$prod}}">
                                   <input type="hidden" id="sup" value="{{$supp}}">
                                   <input class="form-control" type="text" name="id" id ="id" placeholder="User ID" readonly><br>
                              </div>
                             
                              <div style = "width:65%">
                                   <input class="form-control" type="text" name="password" placeholder="Password"><br>
                              </div>
                              <div style = "width:65%">
                                   <input class="form-control" type="text" name="name" placeholder="User Name"><br>
                              </div>
                              <div style = "width:65%">
                                   <input class="form-control" type="email" name="email" placeholder="Email"><br>
                              </div>
                              <div style = "width:65%">
                                   <input class="form-control" type="email" name="reemail" placeholder="Retype-Email"><br>
                              </div>
                              
                              <button type="submit" class="btn btn-success btn-sm">Register</button>
                              
                         </form>
                    
               </div>
              
          </div>
     </div>
</div>


<script>
     function selectroll(){
          var roll = document.getElementById('roll').value;
          if(roll == "Doctor"){
               var count = document.getElementById('dr').value;
               document.getElementById('id').value = "doc"+count;
          }else if(roll == "Pharmacist"){
               var count = document.getElementById('ph').value;
               document.getElementById('id').value = "pha"+count;
          }else if(roll == "Medicine Producer"){
               var count = document.getElementById('pro').value;
               document.getElementById('id').value = "prod"+count;
          
          }else{
               var count = document.getElementById('sup').value;
               document.getElementById('id').value = "sup"+count;
          }
          
          
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