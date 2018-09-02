// JavaScript source code
var navJQ = jQuery.noConflict();
navJQ(document).ready(function () {
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
    //Get page title from config.xml
    var titletext;
    titletext = (navJQ(xml).find('title').text());
    document.title = titletext;
    var title_element = document.getElementById("navbar_brand");
    title_element.innerHTML = titletext;

    //Get logo image name from config.xml
    var logotext;
    logotext = (navJQ(xml).find('logo').text());
    console.log("logo = " + logotext);
    //Get nav logo image name from config.xml
    var navlogotext;
    navlogotext = (navJQ(xml).find('nav_logo').text());
    console.log("nav_logo = " + navlogotext);
    if (document.getElementById("nav_logo")) {
        document.getElementById("nav_logo").src = navlogotext;
    }
    //Get tagline from config.xml
    var taglinetext;
    taglinetext = (navJQ(xml).find('tagline').text());
    //Add tagline to Pages
    if (document.getElementById("TagLine")) {
        var element = document.getElementById("TagLine");
        element.innerHTML = taglinetext;
    }
    //Get banner image name from config.xml
    var bannertext;
    bannertext = (navJQ(xml).find('banner').text());
    console.log("banner = " + bannertext);
    //Get backsplash image (half-screen image on Home page) name from config.xml
    var backsplashtext;
    backsplashtext = (navJQ(xml).find('backsplash').text());
    var backsplashimage;
    backsplashimage = backsplashtext;
    console.log("backsplash = " + backsplashtext);
    console.log("backsplashimage = " + backsplashimage);
    if (document.getElementById("backsplash")) {
        document.getElementById("backsplash").style.backgroundImage = backsplashimage;
        document.getElementById("backsplash").style.backgroundPosition = "center";
        document.getElementById("backsplash").style.backgroundSize = "cover";
    }
    //Get special1 image (embedded image below backsplashImage) name from config.xml
    var special1text;
    special1text = (navJQ(xml).find('special1').text());
    var special1image;
    special1image = special1text;
    console.log("special1text = " + special1text);
    console.log("special1image = " + special1image);
    //document.getElementById("special1").style.backgroundImage = special1image;
    //document.getElementById("special1").style.backgroundPosition = "center";
    //document.getElementById("special1").style.backgroundSize = "cover";
}