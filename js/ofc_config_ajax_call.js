// JavaScript source code
$(document).ready(function () {
    $.ajax({
        url: '../_tenant/Config.xml',
        type: 'Get',
        success: function (result) {
            console.log(result);
        }
    });
});
function xmlParser(xml) {
    //console.log(xml);
    console.log($(xml).find('title').text());
}