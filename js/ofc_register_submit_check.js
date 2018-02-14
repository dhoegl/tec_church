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
    $('.churchcodecheck').click(function(){
//    $('#lastname').keyup(function(){
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
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#churchcode').keyup(function(){
        var cchtml = $('#churchcode').val();
        var cclen = cchtml.length;
        if(cclen == 5){
            churchcodelen = 'Y';
            console.log("cchtml = " + cchtml);
            console.log("cclen = " + cclen);
            console.log("churchcodelen = " + churchcodelen);
        }
        else {
            churchcodelen = 'N';
            console.log("cchtml = " + cchtml);
            console.log("cclen = " + cclen);
            console.log("churchcodelen = " + churchcodelen);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#username').keyup(function(){
        var unhtml = $('#username').val();
        var unlen = unhtml.length;
        if(unlen > 2){
            usernameset = 'Y';
            console.log("unlen = " + unlen);
        }
        else {
            usernameset = 'N';
            console.log("unlen = " + unlen);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#password').keyup(function(){
        if($('#register_result').html() == 'Good' || $('#register_result').html() == 'Strong') {
//          $('#register_submit').prop('disabled', false);
            passwordset = 'Y';
            console.log("Password Good or Strong");
        }
        else
        {
            passwordset = 'N';
            console.log("Password Too Short or Weak");
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#repeatpassword').keyup(function(){
        if($('#password_match').html() == 'Match') {
//          $('#register_submit').prop('disabled', false);
            repeatpasswordset = 'Y';
            console.log("Register Match");
        }
        else
        {
            repeatpasswordset = 'N';
            console.log("Register NoMatch");
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#firstname').keyup(function(){
        var fnhtml = $('#firstname').val();
        var fnlen = fnhtml.length;
        if(fnlen > 2){
            firstnameset = 'Y';
            console.log("fnlen = " + fnlen);
        }
        else {
            firstnameset = 'N';
            console.log("fnlen = " + fnlen);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
    $('#lastname').keyup(function(){
        var lnhtml = $('#lastname').val();
        var lnlen = lnhtml.length;
        if(lnlen > 2){
            lastnameset = 'Y';
            console.log("lnlen = " + lnlen);
        }
        else {
            lastnameset = 'N';
            console.log("lnlen = " + lnlen);
        }
        if((churchcodeset == 'N' || (churchcodeset == 'Y' && churchcodelen == 'Y')) && usernameset == 'Y' && passwordset == 'Y' && repeatpasswordset == 'Y' && firstnameset == 'Y' && lastnameset == 'Y'){
            $('#register_submit').removeClass('disabled'); 
        }
        else {
            $('#register_submit').addClass('disabled'); 
        }
    });
});
