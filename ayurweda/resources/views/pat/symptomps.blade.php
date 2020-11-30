<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Say Your Symptomps Here</title>

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
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    
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
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll">State Medical Symptomps</a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll">Order Medicines</a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll">Online Booking</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="/login">Logout</a></li>
                    </ul>
               </div>

          </div>
</section>

<!-- modal -->
<div class = "modal fade" id = "fileupload">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h3>Upload Image</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">X</button>
               </div>  
               <form method='post' action='' enctype="multipart/form-data">
               Select file : <input type='file' name='file' id='file' class='form-control' ><br>
               <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
               </form>

        <!-- Preview-->
        <div id='preview'></div>    
          </div>

     </div>

</div>

     

<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div >
                         <div class="item item-first">
                         <!--    -->
                              <div class="collapse navbar-collapse">
                              
                              <br><br>
                              <br><br>
                              <br><br>
                              <div class="col-xs-7">
                              
                                   <div class="form-group">
                                        <form action="/action_page.php">
                                             <a href="#" style="color:#ffffff;">Select a Doctor:  <span class="badge">
                                             <select class="form-control" id="sel1">
                                             <option>Dr.name1</option>
                                             <option>Dr.name2</option>
                                             <option>Dr.name3</option>
                                             <option>Dr.name4</option>
                                             </select>
                                             </span></a>
                                             <!--   -->
                                           

                                             <div class="row">
                                                  <div class="col-sm-11 ml-auto">
                                                       <div class="toolbar" role="toolbar">
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
                                                            <button onclick="document.getElementById('text').style.textAlign = 'left';" type="button" class="btn btn-light">
                                                                 <span class="fa fa-align-left"></span>
                                                            </button>
                                                            <button onclick="document.getElementById('text').style.textAlign = 'right';" type="button" class="btn btn-light">
                                                                 <span class="fa fa-align-right"></span>
                                                            </button>
                                                            <button onclick="document.getElementById('text').style.textAlign = 'center';" type="button" class="btn btn-light">
                                                                 <span class="fa fa-align-center"></span>
                                                            </button>
                                                            <button onclick="document.getElementById('text').style.textAlign = 'justify';" type="button" class="btn btn-light">
                                                                 <span class="fa fa-align-justify"></span>
                                                            </button>
                                                            </div>
                                                            
                                                            <button type="button" data-target="#fileupload" data-toggle="modal" class="btn btn-light">
                                                            <span class="fa fa-paperclip"></span>
                                                            </button>
                                                            <button type="button" class="btn btn-default btn-sm">
                                                            <span class="glyphicon glyphicon-record"></span> Record
                                                            </button>
                                                       </div>
                                                       <div  class="form-group mt-4">
                                                            <div placeholder="Say Here" id ="text" style="max-width:600px; width:600px; height:350px;  border:1px black; background-color:white" contenteditable="true">
                                                            
                                                            </div>
                                                       </div>
                                                       <div class="form-group">
                                                            <button type="submit" class="btn btn-success">Send</button>
                                                            
                                                            <button  onclick = "document.getElementById('text').innerHTML = ''"; type="button" class="btn btn-danger">Discard</button>
                                                       </div>
                                                  </div>
                                             </div>

                                   
                                             
                                        </form>
                                   </div>
                              
                              </div>
                              <div class="col-xs-5">
                              <h2 style="color:#ffffff;">Your Medical Symptomps History</h2>
                              
                                        <table class="table table-bordered" >
                                        
                                             <thead>
                                                  <tr>
                                                       <th><p style="color:#ffffff;">Date</p></th>
                                                       <th><p style="color:#ffffff;">Time</p></th>
                                                       <th><p style="color:#ffffff;">Medical Symptomps</p></th> 
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                  </tr>
                                                  <tr>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                  </tr>
                                                  <tr>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                  </tr>
                                                  <tr>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                  </tr>
                                                  <tr>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                       <td><p style="color:#ffffff;"></p></td>
                                                  </tr>
                                             </tbody>
                                        
                                        </table>
                              
                              </div>
                              </div>
                         <!--    -->     
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


</body>
</html>