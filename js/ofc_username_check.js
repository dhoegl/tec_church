//Check for available username
//If username is used, notify user to enter an unused username

$(document).ready(function()
{
    $('#username').focusout(function(){
        $('#unique_user').html(checkAvail($('#username').val()));
    });
    function checkAvail(username){
    if (username.length < 4) { 
        $('#unique_user').removeClass(); 
        $('#unique_user').addClass('short'); 
        return 'Username must contain at least 4 characters'; 
    }
    else {
//length is ok, lets continue. 
//if username already exists, alert user and disallow from continuing
//check for existing username
	var username_check = $.ajax({
		url: 'services/ofc_username_check.php',
		type: 'POST',
		dataType: 'json',
		data: { username: username }
	});
	username_check.done(function(data){
		if (data.username_status == 'NAME_USED'){ 
			console.log('username_check = ' + data.username_status);
			$('#unique_user').removeClass(); 
			$('#unique_user').addClass('used');
                        $('#unique_user').html('Username taken');
			return 'Username taken'; 
		}
		else {
			console.log('username_check = ' + data.username_status);
			$('#unique_user').removeClass(); 
			$('#unique_user').addClass('available'); 
                        $('#unique_user').html('Username available');
			return 'Username available'; 
		}
            });
        }
    };
});

//Check for existing email address - indicating someone with the selected email address has already registered
