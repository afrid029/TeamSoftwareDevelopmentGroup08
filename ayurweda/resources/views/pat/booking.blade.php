<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>Order Medicine Here</title>

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

     


<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="row">

                    <div class="owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="container">
                              <!--    -->
                          <div.>
                              <br>
                              
                              
                              
                         <div class="col-xs-7">
                         
                         
                         <div class="form-group">


                         <form action="{{route('showAvail')}}" method = "post">
                         @csrf

                         <a href="#" style="color:#ffff;"><b>Select a Doctor:</b> <span class="badge">
                                       
                                             <select class="form-control"style = "float : right">
                                             <option>Dr.name1</option>
                                             <option>Dr.name2</option>
                                             <option>Dr.name3</option>
                                             <option>Dr.name4</option>
                                             </select>
                                             </span></a>
                                        
                                        <div  style = " float : right; margin-top:1%; margin-right:10%;">
                                             <label  for="date" value = "Date"> Date</label>
                                             <input style="color:black" type ="date" name="date" />
                                             <buttton type = "submit" class = "btn btn-info">search</button>
                                        </div>
                         </form>
                         </div>
                         <div class="p-3 mb-2 bg-info text-white">
                         <table class="table table-bordered" style="background-color:#ffffff; color:black">
                            
                                        <thead>
                                             <tr>
                                                 
                                                  <th>Available Time</th>
                                                  <th>Booking</th> 
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                             
                                                  <td></td>
                                                  <td>
                                                       <button type="button" class="btn btn-link">Confirm</button>
                                                       <button type="button" class="btn btn-link">Cancel</button>
                                                       </td>
                                             </tr>
                                             <tr>
                                                 
                                                  <td></td>
                                                  <td>
                                                       <button type="button" class="btn btn-link">Confirm</button>
                                                       <button type="button" class="btn btn-link">Cancel</button>
                                                       </td>
                                             </tr>
                                             <tr>
                                                  
                                                  <td></td>
                                                  <td>
                                                       <button type="button" class="btn btn-link">Confirm</button>
                                                       <button type="button" class="btn btn-link">Cancel</button>
                                                       </td>
                                             </tr>
                                             <tr>
                                                  
                                                  <td></td>
                                                  <td>
                                                       <button type="button" class="btn btn-link">Confirm</button>
                                                       <button type="button" class="btn btn-link">Cancel</button>
                                                       </td>
                                             </tr>
                                             <tr>
                                                  
                                                  <td></td>
                                                  <td>
                                                       <button type="button" class="btn btn-link">Confirm</button>
                                                       <button type="button" class="btn btn-link">Cancel</button>
                                                       </td>
                                             </tr>
                                        </tbody>
                                   
                         </table>
                         </div>
                         </div>
                         <div class="col-xs-5">
                         
                         <h2 style="color:#ffffff;">Your appointment time</h2>

                         <table class="table table-bordered" >
                         <p style="color:#ffffff;"> 
                                        <thead>
                                             <tr>
                                             <th><p style="color:#ffffff;">Doctor</p></th>
                                             <th><p style="color:#ffffff;">Date</p></th>
                                             <th><p style="color:#ffffff;">Time</p></th> 
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
                         </div>          
                         </table>
                                   
                         </div>
                         </div>
                         <!--    -->
                         </div>
                         </div>
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