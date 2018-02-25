//Check for matching email address

$(document).ready(function()
{
//    $('#register_submit').prop('disabled', true);
    $('#repeatemailaddress').keyup(function(e){
        var code = e.keyCode || e.which; //Check for Tab key - don't call checkStrength until actual key is pressed
        if(code == '9'){
            console.log('Tab Key Pressed');
        }
        else {
            $('#email_match').html(checkMatch($('#repeatemailaddress').val(), $('#emailaddress').val()));
        }
    });
    function checkMatch(repeatemailaddress, emailaddress){
    //initial check 
    var check = 0; 
    //if the password check does not match, return message. 
    if (repeatemailaddress == emailaddress) { 
        $('#email_match').removeClass(); 
        $('#email_match').addClass('match'); 
        return 'Match'; 
    } 
    else { 
        $('#email_match').removeClass(); 
        $('#email_match').addClass('nomatch'); 
        return 'No Match'; 
    }; 
    };
});
