<!DOCTYPE html>
<html lang="en">
<head>

     <title>Admitted Patients</title>

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
                    <a href="/welcome" class="navbar-brand">Hospital</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('dochome',$c->Doc_id)}}" class="smoothScroll">Home</a></li>
                         <li><a href="{{route('prescription',$c->Doc_id)}}" class="smoothScroll">Prescriptions</a></li>
                         <li><a href="{{route('addpatdetails',$c->Doc_id)}}" class="smoothScroll">Admitted <br>Patient <br>Details</a></li>
                         <li><a href="{{route('admitted',$c->Doc_id)}}" class="smoothScroll"><font color="red">Admitted <br>Patients</font></a></li>
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
          <h5 class="modal-title" id="exampleModalLabel">Update records</h5>
          </div>
          <form method="post" action="/saveadmit" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
          <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
          <input class="form-control" type="text" name="patientid" placeholder="Patient ID"><br>
          <h4>Medicine Name</h4>
          @if(count($medicines))
          <input type="text" name = "ingname" id="ingname" class="form-control" list="ingredients">
          <datalist id="ingredients">
          @foreach($medicines as $med)
               <option value="{{$med->Med_name}}">
          @endforeach
          </datalist>                            
          
          
          <h5>Quantity</h5>
          <input style="width:50%; " class="form-control" type="number" id="qty" style="color:black;"/>
          <button  style="float:right; margin-top:-6%; margin-right:30%;" type="button" class=" btn-uservar btn btn-primary" onclick="addtext()"> Add</button><br> 
          @else
               <h3>Adding is unavailable</h3>
          @endif
          <textarea class="form-control" name="medicine" placeholder="Medicines" id="order" cols="5" rows="5"></textarea>
                         
                                   <script>
                                        function addtext(){
                                             var  old = document.getElementById('order').value;
                                        
                                             var med = document.getElementById('ingname').value;
                                             
                                             if(med){
                                                  var qty = document.getElementById('qty').value;
                                                  if(qty){
                                                       document.getElementById('order').value = old+"\n"+med+ "   " + qty;
                                                  }
                                            
                                             }
                                             document.getElementById('ingname').value = "";
                                             document.getElementById('qty').value = "";
                                            
                                        }

                                        function prepareDiv(){
                                             document.getElement('')
                                        }
                              </script><br>
          <textarea class="form-control" name="condition" rows="4" cols="3" placeholder="Condition"></textarea>
          <br></br>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               Insert
          </button>
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
     </div>
     </div>
     </div>

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="">
                         <div class="item item-first">
                              <div class="caption">
                                   <div style="height:70%; width:88%; margin: -12% 6% -10% 6%; background-color:rgba(255,255,255,0.5); border-radius:0.5%;" class="container">
                                        
                                        <br>
                                   
                                        <div class="">
                                        
                                             <div style="float:left;">
                                             <form action="/adsearch" method="post" style="margin:auto;width:700px">
                                             {{csrf_field()}}
                                                  <input class="form-control" type="hidden" name="docid" value="{{$c->Doc_id}}">
                                                  <div style="float:left;margin-right:10px;"><input class="form-control" type="text" placeholder="Patient ID" name="patid"></div>
                                                  <div style="float:left;"><input class="form-control" type="date" placeholder="Date" name="date"></div>
                                                  <div style="float:left;"><button class="form-control" type="submit"><i class="fa fa-search"></i></button></div>
                                             </form>
                                             </div>
                                             <div style="float:right;">
                                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                             Update records
                                             </button>
                                             </div>
                                             <br></br>

                                             <div >
                                        <table class="table table-bordered table-scroll" >
                                        
                                             <thead style="position: sticky;top: 0;">
                                                  <tr>
                                                       <th>Patient ID</th>
                                                       <th>Doctor ID</th>
                                                       <th>Date</th>
                                                       <th>Medicine</th>
                                                       <th>Condition</th>
                                                  </tr>
                                             </thead>
                                             @if($ad1=session()->get('ad1'))
                                             <?php $adp=$ad1; ?>
                                             @else
                                             <?php $adp=$ad; ?>
                                             @endif
                                             <tbody class = "body-half-screen">
                                                  @if(count($adp)>0)
                                                  <?php $no = 1;?>
                                                  @foreach($adp as $a)
                                                  <tr>
                                                       <td>{{$a->Pat_id}}</td>
                                                       <td>{{$a->Doc_id}}</td>
                                                       <td>{{$a->created_at}}</td>
                                                       <td>
                                                            <input type="hidden" id="medi<?php echo $no; ?>" value="{{$a->medicines}}">
                                                            <button type="submit" id = "button<?php echo $no; ?>" onclick="viewing(<?php echo $no; ?>)" class="btn btn-primary btn-sm" >View</button>
                                                       </td>
                                                       <td>{{$a->condition}}</td>
                                                  </tr>
                                                  <?php $no++; ?>
                                                  @endforeach
                                                  @else
                                                  <tr>
                                                       <td colspan="5"><h3 style=" color:black;text-align: center;">No records found</h3></td>
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

     <script>
     function viewing(id){
          var a = document.getElementById('medi'+id).value;
          Swal.fire({
               position: 'top',
               width:400,
               text:"Medicine details",
               icon: 'info',
               title: a,
               
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