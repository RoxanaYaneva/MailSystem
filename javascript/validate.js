function validateLogin() {
	var username = document.forms["logForm"]["username"].value;
	var password = document.forms["logForm"]["passwd"].value;
	var isValid = true;

	if (username == "" || password == "") {
		document.getElementById("error").style.display = "block"; 
		document.getElementById("error").innerHTML = "* You should enter your username and password.";
		isValid = false;
	} else {
		document.getElementById("error").style.display = "none";
	}
	return isValid;
}

function validateReg() {
	var name = document.forms["regForm"]["name"].value;
	var username = document.forms["regForm"]["username"].value;
	var password = document.forms["regForm"]["passwd"].value;
	var passwordRepeat = document.forms["regForm"]["passwd-repeat"].value;
	var isValid = true;

	if (name == "" || password == "" || username == "" || passwordRepeat == "") {
		document.getElementById("error").style.display = "block"; 
		document.getElementById("error").innerHTML = "* You should fill in all the fields.";
		isValid = false;
	} else {
		if (!isUsernameValid(username)) {
			document.getElementById("invalid_username").style.display = "block"; 
			document.getElementById("invalid_username").innerHTML = "*Username should be 3 to 10 symbols long and contain letters, digits and _.";
			isValid = false;
		} else {
			document.getElementById("invalid_username").style.display = "none"; // if username is valid do not display this element
		}

		if (!isPasswordValid(password)) {
			document.getElementById("invalid_passwd").style.display = "block";
			document.getElementById("invalid_passwd").innerHTML = "*Password should be at least 6 symbols long and contain at least one digit.";
			isValid = false;
		} else {
			document.getElementById("invalid_passwd").style.display = "none"; // if password is valid do not display this element
		}

		if (!isPasswdRepeatValid(password, passwordRepeat)) {
			document.getElementById("error").style.display = "block";
			document.getElementById("error").innerHTML = "* Passwords not matching.";
			isValid = false;
		} else if (passwordRepeat.length == 0) {
			document.getElementById("error").style.display = "block";
			document.getElementById("error").innerHTML = "* Enter a correct password!";
			isValid = false;
		} else {
			document.getElementById("error").style.display = "none"; // if second password is valid do not display this element
		}
	}
	return isValid;
}

function isUsernameValid(username) {
	var isUsernameValid = true;
	var regex = RegExp(/^[0-9a-zA-Z_]{3,10}$/);
	if (!regex.test(username)) {
		isUsernameValid = false;
	}
	return isUsernameValid;
}

function isPasswordValid(password) {
	var isPasswdValid = true;
	var regex = RegExp(/^\w*(?=\w*\d)(?=\w*[a-z])\w{6,}$/);
	if (!regex.test(password)) {
		isPasswdValid  = false;
	}
	return isPasswdValid;
}

function isPasswdRepeatValid(password, passwordRepeat) {
	return password === passwordRepeat;
}