// Global Functions
function request(url, data, callback) {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', url, true);
	var loader = document.createElement('div');
	loader.className = 'loader';
	document.body.appendChild(loader);
	xhr.addEventListener('readystatechange', function() {
		if(xhr.readyState === 4) {
			if(callback) {
				callback(xhr.response);
			}
			loader.remove();
		}
	});

	var formdata = data ? (data instanceof FormData ? data : new FormData(document.querySelector(data))) : new FormData();

	xhr.send(formdata);
}

// register Function
function register() {
	request('../PHP/signup_submit.php', '#registerForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		try {
			data = JSON.parse(data);
			if(!(data instanceof Array)) {throw Exception('bad data');}

			//Show errors to user
			for(var i = 0;i < data.length;++i) {
				switch(data[i]) {
					case 0:
						window.location = '../products.php';
						break;
					case 1:		// Name Error
						document.getElementById('errs').innerHTML += '<div class="err">Invalid name entered.</div>';
						break;
					case 2:		// Phone Number Error
						document.getElementById('errs').innerHTML += '<div class="err">Invalid phone number entered.</div>';
						break;
					case 3:		// Email Error
						document.getElementById('errs').innerHTML += '<div class="err">Invalid email entered.</div>';
						break;
					case 4:		// Username Error
						document.getElementById('errs').innerHTML += '<div class="err">Invalid username entered.</div>';
						break;
					case 5:		// Password Format Error
						document.getElementById('errs').innerHTML += '<div class="err">Password must contain: <ul><li>At least 8 characters</li><li>At least one lower case letter</li><li>At least one upper case letter</li><li>At least one number</li><li>At least one special character (~?!@#$%^&*)</li></ul></div>';
						break;
					case 6:		// Confirm Password does not match with Password Error
						document.getElementById('errs').innerHTML += '<div class="err">Passwords do not match. Please re-enter your confirmed password.</div>';
						break;
					case 7:		// This Username or Email has been created before
						document.getElementById('errs').innerHTML += '<div class="err">An account with this email already exists</div>';
						break;
					default:	// Default-Unknown Error
						document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
						break;
				}
			}
		}
		catch(e) {
			document.getElementById('errs').innerHTML = '<div class="err">An error exception occurred. Please try again later.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);				
	});
}

// login Function
function login() {
	request('../PHP/login_submit.php', '#loginForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		switch(data) {
			case '0':		// Login successfully
				window.location = '../products.php';
				break;
			case '1':		// [ERROR 1] Cannot connect database 
				//document.getElementById('errs').innerHTML += '<div class="err"><?php echo ?>data<?php ; ?></div>';
				document.getElementById('errs').innerHTML += '<div class="err">Something wrongs happened.</div>';
				break;
			case '2':		// [ERROR 2] Empty or space characters input error
				document.getElementById('errs').innerHTML += '<div class="err">Username and Password can not be empty.</div>';
				break;
			case '3':		// [ERROR 3] Invalid username or password
				document.getElementById('errs').innerHTML += '<div class="err">Incorrect username or password</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';	
				break;
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});	
}

// changing password Function
function changingPassword() {
	request('../PHP/settingpassword_submit.php', '#changingPassword', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		switch(data) {
			case '0':	// Changing Password successfully [NOT ERROR]
				document.getElementById('errs').innerHTML += '<div style="margin: 5px 0; color: green;"><strong>Your new password has been updated successfully.</strong></div>';
				document.getElementById('oldPass').value = "";
				document.getElementById('newPass').value = "";
				document.getElementById('confirmPass').value = "";
				break;
			case '1':	// Cannot connect to database
				document.getElementById('errs').innerHTML += '<div class="err">Something wrongs happened.</div>';
				break;
			case '2':
				document.getElementById('errs').innerHTML += '<div class="err">All inputs can not be empty.</div>';
				break;
			case '3':	// Old Password input in and Password queried from database do not match [ERROR]
				document.getElementById('errs').innerHTML += '<div class="err">Passwords do not match. Please re-enter your old password.</div>';
				break;
			case '4':	// New Password and Re-typing Password input in do not match [ERROR]
				document.getElementById('errs').innerHTML += '<div class="err">Passwords do not match. Please re-enter your confirmed password.</div>';
				break;
			case '5':	// Password Format Error [ERROR]
				document.getElementById('errs').innerHTML += '<div class="err">Password must contain: <ul><li>At least 8 characters</li><li>At least one lower case letter</li><li>At least one upper case letter</li><li>At least one number</li><li>At least one special character (~?!@#$%^&*)</li></ul></div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
				break;				
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);		
	});
}

// addToCart function
function addToCart(itemID) {
	request(itemID, '#addToCart', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errrs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		switch(data) {
			case '0':
				document.getElementById('errs').innerHTML += '<div style="margin: 5px 0; color: green;"><strong>Your new item has been added successfully.</strong></div>';
				break;
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}