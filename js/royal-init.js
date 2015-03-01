var images = {};
jQuery("img").each(function(){
    "use strict";
    //console.log(jQuery(this).attr("src"));
    var src = jQuery(this).attr("src");
    images[src]=src;
});
Royal_Preloader.config({
    mode:           'number', // 'number', "text" or "logo"
    timeout:        10,
    showPercentage: true,
    images:         images,
    showInfo:       false,
    opacity:        1,
    background:     ['#fff'] // ['#000000', '#FF0000', '#0097AA', '#F29500', '#C23916', '#94C849', '#6FA014', '#91009B'],
});