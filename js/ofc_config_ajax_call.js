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
    //Get page title from config.xml
    var titletext;
    titletext = ($(xml).find('title').text());
    document.title = titletext;
    //Get logo image name from config.xml
    var logotext;
    logotext = ($(xml).find('logo').text());
    console.log("logo = " + logotext);
    //Get tagline from config.xml
    var taglinetext;
    taglinetext = ($(xml).find('tagline').text());
    //Add tagline to Pages
    var element = document.getElementById("TagLine");
    element.innerHTML = taglinetext;
    //Get banner image name from config.xml
    var bannertext;
    bannertext = ($(xml).find('banner').text());
    console.log("banner = " + bannertext);
    //Get backsplash image (half-screen image on Home page) name from config.xml
    var backsplashtext;
    backsplashtext = ($(xml).find('backsplash').text());
    var backsplashimage;
    backsplashimage = backsplashtext;
    console.log("backsplash = " + backsplashtext);
    console.log("backsplashimage = " + backsplashimage);
    document.getElementById("backsplash").style.backgroundImage = backsplashimage;
}