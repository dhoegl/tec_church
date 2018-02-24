//Check for correct email format

$(document).ready(function()
{
//    $('#register_submit').prop('disabled', true);
    $('#emailaddress').focusout(function(e){
        var code = e.keyCode || e.which; //Check for Tab key - don't call checkStrength until actual key is pressed
        if(code == '9'){
            console.log('Tab Key Pressed');
        }
        else {
        $('#repeatemailaddress').val(""); 
        $('#email_match').removeClass(); 
        $('#email_match').addClass('nomatch'); 
        $('#email_match').html('No Match'); 
        $('#email_choose').removeClass(); 
        $('#email_choose').addClass('short'); 
        $('#email_choose').html(checkEmailValidity($('#emailaddress').val()));
    }
    });
    function checkEmailValidity(emailaddress){
    //email format validation
        var emailmatch = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
        //if email is correct, return Email Accepted message. 
        if(emailaddress.match(emailmatch)){
            $('#email_choose').removeClass(); 
            $('#email_choose').addClass('available'); 
            $('#email_choose').html == 'Email Accepted'; 
            return 'Email Accepted'; 
        }
        else {
            $('#email_choose').removeClass(); 
            $('#email_choose').addClass('short'); 
            $('#email_choose').html == 'Incorrect Email Format'; 
            return 'Incorrect Email Format'; 
        }
    };
});
