//Check for matching password

$(document).ready(function()
{
//    $('#register_submit').prop('disabled', true);
    $('#repeatpassword').keyup(function(e){
        var code = e.keyCode || e.which; //Check for Tab key - don't call checkStrength until actual key is pressed
        if(code == '9'){
            console.log('Tab Key Pressed');
        }
        else {
            $('#password_match').html(checkMatch($('#repeatpassword').val(), $('#password').val()));
        }
    });
    function checkMatch(repeatpassword, password){
    //initial check 
    var check = 0; 
    //if the password check does not match, return message. 
    if (repeatpassword == password) { 
        $('#password_match').removeClass(); 
        $('#password_match').addClass('match'); 
        return 'Match'; 
    } 
    else { 
        $('#password_match').removeClass(); 
        $('#password_match').addClass('nomatch'); 
        return 'No Match'; 
    }; 
    };
});
