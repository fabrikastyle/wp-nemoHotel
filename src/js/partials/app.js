$(document).ready(function () {
     
    /* navbar */
    $("#left-logo").on('click', function () {
        $("#close-nav-btn").css("display", "block");
        $("#section-navbar").css("width", "100%");
        $(".overlay-content").removeClass("fadeOut");
        $(".overlay-content").addClass("fadeIn");
    });

    $("#close-nav-btn").on('click', function () {
        $("#close-nav-btn").css("display", "none");
        $("#section-navbar").css("width", "0%");
        $(".overlay-content").removeClass("fadeIn");
        $(".overlay-content").addClass("fadeOut");
    });


    // $(".content-sliders").slick({
    //     slidesToShow: 3,
    //     infinite: true,
    //     speed: 500,
    //     // centerMode: true,
    //     slidesToScroll: 1,
    //     // autoplay: true,
    //     dots: false,
    //     arrows: false,
    //     variableWidth: true,
    
    //     responsive: [{
    //         breakpoint: 1224,
    //         settings: {
    //             slidesToShow: 2
    //         }

    //     }, {

    //         breakpoint: 600,

    //         settings: {
    //             slidesToShow: 1,
    //             dots: false
    //         }

    //     }]
    // });
    

    // $('.nav-slider-left').click(function () {
    //     $('.content-sliders').slick('slickPrev');
    // })

    // $('.nav-slider-right').click(function () {
    //     $('.content-sliders').slick('slickNext');
    // })

    // $('.buttons-nav-slider').appendTo('.slick-dots');


    $('.content-sliders').each(function (idx, item) {
        var carouselId = "carousel" + idx;
        this.id = carouselId;
        $(this).slick({
            slide: "#" + carouselId + " .slider-item",
            arrows: true,
            appendArrows: "#" + carouselId + " .slider-list-link",
            prevArrow: "#" + carouselId + " .nav-slider-left",
            nextArrow: "#" + carouselId + " .nav-slider-right",
            slidesToShow: 3,
            infinite: false,
            speed: 500,
            slidesToScroll: 1,
            dots: false,
            variableWidth: true,
        
            responsive: [{
                breakpoint: 1224,
                settings: {
                    slidesToShow: 2
                }

            }, {

                breakpoint: 600,

                settings: {
                    slidesToShow: 1,
                    dots: false
                }

            }]
        });
     });



    $('.inner-page-slider').each(function (idx, item) {
        var carouselId = "carousel" + idx;
        this.id = carouselId;
        $(this).slick({
            slide: "#" + carouselId + " .option",
            arrows: true,
            appendArrows: "#" + carouselId + " .buttons-nav-slider",
            prevArrow: "#" + carouselId + " .nav-slider-left",
            nextArrow: "#" + carouselId + " .nav-slider-right",
            centerMode: true,
            centerPadding: '10px',
            slidesToShow: 3,
            dots: false,
            variableWidth: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
     });



  




    $('#background-video').YTPlayer({
        fitToBackground: true,
        videoId: 'CoJY2ucIRPQ',
        pauseOnScroll: false,
        controls: 0,
        showinfo: 0,
        branding: 0,
        rel: 0,
        autohide: 0,
    });


    $(".city-select-active").on('click', function () {
       $(".city-select-switcher").toggleClass("select-switcher-show");
    });


    // tables
    var $columns_number = $('#cd-table .cd-table-container').find('.cd-table-column').length;
	
	$('.cd-table-container').on('scroll', function(){ 
		$this = $(this);
		//hide the arrow on scrolling
		if( $this.scrollLeft() > 0 ) {
			$('.cd-scroll-right').hide();
		}
		//remove color gradient when table has scrolled to the end
		var total_table_width = parseInt($('.cd-table-wrapper').css('width').replace('px', '')),
			table_viewport = parseInt($('#cd-table').css('width').replace('px', ''));
			
		if( $this.scrollLeft() >= total_table_width - table_viewport - $columns_number) {
			$('#cd-table').addClass('table-end');
		} else {
			$('#cd-table').removeClass('table-end');
		}
    });
    
	//scroll the table (scroll value equal to column width) when clicking on the .cd-scroll-right arrow
 	$('.cd-scroll-right').on('click', function(){
 		$this= $(this);
 		var column_width = $(this).siblings('.cd-table-container').find('.cd-table-column').eq(0).css('width').replace('px', ''),
 			new_left_scroll = parseInt($('.cd-table-container').scrollLeft()) + parseInt(column_width);
 		
 		$('.cd-table-container').animate( {scrollLeft: new_left_scroll}, 200 );
 		$this.hide();
 	});
});
