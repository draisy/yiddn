// JavaScript Document
function GeneralDirectoryStep1() {
	
CompanyName 		= document.getElementById('CompanyName').value;
Category 			= document.getElementById('Category').value;
AdTitle 	        = document.getElementById('AdTitle').value;
AdURL 	            = document.getElementById('AdURL').value;


	if(CompanyName==""){
	  alert('Company Name is required field.');
	  document.getElementById('CompanyName').focus();
      document.getElementById('CompanyName').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('CompanyName').style.backgroundColor='#fff';
	}
	
	if(Category==""){
	  alert('Category is required field.');
	  document.getElementById('Category').focus();
      document.getElementById('Category').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('Category').style.backgroundColor='#fff';
	}
	if(AdTitle==""){
	  alert('Ad Title is required field.');
	  document.getElementById('AdTitle').focus();
      document.getElementById('AdTitle').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('AdTitle').style.backgroundColor='#fff';
	}
	if(AdURL==""){
	  alert('Ad URL is required field.');
	  document.getElementById('AdURL').focus();
      document.getElementById('AdURL').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('AdURL').style.backgroundColor='#fff';
	}
}
