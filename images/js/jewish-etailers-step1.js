// JavaScript Document
function JewishEtailersStep1() {
	
CompanyName 		= document.getElementById('CompanyName').value;
CompanyAddress  	= document.getElementById('CompanyAddress').value;
CompanyEmail 	    = document.getElementById('CompanyEmail').value;
CompanyWebsite 	    = document.getElementById('CompanyWebsite').value;


	if(CompanyName==""){
	  alert('Company Name is required field.');
	  document.getElementById('CompanyName').focus();
      document.getElementById('CompanyName').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('CompanyName').style.backgroundColor='#fff';
	}
	
	if(CompanyAddress==""){
	  alert('Company Address is required field.');
	  document.getElementById('CompanyAddress').focus();
      document.getElementById('CompanyAddress').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('CompanyAddress').style.backgroundColor='#fff';
	}
	if(CompanyEmail==""){
	  alert('Company Email is required field.');
	  document.getElementById('CompanyEmail').focus();
      document.getElementById('CompanyEmail').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('CompanyEmail').style.backgroundColor='#fff';
	}
	if(CompanyWebsite==""){
	  alert('Company Website is required field.');
	  document.getElementById('CompanyWebsite').focus();
      document.getElementById('CompanyWebsite').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('CompanyWebsite').style.backgroundColor='#fff';
	}
}
