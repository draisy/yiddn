// JavaScript Document

var ALERT_TITLE = "Alert Box";
var ALERT_BUTTON_TEXT = "Ok";
 
if(document.getElementById) {
	window.alert = function(txt) {
	createCustomAlert(txt);
	}
}
 
function createCustomAlert(txt) {
d = document;
 
if(d.getElementById("modalContainer")) return;
 
mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
mObj.id = "modalContainer";
mObj.style.height = d.documentElement.scrollHeight + "px";
 
alertObj = mObj.appendChild(d.createElement("div"));
alertObj.id = "alertBox";
if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
alertObj.style.visiblity="visible";
 
h1 = alertObj.appendChild(d.createElement("h1"));
h1.appendChild(d.createTextNode(ALERT_TITLE));
 
msg = alertObj.appendChild(d.createElement("p"));
//msg.appendChild(d.createTextNode(txt));
msg.innerHTML = txt;
 
btn = alertObj.appendChild(d.createElement("a"));
btn.id = "closeBtn";
btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
btn.href = "#";
btn.focus();
btn.onclick = function() { removeCustomAlert();return false; }
 
alertObj.style.display = "block";
 
}
 
function removeCustomAlert() {
document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}

function LocalDirectoryStep4() {
PaymentPlan			= document.getElementById('PaymentPlan').value;  
NameasonCard   		= document.getElementById('NameasonCard').value;
CreditCard   		= document.getElementById('CreditCard').value;
NameonCard  		= document.getElementById('NameonCard').value;
CVV  				= document.getElementById('CVV').value;
year 				= document.getElementById('ExpYear').value;
month				= document.getElementById('ExpMon').value;

	if(PaymentPlan==""){
	  alert('Payment Plan is required field.');
	  document.getElementById('PaymentPlan').focus();
      document.getElementById('PaymentPlan').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('PaymentPlan').style.backgroundColor='#fff';
	}	
	
	if(NameasonCard==""){
	  alert('Name as on Card is required field.');
	  document.getElementById('NameasonCard').focus();
      document.getElementById('NameasonCard').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('NameasonCard').style.backgroundColor='#fff';
	}
	
	if(CreditCard==""){
	  alert('Card Number is required field.');
	  document.getElementById('CreditCard').focus();
      document.getElementById('CreditCard').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('CreditCard').style.backgroundColor='#fff';
	}
	
	if(NameonCard==""){
	  alert('Credit Card type is required field.');
	  document.getElementById('NameonCard').focus();
      document.getElementById('NameonCard').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('NameonCard').style.backgroundColor='#fff';
	}
	
	today = new Date();
    expiry = new Date(year, month);
    if (today.getTime() > expiry.getTime()){
	alert('This credit card has expired! Please use another card.');
    document.getElementById('CreditCard').focus();
    document.getElementById('CreditCard').style.backgroundColor='#ffa5a5';
    return false;
	}
	
	if(CVV==""){
	  alert('CVV is required field.');
	  document.getElementById('CVV').focus();
      document.getElementById('CVV').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('CVV').style.backgroundColor='#fff';
	}

}

function CouponFun()
{
PaymentPlan			= document.getElementById('PaymentPlan').value;  	
Coupon				= document.getElementById('Coupon').value;
	if(PaymentPlan==""){
	  alert('Payment Plan is required field.');
	  document.getElementById('PaymentPlan').focus();
      document.getElementById('PaymentPlan').style.backgroundColor='#ffa5a5';
	  return false;
	}else{
     document.getElementById('PaymentPlan').style.backgroundColor='#fff';
	}	
	if(Coupon!=""){
	$.post("couponCode.php",
    {
      couponCode: document.getElementById('Coupon').value
    },
		function(data,status){
			if(data=="Invalid coupon Code."){
			alert('Invalid coupon Code.');
			document.getElementById('Coupon').focus();
			document.getElementById('Coupon').value='';
      		document.getElementById('Coupon').style.backgroundColor='#ffa5a5';
			  updateTotal();
			}else{
			document.getElementById('CouponDiscount').value=data;
			document.getElementById('Coupon').style.backgroundColor='#fff';
			alert('<h2>The coupon was successfully applied.</h2>  Coupon code expires after one-time use. It applies to the first payment of your selected billing cycle only.');
			 updateTotal(); 
			}
		});
	}else{
		alert('Please Enter coupon Code.');
		return false;
	}
}
