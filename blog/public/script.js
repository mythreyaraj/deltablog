
	function validateForm(){
		var result1=validateName();									//validating form on submission
		var result2=validatePassword();
		var result3=validateRPassword();
		var result4=validateBName();
		if(result1&&result2&&result3&&result4){
			return true;
		}
		else{ 
		alert('invalid form');
		return false;
		}
} 

function validateName(){
		var name=document.getElementById('name').value;
		if(!name){
				document.getElementById('errorname').innerHTML="Should not be empty";
				return false;
		}
		
		
		var patt1=/[a-zA-Z0-9]/; var check=0;  		//checking for numbers and alphabets
		for(var i=0;i<name.length;i++)
		{
			var result=patt1.test(name[i]);
			if(!result){check++;}
		}
		if(check!=0){document.getElementById('errorname').innerHTML="Only numbers and alphabets"; return false;}
		
		else{document.getElementById('errorname').innerHTML=""; return true;}
}
function validatePassword(){
		var name=document.getElementById('password').value;
		if(!name){
				document.getElementById('errorpassword').innerHTML="Should not be empty";
				return false;
		}
		
		
		var patt1=/[a-zA-Z0-9@#$%&]/; var check=0;  		//checking for numbers and alphabets and chars
		for(var i=0;i<name.length;i++)
		{
			var result=patt1.test(name[i]);
			if(!result){check++;}
		}
		if(check!=0){document.getElementById('errorpassword').innerHTML="Only numbers,alphabets or @#$%&"; return false;}
		if(name.length<6){document.getElementById('errorpassword').innerHTML="very short"; return false;}
		else{document.getElementById('errorpassword').innerHTML=""; return true;}
}

function validateRPassword(){
		var name=document.getElementById('rpassword').value;
		if(!name){
				document.getElementById('errorrpassword').innerHTML="Should not be empty";
				return false;
		}
		
		
		var patt1=/[a-zA-Z0-9@#$%&]/; var check=0;  		//checking for numbers and alphabets and chars
		for(var i=0;i<name.length;i++)
		{
			var result=patt1.test(name[i]);
			if(!result){check++;}
		}
		if(check!=0){document.getElementById('errorrpassword').innerHTML="Only numbers,alphabets or @#$%&"; return false;}
		if(name.length<6){document.getElementById('errorrpassword').innerHTML="very short"; return false;}
		else{document.getElementById('errorrpassword').innerHTML=""; return true;}
}
function validateBName(){
		var name=document.getElementById('bname').value;
		if(!name){
				document.getElementById('errorbname').innerHTML="Should not be empty";
				return false;
		}
		
		
		var patt1=/[a-zA-Z0-9]/; var check=0;  		//checking for numbers and alphabets
		for(var i=0;i<name.length;i++)
		{
			var result=patt1.test(name[i]);
			if(!result){check++;}
		}
		if(check!=0){document.getElementById('errorbname').innerHTML="Only numbers and alphabets"; return false;}
		
		else{document.getElementById('errorbname').innerHTML=""; return true;}
}