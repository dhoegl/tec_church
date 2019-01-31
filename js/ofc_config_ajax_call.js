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
    //Get name from config.xml
    var nametext;
    nametext = (navJQ(xml).find('name').text());
    //Add name to Pages
    if (document.getElementById("custname")) {
        var name_element = document.getElementById("custname");
        name_element.innerHTML = nametext;
    }
    //Get tagline from config.xml
    var taglinetext;
    taglinetext = (navJQ(xml).find('tagline').text());
    //Add tagline to Pages
    if (document.getElementById("TagLine")) {
        var element = document.getElementById("TagLine");
        element.innerHTML = taglinetext;
    }
    //Get domain name from config.xml
    var domaintext;
    domaintext = (navJQ(xml).find('domain').text());
    //Add domain to Pages
    if (document.getElementById("domainname")) {
        var domain_element = document.getElementById("domainname");
        domain_element.innerHTML = domaintext;
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
        document.getElementById("backsplash").style.backgroundPosition = "center center";
        document.getElementById("backsplash").style.backgroundSize = "cover";
        document.getElementById("backsplash").style.backgroundAttachment = "fixed"; // background won't scroll

    }
    //Get backsplash_Welcome image (half-screen image on Master Splash screen) name from config.xml
    var backsplash_Welcome_text;
    backsplash_Welcome_text = (navJQ(xml).find('backsplash_Welcome').text());
    var backsplash_Welcome_image;
    backsplash_Welcome_image = backsplash_Welcome_text;
    console.log("backsplash_Welcome = " + backsplash_Welcome_text);
    console.log("backsplash_Welcome image = " + backsplash_Welcome_image);
    if (document.getElementById("backsplash_Welcome")) {
        document.getElementById("backsplash_Welcome").style.backgroundImage = backsplash_Welcome_image;
        document.getElementById("backsplash_Welcome").style.backgroundPosition = "center";
        document.getElementById("backsplash_Welcome").style.backgroundSize = "cover";
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

    //Get prayer visibility text content (defines Elder or Board visibility) from config.xml
    var visibility1text;
    visibility1text = (navJQ(xml).find('visibility1').text());
    if (document.getElementById("Visibility1")) {
        var visibility1textcontent = document.getElementById("Visibility1");
        visibility1textcontent.innerHTML = visibility1text;
    }
    //Get prayer visibility text content (defines Elder or Board visibility) from config.xml
    var visibility2text;
    visibility2text = (navJQ(xml).find('visibility2').text());
    if (document.getElementById("Visibility2")) {
        var visibility2textcontent = document.getElementById("Visibility2");
        visibility2textcontent.innerHTML = visibility2text;
    }

    //Get prayer approval text content (defines prayer request approval) from config.xml
    var prayerapprovaltext;
    prayerapprovaltext = (navJQ(xml).find('prayerapproval').text());
    if (document.getElementById("newprayernotice")) {
        var prayerapprovaltextcontent = document.getElementById("newprayernotice");
        prayerapprovaltextcontent.innerHTML = prayerapprovaltext;
    }
    //Get contact text (the 'Contact Us' email address embedded at ofc_home) from config.xml
    var contacttext;
    contacttext = (navJQ(xml).find('contact').text());
    if (document.getElementById("contactus")) {
        document.getElementById("contactus").href = contacttext;
    }
    //Get homepage text (the 'Go To Home Page' link embedded at ofc_home) from config.xml
    var homepagetext;
    homepagetext = (navJQ(xml).find('homepage').text());
    if (document.getElementById("gotosite")) {
        document.getElementById("gotosite").href = homepagetext;
        document.getElementById("gotosite").target = "_blank";
    }
}