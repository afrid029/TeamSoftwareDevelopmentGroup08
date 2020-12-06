<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Say Your Symptomps here</title>

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

    
</head>
<body>
    


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
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('pathome',$c->Pat_id)}}" class="smoothScroll">Home</a></li>
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll"><font color="red">State Medical Symptomps</font></a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll">Order Medicines</a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll">Online Booking</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
               </div>

          </div>
</section>
<!-- HOME -->


<section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                                   <div style="width:50%; margin-left:25%; margin-right:25%;" class="col-lg-3">
                                   <h2 style="color:#ffffff; width:96%; margin: 0 2%;">Your Medical Symptomps History</h2>
                              
                                        <table style="background-color:white;border:5px; " class="table table-bordered" >
                                        
                                             <thead>
                                             @if(count($d) > 0)
                                                  <tr style="background-color:#800000; ">
                                                       <th><p style=" color:#FFFFFF;text-align:center"><b>Date</p></b></th>
                                                       <th><p style="color:#FFFFFF;text-align:center" ><b>Time</p></b></th>
                                                       <th><p style=" color:#FFFFFF;text-align:center"><b>Medical Symptomps</b></p></th> 
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  
                                                  @foreach($d as $info)
                                                  <tr>
                                                       <td><p >{{$info->date}}</p></td>
                                                       <td><p >{{$info->time}}</p></td>
                                                       <input type="hidden" id = "dbtext" data-text = "{{$info->text}}"/>
                                                       <input type="hidden" id = "dbid" value = "{{$info->id}}"/>

                                                       <form action="{{ route ('viewSymp',['i'=> $info->id, 'j'=>$c->Pat_id]) }}" method = "get">
                                                      
                                                            <td><button type="submit" id = "button" class="btn btn-primary btn-sm" >View</button></td>

                                                       </form>
                                                       
                                                  </tr>
                                                  @endforeach
                                                 @else
                                                 <button style = "width:80%; margin:0 10% 0 10%" class="btn btn-danger btn-lg" disabled><b>You didn't say any symptomps</b></button>
                                             @endif     
                                             </tbody>
                                        
                                        </table>
                                        <button style="width:100%;" data-toggle = "modal" data-target = "#symptomp" type="button" class="btn btn-primary btn-lg">Add Symptomp</button>
                              
                              </div>
                              </div>
                             
                                        
                                   </div>
                                   
                                   <div>
                              
                              </div>
                         </div>
                    </div>
          </div>
</section>
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
               time: 100
            
          });
     </script>
@endif
<!--Modal-->
<div class="modal fade" id="symptomp" tabindex="-1" role="dialog" aria-labelledby="symptomp" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Say Your Symptomps Here</h5>
                    <button  type="button" class="close btn-sm" data-dismiss="modal" >Close
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
               <form action="{{ route('addsymptomps',$c->Pat_id) }}" method="post" onsubmit="prepareDiv()" enctype="multipart/form-data">
                                             @csrf
                                             <input type="hidden" name="id" class="form-control" value="{{$c->Pat_id}}">
                                             <a href="#" style="color:black;"><b>Select a Doctor: </b> 
                                                <span class="badge">
                                                 <select name="dr" class="form-control" id="sel1">
                                                      @if($dr)
                                                  @foreach($dr as $a)
                                                  <optgroup style="font-size:12px;" label = "{{$a->Doc_name}}">
                                                     <option style="font-size:10px;">{{$a->Doc_id}}</option>
                                                  </optgroup>
                                                     
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

                                                       <div style=" margin-top: -40px; margin-right: 5px" class="nav navbar-nav navbar-right">
                                                            <button type="submit" class="btn btn-success btn-sm">Send</button>
                                                            
                                                            <button  onclick = "document.getElementById('original').innerHTML = ''"; type="button" class="btn btn-danger btn-sm">Discard</button>
                                                       </div>
                                                       
                                                       <div class="form-group mt-4" placeholder="Say Here" id ="original" style="-moz-appearance: textfield-multiline;
                                                            -webkit-appearance: textarea;border: 1px solid gray;font: medium -moz-fixed;font: -webkit-small-control;height:250px;
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
                                                                <input  type="file" name = "image[]" class="custom-file-container__custom-file__custom-file-input" accept="" multiple aria-label="Choose File">
                                                                <span  class="custom-file-container__custom-file__custom-file-control"></span>
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