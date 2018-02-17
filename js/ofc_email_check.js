//Check for correct email format

$(document).ready(function()
{
//    $('#register_submit').prop('disabled', true);
    $('#emailaddress').keyup(function(){
        $('#repeatemailaddress').val(""); 
        $('#email_match').removeClass(); 
        $('#email_match').addClass('nomatch'); 
        $('#email_match').html('No Match'); 
        $('#register_result').html(checkEmailValidity($('#emailaddress').val()));
    });
    function checkEmailValidity(emailaddress){
    //initial strength 
    var strength = 0; 
    //if the password length is less than 6, return message. 
    if (emailaddress.length < 6) { 
        $('#email_choose').removeClass(); 
        $('#email_choose').addClass('short'); 
        return 'Too short'; 
    } 
    };
});
