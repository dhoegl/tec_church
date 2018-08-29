// JavaScript source code
$(document).ready(function () {
    var titletext;
    $.ajax({
        url: '../_tenant/Config.xml',
        type: 'Get',
        //success: function (result) {
        //    console.log(result);
        //}
        success: xmlParser
    });
});
function xmlParser(xml) {
    var titletext;
    titletext = ($(xml).find('title').text());
    document.title = titletext;

}