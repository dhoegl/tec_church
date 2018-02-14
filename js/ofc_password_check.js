//Check for correct password strength
//Password strength criteria is as follows
//-- Length must be greater than 6 characters
//-- Characters shall include at least the following:
//---- Use lower case and upper case characters
//---- Use numbers and special characters
//  If password is less than 6 characters, don’t accept.
//  If the length of password is more than 6 characters, increase the strength value by +1.
//  If the password contains lower and uppercase characters, increase the strength value by +1.
//  If the password contains characters and numbers, increase the strength value by +1.
//  If the password contains one special character, increase the strength value by +1.
//  If the password contains two special characters, increase the strength value by +1.
// ---- Allow Passwords whose Strength is either "Good" or "Strong" (Strenght = 2 or greater)

$(document).ready(function()
{
//    $('#register_submit').prop('disabled', true);
    $('#password').keyup(function(){
        $('#register_result').html(checkStrength($('#password').val()));
    });
    function checkStrength(password){
    //initial strength 
    var strength = 0; 
    //if the password length is less than 6, return message. 
    if (password.length < 6) { 
        $('#register_result').removeClass(); 
        $('#register_result').addClass('short'); 
//        $('#register_submit').prop('disabled', true);
        return 'Too short'; 
    } 
    //length is ok, lets continue. 
        //if length is 8 characters or more, increase strength value 
        if (password.length > 7) strength += 1; 
    
        //if password contains both lower and uppercase characters, increase strength value 
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1; 
    
        //if it has numbers and characters, increase strength value 
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1; 
        
        //if it has one special character, increase strength value 
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1; 
        
        //if it has two special characters, increase strength value 
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) strength += 1; 
         
        //now we have calculated strength value, we can return messages 
        //if value is less than 2 
        if (strength < 2 ) {
            $('#register_result').removeClass(); 
            $('#register_result').addClass('weak');
            return 'Weak'; 
        } 
        else if (strength == 2 ) { 
            $('#register_result').removeClass(); 
            $('#register_result').addClass('good'); 
            return 'Good'; 
        } 
        else { 
            $('#register_result').removeClass(); 
            $('#register_result').addClass('strong'); 
            return 'Strong'; 
        }; 
    };
});
