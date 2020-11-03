    var br = document.createElement("br");  
	function GFG_Fun(){
		var e=document.getElementById("catagory");
		var c=e.value;
		if(c=="doctor"){
			doctor();
		}
	}
    function doctor() { 
    var form = document.createElement("form"); 
    form.setAttribute("method", "post"); 
    form.setAttribute("action", "submit.php"); 
    // Create an input element for Full Name 
    var FN = document.createElement("input"); 
    FN.setAttribute("type", "text"); 
    FN.setAttribute("name", "FullName"); 
    FN.setAttribute("placeholder", "Full Name"); 
     // Create an input element for date of birth 
     var DOB = document.createElement("input"); 
     DOB.setAttribute("type", "text"); 
     DOB.setAttribute("name", "dob"); 
     DOB.setAttribute("placeholder", "DOB");
     // Create an input element for emailID 
     var EID = document.createElement("input"); 
     EID.setAttribute("type", "text"); 
     EID.setAttribute("name", "emailID"); 
     EID.setAttribute("placeholder", "E-Mail ID"); 
      // Create an input element for password 
      var PWD = document.createElement("input"); 
      PWD.setAttribute("type", "password"); 
      PWD.setAttribute("name", "password"); 
      PWD.setAttribute("placeholder", "Password"); 
       // Create an input element for retype-password 
       var RPWD = document.createElement("input"); 
       RPWD.setAttribute("type", "password"); 
       RPWD.setAttribute("name", "reTypePassword"); 
       RPWD.setAttribute("placeholder", "ReEnter Password"); 
                // create a submit button 
                var s = document.createElement("input"); 
                s.setAttribute("type", "submit"); 
                s.setAttribute("value", "Submit");
                // Append the full name input to the form 
                form.appendChild(FN);
                // Inserting a line break 
                form.appendChild(br.cloneNode());  
                // Append the DOB to the form 
                form.appendChild(DOB);  
                form.appendChild(br.cloneNode());  
                // Append the emailID to the form 
                form.appendChild(EID);  
                form.appendChild(br.cloneNode());  
                // Append the Password to the form 
                form.appendChild(PWD);  
                form.appendChild(br.cloneNode());  
                // Append the ReEnterPassword to the form 
                form.appendChild(RPWD);  
                form.appendChild(br.cloneNode());  
                // Append the submit button to the form 
                form.appendChild(s);  
                document.getElementsByTagName("body")[0] 
               .appendChild(form); 
            } 

