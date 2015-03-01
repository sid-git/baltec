$(function() {
"use strict";
    $.vegas('slideshow', {
        delay:5000,
        backgrounds:[
            { src:'img/background/bg4.jpg', fade:1000 },
            { src:'img/background/bg1.jpg', fade:1000 },
            { src:'img/background/bg5.jpg', fade:1000 }
        ]})('overlay', {
        src:'js/vegas/overlays/05.png'
    });
});