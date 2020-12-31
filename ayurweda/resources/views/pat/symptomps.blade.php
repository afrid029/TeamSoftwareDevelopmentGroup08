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
    <style>
   a {
        font-weight: bold;
   }
   .link a:link{
     background-color: #8B0000;
     
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
    
</head>
<body>
     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


<!-- MENU -->
<section style="padding-left:5%;" class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div style="width:100" class="container">

               <div style="margin-left:-8%; " class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/welcome" class="navbar-brand">Hospital</a>
               </div>
              
               <!-- MENU LINKS -->
               <div style = "width:90%;" class="collapse navbar-collapse">
               <ul   class="nav navbar-nav navbar-nav-first">
                         <li><a href="{{route('pathome',$c->Pat_id)}}" class="smoothScroll">Home</a></li>
                        <li><a href="{{route('symp',$c->Pat_id)}}" class="smoothScroll"><font color="red">State Medical Symptoms</font></a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" class="smoothScroll">Order Medicines</a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" class="smoothScroll">Online Booking</a></li>
                         <li><a href="{{route('history',$c->Pat_id)}}" class="smoothScroll">Medical History</a></li>
                         
                    </ul>
                    <div style=" width:8%; margin-left:2%;" class="nav navbar-nav navbar-right">
                    <li><a href="/login">Logout</a></li>
                    </div>

                    
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
                                   <button style="width:40%; margin-left:30%; margin-right:30%; margin-top:-5%;" data-toggle = "modal" data-target = "#symptomp" type="button" class="btn btn-primary btn-lg">Add Symptomp</button>
                                   <div style="width:60%; margin-left:20%; margin-right:20%;" class="col-lg-3">
                                        <h2 style="color:#ffffff; text-align:center; width:96%; margin: 0 2%;">Your Medical Symptoms History</h2>
                              
                                        <table style="background-color:white;border:5px; " class="table table-bordered" >
                                        
                                             <thead >
                                             
                                                  <tr style="background-color:#800000; height:1px;">
                                                       <th style=" color:#FFFFFF;text-align:center"><b>Date</b></th>
                                                       <th style=" color:#FFFFFF;text-align:center"><b>Time</b></th>
                                                       <th style=" color:#FFFFFF;text-align:center"><b>Medical Symptoms</b></th> 
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             @if(count($d) > 0)
                                             <?php $z = 0; ?>
                                                  @foreach($d as $info)
                                                  <tr>
                                                       <td><p style=" text-align:center" >{{$info->date}}</p></td>
                                                       <td><p style=" text-align:center">{{$info->time}}</p></td>
                                                       <input type="hidden" id = "dbtext<?php echo $z; ?>" value = "{{$info->text}}"/>
                                                       <input type="hidden" id = "dbid<?php echo $z; ?>" value = "{{$info->id}}"/>
                                                       <input type="hidden" id = "dbdate<?php echo $z; ?>" value = "{{$info->date}}"/>
                                                       <input type="hidden" id = "dbtime<?php echo $z; ?>" value = "{{$info->time}}"/>
                                                       <input type="hidden" id = "dbdrid<?php echo $z; ?>" value = "{{$info->Doc_id}}"/>
                                                       <input type="hidden" id = "dbaudio<?php echo $z; ?>" value = "{{$info->audio}}"/>
                                                       <input type="hidden" id = "dbimg<?php echo $z; ?>" value = "{{$info->img}}"/>
                                                       <input type="hidden" id = "dbreply<?php echo $z; ?>" value = "{{$info->reply}}"/>

                                                       
                                                      
                                                       <td style=" text-align:center">
                                                       
                                                       <button type="submit" id = "button" data-toggle="modal" onclick="viewSymp(<?php echo $z; ?>)" data-target="#viewsymp" class="btn btn-primary btn-sm" >View</button>
                                                       
                                                       </td>

                                                  
                                                       
                                                  </tr>
                                                  <?php $z++;?>
                                                  @endforeach   
                                                  
                                             @else
                                             <tr>
                                                  <td colspan="3"><h3 style=" color:black;text-align: center;">You don't state any symptoms</h3></td>
                                             </tr>
                                             @endif     
                                             </tbody>
                                        
                                        </table>
                                        <div class="link" style="width:30%;border-radius:10%; margin-top:-12px; margin-bottom: 10px; font-size:12px;">
                                             <a> {{ $d->links() }}</a>
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
<!--Modal 2-->
<div style = "overflow:scroll;margin-top:5%;" class="modal fade" id="viewsymp" tabindex="-1" role="dialog" aria-labelledby="symptomp" aria-hidden="true">
     <div class="modal-dialog" role="dialog">
          <div class="modal-content"  style="width:150%; margin-left:-25%; margin-right:-25%;">
               <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">View Symptom</h4>
                   <h6 id="dttag" style="color:grey; float:right; margin-bottom:-2%; margin-top:-2%;">  </h6> 
                   <h6 id ="tmtag"style="color:grey; float:right; margin-bottom:-2%; margin-top:-2%; margin-right:20%;">Time: </h6>
                    
               </div>
               <div id="bdy" class="modal-body">
               <h4 id = "doctag" style="color:grey; ">To: </h4>
               <p id = "texttag"></p>

               <label id = "imtag" style="display:none;">Image(s): </label>
                    
                    
                                        
               </div>
               <div class="modal-footer">
               <button style = "float:right; " type="submit" class="btn btn-danger" data-dismiss="modal"  aria-label="Close">Close</button>        
               </div>
          </div>
     </div>
</div>

<script>
function viewSymp(id)
{
     document.getElementById('tmtag').innerHTML = "Time: "+ document.getElementById('dbtime'+id).value;

     document.getElementById('dttag').innerHTML ="Date: " + document.getElementById('dbdate'+id).value;
     
     document.getElementById('texttag').innerHTML = document.getElementById('dbtext'+id).value;

     document.getElementById('doctag').innerHTML = "To: " + document.getElementById('dbdrid'+id).value;

     var bdy = document.getElementById('bdy');

     var bk = document.createElement('br');
     var imgs = document.getElementById('dbimg'+id).value; 
     if(imgs.length > 0){

          if(document.getElementById('shimg')){
               document.getElementById('shimg').remove();
               console.log('del');
          }
          var  div = document.createElement('div');
          div.setAttribute('id','shimg');
     
          var imgs = imgs.substring(2, imgs.length-2)
         imgs = imgs.replace(/\"/g,'');
          var imgs = imgs.split(","); 
        
          document.getElementById('imtag').style.display = "block";
         
     
           for(var i = 0 ; i < imgs.length ; i++){
               im = document.createElement('img');
               im.setAttribute('src',"{{asset('upload/images')}}/"+imgs[i]);
               im.setAttribute("style","width:100px; height:200px;margin-right:1%;");
               div.appendChild(im);
               bdy.appendChild(div); 
               
          }
         

     }else{
          document.getElementById('imtag').style.display = "none";
          if(document.getElementById('shimg')){
               document.getElementById('shimg').remove();
               
          }
     }
     

     var adio = document.getElementById('dbaudio'+id).value;
     
     
     if(adio.length > 0){
          if(document.getElementById('showaudio')){
               document.getElementById('showaudio').remove();
               
          }
          var adiv = document.createElement('div');
          adiv.setAttribute('id','showaudio');

          var lbl = document.createElement('label')
          lbl.innerHTML = "Audio: ";
          var tdiv = document.createElement('div');
          var aud = document.createElement('audio');
        
          aud.setAttribute('style','height:30px; width:70%;');
          aud.setAttribute('controls',true);
          aud.setAttribute('controlsList','nodownload');
          aud.setAttribute('src',"{{asset('upload/voicerecordings')}}/"+adio);  
          
          aud.innerHTML = "Browser doesn't support this audio file";
          tdiv.appendChild(aud);
          adiv.appendChild(lbl);
          adiv.appendChild(bk);
          adiv.appendChild(tdiv);


          bdy.appendChild(adiv);

     }else{

          if(document.getElementById('showaudio')){
               document.getElementById('showaudio').remove();
               
          }
     }

     if(document.getElementById('dre')){
          document.getElementById('dre').remove();
     }

     var div2 = document.createElement('div');
     div2.setAttribute('id','dre');

          var lb = document.createElement('label');
          lb.style.color = "blue";
          lb.innerHTML = "Reply From Doctor: ";
          div2.appendChild(lb);

          var p = document.createElement('p');

          var data = document.getElementById('dbreply'+id).value;
          if(data.length > 0){
               p.style = "color:Teal; font-weight:bold;"
               p.innerHTML = data;
          }else{
              
               p.innerHTML = "Doctor doesn't send any reply"
          }

          div2.appendChild(p);
     bdy.appendChild(div2);
     

     
     


}
</script>
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
               timer: 1000
            
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
               timer: 2000
            
          });
     </script>
