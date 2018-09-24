// JavaScript source code
var mailJQ = jQuery.noConflict();
mailJQ(document).ready(function () {
    var titletext;
    navJQ.ajax({
        url: '../_tenant/Config.xml',
        type: 'Get',
        //success: function (result) {
        //    console.log(result);
        //}
        success: xmlParser
    });
});
function xmlParser(xml) {
    echo "<?php stuff; ?>";
    mail($praymailto, $praymailsubject, $praymailmessage, $praymailheaders);

}
