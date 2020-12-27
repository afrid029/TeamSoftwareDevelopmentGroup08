<!DOCTYPE html>
<html lang="en">
<head>

     <title>Medicines</title>

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
          width:100%;
        overflow-y: auto;
        height: 300px;
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      th {
        background: gray;
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
               <div style="background-color:#154360 " class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('mphome',$c->Pro_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('issuemedicine',$c->Pro_id)}}" class="smoothScroll">Issue <br>Medicines</a></li>
                         <li><a href="{{route('Ingstock',$c->Pro_id)}}" class="smoothScroll">Ingredients <br>Stock</a></li>
                         <li><a href="{{route('medstock',$c->Pro_id)}}" class="smoothScroll">Medicine <br>Stock</a></li>
                         <li><a href="{{route('ordering',$c->Pro_id)}}" class="smoothScroll">Order <br>Ingredients</a></li>
                         <li><a href="{{route('medicines',$c->Pro_id)}}" class="smoothScroll"><font color="red">Medicines</font></a></li>
                    </ul>
                     
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
               </div>
          </div>
     </section>

     
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
          <div class="">
               <div class="item item-first">
                    <div class="caption">
                         <br><br>
                         <div style="height:70%; width:88%; margin: -12% 6% -10% 6%; background-color:rgba(255,255,255,0.5); border-radius:0.5%;" class="container">
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:50%; margin-right: -20%; float:left; margin-left:2%;"><h2>Medicines</h2></div>
                                                       <div class="table-title">
                                                            <div style="margin-top:2%; margin-right:2%;color:gray; width:20%; float:left;">
                                                                 <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Medicine By ID" title="Type ID">   
                                                            </div>
                                                            <input style="margin-top:2%; width: 20%; float:left;"  class="form-control" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search Medicine By Name" title="Type Name">
                                                            <div style="margin-top:2%; float:left; margin-left:4%;" class="col-sm-1">
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmedi"><i class="fa fa-plus"></i> Add New</button>
                                                            </div>
                                                       </div>
                                                       <div class="tableFixHead">
                                                       <table id="myTable" style="color:black;" class="table table-bordered table-scroll">
                                                            <thead>
                                                                 <tr>
                                                                      <th>Medicine ID</th>
                                                                      <th>Medicine Name</th>
                                                                      <th>Description</th>
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                            @if(count($p))
                                                            <?php $n = 0;?>
                                                            @foreach($p as $medi)
                                                                 <tr>
                                                                      <td>{{$medi->Med_id}}</td>
                                                                      <td>{{$medi->Med_name}}</td>
                                                                      <td>
                                                                           <input type="hidden" id = "id<?php echo $n; ?>" value="{{$medi->Med_id }}">
                                                                           <input type="hidden" id = "name<?php echo $n; ?>" value = "{{$medi->Med_name}}">
                                                                           <input type="hidden" id = "desc<?php echo $n; ?>" value = "{{$medi->description}}">
                                                                           <button class = "btn btn-success btn-sm" data-toggle = "modal" onclick = "viewdesc(<?php echo $n; ?>)" data-target="#viewdesc">View</button>
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
                         <form action="/newmedicine" method = "post">
                              @csrf 
                              
                              
                                   <input type="hidden" name = "id" value="{{$c->Pro_id}}" class="form-control">
                                   <div style="margin-right:10%;margin-left:10%;" class="column">
                                        <label>Medicine Name</label>
                                        <input type="text" name = "medname" class="form-control">
                                   </div>
                                   <div style="margin-right:10%;margin-left:10%;" class="column">
                                        <label> Description </label><br>
                                        <textarea style=" height:220px;" class="form-control" name="descr" ></textarea>
                                   </div>
                               <div style=" margin-right:10%;" class="column">
                               <br>
                              <button style="float:right;" class="btn btn-success">Add to Stock</button><br>
                              </div>
                              
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
     </script>

</body>
</html>