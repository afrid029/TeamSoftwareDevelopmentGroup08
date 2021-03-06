<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Say Your Symptoms Here</title>
    <link rel="icon" href="{{asset('images/logo4.png')}}" type="image/x-icon">
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

     <link rel="stylesheet" type="text/css" href="{{ asset('css/preview.css')}}">
    <script src="{{ asset('js/preview.js') }}"></script>
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
     color: #31bc86;
     background-color:white;
     border-color:grey;
}
.btn-outline-danger{
     color: black;
    border-color:white;
    
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
                    <a href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li style="margin-left:-120px"><a style = "text-transform:capitalize;" href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li style="margin-left:-50px"><a style = "text-transform:capitalize;" href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a style = "text-transform:capitalize;" href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patient <br>Details</a></li>
                         <li><a style = "text-transform:capitalize;" href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patients</a></li>
                         <li><a style = "text-transform:capitalize;" href="{{route('available',$c->Doc_id)}}" class="smoothScroll">Available <br>Time</a></li>
                        <li><a style = "text-transform:capitalize;" href="{{route('docsymp',$c->Doc_id)}}" class="smoothScroll"><font color="red">Medical <br>Symptoms</font></a></li>
                        <li><a style = "text-transform:capitalize;" href="{{route('appointment',$c->Doc_id)}}" class="smoothScroll">Appointments</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a style = "text-transform:capitalize;" href="/logout">Logout</a></li>
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
                                   <div style="height:78%; width:60%; margin: -12% 20% -10% 20%; background-color:rgba(255,255,255,0.5);" class="container"><br>
                                   <h2 style="color:#333333; width:96%; margin: 0 2%;text-align:center;">Patients' Medical Symptoms History</h2>
                                    <a style=" font-size:20px; margin-bottom:5px; font-weight:bold;" data-target="#patients" data-toggle="modal" class = "btn btn-outline-danger fa fa-user">&nbsp;&nbsp; Patients</a> 
                                    <div style="float:right; color:gray;  margin-bottom:5px; ">
                                   <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Date" title="Type ID">   
                                   </div> 
                                   <div style="width:100%;" class="tableFixHead">
                                   <table style="background-color:white;border:5px; " class="table table-bordered" id="myTable">
                                        
                                             <thead>
                                             
                                                  <tr style="background-color:#800000; ">
                                                       <th><p style=" color:#FFFFFF;text-align:center"><b>Date</p></b></th>
                                                       <th><p style="color:#FFFFFF;text-align:center" ><b>Time</p></b></th>
                                                       <th><p style=" color:#FFFFFF;text-align:center"><b>Medical Symptoms</b></p></th> 
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             @if(count($d) > 0)
                                                  
                                                  @foreach($d as $info)
                                                  <tr>
                                                       <td><p >{{$info->date}}</p></td>
                                                       <td><p >{{$info->time}}</p></td>
                                                       <input type="hidden" id = "dbtext" data-text = "{{$info->text}}"/>
                                                       <input type="hidden" id = "dbid" value = "{{$info->id}}"/>

                                                       <form action="{{ route ('docviewSymp',['i'=> $info->id, 'j'=>$c->Doc_id]) }}" method = "get">
                                                      
                                                            <td><button type="submit" id = "button" class="btn btn-primary btn-sm" >View</button>
                                                            @if($info->reply)
                                                                 <span>&nbsp;<b style = "color:red;">Replied</b></span> 
                                                            @endif
                                                       </td>
                                                       </form>
                                                       
                                                  </tr>
                                                  @endforeach   
                                                  
                                             @else
                                              <tr>
                                                       <td style="text-transform:capitalize" colspan="7"><h3 style="text-transform:capitalize; color:black;text-align: center;">No one has state any symptoms</h3></td>
                                                  </tr>
                                             @endif     
                                             </tbody>
                                        
                                        </table>
                                        </div>
                                        <div class="link" style="width:30%;border-radius:10%; margin-top:-12px; margin-bottom: 10px; font-size:12px;">
                                             <a></a>
                                        </div>
                              
                              </div>
                              </div>
                             
                                        
                                   </div>
                                   
                                   <div>
                              
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
                                                                      <th>ID</th>
                                                                      <th>Patient Name</th>
                                                                      <th>View</th>
                                                                      
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                            @if(count($pa))
                                                            
                                                            @foreach($pa as $d)
                                                                 <tr>
                                                                      <td>{{$d->Pat_id}}</td>
                                                                      <td style="text-transform:capitalize">{{$d->Pat_name}}</td>
                                                                      <td style="text-transform:capitalize"a href = "{{route('profview',['c'=>$d->Pat_id])}}" class = "btn btn-primary fa fa-eye">&nbsp;View</a></td>
                                                                      
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
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
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
               timer: 4000
            
          });
     </script>
