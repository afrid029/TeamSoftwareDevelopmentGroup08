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
  
   .table-scroll{
  width:100%; 
  display: block;
 
  empty-cells: show;

  border-radius:1.5%;
  margin-top:2%;
  
  /* Decoration */

  
}
.table-scroll thead{
  background-color: darkred;  
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
  max-height: 48vh;
  
}
.small-col{flex-basis:10%;}
.btn-outline-danger:hover{
     color: white;
     background-color:darkred;
     border-color:grey;
}
.btn-outline-danger{
     color: darkred;
    border-color:darkred;
    
}
   </style>
    
</head>
<body>
     <script>
          console.log("{{session()->get('key')}}");
     </script>
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
                    <a href="/welcome" class="navbar-brand">
                    <img src="{{asset('images/logo4.png')}}" style="float:left;width:50px;">
                    Hela Weda Piyasa</a>
                    
               </div>
              
               <!-- MENU LINKS -->
               <div style = "width:94%;" class="collapse navbar-collapse">
               <ul   class="nav navbar-nav navbar-nav-first">
                         <li style="margin-left:-120px"><a href="{{route('pathome',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll">Home</a></li>
                         <li style="margin-left:-50px"><a href="{{route('symp',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll"><font color="red">State Medical Symptoms</font></a></li>
                         <li><a href="{{route('order',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll">Order Medicines</a></li>
                         <li><a href="{{route('book',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll">Online Booking</a></li>
                         <li><a href="{{route('history',$c->Pat_id)}}" style="text-transform:capitalize" class="smoothScroll">Medical History</a></li>
                         
                         
                    </ul>
                    <div  class="nav navbar-nav navbar-right">
                    <li><a style="text-transform:capitalize" href="/logout">Logout</a></li>
                    </div>

                    
               </div>

          </div>
     </section>
<!-- HOME -->


