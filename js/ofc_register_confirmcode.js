// ---- Check for church registration code
// ---- Provided as part of initial registration notification sent to church congregants

$(document).ready(function()
{
    $('.churchcodecheck').click(function(){
        console.log("Confirm Code Selection clicked");
    var confval = $('input[name=confirmcode]').prop('checked'); 
    if(confval)
    { 
        console.log('YES Clicked');
        $('#churchcodelabel').show(); 
        $('#churchcode').show(); 
    }
    else
    {
        console.log('NO Clicked');
        $('#churchcodelabel').hide(); 
        $('#churchcode').hide(); 
    };
    });
    $('#churchcodelabel').show(); 
    $('#churchcode').show(); 
});
