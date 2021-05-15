<!DOCTYPE html>
<html lang="en">
<head>

     <title>Available Times</title>
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
                    <a href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                         <li style="margin-left:-100px"><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patient <br>Details</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patients</a></li>
                         <li><a href="{{route('available',$c->Doc_id)}}" class="smoothScroll"><font color="red">Available <br>Time</font></a></li>
                         <li><a href="{{route('docsymp',$c->Doc_id)}}" class="smoothScroll">Medical <br>Symptomps</a></li>
                         <li><a href="{{route('appointment',$c->Doc_id)}}" class="smoothScroll">Appointments</a></li>
                         
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a  href="/logout">Logout</a></li>
                    </ul>
               </div>

          </div>
     </section>
@if($msg=session()->get('msg'))
@if($msg=="Inserted successfully.")
<script>
Swal.fire({
  position: 'middle',
  icon: 'success',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 1500
});
</script>
@elseif($msg=="The perticular time is already exist.")
<script>
Swal.fire({
  position: 'middle',
  icon: 'error',
  title: '{{$msg}}',
  showConfirmButton: false,
  timer: 1500
});
</script>
@elseif($msg=="Updated Successfully")
<script>
Swal.fire({
  position: 'middle',
  icon: 'success',
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

@if($ro!="")
@php
$date=$ro->availableDate;
$time=$ro->availableTime;
@endphp
@else
@php
$date="";
$time="";
@endphp
@endif

     <!-- HOME -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
        <div class="row">

            <div class="">
                            <div class="item item-first">
                                <div class="caption">
                                    <div style="height:78%; width:88%; margin: -12% 6% -10% 6%; background-color:rgba(255,255,255,0.5); border-radius:0.5%;" class="container">
                                        <br>
                                        <h2 style="color:#333333; width:96%; margin: 0 2%;text-align:center;">Your Available Time Periods</h2>
                                        <div class="">
                                             <div style="float:left;">
                                             <div style=" color:gray;  float:left;">
                                             <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Date" title="Type ID">   
                                             </div>
                                             </div>
                                             <div style="float:right;">
                                             <div style=" float:left; margin-left:5%;" class="col-sm-1">
                                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmedi"><i class="fa fa-plus"></i> Add new available time</button>
                                             </div>
                                             </div>
                                             <br><br>
                                             
                                             <div class="tableFixHead">
                                        <table class="table table-hover" id="myTable">
                                             <thead>
                                                  <tr>
                                                       <th>Available Date</th>
                                                       <th>Available Time</th>
                                                       <th></th>
                                                       <th></th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  @if(count($av)>0)
                                                  <?php $n = 0;?>
                                                  @foreach($av as $a)
                                                  <tr>
                                                       <td>{{$a->availableDate}}</td>
                                                       <td>{{$a->availableTime}}</td>
                                                       <td>
                                                       <input type="hidden" id = "id<?php echo $n; ?>" value="{{$a->id}}">
                                                       <input type="hidden" id = "date<?php echo $n; ?>" value="{{$a->availableDate}}">
                                                       <input type="hidden" id = "time<?php echo $n; ?>" value = "{{$a->availableTime}}">
                                                       <button data-toggle="modal" onclick = "edit(<?php echo $n; ?>)" data-target="#edit" class = "btn btn-primary btn-sm">Edit</button>
                                                       </td>
                                                       <td><a href="{{route('avdelete',['id'=>$a->id,'docid'=>$c->Doc_id])}}" class = "btn btn-danger btn-sm">Delete</a></td>
                                                  </tr>
                                                  <?php $n++; ?>
                                                  @endforeach
                                                  @else
                                                  <tr>
                                                       <td colspan="4"><h3 style=" color:black;text-align: center;">No available times found</h3></td>
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
    </section>

<!-- Modal 1-->
<div class="modal fade" id="addmedi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div style = "margin-top:35%;" class="modal-content">
               <div class="modal-header">
                    <h3 style="float:left" class="modal-title" id="exampleModalLabel">Add new available time</h3>
                    <button style="float:right" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
               <div class="modal-body">
                    <div style="margin-left:5%;" class="form-group">
                         <form action="/saveavailable" method = "post">
                              @csrf
                              <div class="row">
                                   <input type="hidden" name = "docid" value="{{$c->Doc_id}}">
                                   <div style="width:40%; margin-right:10%; float:left;" class="column">
                                   <label for="ex1">Date</label>
                                   <input class="form-control" type="date" name="date" value="{{$date}}">
                                   </div>
                                   <div style="width:40%; margin-right:10%; float:right;" class="column">
                                   <label for="ex1">Time</label>
                               <input class="form-control" type="time" name="time" value="{{$time}}">
                                   </div>
                              </div>
                              <br>
                              <button style="float:right;" class="btn btn-success">Add</button><br>
                         </form>
                    
                    </div>
               </div>
              
          </div>
     </div>
</div>

<!-- Modal 3-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div style = "height:100px;width:110%; margin-top:35%;" class="modal-content">

               <div style="margin-top:-2%;" class="modal-body">
                    <form action="/avedit" method="post">
                    @csrf
                         <div style="margin-bottom:3%;">
                         
                              <div style= "float:left; margin-right:2%; width:10%:">
                              <input type="hidden" name = "docid" value="{{$c->Doc_id}}">
                              <input type="hidden" name = "id" id="aid">
                                   <label  >Date: </label>
                                   <input type="date" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6;" name = "date" id="adate"/>
                              </div>
                              
                              <div style= "float:left;margin-right:2%; width:10%:">
                                   <label >Time: </label>
                                   <input type="time" style = "font-weight:bold; color:SaddleBrown; opacity: 0.6; " name="time" id="atime">
                              </div>
                         </div>
                         <button style="float:right;" class="btn btn-success">Update</button><br>
                    </form>
                                       
               </div>
              
          </div>
     </div>
</div>

<script>
     function edit(id)
     {
          
          var aid = document.getElementById('id'+id).value;
          var adate =document.getElementById('date'+id).value;
          var atime =document.getElementById('time'+id).value;
          
          
          
          document.getElementById('aid').value = aid;
          document.getElementById('adate').value = adate;
          document.getElementById('atime').value = atime;
     }
</script>
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