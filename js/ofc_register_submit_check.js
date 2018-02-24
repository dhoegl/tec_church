//Check that all Registration fields have been correctly filled in

$(document).ready(function()
{
    var all_reg_fields = 0;
    var churchcodeset = 'N';
    var churchcodelen = 'N';
    var usernameset = 'N';
    var passwordset = 'N';
    var repeatpasswordset = 'N';
    var firstnameset = 'N';
    var lastnameset = 'N';
    var emailset = 'N';
    var repeatemailset = 'N';
    $('.churchcodecheck').click(function(){
        if($('input[name=confirmcode]').prop('checked') == true){
            churchcodeset = 'Y';
            console.log("churchcodecheck = YES");
            console.log("churchcodeset = " + churchcodeset);
            console.log("churchcodelen = " + churchcodelen);
        }
        else{
            churchcodeset = 'N';
            console.log("churchcodecheck = NO");
            console.log("churchcodeset = " + churchcodeset);
            console.log("churchcodelen = " + churchcodelen);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y' && emailset == 'Y' && repeatemailset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#churchcode').keyup(function(){
        var churchcode = $('#churchcode').val();
        var confirm_code_len = $('#confirm_code_len').html();
        console.log("churchcode = " + churchcode);
        if($('#confirm_code_len').html() == 'Code Available') {
            churchcodelen = 'Y';
            console.log('confirm_code_len = ' + confirm_code_len);
            console.log("churchcodelen = " + churchcodelen);
        }
        else {
            churchcodelen = 'N';
            console.log('confirm_code_len = ' + confirm_code_len);
            console.log("churchcodelen = " + churchcodelen);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y' && emailset == 'Y' && repeatemailset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#username').focusout(function(){
        var unique_user = $('#unique_user').html();
        console.log("unique_user = " + unique_user);
        if($('#unique_user').html() == 'Username available') {
            usernameset = 'Y';
            console.log("usernameset = " + usernameset);
        }
        else {
            usernameset = 'N';
            console.log("usernameset = " + usernameset);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y' && emailset == 'Y' && repeatemailset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#password').keyup(function(){
        if($('#register_result').html() == 'Good' || $('#register_result').html() == 'Strong') {
            passwordset = 'Y';
            console.log("passwordset = " + passwordset);
        }
        else
        {
            passwordset = 'N';
            console.log("passwordset = " + passwordset);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y' && emailset == 'Y' && repeatemailset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#repeatpassword').keyup(function(){
        if($('#password_match').html() == 'Match') {
            repeatpasswordset = 'Y';
            console.log("repeatpasswordset = " + repeatpasswordset);
        }
        else
        {
            repeatpasswordset = 'N';
            console.log("repeatpasswordset = " + repeatpasswordset);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y' && emailset == 'Y' && repeatemailset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#firstname').keyup(function(){
        var fnhtml = $('#firstname').val();
        var fnlen = fnhtml.length;
        if(fnlen > 0){
            firstnameset = 'Y';
            console.log("firstnameset = " + firstnameset);
        }
        else {
            firstnameset = 'N';
            console.log("firstnameset = " + firstnameset);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y' && emailset == 'Y' && repeatemailset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#lastname').keyup(function(){
        var lnhtml = $('#lastname').val();
        var lnlen = lnhtml.length;
        if(lnlen > 0){
            lastnameset = 'Y';
            console.log("lastnameset = " + lastnameset);
        }
        else {
            lastnameset = 'N';
            console.log("lastnameset = " + lastnameset);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y' && emailset == 'Y' && repeatemailset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#emailaddress').keyup(function(){
        if($('#email_choose').html() == 'Email Accepted') {
            emailset = 'Y';
            console.log("emailset = " + emailset);
        }
        else
        {
            emailset = 'N';
            console.log("emailset = " + emailset);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y' && emailset == 'Y' && repeatemailset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#repeatemailaddress').keyup(function(){
        if($('#email_match').html() == 'Match') {
            repeatemailset = 'Y';
            console.log("repeatemailset = " + repeatemailset);
        }
        else
        {
            repeatemailset = 'N';
            console.log("repeatemailset = " + repeatemailset);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y' && emailset == 'Y' && repeatemailset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });

});
