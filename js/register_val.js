
var sign_sub = document.getElementById("sub");

$(sign_sub).click(function(){
		if ((passwrdConfirm() === true) && (input_username() === true) && (input_email() === true) && (input_pass() === true)) {
			return true;
		}else {
		return false;
		}
	});
	
		
function input_email() {
	var email_length = document.getElementById("email_r").value;
	var textLength = email_length.length;
	var txt4 = "Your email has to be between 5 and 50 characters";
	document.getElementById("signerror").innerHTML = txt4;
	if (textLength < 5 || textLength > 50) {
		return false;
	}  else if (textLength > 5 || textLength < 50 ) {
		return true;
	}
}

function input_username() {
	var ln_length = document.getElementById("username_r").value;
	var textLength = ln_length.length;
	var txt3 = "Your username has to be between 1 and 50 characters";
	if (textLength < 1 || textLength > 50 ) {
	   document.getElementById("signerror").innerHTML = txt3;
		return false;
	}  else if (textLength > 1 || textLength < 50 ) {
		return true;
	}
}

function input_pass() {
	var pass_length = document.getElementById("password_r").value;
	var textLength = pass_length.length;
	var txt5 = "Your password has to be between 5 and 50 characters";
	document.getElementById("signerror").innerHTML = txt5;
	if (textLength < 5 || textLength > 50 ) {
		return false;
	}  else if (textLength > 5 || textLength < 50 ) {
		return true;
	}
}

function passwrdConfirm() {
	var pass1 = document.getElementById("password_r").value;
	var pass2 = document.getElementById("c_password_r").value;
	var txt1 = "Your passwords have to match";
	if (pass1 !== pass2) {
		document.getElementById("signerror").innerHTML = txt1;
		return false;
	} else {
	return true;
	}
}