@endif

<!--Modal-->
<div class="modal fade" id="symptomp" tabindex="-1" role="dialog" aria-labelledby="symptomp" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Say Your Symptoms Here</h5>
                   
                         

                         <button style = "float:right; margin-top:-4%;" type="submit" class="btn btn-warning" data-dismiss="modal"  aria-label="Close">Close</button>
                    
               </div>
               <div class="modal-body">
               <form action="{{ route('addsymptomps',$c->Pat_id) }}" method="post" onsubmit="prepareDiv()" enctype="multipart/form-data">
                                             @csrf
                                             <input type="hidden" name="id" class="form-control" value="{{$c->Pat_id}}">
                                            
                                                 <select style="width:50%; margin-bottom:2%;"  name="dr" class="form-control" id="sel1">
                                                 <option value="none" selected disabled hidden> 
                                                       Select a Doctor
                                             </option> 
                                                      @if($dr)
                                                  @foreach($dr as $a)
                                                 
                                                  <optgroup style="font-size:12px;" label = "{{$a->Doc_name}}">
                                                       <option style="font-size:10px;">{{$a->Doc_id}}</option>
                                                  </optgroup>
                                                     
                                                     @endforeach
                                                     
                                                     @endif

                                                 </select>
                                               
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
                                                                
                                                            </div>
                                                            
                                                       </div>

                                                       <div style=" margin-top: -7%; margin-right: 5px" class="nav navbar-nav navbar-right">
                                                            <button type="submit" class="btn btn-success btn-sm">Send</button>
                                                            
                                                            <button  onclick = "document.getElementById('original').innerHTML = ''"; type="button" class="btn btn-danger btn-sm">Discard</button>
                                                       </div>
                                                       
                                                       <div class="form-group mt-4" placeholder="Say Here" id ="original" style="-moz-appearance: textfield-multiline;
                                                            -webkit-appearance: textarea;border: 2px solid gray;font: medium -moz-fixed;font: -webkit-small-control;height:180px;
                                                            overflow: auto;resize: both;width: 500px; margin-left: 8px; background-color:white; color:black; border-radius:10px;" contenteditable="true">
                                                       </div>
                                                       <input type="hidden" name="text" id="copy"/>
                                                       
                                                       <label for="audio">Audio: &nbsp;</label>   Choose Your Voice Record
                                                            <input  type="file" name = "audio"  accept="audio/*"  placeholder="Choose Your Voice Record"/><br>

                                                            
                                                       <label for="image">Images: &nbsp;</label> Choose Your Image(s)
                                                       <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                            <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"> </a>
                                                            <label class="custom-file-container__custom-file">
                                                                 
                                                                 <input  type="file" id="images" name = "image[]" class="custom-file-container__custom-file__custom-file-input" accept="image/*" multiple aria-label="Choose File">
                                                                 <span  class="custom-file-container__custom-file__custom-file-control"></span>
                                                            </label>
                                                            

                                                                
                                                           
                                                       <script type="text/javascript">
                                                            function prepareDiv() {
                                                                 document.getElementById("copy").value = document.getElementById("original").innerHTML;
                                                            }
                                                       </script>
                                                            
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