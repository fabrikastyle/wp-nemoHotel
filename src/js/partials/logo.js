    var logoTl = new TimeLineMax({repeat: -1, repeatDelay:0.3, yoyo:true});
    MorphSVGPlugin.convertToPath("#c1, #c2, #c3, #c4, #c5, #c6, #c7, #c8, #c9");

    logoTl.to("#c1", 0.3, {morphSVG:"#d1"});