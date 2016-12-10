$( "#header" ).load("header.html");
//$( "#footer" ).load("footer.html");


$(document).ready(function () {
    // Add Gadget Photos Upload 
    $('a#upload_gadget').bind('click', function (event) {
        $('#file_upload_gadget').trigger('click'); event.preventDefault();
    });

    // Header Search
    $(document).delegate('.showSearchForm', 'click', function(){
        $(".searchForm").toggleClass('visible');
    });

    // Header Menu
    $(document).delegate('.menuIcon', 'click', function () {
        $('.siteLinks').slideToggle();
        $('body').toggleClass('openMenu');
    });

    // Hide Modal Throughtout Site
    $('.hideModal,.overlay').on('click', function () {
        $(".overlay").fadeOut();
        $('.ui-modal').fadeOut();
    });

    // Esc Key Hide
    $(document).keyup(function (e) {
        if (e.keyCode == 27) {
            $(".overlay").fadeOut();
            $('.ui-modal').fadeOut();
        }
    });

    // Add Post Success Modal
    $('.showModalSuccess').on('click', function () {
        $(".overlay").fadeIn();
        $('.modalSuccess').fadeIn();
    });

    // Login Form
    $('.showLoginModal').on('click', function () {
        $(".overlay").fadeIn();
        $('.modalSignIn').fadeIn();
    });

    $("#formTabs").tabs();

    // Sign In
    $(".gotologInTab").click(function () {
       // alert(1);
        $(".logInTab").trigger("click");
    });
    
    // Sign Up
    $(".gotoSignUpTab").click(function () {
        //alert(2);
        $(".signUpTab").trigger("click");
    });

    // Inner Page Header Search Form
    $(".showSearchForm").click(function () {
        //$(".searchLink").css('position', 'static');
        $("#morphsearch").toggleClass('open');
        setTimeout(function () {
        }, 500);
    });

    // Home Page Search Form
    $(".showHomeSearch").click(function () {
        $(".modalhomeSearch").slideDown();
        $(".modalhomeSearch").addClass('open');
    });

    $('.modalhomeSearch .hideModal').click(function () {
        $('.modalhomeSearch').slideUp();
        $(".modalhomeSearch").removeClass('open');
    });

    // Inner Page Header Search Form
    $(".showSearchForm").click(function () {
        //$(".searchLink").css('position', 'static');
        $("#morphsearch").toggleClass('open');
        setTimeout(function () {
        }, 500);
    });
    
    // Checkbox
    $(".checkbox").button();

    // Radio
    $(".siRadio").buttonset();

    // Radio Set with Label
    $(".siRadioLabel").buttonset();

    $('.brandSlides').bxSlider({
        auto:true,
    });

    //$(".showSpecific").click(function () {
    //    var $left1 = $('.marketPriceDetails');
    //    var $left2 = $('.gadgetSlider .bx-wrapper');
    //    $left1.animate({
    //        right: parseInt($left1.css('left'), 10) == 0 ?
    //           $left1.outerWidth() : 0,
    //    });
    //    $left2.animate({
    //        right: parseInt($left2.css('right'), 10) == 0 ?
    //           $left2.outerWidth()/2 : 0,
    //    }); 
    //});

    

    /* SCROLL */
    $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();
        if (scrollTop > 33) {
            $('body').addClass('header-fixed');
            $(".heaheaderStickyder").addClass("shadow");
        } else {
            $('body').removeClass('header-fixed');
            $(".headerSticky").removeClass("shadow");
        }
    });

    var winW = $(window).width();
    var heightH = $('.header').outerHeight();
    var searchBarH = $('.searchHeader').outerHeight();
    var gadgetTabH = $('.gadgetTab').outerHeight();

    if ($(window).width() > 550) {
        $('.gadgetSlider, .bx-viewport, .grabDetails').height($(window).height() - heightH - searchBarH + 0);
        $('.grabSpecPage .marketPriceDetails, .grabSpecPage .specificDetails').css('paddingBottom', gadgetTabH + 10);
        $(window).resize(function () {
            $('.gadgetSlider, .bx-viewport, .grabDetails').height($(window).height() - heightH - searchBarH + 0);
            $('.grabSpecPage .marketPriceDetails, .grabSpecPage .specificDetails').css('paddingBottom', gadgetTabH + 10);
        });
        $(window).trigger('resize');
        setTimeout(function () { $(".gadgetSlider").height($(".grabDetails").height()) }, 500);

        var $left1 = $('.marketPriceDetails');
        var $left2 = $('.gadgetSlider .bx-wrapper');

        $(".showSpecific").click(function () {
            $('.showMarketPrice').removeClass('active');
            $(this).toggleClass('active');
            if (parseInt($left2.css('right'), 10) == 0) {
                $left1.animate({ right: $left1.outerWidth() });
                $left2.animate({ right: $left2.outerWidth() / 2 });
            }
            else {
                $left1.animate({ right: 0 });
                $left2.animate({ right: 0 });
            }
        });

        $(".showMarketPrice").click(function () {
            $(this).addClass('active');
            $('.showSpecific').removeClass('active');
            $left1.animate({ right: 0 });
            $left2.animate({ right: 0 });
        });
    }

    if ($(window).width() < 550) {
        var $left1 = $('.marketPriceDetails');
        $(".showSpecific").click(function () {
            $('.showMarketPrice').removeClass('active');
            $(this).toggleClass('active');
            if (parseInt($left1.css('right'), 10) == 0) {
                $left1.animate({ right: $left1.outerWidth() });
            }
            else {
                $left1.animate({ right: 0 });
            }
        });
        $(".showMarketPrice").click(function () {
            $(this).addClass('active');
            $('.showSpecific').removeClass('active');
            $left1.animate({ right: 0 });
        });
    }

    $(".showComntsModal").click(function () {
        $('.comntsModal').fadeIn();
        $('.overlay').fadeIn();
    });
});
//$(window).load(function () {
    // Header Padding
    //$(window).resize(function () {
      //  $('.wrapper').css("paddingTop", $(".header").height() + 0);
   // });

   // $(window).trigger('resize');
//});
//$(window).resize(function () {
   // $('.wrapper').css("paddingTop", $(".header").height() + 0);
//});
//$(window).trigger('resize');