<section id="home"  class="slider" data-stellar-background-ratio="0.5">
     <div class="row">
          <div class="owl-theme">
               <div  class="item item-first">
                    <div class="caption">
                         <div style="max-height:85%; width:80%; margin: 0% 10% 0 10%; background-color:white; border-radius:0.5%;" class="container">
                              <div class="col-md-16 col-sm-12">
                                   <div  class="container-lg">
                                        <div  class="table-responsive">
                                             <div  class="table-wrapper">
                                                  <div style="width:60%; float:left; margin-left:2%;"><h2>Your Medical Symptoms</h2></div>
                                                       <div class="table-title">
                                                            <div style="margin-top:2%; float:right; margin-right:2%;" >
                                                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#symptomp"><i class="fa fa-plus"></i>&nbsp;&nbsp; Add New Symptom</button>
                                                            </div>
                                                       </div>
                                                       <table id="myTable" style="color:black; width:100%;" class="table table-bordered table-scroll">
                                                            <thead>
                                                                 <tr>
                                                                      <th>Date </th>
                                                                      <th>Time</th>
                                                                      <th>Medical Symptoms</th>
                                                                      
                                                                 </tr>
                                                            </thead>
                                                            <tbody  class="body-half-screen">
                                                            @if(count($d) > 0)
                                                            <?php $z = 0; ?>
                                                                 @foreach($d as $info)
                                                                 <tr>
                                                                      <td><p style=" text-align:center" ><b>{{$info->date}}</b></p></td>
                                                                      <td><p style=" text-align:center"><b>{{$info->time}}</b></p></td>
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
                                                                      @if($info->reply)
                                                                      <span>&nbsp;<b style = "color:red;">Replied</b></span> 
                                                                      @endif
                                                                      </td>

                                                                 
                                                                      
                                                                 </tr>
                                                                 <?php $z++;?>
                                                                 @endforeach   
                                                                 
                                                            @else
                                                                 <tr>
                                                                      <td colspan="3"><h3 style=" text-transform:capitalize; color:black;text-align: center;">You Have Not Stated Any Symptoms</h3></td>
                                                                 </tr>
                                                            @endif   
                                                       </tbody>
                                             
                                                  </table>
                                                       <a style="flolat:right; font-size:20px; margin-top:-2%; margin-bottom:3px; font-weight:bold;" data-target="#doctors" data-toggle="modal" class = "btn btn-outline-danger fa fa-user-md ">&nbsp;&nbsp; Doctors</a>  
                                             </div>
                                        </div>
                                   </div>                                
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     <div>
</section>
 <!--doctors modal-->
                              <div style = "overflow:scroll;margin-top:5%;" class="modal fade" id="doctors" tabindex="-1" role="dialog" aria-labelledby="doctors" aria-hidden="true">
                                   <div class="modal-dialog" role="dialog">
                                        <div class="modal-content"  style="width:90%; margin-left:5%; margin-right:5%;">
                                             <div class="modal-header">
                                                  <h4 class="modal-title" id="exampleModalLabel">Doctors Details</h4>
                                                 
                                             </div>
                                             <div  class="modal-body">
                                                     <table id="myTable" class="table table-bordered table-scroll" style="color:black; width:100%;" >
                                                            <thead>
                                                                 <tr>
                                                                      <th> Doctor Name</th>
                                                                      <th>View</th>
                                                                      
                                                                 </tr>
                                                            </thead>

                                                            
                                                            <tbody class="body-half-screen">
                                                            @if(count($dr))
                                                            
                                                            @foreach($dr as $d)
                                                                 <tr>
                                                                      <td>{{$d->Doc_name}}</td>
                                                                      <td><a href = "{{route('profview',['c'=>$d->Doc_id])}}" class = "btn btn-primary fa fa-eye">&nbsp;View</a></td>
                                                                      
                                                                 </tr>
                                                       
                                                            @endforeach
                                                            @else
                                                                 <tr>
                                                                      <td colspan="8"><h3 style=" color:black;text-align: center; font-size:20px;">There Are No Doctors In Hospital</h3></td>
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
<!--Modal 2-->
<div style = "overflow:scroll;margin-top:5%;" class="modal fade" id="viewsymp" tabindex="-1" role="dialog" aria-labelledby="symptomp" aria-hidden="true">
     <div class="modal-dialog" role="dialog">
          <div class="modal-content"  style="width:80%; margin-left:10%; margin-right:10%;">
               <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">View Symptom</h4>
                   <h6 id="dttag" style="color:grey; float:right; margin-bottom:-2%; margin-top:-2%;">  </h6> 
                   <h6 id ="tmtag"style="color:grey; float:right; margin-bottom:-2%; margin-top:-2%; margin-right:30%;">Time: </h6>
                    
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
               p.style = "text-transform:capitalize; color:Teal; font-weight:bold;"
               p.innerHTML = data;
          }else{
               p.style = "text-transform:capitalize"
               p.innerHTML = "Doctor have not Sent Any Reply"
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
               timer: 5000
            
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
                   
                         

                         <button style = "float:right; margin-top:-4%;" type="submit" class="btn btn-warning" data-dismiss="modal"  aria-label="Close">Close</button>
                    
               </div>
               <div style="width:100%;" class="modal-body">
               <form action="{{ route('addsymptomps',$c->Pat_id) }}" method="post" onsubmit="prepareDiv()" enctype="multipart/form-data">
                                             @csrf
                                             <input type="hidden" name="id" class="form-control" value="{{$c->Pat_id}}">
                                            
                                                 <select style="width:50%; margin-bottom:2%;"  name="dr" class="form-control" id="sel1">
                                                 <option value="none" selected disabled hidden> 
                                                       Select A Doctor
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
                                                  <div class="col-md-16">
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
                                                            <div  style="float:right; margin-right:3%;">
                                                            <button type="submit" class="btn btn-success btn-sm">Send</button>
                                                            
                                                            <button  onclick = "document.getElementById('original').innerHTML = ''"; type="button" class="btn btn-danger btn-sm">Discard</button>
                                                       </div><br>
                                                       <div class="form-group mt-4" placeholder="Say Here" id ="original" style="-moz-appearance: textfield-multiline;
                                                            -webkit-appearance: textarea;border: 2px solid gray;font: medium -moz-fixed;font: -webkit-small-control;height:180px;
                                                            overflow: auto;resize: both;width: 90%; margin-left:5%; margin-right:5%; background-color:white; color:black; border-radius:10px;" contenteditable="true">
                                                       </div>
                                                            
                                                       </div>

                                                       
                                                       
                                                       
                                                       <input type="hidden" name="text" id="copy"/>
                                                       <div style="width:90%; margin: 0 5%;">
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