@endif
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

<!--Modal-->
<div class="modal fade" id="symptomp" tabindex="-1" role="dialog" aria-labelledby="symptomp" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Say Your Symptoms Here</h5>
                    <button  type="button" class="close btn-sm" data-dismiss="modal" >Close
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
               <form action="{{ route('addsymptomps',$c->Doc_id) }}" method="post" onsubmit="prepareDiv()" enctype="multipart/form-data">
                                             @csrf
                                             <input type="hidden" name="id" class="form-control" value="{{$c->Doc_id}}">
                                             <a href="#" style="color:black;"><b>Select a Doctor: </b> 
                                                <span >
                                                 <select style="width:50%; margin-bottom:2%;" name="dr" class="form-control" id="sel1">
                                                      @if($pa)
                                                  @foreach($pa as $a)
                                                 
                                                     <option style="font-size:10px; text-transform:capitalize">{{$a->Pat_id}} &nbsp; &nbsp; &nbsp;  {{$a->Pat_name}}</option>
                                                  
                                                     
                                                     @endforeach
                                                     
                                                     @endif

                                                 </select>
                                                </span>
                                              </a>
                                             <!--   -->
                                          

                                             <div class="row">
                                                  <div class="col-sm-11 ml-auto">
                                                       <div style="margin-left: 8px" class="toolbar" role="toolbar">
                                                            <div class="btn-group">
                                                                <button onclick= "document.execCommand( 'bold',false,null);" type="button" class=" btn btn-light ">
                                                                     <span class="fa fa-bold"></span>
                                                                </button>
                                                                <button onclick="document.execCommand('italic',false,null);" type="button" class="btn btn-light">
                                                                     <span class="fa fa-italic"></span>
                                                                </button>
                                                                <button onclick="document.execCommand( 'underline',false,null);" type="button" class="btn btn-light">
                                                                     <span class="fa fa-underline"></span>
                                                                </button>
                                                            </div>
                                                            <div class="btn-group">
                                                                <button onclick="document.getElementById('original').style.textAlign = 'left';" type="button" class="btn btn-light">
                                                                     <span class="fa fa-align-left"></span>
                                                                </button>
                                                                <button onclick="document.getElementById('original').style.textAlign = 'right';" type="button" class="btn btn-light">
                                                                     <span class="fa fa-align-right"></span>
                                                                </button>
                                                                <button onclick= "document.getElementById('original').style.textAlign = 'center';" type="button" class="btn btn-light">
                                                                     <span class="fa fa-align-center"></span>
                                                                </button>
                                                                <button onclick="document.getElementById('original').style.textAlign = 'justify';" type="button" class="btn btn-light">
                                                                     <span class="fa fa-align-justify"></span>
                                                                </button>
                                                                <button  type="button" class="btn btn-default btn-sm">
                                                                    <span class="glyphicon glyphicon-record"></span> Record
                                                                </button>
                                                            </div>
                                                            
                                                       </div>

                                                       <div style=" margin-top: -7%; margin-right: 5px" class="nav navbar-nav navbar-right">
                                                            <button type="submit" class="btn btn-success btn-sm">Send</button>
                                                            
                                                            <button  onclick = "document.getElementById('original').innerHTML = ''"; type="button" class="btn btn-danger btn-sm">Discard</button>
                                                       </div>
                                                       
                                                       <div class="form-group mt-4" placeholder="Say Here" id ="original" style="-moz-appearance: textfield-multiline;
                                                            -webkit-appearance: textarea;border: 1px solid gray;font: medium -moz-fixed;font: -webkit-small-control;height:210px;
                                                            overflow: auto;resize: both;width: 500px; margin-left: 8px; background-color:white; color:black; border-radius:10px;" contenteditable="true">
                                                       </div>
                                                       <input type="hidden" name="text" id="copy"/>
                                                       <script type="text/javascript">
                                                            function prepareDiv() {
                                                                 document.getElementById("copy").value = document.getElementById("original").innerHTML;
                                                            }
                                                       </script>
                                                       <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                            <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"> </a>
                                                            <label class="custom-file-container__custom-file">
                                                            <input  type="file" name = "image[]" class="custom-file-container__custom-file__custom-file-input" accept="image/*" multiple aria-label="Choose File">
                                                            <span  class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>


                                                                
                                                            </label>

                                                            
                                                            <div class="custom-file-container__image-preview">
                                                            </div>
                                                           
                                                       </div>

                                                       <script>
                                                            var upload = new FileUploadWithPreview('myUniqueUploadId')
                                                       </script>
                                                       
                                                  </div>
                                             </div>

                                   
                                             
                                        </form>
                                        </div>
               </div>
          </div>
     </div>
</div>

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