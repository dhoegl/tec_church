//Check that all Registration fields have been correctly filled in

$(document).ready(function()
{
//    $('#register_submit').prop('disabled', true);
    $('#lastname').keyup(function(){
        console.log("LastName Keyup");
        if($('#password_match').html() == 'Match') {
            $('#register_submit').removeClass(); 
            $('#register_submit').addClass('btn btn-primary'); 
            console.log("Register Match");
        }
        else
        {
            $('#register_submit').removeClass(); 
            $('#register_submit').addClass('btn btn-secondary'); 
            console.log("Register NoMatch");
        }
    });
});
