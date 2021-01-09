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
.btn-dark{
     display:none;
    margin-top:2px;
    width:100%;
     background-color:Black;
     opacity:0.8;
}
.img:hover + .btn-dark, .btn-dark:hover{
     display:inline-block;
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
  max-height: 50vh;
  
}
.small-col{flex-basis:10%;}
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
                         <li><a href="{{route('issueing',$c->Sup_id)}}" class="smoothScroll">Ingredients Orderings</a></li>
                         <li><a href="{{route('newing',$c->Sup_id)}}" class="smoothScroll"><font color="red">Ingridients</font></a></li>
                         
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a  href="/logout">Logout</a></li>
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
                         <br><br>
                         <br><br>
                         <br><br>
                         <div style="height:85%; width:88%; margin: -4% 6% 0 6%; background-color:white; border-radius:0.5%;" class="container">
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:50%; margin-right: -20%; float:left; margin-left:2%;"><h2>Ingredients</h2></div>
                                                       <div class="table-title">
                                                            <div style="margin-top:2%; margin-right:2%;color:gray; width:20%; float:left;">
                                                                 <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Ingredient By ID" title="Type ID">   
                                                            </div>
                                                            <input style="margin-top:2%; width: 20%; float:left;"  class="form-control" type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search Ingredient By Name" title="Type Name">
                                                            <div style="margin-top:2%; float:left; margin-left:4%;" class="col-sm-1">
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmedi"><i class="fa fa-plus"></i> Add New</button>
                                                            </div>
                                                       </div>
                                                       <div class="tableFixHead">
                                                       <table id="myTable" style="color:black;" class="table table-bordered table-scroll">
                                                            <thead>
                                                                 <tr>
                                                                      <th>Ingredient ID </th>
                                                                      <th>Ingredient Name</th>
                                                                      <th>Description</th>
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                            @if(count($p))
                                                            <?php $n = 0;?>
                                                            @foreach($p as $in)
                                                                 <tr>
                                                                      <td>{{$in->Ing_id}}</td>
                                                                      <td>{{$in->Ing_name}}</td>
                                                                      <td>
                                                                           <input type="hidden" id = "id<?php echo $n; ?>" value="{{$in->Ing_id }}">
                                                                           <input type="hidden" id = "name<?php echo $n; ?>" value = "{{$in->Ing_name}}">
                                                                           <input type="hidden" id = "desc<?php echo $n; ?>" value = "{{$in->description}}">
                                                                           <button class = "btn btn-success btn-sm" data-toggle = "modal" onclick = "viewdesc(<?php echo $n; ?>)" data-target="#viewdesc">View</button>
                                                                      </td>
                                                                 </tr>
                                                            <?php $n++; ?>
                                                            @endforeach
                                                            @else
                                                                 <tr>
                                                                      <td colspan="8"><h3 style=" color:black;text-align: center; font-size:20px;">There are no ingredients</h3></td>
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
                    <h3 style="float:left" class="modal-title" id="exampleModalLabel">Add New Ingredient</h3>
                    <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               <div class="modal-body">
                    <div style="margin-left:5%;" class="form-group">
                         <form action="/newingredient" method = "post">
                              @csrf 
                              
                              
                                   <input type="hidden" name = "id" value="{{$c->Sup_id}}" class="form-control">
                                   <div style="margin-right:10%;margin-left:10%;" class="column">
                                        <label>Ingredient Name</label>
                                        <input type="text" name = "ingname" class="form-control">
                                   </div>
                                   <div style="margin-right:10%;margin-left:10%;" class="column">
                                        <label> Description </label><br>
                                        <textarea style=" height:220px;" class="form-control" name="descr" ></textarea>
                                   </div>
                               <div style=" margin-right:10%;" class="column">
                               <br>
                              <button style="float:right;" class="btn btn-success">Add to list</button><br>
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
                    <h6 style="float:left; margin-top:0.3%; margin-right:3%;">Ingredient ID: </h6>
                    <p style = "font-weight:bold; color:SaddleBrown; opacity: 0.6; float:left; margin-right:30%;"id="meid"></p>
                    <h6 style="float:left; margin-top:0.3%; margin-right:3%;">Ingredient Name: </h6>
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