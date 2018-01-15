$(document).ready(function () {
    var controller = new ScrollMagic.Controller();

    // var parallaxTl = new TimelineMax();
    // parallaxTl
    //     .from('.content-wrapper', 0.6, { autoAlpha: 0, ease: Power0.easeNone }, 0.6)
    //     .from('.bg-parallax', 2, { y: '-50%', ease: Power0.easeNone }, 0);

    // var slideParallaxScene = new ScrollMagic.Scene({
    //     triggerElement: '.parallax-section',
    //     triggerHook: 1,
    //     duration: '100%'
    // })
    //     .setTween(parallaxTl)
    //     .addTo(controller);

    // var parallax2Tl = new TimelineMax();
    // parallax2Tl
    //     .from('.bg-parallax2', 2, { y: '-50%', ease: Power0.easeNone }, 0);

    // var slideParallaxScene = new ScrollMagic.Scene({
    //     triggerElement: '.pools-section',
    //     triggerHook: 1,
    //     duration: '100%'
    // })
    //     .setTween(parallax2Tl)
    //     .addTo(controller);


    // build a scenes



    $('.motion-y').each(function () {

        var ourScene = new ScrollMagic.Scene({
            triggerElement: this.children[0],
            triggerHook: 0.9
        })
            .setClassToggle(this, 'fade-in')
            .addTo(controller);

    });



    $('.motion-x-left').each(function () {

        var ourScene3 = new ScrollMagic.Scene({
            triggerElement: this.children[0],
            triggerHook: 0.9
        })
            .setClassToggle(this, 'fade-in')
            .addTo(controller);

    });



    $('.motion-y-top').each(function () {

        var ourScene4 = new ScrollMagic.Scene({
            triggerElement: this.children[0],
            triggerHook: 0.9
        })
            .setClassToggle(this, 'fade-in')
            .addTo(controller);

    });

    $('.motion-title-left').each(function () {

        var ourScene5 = new ScrollMagic.Scene({
            triggerElement: this.children[0],
            triggerHook: 0.9

        })
            .setClassToggle(this, 'fade-in')
            .addTo(controller);

    });

    $('.motion-title-right').each(function () {

        var ourScene6 = new ScrollMagic.Scene({
            triggerElement: this.children[0],
            triggerHook: 0.9

        })
            .setClassToggle(this, 'fade-in')
            .addTo(controller);

    });

    // var RightSliderItemText = new TimelineMax();
    // RightSliderItemText.staggerFrom(".slider-rigth-side .slider-item .text-inner-slide p", 0.3, { x: -80, opacity: 0 }, 0.2);

    // $('.slider-rigth-side .slider-item .text-inner-slide').each(function () {

    //     var titleSlideScene = new ScrollMagic.Scene({
    //         triggerElement: this.children[0],
    //         triggerHook: 0.9
    //     })
    //         // .addIndicators({
    //         //     name: 'right-inner-slide2 scene',
    //         //     colorTrigger: 'black',
    //         //     colorStart: '#75C695',
    //         //     colorEnd: 'pink'
    //         // }) // this requires a plugin
    //         .setTween(RightSliderItemText)
    //         .addTo(controller);
    // });

    // var pinIntroScene = new ScrollMagic.Scene({
    //     triggerElement: '.bg-video',
    //     triggerHook: 0,
    //     duration: '15%'
    // })
    //     .setPin('.text-video', { pushFollowers: true })
    //     .addTo(controller);

    // var leftSliderItemText = new TimelineMax();
    // leftSliderItemText.staggerFrom(".slider-left-side .slider-item .text-inner-slide p", 0.3, { x: 80, opacity: 0 }, 0.2);

    // $('.slider-left-side .slider-item .text-inner-slide').each(function () {

    //     var titleSlideScene = new ScrollMagic.Scene({
    //         triggerElement: this.children[0],
    //         triggerHook: 0.9
    //     })
    //         .setTween(leftSliderItemText)
    //         .addTo(controller);
    // });


    var navbarSlide = new TimelineMax();
    navbarSlide.staggerFrom(".nav-section-left .slideNavM", 0.9, { y: -80, opacity: 0 }, 0.5);

    var navbarSlideScene = new ScrollMagic.Scene({
        triggerElement: '.nav-section-left',
        triggerHook: 0.9
    })
        .setTween(navbarSlide)
        .addTo(controller);

    var navbarSlideRight = new TimelineMax();
    navbarSlideRight.staggerFrom(".nav-section-right .slideNavM", 0.9, { x: 180, opacity: 0 }, 0.3);

    var navbarRightSlideScene = new ScrollMagic.Scene({
        triggerElement: '.nav-section-right',
        triggerHook: 0.9
    })
        .setTween(navbarSlideRight)
        .addTo(controller);



    var textVideoTl = new TimelineMax();
    textVideoTl.staggerFrom(".text-video .text-video-item", 0.5, { y: 150, opacity: 0 }, 0.3);

    var textVideoScene = new ScrollMagic.Scene({
        triggerElement: '.text-video',
        triggerHook: 0.9
    })
        .setTween(textVideoTl)
        .addTo(controller);



    var textVideoTlOut = new TimelineMax();
    textVideoTlOut.staggerFrom(".text-video .text-video-item", 0.3, { y: 0, opacity: 1 }, 0.2);

    var textVideoScene2 = new ScrollMagic.Scene({
        triggerElement: '.motion-title-left',
        triggerHook: 0.9,
    })
        // .addIndicators({
        //     name: 'textVideoTlOut scene',
        //     colorTrigger: 'black',
        //     colorStart: '#75C695',
        //     colorEnd: 'pink'
        // }) // this requires a plugin
        .setTween(textVideoTlOut)
        .addTo(controller);

    var socialIcons = new TimelineMax();
    socialIcons.staggerFrom(".link-parallax a", 0.3, { y: -50, opacity: 0 }, 0.2);

    var socialIconsScene = new ScrollMagic.Scene({
        triggerElement: '.link-parallax',
        triggerHook: 0.9
    })
        .setTween(socialIcons)
        .addTo(controller);


    var bigLogosTl = new TimelineMax();
    bigLogosTl.from(".big-logo-motion img", 2, { y: 200, opacity: 0 });

    var bigLogos = new ScrollMagic.Scene({
        triggerElement: '.big-logo-motion',
        triggerHook: 0.9,
        duration: '100%'
    })
        // .addIndicators({
        //     name: 'bigLogos scene',
        //     colorTrigger: 'black',
        //     colorStart: '#75C695',
        //     colorEnd: 'pink'
        // }) // this requires a plugin
        .setTween(bigLogosTl)
        .addTo(controller);



    var mainlogoTl = new TimelineMax();
    MorphSVGPlugin.convertToPath("#c1, #c2, #c3, #c4, #c5, #c6, #c7, #c8, #c9");

    mainlogoTl.to("#c1", 1.5, { morphSVG: "#d1", css: { visibility: "visible" } }, 0.5);
    mainlogoTl.to("#c2", 1.5, { morphSVG: "#d8", css: { visibility: "visible" } }, 0.5);
    mainlogoTl.to("#c3", 1.5, { morphSVG: "#d6", css: { visibility: "visible" } }, 0.5);
    mainlogoTl.to("#c4", 1.5, { morphSVG: "#d4", css: { visibility: "visible" } }, 0.5);
    mainlogoTl.to("#c5", 1.5, { morphSVG: "#d5", css: { visibility: "visible" } }, 0.5);
    mainlogoTl.to("#c6", 1.5, { morphSVG: "#d7", css: { visibility: "visible" } }, 0.5);
    mainlogoTl.to("#c7", 1.5, { morphSVG: "#d3", css: { visibility: "visible" } }, 0.5);
    mainlogoTl.to("#c8", 1.5, { morphSVG: "#d2", css: { visibility: "visible" } }, 0.5);
    mainlogoTl.to("#c9", 1.5, { morphSVG: "#d9", css: { visibility: "visible" } }, 0.5);
});