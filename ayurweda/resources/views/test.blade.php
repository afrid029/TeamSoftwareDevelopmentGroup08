<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="log" method="post" class="wow fadeInUp"> 
                                             <h1>Register</h1><br><br>
                                             <div class="col-md-6 col-sm-6">
                                             <select id="catagory" name="catagory" onChange="GFG_Fun()" class="form-control">
                                             <option selected="true" disabled="disabled">Choose Catagory</option>
                                             <option value="doctor">Doctor</option>
                                             <option value="patient">Patient</option>
                                             <option value="pharmacist">Pharmacist</option>
                                             <option value="producer">Medicine Producer</option>
                                             <option value="supplier">Ingredients supplier</option>
                                             </select>
                                             <script src="{{ asset('js/form.js')}}"></script>
                                             <input class="form-control" type="text" name="username" placeholder="Username"><br>
                                             <input class="form-control" type="password" name="password" placeholder="Password"><br><br>
                                             <input class="section-btn btn btn-default smoothScroll" type="submit" value="Register" color="black">
                                             </div>
                                             </form>
</body>
</html>