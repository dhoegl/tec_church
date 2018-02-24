//Check for proper confirmation code format

$(document).ready(function()
{
    $('#churchcode').keyup(function(){
        $('#confirm_code_len').html(checkCode($('#churchcode').val()));
    });
    function checkCode(churchcode){
    if (churchcode.length != 5) { 
        $('#confirm_code_len').removeClass(); 
        $('#confirm_code_len').addClass('short'); 
        $('#confirm_code_len').html = 'Incorrect Code';
        return 'Incorrect Code'; 
    }
    else {
        $('#confirm_code_len').removeClass(); 
        $('#confirm_code_len').addClass('available'); 
        $('#confirm_code_len').html = 'Code Available';
        return 'Code Available'; 
        }
    };
});
